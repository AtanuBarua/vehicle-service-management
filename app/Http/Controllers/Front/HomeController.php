<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Brand;
use App\Product;
use App\Order;
use App\Invoice;
use App\City;
use App\Region;
use App\Review;
use App\Chat;
use App\BotQuestion;
use App\BotAnswer;
use App\TrainBot;
use App\Booking;
use DB;
use Carbon\Carbon;
use Cart;
use Session;
use Auth;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    //

    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();

        $products = Cache::remember('products', '1200', function () {
            return Product::where('status', 1)->get();
        });
        $newProducts = $products->sortByDesc('id')->take(10);
        $topProducts = $products->sortByDesc('sold')->take(10);
        $popularBodykits = $products->where('category_id', 3)->sortByDesc('sold')->take(10);

        return view('front.home.index', compact('categories', 'brands', 'newProducts', 'topProducts', 'popularBodykits'));
    }

    // public function home(){

    //     $orders =  Order::where('user_id',Auth::id())->latest()->get();
    //     return $orders;
    //     return view('front.client.home',compact('orders'));
    // }

    public function singleProduct($slug)
    {
        $product = Product::with('brand')->where('slug', $slug)->first();

        $reviewer = Invoice::where('user_id', Auth::id())->where('product_id', $product->id)->where('reviewed', 0)->where('status', 1)->latest()->first();

        $reviews = $product->reviews()->where('status', 1)->get();

        $products = Cache::get('products');

        $relatedProducts = $products->where('id', '!=', $product->id)->sortByDesc('sold')->take(6);

        return view('front.home.single-product', compact('product', 'reviewer', 'reviews', 'relatedProducts'));
        // return view('front.home.single-product', compact('product'));
    }

    public function categoryProducts($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = Product::where('category_id', $category->id)->where('status', 1)->latest('sold')->paginate(12);

        return view('front.home.category-products', compact('products'));
    }

    public function brandProducts($slug)
    {
        $brand = Brand::where('slug', $slug)->firstOrFail();

        $products = Product::where('brand_id', $brand->id)->where('status', 1)->latest('sold')->paginate(12);
        return view('front.home.brand-products', compact('products'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);

        if ($product->discount_price != null) {
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->qty,
                'price' => $product->discount_price,
                'weight' => 550,
                'options' =>
                ['image' => $product->image, 'slug' => $product->slug]
            ]);
        } else {
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'qty' => $request->qty,
                'price' => $product->regular_price,
                'weight' => 550,
                'options' =>
                ['image' => $product->image],
                ['slug' => $product->slug],
            ]);
        }

        //return Cart::count();
        return response()->json(['success' => 'Added to Cart']);
    }

    public function miniCart()
    {
        $cartItems = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::subtotal();

        return response()->json(array(
            'cartItems' => $cartItems,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,

        ));
    }

    public function cartAjax()
    {
        $cartItems = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::subtotal();

        return response()->json(array(
            'cartItems' => $cartItems,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,

        ));
    }

    public function cart()
    {
        $cartItems = Cart::content();
        //return $cartItems;
        return view('front.home.cart', compact('cartItems'));
    }

    public function updateCart(Request $request)
    {
        //return $request->all();
        Cart::update($request->id, $request->qty);
        return back();
    }

    public function cartIncrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        return response()->json('increment');
    }

    public function cartDecrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        return response()->json('decrement');
    }

    public function checkout()
    {
        $regions = Region::all();
        $cartItems = Cart::content();
        return view('front.home.checkout', compact('cartItems', 'regions'));
    }

    public function orderSubmit(Request $request)
    {
        if ($request->payment == "Card") {
            // code...
            $allData = $request->all();
            //dd ($allData);
            return view('front.client.stripe-payment', compact('allData'));
        }
        $order = new Order();
        $order->user_id = Auth::id();
        $order->amount = Cart::subtotal();
        $order->payment = $request->payment;
        $order->region_id = $request->region_id;
        $order->city_id = $request->city_id;
        $order->address = $request->address;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->status = 0;
        $order->save();

        $order = Order::latest()->first();

        $cartItems = Cart::content();
        foreach ($cartItems as $item) {
            $product = Product::where('name', $item->name)->first();
            $invoice = new Invoice();
            $invoice->order_id = $order->id;
            $invoice->product_id = $product->id;
            $invoice->user_id = Auth::id();
            $invoice->price = $item->price;
            $invoice->quantity = $item->qty;
            $invoice->subtotal = $item->price * $item->qty;
            $invoice->status = 0;
            $invoice->reviewed = 0;
            $invoice->save();

            $product->stock = $product->stock - $item->qty;

            $product->save();
        }
        Cart::destroy();
        //Session::put('message', 'Order competed successfully!');
        return redirect(route('/'))->with('message', 'Order submitted successfully!');
    }

    public function minicartItemRemove($id)
    {
        Cart::remove($id);
        return response()->json(['success' => 'Removed from Cart']);
    }

    public function cartItemRemove($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

    public function getCities(Request $request)
    {
        $region_id = $request->region_id;

        $cities = City::where('region_id', $region_id)->get();
        return response()->json([
            'cities' => $cities
        ]);
    }

    public function availableTimes(Request $request)
    {
        $booking1 = count(Booking::where('date', $request->date)->where('time', '10am - 2pm')->get());
        $booking2 = count(Booking::where('date', $request->date)->where('time', '2pm - 6pm')->get());

        // $available1 = "";
        // $available2 = "";
        // $available3 = "";

        if ($booking1 < 5 && $booking2 < 5) {
            return response()->json([
                'available1' => '10am - 2pm',
            ]);
        } elseif ($booking1 < 5 && $booking >= 5) {
            return response()->json([
                'available2' => '10am - 2pm',
            ]);
        } elseif ($booking1 >= 5 && $booking2 < 5) {
            return response()->json([
                'available3' => '2pm - 6pm',
            ]);
        }
    }

    //chat---------------------------------------------------
    public function chat()
    {
        // code...
        //$chats = Chat::all(); 
        Chat::where('created_at', '<', Carbon::now()->subMinutes(20))->delete();
        return view('front.home.chat');
    }

    public function sendChat(Request $request)
    {
        //return $request->all();
        $chats = Chat::all();

        $chat = new Chat();
        $chat->message = $request->message;
        $chat->user_id = Auth::id();
        $chat->save();

        $lastChat = Chat::latest()->first();

        $delimiter = ' ';
        $words = explode($delimiter, $lastChat->message);

        foreach ($words as $word) {
            $reply = BotQuestion::where('question', 'LIKE', '%' . $word . '%')->first();
            if ($reply) {
                // code...
                break;
            }
        }

        // $reply = BotQuestion::where('question','LIKE','%'.$lastChat->message.'%')->first();

        $trainBots = "";
        $answer = "";

        if ($reply) {
            // code...
            $trainBots = TrainBot::where('question_id', $reply->id)->first();
        }

        if (!$trainBots == "") {
            // code...
            $answer = BotAnswer::find($trainBots->answer_id);
        }

        // if (!$answer == "") {
        //     // code...
        //     $chat = new Chat();
        //     $chat->message = $answer->answer;
        //     $chat->user_id = Auth::id();
        //     $chat->reply = 1;
        //     $chat->save();
        // }
        return response()->json(array(
            'reply' => $answer,
        ));
    }

    public function reply(Request $request)
    {
        $chat = new Chat();

        if ($request->answer) {
            $chat->message = $request->answer;
            $chat->user_id = Auth::id();
            $chat->reply = 1;
            $chat->save();
        } else {
            $defaultAnswer = BotAnswer::where('defaultAnswer', 1)->first();
            $chat->message = $defaultAnswer->answer;
            $chat->user_id = Auth::id();
            $chat->reply = 1;
            $chat->save();
        }

        return response()->json("Reply");
    }

    public function chats()
    {
        //$chats = Chat::orderBy('id','desc')->take(4)->get();
        $chats = Chat::all()->where('user_id', Auth::id())->take(-10);
        return response()->json(array(
            'chats' => $chats,
        ));
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Brand;
use App\Product;
use App\Order;
use App\Invoice;
use App\Booking;
use App\Location;
use App\Payment;
use App\User;
use Cart;
use Auth;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    //

    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();

        // $products = Cache::remember('products', '1200', function () {
        //     return Product::where('status', 1)->get();
        // });
        $products = Product::where('status', 1)->get(['id','name','image','regular_price','discount_price','sold','availability','category_id','slug']);
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
        $addresses = Address::whereUserId(Auth::id())->get();
        $defaultShippingAddress = Address::whereUserId(Auth::id())->whereDefaultShippingAddress(1)->first();
        $defaultBillingAddress = Address::whereUserId(Auth::id())->whereDefaultBillingAddress(1)->first();
        // return $addresses;
        $locations = Location::with('children')->whereNull('parent_id')->get();
        $cartItems = Cart::content();
        return view('front.home.checkout', compact('cartItems','locations','addresses','defaultShippingAddress','defaultBillingAddress'));
    }

    public function orderSubmit(Request $request)
    {
        $user = User::with('addresses')->find(Auth::id());
        $defaultShippingAddress = Address::whereUserId($user->id)->where('default_shipping_address',1)->first();
        $defaultBillingAddress = Address::whereUserId($user->id)->where('default_billing_address',1)->first();

        if ($request->payment == "Card") {
            // code...
            $allData = $request->all();
            //dd ($allData);
            return view('front.client.stripe-payment', compact('allData'));
        }
        
        $payment = Payment::create([
            // 'order_id' => $order->id,
            'amount' => Cart::subtotal(),
            'payment_method' => $request->payment
        ]);

        $order = Order::create([
            'user_id' => $user->id,
            'shipping_address_id' => $defaultShippingAddress->id,
            'billing_address_id' => $defaultBillingAddress->id,
            'payment_id' => $payment->id,
            'status' => 0,
        ]);

        $cartItems = Cart::content();
        foreach ($cartItems as $item) {
            $product = Product::where('name', $item->name)->first();
          
            Invoice::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'user_id' => Auth::id(),
                'price' => $item->price,
                'quantity' => $item->qty,
                'subtotal' => $item->price * $item->qty,
                'status' => 0,
                'reviewed' => 0,
            ]);

            $product->update(['stock'=>$product->stock - $item->qty]);
        }
        Cart::destroy();
        
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

}

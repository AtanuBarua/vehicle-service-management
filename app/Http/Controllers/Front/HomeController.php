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
use App\Review;
use App\Services\OrderProcessingService;
use App\User;
use Cart;
use Auth;
use Illuminate\Support\Facades\Cache;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        // Cart::destroy();
        $categories = (new Category())->getAllActiveCategories();
        $brands = (new Brand())->getAllActiveBrands();
        $products = new Product();
        $newProducts = $products->newProducts(['status'=> Product::ACTIVE,'take'=>10]);
        $topProducts = $products->topProducts(['take'=>10]);
        $popularBodykits = $products->getProductsByCategoryId(3,'sold',10);
        return view('front.home.index', compact('categories', 'brands', 'newProducts', 'topProducts', 'popularBodykits'));
    }

    // public function home(){

    //     $orders =  Order::where('user_id',Auth::id())->latest()->get();
    //     return $orders;
    //     return view('front.client.home',compact('orders'));
    // }

    public function singleProduct($slug)
    {
        $products = new Product();
        $product = $products->getSingleProductBySlug($slug, 'brand');
        $reviewer = (new Invoice())->getReviewer(Auth::id(),$product->id);
        $reviews = (new Review())->getReviewsByProductId($product->id);
        $relatedProducts = $products->getRelatedProducts($product->id,'sold',10);

        return view('front.home.single-product', compact('product', 'reviewer', 'reviews', 'relatedProducts'));
    }

    public function categoryProducts($slug)
    {
        $category = (new Category())->findCategoryBySlug($slug);

        $search['category_id'] = $category->id;
        $search['paginate'] = true;
        $search['paginate_number'] = 12;
        $search['order_by'] = 'sold';
        $search['status'] = Product::ACTIVE;
        $products = (new Product())->getAllProducts($search);
        return view('front.home.category-products', compact('products'));
    }

    public function brandProducts($slug)
    {
        $brand = (new Brand())->findBrandBySlug($slug);

        $search['brand_id'] = $brand->id;
        $search['paginate'] = true;
        $search['paginate_number'] = 12;
        $search['order_by'] = 'sold';
        $search['status'] = Product::ACTIVE;

        $products = (new Product())->getAllProducts($search);
        return view('front.home.brand-products', compact('products'));
    }

    public function addToCart(Request $request)
    {
        $product = (new Product())->getSingleProductById($request->id);
        $arr = [
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'weight' => 550,
            'options' =>
            ['image' => $product->image, 'slug' => $product->slug]
        ];

        try {
            if ($product->discount_price != null) {
                $arr['price'] = $product->discount_price;
                Cart::add($arr);
            } else {
                $arr['price'] = $product->regular_price;
                Cart::add($arr);
            }
            return response()->json(['success' => 'Added to Cart'], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'An error occurred while adding to cart.'], 500);
        }
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
        return view('front.home.cart', compact('cartItems'));
    }

    public function updateCart(Request $request)
    {
        try {
            Cart::update($request->id, $request->qty);
            return back();
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with(['error'=>'Something went wrong!']);
        }

    }

    public function cartIncrement($rowId)
    {
        try {
            $row = Cart::get($rowId);
            Cart::update($rowId, $row->qty + 1);
            return response()->json(['success'=>'incremented'],200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['error'=>'Something went wrong!'],500);
        }

    }

    public function cartDecrement($rowId)
    {
        try {
            $row = Cart::get($rowId);
            Cart::update($rowId, $row->qty - 1);
            return response()->json(['success'=>'decremented'],200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['error'=>'Something went wrong!'],500);
        }

    }

    public function checkout()
    {
        $address = new Address();
        $addresses = $address->getAddressesOfAuthUser();
        $defaultShippingAddress = $address->getDefaultShippingAddress();
        $defaultBillingAddress = $address->getDefaultBillingAddress();
        $locations = Location::with('children')->whereNull('parent_id')->get();
        $cartItems = Cart::content();
        return view('front.home.checkout', compact('cartItems','locations','addresses','defaultShippingAddress','defaultBillingAddress'));
    }

    public function orderSubmit(Request $request)
    {
        try {
            $address = new Address();
            $user = (new User())->getAuthUser('addresses');
            $defaultShippingAddress = $address->getDefaultShippingAddress();
            $defaultBillingAddress = $address->getDefaultBillingAddress();
            $request['shipping_address_id'] = $defaultShippingAddress->id;
            $request['billing_address_id'] = $defaultBillingAddress->id;

            if ($request->payment == Payment::TYPE_CARD) {
                $allData = $request->all();
                $allData['shipping_address_id'] = $defaultShippingAddress->id;
                $allData['billing_address_id'] = $defaultBillingAddress->id;
                Session::put('allData',$allData);
                return redirect()->route('card-payment');
            }

            $order_processing_service = new OrderProcessingService();

            list($code, $message) = $order_processing_service->processOrder($request,$user);

            if ($code == 200) {
                return redirect('/')->with('message', $message);
            } else{
                return redirect('/')->with('error', $message);
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect(route('/'))->with('error', 'Something went wrong! Please try again.');
        }
    }

    public function minicartItemRemove($id)
    {
        try {
            Cart::remove($id);
            return response()->json(['success' => 'Removed from Cart'], 200);
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th->getMessage());
            return response()->json(['error' => 'An error occured while removing item from cart'], 500);
        }
    }

    public function cartItemRemove($id)
    {
        try {
            Cart::remove($id);
            return redirect()->back();
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->with('error', 'An error occurred while removing from the cart.',500);
        }
    }

    public function availableTimes(Request $request)
    {
        $booking1 = count(Booking::where('date', $request->date)->where('time', '10am - 2pm')->get());
        $booking2 = count(Booking::where('date', $request->date)->where('time', '2pm - 6pm')->get());

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

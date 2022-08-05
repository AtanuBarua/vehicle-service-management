<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Stripe;
use App\Order;
use App\Invoice;
use App\Product;
use Auth;
use Cart;

class StripePaymentController extends Controller
{
    //

    public function stripe()
    {
        return view('front.client.stripe-payment');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $amount = floatval(preg_replace("/[^-0-9\.]/","",Cart::subtotal())) ;
        //return Cart::subtotal();
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * $amount,
                "currency" => "bdt",
                "source" => $request->stripeToken,
                "description" => "Uren - Car Accessories Shop" 
        ]);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->amount = Cart::subtotal();
        $order->payment = "Card";
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
        foreach($cartItems as $item){
            $product = Product::where('name',$item->name)->first();
            $invoice = new Invoice();
            $invoice->order_id = $order->id;
            $invoice->product_id = $product->id;
            $invoice->user_id = Auth::id();
            $invoice->price = $item->price;
            $invoice->quantity = $item->qty;
            $invoice->subtotal = $item->price*$item->qty;
            $invoice->status = 0;
            $invoice->reviewed = 0;
            $invoice->save();

            $product->stock = $product->stock - $item->qty;
            $product->save();
        }
        Cart::destroy();
  
        //Session::put();
          
        return redirect()->route('/')->with('message', 'Order submitted successfully!');
    }
}

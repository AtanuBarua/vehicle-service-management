<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe;
use App\Order;
use App\Invoice;
use App\Product;
use App\Services\OrderProcessingService;
use Auth;
use Cart;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class StripePaymentController extends Controller
{
    //

    public function stripe(Request $request)
    {
        $allData = Session::get('allData');
        return view('front.client.stripe-payment', compact('allData'));
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        try {
            Session::forget('allData');
            $amount = floatval(preg_replace("/[^-0-9\.]/","",Cart::subtotal())) ;
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create ([
                    "amount" => 100 * $amount,
                    "currency" => "bdt",
                    "source" => $request->stripeToken,
                    "description" => "Uren - Car Accessories Shop"
            ]);

            $order_service = new OrderProcessingService();
            list($code, $message) = $order_service->processOrder($request, Auth::user());
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
}

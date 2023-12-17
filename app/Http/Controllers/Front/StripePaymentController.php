<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe;
use App\Services\OrderProcessingService;
use Auth;
use Cart;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;

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
            $amount = floatval(preg_replace("/[^-0-9\.]/", "", Cart::subtotal()));
            Stripe\Stripe::setApiKey(config('constants.STRIPE_SECRET'));
            $status = Stripe\Charge::create([
                "amount" => 100 * $amount,
                "currency" => "bdt",
                "source" => $request->stripeToken,
                "description" => "Uren - Car Accessories Shop"
            ]);

            $type = 'error';
            $message = "Payment processing failed";

            if ($status->status == Charge::STATUS_SUCCEEDED) {
                Session::forget('allData');
                $order_service = new OrderProcessingService();
                list($status_code, $status_message) = $order_service->processOrder($request, Auth::user());
                $message = $status_message;
                if ($status_code == 200) {
                    $type = 'message';
                }
            }

            return redirect('/')->with($type, $message);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect(route('/'))->with('error', 'Something went wrong! Please try again.');
        }
    }
}

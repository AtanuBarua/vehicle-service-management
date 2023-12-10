<?php

namespace App\Services;

use Cart;
use App\Product;
use App\Invoice;
use App\Order;
use App\Payment;
use Auth;
use DB;
use Illuminate\Support\Facades\Log;

class OrderProcessingService
{
    protected $status_code;
    protected $status_message;

    public function processOrder($request, $user)
    {
        try {
            DB::beginTransaction();
            $payment = $this->storePayments($request);
            $order = $this->storeOrders($user->id, $request['shipping_address_id'], $request['billing_address_id'], $payment->id);
            $this->storeInvoice($order->id);
            $this->status_code = 200;
            $this->status_message = "Order submitted successfully!";
            DB::commit();
            return [$this->status_code, $this->status_message];
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Log::error($th->getMessage());
            $this->status_code = 500;
            $this->status_message = "Something went wrong!!";
            return [$this->status_code, $this->status_message];
        }
    }

    private function storePayments($request)
    {
        $paymentData['amount'] = Cart::subtotal();
        $paymentData['payment_method'] = $request['payment'];
        return (new Payment())->createPayment($paymentData);
    }

    private function storeOrders($user_id, $shipping_address_id, $billing_address_id, $payment_id)
    {
        $orderData['user_id'] = $user_id;
        $orderData['shipping_address_id'] = $shipping_address_id;
        $orderData['billing_address_id'] = $billing_address_id;
        $orderData['payment_id'] = $payment_id;
        $orderData['status'] = Order::ORDER_PENDING;
        return (new Order())->createOrder($orderData);
    }


    private function storeInvoice($order_id)
    {
        $cartItems = Cart::content();
        foreach ($cartItems as $item) {
            $product = (new Product())->getSingleProductByName($item->name);
            $data = [
                'order_id' => $order_id,
                'product_id' => $product->id,
                'user_id' => Auth::id(),
                'price' => $item->price,
                'quantity' => $item->qty,
                'subtotal' => $item->price * $item->qty,
                'status' => 0,
                'reviewed' => 0,
            ];

            $result = (new Invoice())->createInvoice($data);
            $productUpdateData = [
                'stock' => $product->stock - $item->qty
            ];
            $product->updateProduct($productUpdateData, $product->id);
        }
        Cart::destroy();
    }
}

<?php

namespace App\Mail;

use App\Order;
use App\Services\AddressService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $order, $orderItems;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, $orderItems)
    {
        $this->order = $order;
        $this->orderItems = $orderItems;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $shippingAddress = (new AddressService())->getEncodedAddress($this->order->shipping_address_id);
        $billingAddress = (new AddressService())->getEncodedAddress($this->order->billing_address_id);
        $shippingAddress = (new AddressService())->decodeAddress($shippingAddress);
        $billingAddress = (new AddressService())->decodeAddress($billingAddress);

        return $this->view('mail.invoice')
            ->with([
                'order' => $this->order,
                'orderItems' => $this->orderItems,
                'shippingAddress' => $shippingAddress,
                'billingAddress' => $billingAddress
            ]);
    }
}

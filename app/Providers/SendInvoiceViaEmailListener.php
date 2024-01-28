<?php

namespace App\Providers;

use App\Mail\InvoiceMail;
use App\Providers\OrderEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use DB;

class SendInvoiceViaEmailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\OrderEvent  $event
     * @return void
     */
    public function handle(OrderEvent $event)
    {
        $orderItems = DB::table('invoices')
            ->join('products', 'invoices.product_id', '=', 'products.id')
            ->where('invoices.order_id', $event->order->id)
            ->select('invoices.*', 'products.name', 'products.image')
            ->get();

        Mail::to($event->order->user->email)->queue(new InvoiceMail($event->order, $orderItems));
    }
}

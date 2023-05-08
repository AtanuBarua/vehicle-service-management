<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\Order;
use DB;

class OrderController extends Controller
{
    public function manageOrders(){
        $this->authorize('viewAny', Order::class);

        $orders = Order::latest()->get();
        return view('dashboard.orders.manage-orders',compact('orders'));
    }
    
    public function processOrder(Order $order){
        $this->authorize('update', $order);

        $order->update(['status'=>1]);
        return redirect()->back()->with('message','Order processing started successfully');
    }
    
    public function shippedOrder(Order $order){
        $this->authorize('update', $order);

        $order->update(['status'=>2]);
        return redirect()->back()->with('message','Order shipped successfully');
    }
    
    public function deliveredOrder(Order $order){
        $this->authorize('update', $order);

        $order->update(['status'=>3]);
        
        $invoices = Invoice::where('order_id',$order->id)->get();
        foreach($invoices as $invoice){
            $invoice->status = 1;
            $invoice->save();
        }
        return redirect()->back()->with('message','Order delivered successfully');
    }
    
    public function cancelOrder(Order $order){
        $this->authorize('update', $order);

        $order->update(['status'=>4]);
        return redirect()->back()->with('message','Order cancelled successfully');
    }
    
    public function manageOrderDetails($id){
        
        //$invoices = Invoice::where('order_id',$id)->get();
        $invoices = DB::table('invoices')
        ->join('products','invoices.product_id','=','products.id')
        ->where('invoices.order_id',$id)
        ->select('invoices.*','products.name','products.slug')
        ->get();
        return view('dashboard.orders.manage-invoice',compact('invoices'));
    }
}

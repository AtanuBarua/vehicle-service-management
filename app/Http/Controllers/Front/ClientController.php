<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Invoice;
use App\Region;
use App\Service;
use App\Booking;
use App\Review;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use DB;
use PDF;

class ClientController extends Controller
{
    //
    public function home(){

        $orders =  Order::where('user_id',Auth::id())->latest()->get();
        return view('front.client.home',compact('orders'));
    }

    public function changePassword(){
        return view('front.client.change-password');
    }

    public function updatePassword(Request $request){
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords not matches
            //return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
            return redirect()->back()->with('message','Current password is not correct');
        }
        //uncomment this if you need to validate that the new password is same as old one

        if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            //return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            return redirect()->back()->with('message','New password cannot be same as your current password');
        }

        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->save();
        Auth::logout();
        return redirect(route('login'));
    }

    public function updateProfile(Request $request){
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('message','Profile updated successfully');
    }

    public function orderDetails($id){
        //$items = Invoice::where('order_id',$id)->get();
        $items = DB::table('invoices')
                    ->join('products','products.id','=','invoices.product_id')
                    ->where('invoices.order_id',$id)
                    ->select('invoices.*','products.name','products.image','products.slug')
                    ->get();
        $reviewers = Invoice::where('user_id',Auth::id())->where('order_id',$id)->where('reviewed',0)->where('status',1)->latest()->get();
                    
        return view('front.client.order-details',compact('items','reviewers'));
    }

    public function bookService(){

        $date = Carbon::now()->toDateString();
        //return $date;
        $services = Service::where('status',1)->get();
        $regions = Region::all();
        return view('front.client.book-service',compact('services','regions','date'));
    }

    public function bookingSubmit(Request $request){
        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->service_id = $request->service_id;
        $booking->region_id = $request->region_id;
        $booking->city_id = $request->city_id;
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->status = 0;
        $booking->save();
        return redirect()->route('/')->with('message','Booking submitted successfully!');
    }

    public function bookingHistory(){
        //$bookings = Booking::where('user_id',Auth::id())->get();
        $bookings = DB::table('bookings')
                    ->join('services','services.id','=','bookings.service_id')
                    ->join('regions','regions.id','=','bookings.region_id')
                    ->join('cities','cities.id','=','bookings.city_id')
                    ->where('bookings.user_id',Auth::id())
                    ->select('bookings.*','services.name as service_name','regions.name as region_name','cities.name as city_name')
                    ->orderBy('bookings.id','desc')
                    ->get();
        return view('front.client.booking-history',compact('bookings'));
    }

    public function submitReview(Request $request){
        $review = new Review();
        $review->user_id = Auth::id();
        $review->product_id = $request->product_id;
        $review->review = $request->review;
        $review->star = $request->star;
        $review->status = 1;
        $review->save();
        $invoice = Invoice::where('product_id',$request->product_id)
                        ->where('user_id',Auth::id())
                        ->latest()
                        ->first();
        $invoice->reviewed = 1;
        $invoice->save();
        return redirect()->back();

    }

    public function downloadInvoice($id){
        // $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $order = DB::table('orders')
                    ->join('regions','orders.region_id','=','regions.id')
                    ->join('cities','orders.city_id','=','cities.id')
                    ->where('orders.id',$id)
                    ->select('orders.*','regions.name as region_name','cities.name as city_name')
                    ->first();

        $orderItems = DB::table('invoices')
                    ->join('products','invoices.product_id','=','products.id')
                    ->where('invoices.order_id',$id)
                    ->select('invoices.*','products.name','products.image')
                    ->get();

                    //dd ($orderItems);
                                
        //$orderItems = Invoice::where('order_id',$id)->orderBy('id','DESC')->get();
        //return view('admin.orders.order-invoice',compact('order','orderItems'));

        // return view('frontend.user.order.order_invoice',compact('order','orderItem'));
        $pdf = PDF::loadView('admin.orders.order-invoice',compact('order','orderItems'))->setPaper('a4');
        return $pdf->download('invoice.pdf');
        //return view('admin.orders.order-invoice',compact('order','orderItems'));
    }


}

<?php

namespace App\Http\Controllers\Front;

use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Invoice;
use App\Region;
use App\Service;
use App\Booking;
use App\Location;
use App\Review;
use App\Services\AddressService;
use App\Services\OrderProcessingService;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Log;
use PDF;

class ClientController extends Controller
{
    //
    public function home()
    {
        $addresses = Address::whereUserId(Auth::id())->get();
        $locations = Location::with('children')->whereNull('parent_id')->get();
        $orders = (new Order())->getClientOrders();
        return view('front.client.home', compact('orders', 'locations', 'addresses'));
    }

    public function changePassword()
    {
        return view('front.client.change-password');
    }

    public function updatePassword(Request $request)
    {
        try {
            if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
                // The passwords not matches
                return redirect()->back()->with('message', 'Current password is not correct');
            }

            if (strcmp($request->get('old_password'), $request->get('new_password')) == 0) {
                //Current password and new password are same
                return redirect()->back()->with('message', 'New password cannot be same as your current password');
            }

            $validatedData = $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|string|min:6|confirmed',
            ]);

            $user = Auth::user();
            (new User())->changePassword($user, $request->get('new_password'));
            Auth::logout();
        } catch (\Throwable $th) {
            Log::error('UPDATE_PASSWORD_LOG', ['exception' => $th->getMessage()]);
        }

        return redirect(route('login'));
    }

    public function updateProfile(Request $request)
    {
        try {
            $user = Auth::user();
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            (new User())->updateProfile($data, $user->id);
            return redirect()->back()->with('message', 'Profile updated successfully');
        } catch (\Throwable $th) {
            Log::error('UPDATE_PROFILE_LOG', ['exception' => $th->getMessage()]);
            return redirect()->back()->with('danger', 'Something went wrong');
        }
    }

    public function orderDetails($id)
    {
        //$items = Invoice::where('order_id',$id)->get();
        $items = DB::table('invoices')
            ->join('products', 'products.id', '=', 'invoices.product_id')
            ->where('invoices.order_id', $id)
            ->select('invoices.*', 'products.name', 'products.image', 'products.slug')
            ->get();
        $reviewers = Invoice::where('user_id', Auth::id())->where('order_id', $id)->where('reviewed', 0)->where('status', 1)->latest()->get();

        return view('front.client.order-details', compact('items', 'reviewers'));
    }

    public function bookService()
    {

        $date = Carbon::now()->toDateString();
        $services = Service::where('status', 1)->get();
        $locations = Location::with('children')->whereNull('parent_id')->get();
        return view('front.client.book-service', compact('services', 'locations', 'date'));
    }

    public function bookingSubmit(Request $request)
    {
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
        return redirect()->route('/')->with('message', 'Booking submitted successfully!');
    }

    public function bookingHistory()
    {
        //$bookings = Booking::where('user_id',Auth::id())->get();
        $bookings = DB::table('bookings')
            ->join('services', 'services.id', '=', 'bookings.service_id')
            ->join('regions', 'regions.id', '=', 'bookings.region_id')
            ->join('cities', 'cities.id', '=', 'bookings.city_id')
            ->where('bookings.user_id', Auth::id())
            ->select('bookings.*', 'services.name as service_name', 'regions.name as region_name', 'cities.name as city_name')
            ->orderBy('bookings.id', 'desc')
            ->get();
        return view('front.client.booking-history', compact('bookings'));
    }

    public function submitReview(Request $request)
    {
        $review = new Review();
        $review->user_id = Auth::id();
        $review->product_id = $request->product_id;
        $review->review = $request->review;
        $review->star = $request->star;
        $review->status = 1;
        $review->save();
        $invoice = Invoice::where('product_id', $request->product_id)
            ->where('user_id', Auth::id())
            ->latest()
            ->first();
        $invoice->reviewed = 1;
        $invoice->save();
        return redirect()->back();
    }

    public function downloadInvoice($id)
    {
        $data['order'] = Order::with('payment', 'user')->find($id);

        $data['orderItems'] = DB::table('invoices')
            ->join('products', 'invoices.product_id', '=', 'products.id')
            ->where('invoices.order_id', $id)
            ->select('invoices.*', 'products.name', 'products.image')
            ->get();

        $data['shippingAddress'] = (new AddressService())->decodeAddress($data['order']->shipping_address);
        $data['billingAddress'] = (new AddressService())->decodeAddress($data['order']->billing_address);

        // return view('dashboard.orders.order-invoice',$data);
        $pdf = PDF::loadView('dashboard.orders.order-invoice', $data)->setPaper('a4');

        return $pdf->download('invoice.pdf');
    }

    public function getLocations($id)
    {
        $locations = Location::whereParentId($id)->get();
        return response()->json(['locations' => $locations]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Technician;
use iqbalhasandev\bulksmsbd\Classes\BulkSMSBD;
use DB;

class BookingController extends Controller
{
    public function manageBooking(){
        $bookings = Booking::with(['service','region','city','technician'])->latest()->get();

        // $bookings = DB::table('bookings')
        // ->join('services','services.id','=','bookings.service_id')
        // ->join('regions','regions.id','=','bookings.region_id')
        // ->join('cities','cities.id','=','bookings.city_id')
        // ->leftJoin('technicians','technicians.id','=','bookings.technician_id')
        // ->select('bookings.*','services.name as service_name','regions.name as region_name','cities.name as city_name','technicians.name as technician_name')
        // ->orderBy('bookings.id','desc')
        // ->get();
        return view('dashboard.bookings.manage-booking',compact('bookings'));
    }
    
    public function confirmBooking(Booking $booking){
                
        $technician = Technician::where('availability',1)->where('region_id',$booking->region_id)->where('city_id',$booking->city_id)->orderBy('queue')->first();
        
        if(!$technician){
            return redirect()->back()->with('alert','No technicians available');
        }
        
        $booking->status = Booking::PENDING;
        $booking->technician_id = $technician->id;

        // $number=$technician->phone;
        $number='01515682746';
        $message='You got a new servicing order. Please login into your account to accept the task';
        BulkSMSBD::send($number,$message);
        $booking->technician_informed = "1";

        $booking->save();
        //$technician->availability = 0;
        $technician->increment('queue');
        $technician->save();
        
        if($technician->queue >= $technician->slot){
            $technician->availability = 0;
            $technician->save();
        }
        
        return redirect()->back()->with('message','Booking confirmed successfully');
    }
    
    public function cancelBooking(Booking $booking){
        $booking->status=Booking::CANCELLED;
        $booking->save();
        return redirect()->back()->with('message','Booking cancelled successfully');
    }
    
    public function processAgain(Booking $booking){
        $booking->status=Booking::PROCESSING;
        $booking->save();
        return redirect()->back()->with('message','Processing again started successfully');
    }
    
    public function deliveredBooking(Booking $booking){
        $booking->status=Booking::DELIVERED;
        $booking->save();
        $technician = Technician::find($booking->technician_id);
        //$technician->availability = 1;
        $technician->decrement('queue');
        $technician->save();
        
        if($technician->queue < $technician->slot){
            $technician->availability = 1;
            $technician->save();
        }
        return redirect()->back()->with('message','Booking done successfully');
    }
}

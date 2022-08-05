<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use Illuminate\Support\Facades\Auth;
use DB;

class TechnicianController extends Controller
{
    //
    public function index(){
        return view('technician.home');
    }


    public function jobs(){
        $jobs = DB::table('bookings')
                    ->join('services','services.id','=','bookings.service_id')
                    ->join('regions','regions.id','=','bookings.region_id')
                    ->join('cities','cities.id','=','bookings.city_id')
                    ->where('bookings.technician_id',Auth::guard('technician')->id())
                    ->where('bookings.status','!=',0)
                    ->select('bookings.*','services.name as service_name','regions.name as region_name','cities.name as city_name')
                    ->orderBy('bookings.id','desc')
                    ->get();
        //$jobs = Booking::where('technician_id',Auth::guard('technician')->id())->get();
        return view('technician.jobs', compact('jobs'));
    }

    public function processBooking($id){
        $booking = Booking::find($id);
        $booking->status=2;
        $booking->save();
        return redirect()->back()->with('message','Booking process started successfully');
    }

    public function doneBooking($id){
        $booking = Booking::find($id);
        $booking->status=3;
        $booking->save();
        return redirect()->back()->with('message','Booking done successfully');
    }
}

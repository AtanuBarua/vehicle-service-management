<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Booking;
use DateTime;
use iqbalhasandev\bulksmsbd\Classes\BulkSMSBD;

class SendReminderSMS extends Command
{
    /**
    * The name and signature of the console command.
    *
    * @var string
    */
    protected $signature = 'sms:reminder';
    
    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'Send sms to users as booking reminder';
    
    /**
    * Create a new command instance.
    *
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
    * Execute the console command.
    *
    * @return mixed
    */
    public function handle()
    {
        //
        $currentDate = date('Y-m-d');
        
        $bookings = Booking::all();
        foreach($bookings as $booking){
            
            $bookingDate = $booking->date;
            $date = date('Y-m-d', strtotime($bookingDate.'-1 days'));
            if($currentDate == $date && $booking->is_reminded == 0){
                $number=$booking->phone;
                $message='Your vehicle servicing appointment is tomorrow. Dropoff time '.$booking->time.'. Thank you.';
                BulkSMSBD::send($number,$message);
                $booking->is_reminded = "1";
                $booking->save();
            } 
        }
        
        // $number='01515682746';
        // $message='this is demo.';
        // BulkSMSBD::send($number,$message);
        // $booking = new Booking();
        // $booking->date = date('Y-m-d');
        // $booking->save();
        $this->info('Sms send successfully');
    }
}

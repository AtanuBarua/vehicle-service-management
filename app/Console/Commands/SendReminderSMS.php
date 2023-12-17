<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Booking;
use DateTime;

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

    private $url = "http://66.45.237.70/api.php";
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
        try {
            $currentDate = date('Y-m-d');
            Booking::where('is_reminded', Booking::IS_REMINDED_FALSE)->chunk(100, function ($bookings) use ($currentDate) {
                foreach ($bookings as $key => $booking) {
                    $bookingDate = $booking->date;
                    $date = date('Y-m-d', strtotime($bookingDate . '-1 days'));
                    if ($currentDate == $date && $booking->is_reminded == Booking::IS_REMINDED_FALSE) {
                        $message = 'Your vehicle servicing appointment is tomorrow. Dropoff time ' . $booking->time . '. Thank you.';
                        $status = $this->sendSms($booking->phone, $message);
                        if ($status) {
                            $data['is_reminded'] = Booking::IS_REMINDED_TRUE;
                            (new Booking())->saveBooking($data, $booking->id);
                        }
                    }
                }
            });

            $this->info('Sms send successfully');
        } catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage());
        }
    }

    private function sendSms($number, $text)
    {
        $data = array(
            'username' => config('constants.BULK_SMSBD_USERNAME'),
            'password' => config('constants.BULK_SMSBD_PASSWORD'),
            'number' => "$number",
            'message' => "$text"
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $response = explode("|", $smsresult);
        $response_code = intval($response[0]);

        switch ($response_code) {
            case  1000:
                throw new \Exception('Invalid user or Password', 1000);
                break;
            case  1002:
                throw new \Exception('Empty Number', 1002);
                break;
            case  1003:
                throw new \Exception('Invalid message or empty message', 1003);
                break;
            case  1004:
                throw new \Exception('Number should be 13 Digit', 1004);
                break;
            case  1005:
                throw new \Exception('Invalid number', 1005);
                break;
            case  1006:
                throw new \Exception('insufficient Balance', 1006);
                break;
            case  1009:
                throw new \Exception('Inactive Account', 1009);
                break;
            case  1010:
                throw new \Exception('Max number limit exceeded', 1010);
                break;
            case  1101:
                return true;
                break;
        }
        throw  new \Exception('Unknown', -1);
    }
}

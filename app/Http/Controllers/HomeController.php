<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use App\Order;
use App\Invoice;
use App\Service;
use App\Region;
use App\City;
use App\Booking;
use App\Technician;
use App\BotQuestion;
use App\BotAnswer;
use App\TrainBot;
use App\User;
use DB;
use Image;
use PDF;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function addRegion()
    {
        return view('admin.region.add-region');
    }

    public function newRegion(Request $request)
    {
        $service = new Region();
        $service->name     = $request->name;
        $service->save();
        return back()->with('message', 'Region created successfully!!');
    }


    public function manageRegion()
    {
        return view('admin.region.manage-region', [
            'regions' => Region::all()
        ]);
    }

    public function addCity()
    {
        $regions = Region::all();
        return view('admin.city.add-city', compact('regions'));
    }

    public function newCity(Request $request)
    {
        $service = new City();
        $service->region_id     = $request->region_id;
        $service->name     = $request->name;
        $service->save();
        return back()->with('message', 'City created successfully!!');
    }


    public function manageCities()
    {
        $cities = DB::table('cities')
            ->join('regions', 'regions.id', 'cities.region_id')
            ->select('regions.name as region_name', 'cities.*')
            ->get();
        return view('admin.city.manage-city', compact('cities'));
    }

    public function downloadInvoice($id)
    {
        // $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $order = DB::table('orders')
            ->join('regions', 'orders.region_id', '=', 'regions.id')
            ->join('cities', 'orders.city_id', '=', 'cities.id')
            ->where('orders.id', $id)
            ->select('orders.*', 'regions.name as region_name', 'cities.name as city_name')
            ->first();

        $orderItems = DB::table('invoices')
            ->join('products', 'invoices.product_id', '=', 'products.id')
            ->where('invoices.order_id', $id)
            ->select('invoices.*', 'products.name', 'products.image')
            ->get();

        //dd ($orderItems);

        //$orderItems = Invoice::where('order_id',$id)->orderBy('id','DESC')->get();
        //return view('admin.orders.order-invoice',compact('order','orderItems'));

        // return view('frontend.user.order.order_invoice',compact('order','orderItem'));
        $pdf = PDF::loadView('admin.orders.order-invoice', compact('order', 'orderItems'))->setPaper('a4');
        return $pdf->download('invoice.pdf');
        //return view('admin.orders.order-invoice');
    }

    public function downloadBookingInvoice(Request $request)
    {
        // $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $date = $request->date;
        $bookings = DB::table('bookings')
            ->join('regions', 'bookings.region_id', '=', 'regions.id')
            ->join('cities', 'bookings.city_id', '=', 'cities.id')
            ->join('services', 'bookings.service_id', '=', 'services.id')
            ->leftJoin('technicians', 'bookings.technician_id', '=', 'technicians.id')
            ->where('bookings.date', $request->date)
            ->select('bookings.*', 'regions.name as region_name', 'cities.name as city_name', 'technicians.name as technician_name', 'services.name as service_name')
            ->get();

        //dd ($orderItems);

        //$orderItems = Invoice::where('order_id',$id)->orderBy('id','DESC')->get();
        //return view('admin.orders.order-invoice',compact('order','orderItems'));

        // return view('frontend.user.order.order_invoice',compact('order','orderItem'));
        //$pdf = PDF::loadView('job-card',compact('bookings','date'));
        //return PDF::loadFile(public_path().'/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');
        //return view('admin.bookings.booking-invoice',compact('bookings'));
        //return view('job-card',compact('bookings','date'));

        if (!$bookings->isEmpty()) {

            $pdf = PDF::loadView('admin.bookings.booking-invoice', compact('bookings', 'date'));

            return $pdf->download('booking.pdf');
        } else {
            return redirect()->back()->with('alert', 'No records found');
        }
    }

    //manage chatbot-----------------------------------------

    public function answers()
    {
        $answers = BotAnswer::all();
        return view('admin.chatbot.manage-answers', compact('answers'));
    }

    public function questions($id)
    {
        //$questions = BotQuestion::where('answer_id',$id)->get();
        $answer = BotAnswer::find($id);
        $questions = DB::table('bot_questions')
            ->join('train_bots', 'bot_questions.id', 'train_bots.question_id')
            ->join('bot_answers', 'bot_answers.id', 'train_bots.answer_id')
            ->where('train_bots.answer_id', $id)
            ->get();

        return view('admin.chatbot.manage-questions', compact('questions', 'answer'));
    }

    //public function newQuestion

    public function chatbot()
    {
        //$botAnswer = TrainBot::where('')
        $defaultAnswer = BotAnswer::where('defaultAnswer', 1)->first();
        return view('admin.chatbot.manage-chatbot', compact('defaultAnswer'));
    }

    public function submitChat(Request $request)
    {
        //return count($request->question);

        if ($request->answer) {
            $botAnswer = new BotAnswer();
            $botAnswer->answer = $request->answer;
            $botAnswer->save();

            $answer = BotAnswer::latest()->first();
        } else {
            $answer = BotAnswer::find($request->answer_id);
        }

        $length = count($request->question);

        for ($i = 0; $i < $length; $i++) {
            $answer = BotAnswer::latest()->first();
            $botQuestion = new BotQuestion();
            $botQuestion->answer_id = $answer->id;
            $botQuestion->question = $request->question[$i];
            $botQuestion->save();

            $question = BotQuestion::orderBy('id', 'desc')->first();

            $trainBot = new TrainBot();
            $trainBot->question_id = $question->id;
            $trainBot->answer_id = $answer->id;
            $trainBot->save();
        }

        return redirect()->back();
    }

    public function defaultAnswer(Request $request)
    {
        $defaultQuestion = BotQuestion::where('defaultAnswer', 1)->first();
        //return gettype($answer);
        if (is_null($defaultQuestion)) {
            $answer = new BotAnswer();
            $answer->answer = $request->answer;
            $answer->defaultAnswer = 1;
            $answer->save();

            $question = new BotQuestion();
            $question->question = "Unknown";
            $question->defaultAnswer = 1;

            $answer = BotAnswer::latest()->first();
            $question->answer_id = $answer->id;
            $question->save();

            $question = BotQuestion::where('defaultAnswer', 1)->first();

            $newAnswer = BotAnswer::orderBy('id', 'desc')->first();
            //return $answer;

            $trainBot = new TrainBot();
            $trainBot->question_id = $question->id;
            $trainBot->answer_id = $newAnswer->id;
            $trainBot->save();
        } else {
            $botAnswer = BotAnswer::find($defaultQuestion->answer_id);
            $botAnswer->answer = $request->answer;
            $botAnswer->save();
        }
        return redirect()->back();
    }

    public function deleteQuestion(Request $request)
    {
        $question = BotQuestion::find($request->id);
        $question->delete();

        return redirect()->back()->with('message', 'Question deleted successfully');
    }

    public function deleteAnswer(Request $request)
    {
        $answer = BotAnswer::find($request->id);
        $answer->delete();

        return redirect()->back()->with('message', 'Answer deleted successfully');
    }
}

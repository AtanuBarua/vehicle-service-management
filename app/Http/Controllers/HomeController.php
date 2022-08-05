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
use DB;
use Image;
use PDF;
use Illuminate\Support\Str;
use iqbalhasandev\bulksmsbd\Classes\BulkSMSBD;


class HomeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {
        return view('home');
    }
    
    public function addCategory(){
        return view('admin.categories.add-category');
    }
    
    public function newCategory(Request $request){
        $category = new Category();
        $categoryImage = $request->file('image');
        
        $rand1 = rand(1000,9999);
        $rand2 = rand(1000,9999);
        
        $fileType  = $categoryImage->getClientOriginalExtension();
        $imageName = $rand1.$rand2 . '.' . $fileType;
        $directory = 'category-images/';
        $img       = Image::make($categoryImage)->resize(600, 600)->save($directory . $imageName);
        $category->name     = $request->name;
        $category->slug        = Str::slug($request->name);
        $category->image     = $directory.$imageName;
        $category->status   = $request->status;
        $category->save();
        return back()->with('message','Category created successfully!!');
    }
    
    
    public function manageCategory(){
        
        return view('admin.categories.manage-category',[
            'categories' => Category::all()
        ]);
        
    }
    
    public function editCategory($id){
        
        return view('admin.categories.edit-category',[
            'category' => Category::find($id)
        ]);
    }
    
    public function updateCategory(Request $request){
        
        //return $request->all();
        
        $categoryImage = $request->file('category_image');
        
        //return $categoryImage;
        
        if ($categoryImage) {
            
            $category = Category::find($request->id);
            //unlink($category->image);
            $rand1 = rand(1000,9999);
            $rand2 = rand(1000,9999);
            
            $fileType  = $categoryImage->getClientOriginalExtension();
            $imageName = $rand1.$rand2 . '.' . $fileType;
            $directory = 'category-images/';
            $img       = Image::make($categoryImage)->resize(600, 600)->save($directory . $imageName);
            
            $category->name        = $request->name;
            $category->slug        = Str::slug($request->name);
            $category->status   = $request->status;
            $category->image   = $directory.$imageName;
            $category->save();
            
        }
        
        else{
            $category = Category::find($request->id); 
            $category->name        = $request->name;
            $category->slug        = Str::slug($request->name);
            $category->status   = $request->status;
            $category->save();
        }
        
        
        return redirect('/manage-category/')->with('message','Category updated successfully!!');
        
    }
    
    public function deleteCategory(Request $request){
        
        
        
        $category = Category::find($request->id);
        $category->delete();
        return redirect('/manage-category/')->with('message','Category deleted successfully!!');
        
    }
    
    
    public function addBrand(){
        return view('admin.brands.add-brand');
    }
    
    public function newBrand(Request $request){
        $brand = new Brand();
        $brandImage = $request->file('image');
        
        $rand1 = rand(1000,9999);
        $rand2 = rand(1000,9999);
        
        $fileType  = $brandImage->getClientOriginalExtension();
        $imageName = $rand1.$rand2 . '.' . $fileType;
        $directory = 'brand-images/'; 
        $img       = Image::make($brandImage)->resize(174, 106)->save($directory . $imageName);
        $brand->name     = $request->name;
        $brand->slug     = Str::slug($request->name);
        $brand->image     = $directory.$imageName;
        $brand->status   = $request->status;
        $brand->save();
        return back()->with('message','Brand created successfully!!');
    }
    
    
    public function manageBrand(){
        
        return view('admin.brands.manage-brand',[
            'brands' => Brand::all()
        ]);
        
    }
    
    public function editBrand($id){
        
        return view('admin.brands.edit-brand',[
            'brand' => Brand::find($id)
        ]);
    }
    
    public function updateBrand(Request $request){
        
        //return $request->all();
        
        $brandImage = $request->file('image');
        
        //return $categoryImage;
        
        if ($brandImage) {
            
            $brand = Brand::find($request->id);
            //unlink($category->image);
            $rand1 = rand(1000,9999);
            $rand2 = rand(1000,9999);
            
            $fileType  = $brandImage->getClientOriginalExtension();
            $imageName = $rand1.$rand2 . '.' . $fileType;
            $directory = 'brand-images/';
            $img       = Image::make($brandImage)->resize(600, 600)->save($directory . $imageName);
            
            $brand->name        = $request->name;
            $brand->slug     = Str::slug($request->name);
            $brand->status   = $request->status;
            $brand->image   = $directory.$imageName;
            $brand->save();
            
        }
        
        else{
            $brand = Brand::find($request->id);
            $brand->name        = $request->name;
            $brand->slug     = Str::slug($request->name);
            $brand->status   = $request->status;
            $brand->save();
        }
        
        
        return redirect('/manage-brand/')->with('message','Brand updated successfully!!');
        
    }
    
    public function deleteBrand(Request $request){
        
        
        
        $brand = Brand::find($request->id);
        $brand->delete();
        return redirect('/manage-brand/')->with('message','Brand deleted successfully!!');
        
    }
    
    public function addProduct(){
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.add-product',compact('brands','categories'));
    }
    
    public function newProduct(Request $request){
        $product = new Product();
        $productImage = $request->file('image');
        
        $rand1 = rand(1000,9999);
        $rand2 = rand(1000,9999);
        
        $fileType  = $productImage->getClientOriginalExtension();
        $imageName = $rand1.$rand2 . '.' . $fileType;
        $directory = 'product-images/';
        $img       = Image::make($productImage)->resize(800, 800)->save($directory . $imageName);
        $product->category_id  = $request->category_id;
        $product->brand_id     = $request->brand_id;
        $product->name     = $request->name;
        $product->slug     = Str::slug($request->name);
        $product->description     = $request->description;
        $product->image     = $directory.$imageName;
        $product->regular_price     = $request->regular_price;
        $product->discount_price     = $request->discount_price;
        $product->stock     = $request->stock;
        $product->availability   = $request->availability;
        $product->status   = $request->status;
        $product->star   = 4;
        $product->save();
        return back()->with('message','Product created successfully!!');
    }
    
    
    public function manageProduct(){
        
        $products = DB::table('products')
        ->join('categories','categories.id','=','products.category_id')
        ->join('brands','brands.id','=','products.brand_id')
        ->select('products.*','brands.name as brand_name','categories.name as category_name')
        ->get();
        
        return view('admin.products.manage-product',compact('products'));
        
    }
    
    public function editProduct($id){
        
        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::find($id);
        return view('admin.products.edit-product',compact('brands','categories','product'));
    }
    
    public function updateProduct(Request $request){
        
        //return $request->all();
        
        $productImage = $request->file('image');
        
        //return $categoryImage;
        
        if ($productImage) {
            
            $product = Product::find($request->id);
            //unlink($category->image);
            $rand1 = rand(1000,9999);
            $rand2 = rand(1000,9999);
            
            $fileType  = $productImage->getClientOriginalExtension();
            $imageName = $rand1.$rand2 . '.' . $fileType;
            $directory = 'product-images/';
            $img       = Image::make($productImage)->resize(800, 800)->save($directory . $imageName);
            
            $product->category_id  = $request->category_id;
            $product->brand_id     = $request->brand_id;
            $product->name     = $request->name;
            $product->slug     = Str::slug($request->name);
            $product->description     = $request->description;
            $product->image     = $directory.$imageName;
            $product->regular_price     = $request->regular_price;
            $product->discount_price     = $request->discount_price;
            $product->stock     = $request->stock;
            $product->availability   = $request->availability;
            $product->status   = $request->status;
            $product->star   = 4;
            $product->save();
            
        }
        
        else{
            $product = Product::find($request->id);
            $product->category_id  = $request->category_id;
            $product->brand_id     = $request->brand_id;
            $product->name     = $request->name;
            $product->slug     = Str::slug($request->name);
            $product->description     = $request->description;
            $product->regular_price     = $request->regular_price;
            $product->discount_price     = $request->discount_price;
            $product->stock     = $request->stock;
            $product->availability   = $request->availability;
            $product->status   = $request->status;
            $product->star   = 4;
            $product->save();
        }
        
        
        return redirect('/manage-product/')->with('message','Product updated successfully!!');
        
    }
    
    public function deleteProduct(Request $request){
        
        
        $product = Product::find($request->id);
        $product->delete();
        return redirect('/manage-product/')->with('message','Product deleted successfully!!');
        
    }
    
    public function manageOrders(){
        $orders = Order::orderBy('id','desc')->latest()->get();
        return view('admin.orders.manage-orders',compact('orders'));
    }
    
    public function processOrder($id){
        $order = Order::find($id);
        $order->status=1;
        $order->save();
        return redirect()->back()->with('message','Order processing started successfully');
    }
    
    public function shippedOrder($id){
        $order = Order::find($id);
        $order->status=2;
        $order->save();
        return redirect()->back()->with('message','Order shipped successfully');
    }
    
    public function deliveredOrder($id){
        $order = Order::find($id);
        $order->status=3;
        $order->save();
        
        $invoices = Invoice::where('order_id',$id)->get();
        foreach($invoices as $invoice){
            $invoice->status = 1;
            $invoice->save();
        }
        return redirect()->back()->with('message','Order delivered successfully');
    }
    
    public function cancelOrder($id){
        $order = Order::find($id);
        $order->status=4;
        $order->save();
        
        
        return redirect()->back()->with('message','Order cancelled successfully');
    }
    
    public function manageOrderDetails($id){
        
        //$invoices = Invoice::where('order_id',$id)->get();
        $invoices = DB::table('invoices')
        ->join('products','invoices.product_id','=','products.id')
        ->where('invoices.order_id',$id)
        ->select('invoices.*','products.name','products.slug')
        ->get();
        return view('admin.orders.manage-invoice',compact('invoices'));
    }
    
    public function addService(){
        return view('admin.services.add-service');
    }
    
    public function newService(Request $request){
        $service = new Service();
        $service->name     = $request->name;
        $service->status   = $request->status;
        $service->save();
        return back()->with('message','Service created successfully!!');
    }
    
    
    public function manageService(){
        
        return view('admin.services.manage-service',[
            'services' => Service::all()
        ]);
        
    }
    
    public function editService($id){
        
        return view('admin.services.edit-service',[
            'service' => Service::find($id)
        ]);
    }
    
    public function updateService(Request $request){
        
        //return $request->all();
        
        
        //return $categoryImage;
        
        
        $service = Service::find($request->id);
        $service->name        = $request->name;
        $service->status   = $request->status;
        $service->save();
        
        
        return redirect(route('manage-services'))->with('message','Service updated successfully!!');
        
    }
    
    public function deleteService(Request $request){
        
        
        
        $service = Service::find($request->id);
        $service->delete();
        return redirect(route('manage-services'))->with('message','Service deleted successfully!!');
        
    }
    
    public function addRegion(){
        return view('admin.region.add-region');
    }
    
    public function newRegion(Request $request){
        $service = new Region();
        $service->name     = $request->name;
        $service->save();
        return back()->with('message','Region created successfully!!');
    }
    
    
    public function manageRegion(){
        
        return view('admin.region.manage-region',[
            'regions' => Region::all()
        ]);
        
    }
    
    public function addCity(){
        $regions = Region::all();
        return view('admin.city.add-city',compact('regions'));
    }
    
    public function newCity(Request $request){
        $service = new City();
        $service->region_id     = $request->region_id;
        $service->name     = $request->name;
        $service->save();
        return back()->with('message','City created successfully!!');
    }
    
    
    public function manageCities(){
        
        $cities = DB::table('cities')
        ->join('regions','regions.id','cities.region_id')
        ->select('regions.name as region_name','cities.*')
        ->get();
        return view('admin.city.manage-city',compact('cities'));
        
    }
    
    public function manageBooking(){
        $bookings = DB::table('bookings')
        ->join('services','services.id','=','bookings.service_id')
        ->join('regions','regions.id','=','bookings.region_id')
        ->join('cities','cities.id','=','bookings.city_id')
        ->leftJoin('technicians','technicians.id','=','bookings.technician_id')
        ->select('bookings.*','services.name as service_name','regions.name as region_name','cities.name as city_name','technicians.name as technician_name')
        ->orderBy('bookings.id','desc')
        ->get();
        return view('admin.bookings.manage-booking',compact('bookings'));
    }
    
    public function confirmBooking($id){
        
        $booking = Booking::find($id);
        
        $technician = Technician::where('availability',1)->where('region_id',$booking->region_id)->where('city_id',$booking->city_id)->orderBy('queue')->first();
        
        if(!$technician){
            return redirect()->back()->with('alert','No technicians available');
        }
        
        
        $booking->status = 1;
        $booking->technician_id = $technician->id;

        // $number=$technician->phone;
        $number='01632303283';
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
    
    public function cancelBooking($id){
        $booking = Booking::find($id);
        $booking->status=5;
        $booking->save();
        return redirect()->back()->with('message','Booking cancelled successfully');
    }
    
    public function processAgain($id){
        $booking = Booking::find($id);
        $booking->status=2;
        $booking->save();
        return redirect()->back()->with('message','Processing again started successfully');
    }
    
    public function deliveredBooking($id){
        $booking = Booking::find($id);
        $booking->status=4;
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
        //return view('admin.orders.order-invoice');
    }
    
    public function downloadBookingInvoice(Request $request){
        
        // $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $date = $request->date;
        $bookings = DB::table('bookings')
        ->join('regions','bookings.region_id','=','regions.id')
        ->join('cities','bookings.city_id','=','cities.id')
        ->join('services','bookings.service_id','=','services.id')
        ->leftJoin('technicians','bookings.technician_id','=','technicians.id')
        ->where('bookings.date',$request->date)
        ->select('bookings.*','regions.name as region_name','cities.name as city_name','technicians.name as technician_name','services.name as service_name')
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
            
            $pdf = PDF::loadView('admin.bookings.booking-invoice',compact('bookings','date'));
            
            return $pdf->download('booking.pdf');
        }
        
        else{
            return redirect()->back()->with('alert','No records found');
        }
        
        
    }
    
    public function manageTechnicians(){
        
        //$technicians = Technician::all();
        $technicians = DB::table('technicians')
        ->join('regions','technicians.region_id','=','regions.id')
        ->join('cities','technicians.city_id','=','cities.id')
        ->select('technicians.*','regions.name as region','cities.name as city')
        ->get();
        return view('admin.technicians.manage-technicians', compact('technicians'));
    }
    
    public function updateTechnicianSlot(Request $request){
        $technician = Technician::find($request->id);
        $technician->slot = $request->slot;
        $technician->save();
        
        if($technician->queue < $technician->slot){
            $technician->availability = 1;
            $technician->save();
        }
        else{
            $technician->availability = 0;
            $technician->save();
        }
        return redirect()->back()->with('message','Slot updated successfully');
    }
    
    //manage chatbot-----------------------------------------
    
    public function answers(){
        $answers = BotAnswer::all();
        return view('admin.chatbot.manage-answers', compact('answers'));
    }
    
    public function questions($id){
        //$questions = BotQuestion::where('answer_id',$id)->get();
        $answer = BotAnswer::find($id);
        $questions = DB::table('bot_questions')
        ->join('train_bots','bot_questions.id','train_bots.question_id')
        ->join('bot_answers','bot_answers.id','train_bots.answer_id')
        ->where('train_bots.answer_id',$id)
        ->get();
        
        return view('admin.chatbot.manage-questions', compact('questions','answer'));
    }
    
    //public function newQuestion
    
    public function chatbot(){
        //$botAnswer = TrainBot::where('')
        $defaultAnswer = BotAnswer::where('defaultAnswer', 1)->first();
        return view('admin.chatbot.manage-chatbot', compact('defaultAnswer'));
    }
    
    public function submitChat(Request $request){
        //return count($request->question);
        
        if($request->answer){
            $botAnswer = new BotAnswer();
            $botAnswer->answer = $request->answer;
            $botAnswer->save();
            
            $answer = BotAnswer::latest()->first();
        }
        
        else{
            $answer = BotAnswer::find($request->answer_id);
        }
        
        $length = count($request->question);
        
        for($i = 0; $i<$length; $i++){
            $answer = BotAnswer::latest()->first();
            $botQuestion = new BotQuestion();
            $botQuestion->answer_id = $answer->id;
            $botQuestion->question = $request->question[$i];
            $botQuestion->save();
            
            $question = BotQuestion::orderBy('id','desc')->first();
            
            $trainBot = new TrainBot();
            $trainBot->question_id = $question->id;
            $trainBot->answer_id = $answer->id;
            $trainBot->save();
        }
        
        return redirect()->back();
        
    }
    
    public function defaultAnswer(Request $request){
        $defaultQuestion = BotQuestion::where('defaultAnswer',1)->first();
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
            
            $question = BotQuestion::where('defaultAnswer',1)->first();
            
            
            
            $newAnswer = BotAnswer::orderBy('id','desc')->first();
            //return $answer;
            
            $trainBot = new TrainBot();
            $trainBot->question_id = $question->id;
            $trainBot->answer_id = $newAnswer->id;
            $trainBot->save();
        }
        
        else{
            $botAnswer = BotAnswer::find($defaultQuestion->answer_id);
            $botAnswer->answer = $request->answer;
            $botAnswer->save();
        }
        return redirect()->back();
    }
    
    public function deleteQuestion(Request $request){
        $question = BotQuestion::find($request->id);
        $question->delete();
        
        return redirect()->back()->with('message','Question deleted successfully');
    }
    
    public function deleteAnswer(Request $request){
        $answer = BotAnswer::find($request->id);
        $answer->delete();
        
        return redirect()->back()->with('message','Answer deleted successfully');
    }
}
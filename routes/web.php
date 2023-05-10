<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Front--------------------------------------------------------------------------------------

use App\Http\Controllers\Admin\ProductController;

Route::get('/', 'Front\HomeController@index')->name('/');
Route::get('/product-details/{slug}', 'Front\HomeController@singleProduct')->name('single-product');
Route::get('/categories/{slug}', 'Front\HomeController@categoryProducts')->name('category-products');
Route::get('/brands/{slug}', 'Front\HomeController@brandProducts')->name('brand-products');
Route::post('/add-to-cart', 'Front\HomeController@addToCart')->name('add-to-cart');
Route::get('/mini-cart', 'Front\HomeController@miniCart')->name('mini-cart');
Route::post('/update-cart', 'Front\HomeController@updateCart')->name('update-cart');
Route::get('/checkout/', 'Front\HomeController@checkout')->name('checkout')->middleware('auth');
Route::post('/order-submit', 'Front\HomeController@orderSubmit')->name('order-submit');
Route::get('/cart', 'Front\HomeController@cart')->name('cart');
Route::get('/cart-ajax', 'Front\HomeController@cartAjax')->name('cart-ajax');
Route::get('/minicart-item-remove/{id}', 'Front\HomeController@minicartItemRemove')->name('minicart-item-remove');
Route::get('/cart-item-remove/{id}', 'Front\HomeController@cartItemRemove')->name('cart-item-remove');
Route::get('/cart-increment/{id}', 'Front\HomeController@cartIncrement')->name('cart-increment');
Route::get('/cart-decrement/{id}', 'Front\HomeController@cartDecrement')->name('cart-decrement');

Route::post('/ajax-get-cities', 'Front\HomeController@getCities')->name('ajax-get-cities');
Route::post('/ajax-available-times', 'Front\HomeController@availableTimes')->name('ajax-available-times');

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle')->name('google.login');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');


Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin-login');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
// Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
// Route::post('/register/admin', 'Auth\RegisterController@createAdmin');


//chat
Route::get('chat', 'Front\HomeController@chat')->name('chat');
Route::get('chats', 'Front\HomeController@chats')->name('chats');
Route::post('chatSend', 'Front\HomeController@sendChat');
Route::post('reply', 'Front\HomeController@reply');


//Route::view('/admin-dashboard', 'admin.home.index');
Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('/home', 'Front\ClientController@home')->name('home');
    Route::get('/change-password', 'Front\ClientController@changePassword')->name('client.change-password');
    Route::post('/update-password', 'Front\ClientController@updatePassword')->name('client.update-password');
    Route::post('/update-profile', 'Front\ClientController@updateProfile')->name('client.update-profile');
    Route::get('/order-details/{id}', 'Front\ClientController@orderDetails')->name('client.order-details');
    Route::get('/book-service/', 'Front\ClientController@bookService')->name('client.book-service');
    Route::post('/book-service/', 'Front\ClientController@bookingSubmit')->name('client.booking-submit');
    Route::get('/booking-history/', 'Front\ClientController@bookingHistory')->name('client.booking-history');

    Route::get('stripe', 'Front\StripePaymentController@stripe')->name('card-payment');
    Route::post('stripe', 'Front\StripePaymentController@stripePost')->name('card-payment.post');
    Route::post('submit-review', 'Front\ClientController@submitReview')->name('submit-review');
    Route::get('invoice-download/{id}', 'Front\ClientController@downloadInvoice')->name('invoice-download');
});


//Admin--------------------------------------------------------------------------------------------------
Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified']], function () {

    Route::view('/dashboard', 'admin.home.index')->name('dashboard');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('brand', 'Admin\BrandController');
    Route::resource('product', 'Admin\ProductController');

    Route::get('/order/manage', 'Admin\OrderController@manageOrders')->name('order.manage');
    Route::get('/order/process/{order}', 'Admin\OrderController@processOrder')->name('order.process');
    Route::get('/order/cancel/{order}', 'Admin\OrderController@CancelOrder')->name('order.cancel');
    Route::get('/order/ship/{order}', 'Admin\OrderController@shippedOrder')->name('order.ship');
    Route::get('/order/deliver/{order}', 'Admin\OrderController@deliveredOrder')->name('order.deliver');
    Route::get('/manage/order-details/{id}', 'Admin\OrderController@manageOrderDetails')->name('manage-order-details');

    Route::get('/technician/manage', 'Admin\TechnicianController@manageTechnicians')->name('technician.manage');
    Route::post('/technician/create', 'Admin\TechnicianController@createTechnician')->name('technician.create');
    Route::post('/technician/update-slot', 'Admin\TechnicianController@updateTechnicianSlot')->name('technician.update-slot');

    Route::resource('service', 'Admin\ServiceController');

    Route::get('/booking/manage/', 'Admin\BookingController@manageBooking')->name('booking.manage');
    Route::get('/booking/confirm{booking}', 'Admin\BookingController@confirmBooking')->name('booking.confirm');
    Route::get('/booking/cancel{booking}', 'Admin\BookingController@cancelBooking')->name('booking.cancel');
    Route::get('/booking/process-again/{booking}', 'Admin\BookingController@processAgain')->name('booking.process-again');
    Route::get('/booking/delivered{booking}', 'Admin\BookingController@deliveredBooking')->name('booking.delivered');
});


Route::group(['middleware' => ['admin']], function () {

    Route::get('/add-region', 'HomeController@addRegion')->name('add-region');
    Route::post('/new-region', 'HomeController@newRegion')->name('new-region');

    Route::get('/add-city', 'HomeController@addCity')->name('add-city');
    Route::post('/new-city', 'HomeController@newCity')->name('new-city');
    Route::get('/manage-city/', 'HomeController@manageCities')->name('manage-city');

    //Route::get('/manage-store/','HomeController@manageStore')->name('manage-store'); 
    Route::get('/booking-invoice', 'HomeController@downloadBookingInvoice')->name('booking-invoice-download');
    Route::get('admin-invoice-download/{id}', 'HomeController@downloadInvoice')->name('admin-invoice-download');

    //manage chatbot
    Route::get('answer/{id}/questions', 'HomeController@questions')->name('questions');
    Route::get('answers', 'HomeController@answers')->name('answers');
    Route::get('manage-chatbot', 'HomeController@chatbot')->name('manage-chatbot');
    Route::post('chatbot', 'HomeController@submitChat')->name('chatbot');
    Route::post('default-answer', 'HomeController@defaultAnswer')->name('default-answer');
    Route::delete('delete-question', 'HomeController@deleteQuestion')->name('delete-question');
    Route::post('delete-answer', 'HomeController@deleteAnswer')->name('delete-answer');
});


//Technician------------------------------------------------------------------------------
Route::get('/login/technician', 'Auth\LoginController@showTechnicianLoginForm')->name('technician-login');
Route::post('/login/technician', 'Auth\LoginController@technicianLogin');
Route::get('/register/technician', 'Auth\RegisterController@showTechnicianRegisterForm');
Route::post('/register/technician', 'Auth\RegisterController@createTechnician');

// Route::get('/dashboard', 'TechnicianController@index')->name('technician.home');
Route::get('/jobs', 'TechnicianController@jobs')->name('technician.jobs');
Route::group(['prefix' => 'technician', 'middleware' => ['technician']], function () {
    //Route::view('/dashboard', 'technician.home')->name('technician.home');
    Route::get('/process-booking/{id}', 'TechnicianController@processBooking')->name('process-booking');
    Route::get('/done-booking/{id}', 'TechnicianController@doneBooking')->name('done-booking');
});

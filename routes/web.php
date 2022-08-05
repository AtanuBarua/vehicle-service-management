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
    
    Route::get('test','Front\HomeController@test');
    Route::post('file-submit','Front\HomeController@fileSubmit')->name('file-submit');
    
    //Front--------------------------------------------------------------------------------------------------
    Route::get('/','Front\HomeController@index')->name('/');
    Route::get('/product/{slug}', 'Front\HomeController@singleProduct')->name('single-product');
    Route::get('/category/{slug}', 'Front\HomeController@categoryProducts')->name('category-products');
    Route::get('/brand/{slug}', 'Front\HomeController@brandProducts')->name('brand-products');
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
    
    Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin-login');
    Route::post('/login/admin', 'Auth\LoginController@adminLogin');
    // Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
    // Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
    
    
    //chat
    Route::get('chat','Front\HomeController@chat')->name('chat');
    Route::get('chats','Front\HomeController@chats')->name('chats');
    Route::post('chatSend','Front\HomeController@sendChat');
    Route::post('reply','Front\HomeController@reply');
    
    
    //Route::view('/admin-dashboard', 'admin.home.index');
    Route::group(['middleware' => ['auth']], function(){
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
    Auth::routes();
    
    Route::group(['middleware' => ['admin']], function(){
        
        Route::view('/admin-dashboard', 'admin.home.index')->name('admin.home');
        Route::get('/add-category', 'HomeController@addCategory')->name('add-category');
        Route::post('/new-category', 'HomeController@newCategory')->name('new-category');
        Route::get('/manage-category/','HomeController@manageCategory')->name('manage-category');
        Route::get('/edit-category/{id}','HomeController@editCategory')->name('edit-category');
        Route::post('/update-category/', 'HomeController@updateCategory')->name('update-category');
        Route::post('/delete-category/','HomeController@deleteCategory')->name('delete-category');
        
        Route::get('/add-brand', 'HomeController@addBrand')->name('add-brand');
        Route::post('/new-brand', 'HomeController@newBrand')->name('new-brand');
        Route::get('/manage-brand/','HomeController@manageBrand')->name('manage-brand');
        Route::get('/edit-brand/{id}','HomeController@editBrand')->name('edit-brand');
        Route::post('/update-brand/', 'HomeController@updateBrand')->name('update-brand');
        Route::post('/delete-brand/','HomeController@deleteBrand')->name('delete-brand');
        
        Route::get('/add-product', 'HomeController@addProduct')->name('add-product');
        Route::post('/new-product', 'HomeController@newProduct')->name('new-product');
        Route::get('/manage-product/','HomeController@manageProduct')->name('manage-product');
        Route::get('/edit-product/{id}','HomeController@editProduct')->name('edit-product');
        Route::post('/update-product/', 'HomeController@updateProduct')->name('update-product');
        Route::post('/delete-product/','HomeController@deleteProduct')->name('delete-product');
        
        
        Route::get('/manage-orders/','HomeController@manageOrders')->name('manage-orders');
        
        Route::get('/process-order/{id}','HomeController@processOrder')->name('process-order');
        Route::get('/cancel-order/{id}','HomeController@CancelOrder')->name('cancel-order');
        Route::get('/shipped-order/{id}','HomeController@shippedOrder')->name('shipped-order');
        Route::get('/delivered-order/{id}','HomeController@deliveredOrder')->name('delivered-order');
        
        Route::get('/manage/order-details/{id}','HomeController@manageOrderDetails')->name('manage-order-details');
        
        Route::get('/add-service', 'HomeController@addService')->name('add-service');
        Route::post('/new-service', 'HomeController@newService')->name('new-service');
        Route::get('/manage-services/','HomeController@manageService')->name('manage-services');
        Route::get('/edit-service/{id}','HomeController@editService')->name('edit-service');
        Route::post('/update-service/', 'HomeController@updateService')->name('update-service');
        Route::post('/delete-service/','HomeController@deleteService')->name('delete-service');
        
        Route::get('/add-region', 'HomeController@addRegion')->name('add-region');
        Route::post('/new-region', 'HomeController@newRegion')->name('new-region');
        
        Route::get('/add-city', 'HomeController@addCity')->name('add-city');
        Route::post('/new-city', 'HomeController@newCity')->name('new-city');
        Route::get('/manage-city/','HomeController@manageCities')->name('manage-city');
        
        
        Route::get('/manage-bookings/','HomeController@manageBooking')->name('manage-bookings');
        Route::get('/confirm-booking/{id}','HomeController@confirmBooking')->name('confirm-booking');
        Route::get('/cancel-booking/{id}','HomeController@cancelBooking')->name('cancel-booking');
        Route::get('/process-again/{id}','HomeController@processAgain')->name('process-again');
        Route::get('/delivered-booking/{id}','HomeController@deliveredBooking')->name('delivered-booking');
        
        //Route::get('/manage-store/','HomeController@manageStore')->name('manage-store'); 
        Route::get('/booking-invoice','HomeController@downloadBookingInvoice')->name('booking-invoice-download');
        Route::get('admin-invoice-download/{id}', 'HomeController@downloadInvoice')->name('admin-invoice-download'); 
        
        Route::get('/manage-technicians/','HomeController@manageTechnicians')->name('manage-technicians');
        
        Route::post('/update-technician-slot','HomeController@updateTechnicianSlot')->name('update-technician-slot');
        
        //manage chatbot
        
        Route::get('answer/{id}/questions','HomeController@questions')->name('questions');
        Route::get('answers','HomeController@answers')->name('answers');
        Route::get('manage-chatbot','HomeController@chatbot')->name('manage-chatbot');
        Route::post('chatbot','HomeController@submitChat')->name('chatbot');
        Route::post('default-answer','HomeController@defaultAnswer')->name('default-answer');
        Route::delete('delete-question','HomeController@deleteQuestion')->name('delete-question');
        Route::post('delete-answer','HomeController@deleteAnswer')->name('delete-answer');
    });
    
    //Technician------------------------------------------------------------------------------
    Route::get('/login/technician', 'Auth\LoginController@showTechnicianLoginForm')->name('technician-login');
    Route::post('/login/technician', 'Auth\LoginController@technicianLogin');
    Route::get('/register/technician', 'Auth\RegisterController@showTechnicianRegisterForm');
    Route::post('/register/technician', 'Auth\RegisterController@createTechnician');
    
    Route::group(['prefix'=>'technician','middleware' => ['technician']], function(){
        //Route::view('/dashboard', 'technician.home')->name('technician.home');
        Route::get('/dashboard', 'TechnicianController@index')->name('technician.home');
        Route::get('/jobs', 'TechnicianController@jobs')->name('technician.jobs');
        Route::get('/process-booking/{id}','TechnicianController@processBooking')->name('process-booking');
        Route::get('/done-booking/{id}','TechnicianController@doneBooking')->name('done-booking');
    });
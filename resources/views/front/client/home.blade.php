@extends('front.master')

@section('body')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Other</h2>
            <ul>
                <li><a href="{{route('/')}}">Home</a></li>
                <li class="active">My Account</li>
            </ul>
        </div>
    </div>
</div>
<!-- Uren's Breadcrumb Area End Here -->
<!-- Begin Uren's Page Content Area -->
<main class="page-content">
    <!-- Begin Uren's Account Page Area -->

    <div class="account-page-area">

        <div class="container-fluid " >
            @if (Session::get('message'))

            <div class="alert alert-primary col-md-3"  role="alert">
              {{Session::get('message')}}
          </div>
          @endif
          <div class="row">

            <div class="col-lg-3">

                <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab" href="#account-dashboard" role="tab" aria-controls="account-dashboard" aria-selected="true">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders" role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-details-tab" href="{{route('client.booking-history')}}" aria-controls="account-details" aria-selected="false">Booking History</a>
                    </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="account-address-tab" data-toggle="tab" href="#account-address" role="tab" aria-controls="account-address" aria-selected="false">Addresses</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" id="account-details-tab" data-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">Account Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-details-tab" href="{{route('client.change-password')}}" aria-controls="account-details" aria-selected="false">Change Password</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" id="account-logout-tab" href="{{ route('logout') }}" role="tab" aria-selected="false" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </div>

                        <div class="col-lg-9">
                            <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                                <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
                                    <div class="myaccount-dashboard">
                                        <p>Hello <b>{{Auth::user()->name}}</b></p>
                                        <p>From your account dashboard you can view your order history and edit your account details.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
                                    <div class="myaccount-orders">
                                        <h4 class="small-title">MY ORDERS</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <tbody>
                                                    <tr>
                                                        <th>ORDER</th>
                                                        <th>DELIVERY ADDRESS</th>
                                                        <th>TOTAL</th>
                                                        <th>DATE</th>
                                                        <th>STATUS</th>
                                                        
                                                        <th></th>
                                                    </tr>

                                                    @foreach($orders as $order)
                                                    <tr>
                                                        <td><a class="account-order-id" href="javascript:void(0)">#5364</a></td>
                                                        <td>{{$order->address}}</td>
                                                        <td>{{$order->amount}}</td>
                                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->toDateString()}}</td>
                                                        <td>
                                                            @if($order->status==0)
                                                            Pending
                                                            @elseif($order->status==1)
                                                            Processing
                                                            @elseif($order->status==2)
                                                            Shipped
                                                            @elseif($order->status==3)
                                                            Delivered
                                                            @elseif($order->status==4)
                                                            Cancelled
                                                            @endif
                                                        </td>
                                                        
                                                        <td>
                                                            <!-- <a href="{{route('client.order-details',['id'=>$order->id])}}" class="uren-btn uren-btn_dark uren-btn_sm"><span>View</span></a> -->
                                                            <a href="{{route('client.order-details',['id'=>$order->id])}}" class="btn btn-sm btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                            <a title="Invoice Download" href="{{ route('invoice-download',['id'=>$order->id]) }}" class="btn btn-sm btn-dark"><i class="fa fa-download" ></i></a> 
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="tab-pane fade" id="account-address" role="tabpanel" aria-labelledby="account-address-tab">
                                    <div class="myaccount-address">
                                        <p>The following addresses will be used on the checkout page by default.</p>
                                        <div class="row">
                                            <div class="col">
                                                <h4 class="small-title">BILLING ADDRESS</h4>
                                                <address>
                                                    1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                                </address>
                                            </div>
                                            <div class="col">
                                                <h4 class="small-title">SHIPPING ADDRESS</h4>
                                                <address>
                                                    1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
                                    <div class="myaccount-details">
                                        <form method="POST" action="{{route('client.update-profile')}}" class="uren-form">
                                            @csrf
                                            <div class="uren-form-inner">
                                                <div class="single-input">
                                                    <label for="account-details-firstname">Full Name*</label>
                                                    <input name="name" value="{{Auth::user()->name}}" type="text" id="account-details-firstname">
                                                </div>
                                                
                                                <div class="single-input">
                                                    <label for="account-details-email">Email*</label>
                                                    <input name="email" value="{{Auth::user()->email}}" type="email" id="account-details-email">
                                                </div>
                                                
                                                <div class="single-input">
                                                    <button class="uren-btn uren-btn_dark" type="submit"><span>SAVE
                                                    CHANGES</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Uren's Account Page Area End Here -->
        </main>
        @endsection
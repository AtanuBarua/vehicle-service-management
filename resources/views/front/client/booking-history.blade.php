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



            <div class="col-lg-10" style="margin:auto;">


                <h4 class="small-title">MY BOOKINGS</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>BOOKING ID</th>
                                <th>SERVICE</th>
                                <th>REGION</th>
                                <th>CITY</th>
                                <th>DROPPOFF TIME</th>
                                <th>EMAIL</th>
                                <th>PHONE</th>
                                <th>DATE</th>
                                <th>STATUS</th>
                                <!-- <th></th> -->
                            </tr>

                            @foreach($bookings as $booking)
                            <tr>
                                <td><a class="account-order-id" href="javascript:void(0)">#5364</a></td>
                                <td>{{$booking->service_name}}</td>
                                <td>{{$booking->region_name}}</td>
                                <td>{{$booking->city_name}}</td>
                                <td>{{$booking->date}} - {{$booking->time}}</td>
                                <td>{{$booking->email}}</td>
                                <td>{{$booking->phone}}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->created_at)->toDateString()}}</td>
                                <td>
                                    @if($booking->status==0)
                                    Pending
                                    @elseif($booking->status==1)
                                    Accepted
                                    @elseif($booking->status==2 || $booking->status==3)
                                    Processing
                                    @elseif($booking->status==4 )
                                    Delivered
                                    @else
                                    Cancelled
                                    @endif
                                </td>
                                                        <!-- <td><a href="javascript:void(0)" class="uren-btn uren-btn_dark uren-btn_sm"><span>View</span></a>
                                                        </td> -->
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
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

                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Uren's Account Page Area End Here -->
            </main>
            @endsection
@extends('front.master')

@section('body')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Other</h2>
            <ul>
                <li><a href="{{route('home')}}">Home</a></li>
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

            <div class="alert alert-success col-md-3"  role="alert">
              {{Session::get('message')}}
          </div>
          @endif
          <div class="row">



            <div class="col-lg-10" style="margin:auto;">


                <h4 class="small-title">MY ORDERS</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>ORDER ID</th>
                                <th>IMAGE</th>
                                <th>PRODUCT</th>
                                <th>UNIT PRICE</th>
                                <th>QUANTITY</th>
                                <th>UNIT * QUANTITY</th>
                                <th>DATE</th>
                                <th>ACTION</th>

                                <!-- <th></th> -->
                            </tr>

                            @foreach($items as $item)
                            <tr>
                                <td><a class="account-order-id" href="javascript:void(0)">#5364</a></td>
                                <td><a href="{{route('single-product',['slug'=>$item->slug])}}"><img src="{{asset($item->image)}}" height="70" width="100"></a></td>
                                <td><a href="{{route('single-product',['slug'=>$item->slug])}}">{{$item->name}}</a></td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->subtotal}}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->toDateString()}}</td>

                                
                                <td>
                                 @foreach($reviewers as $reviewer)   
                                 @if($reviewer->product_id==$item->product_id)
                                 <a href="{{route('single-product',['slug'=>$item->slug])}}" target="_blank" class="btn btn-sm btn-success">Review</a>
                                 @endif
                                 @endforeach 

                                </td>
                                
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
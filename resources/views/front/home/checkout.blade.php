@extends('front.master')
@section('body')
<div class="breadcrumb-area">
	<div class="container">
		<div class="breadcrumb-content">
			<h2>Other</h2>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li class="active">Checkout</li>
			</ul>
		</div>
	</div>
</div>
<!-- Uren's Breadcrumb Area End Here -->
<!-- Begin Uren's Checkout Area -->
<div class="checkout-area">
	<div class="container-fluid">
                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="coupon-accordion">
                            <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                            <div id="checkout-login" class="coupon-content">
                                <div class="coupon-info">
                                    <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est
                                        sit amet ipsum luctus.</p>
                                    <form action="javascript:void(0)">
                                        <p class="form-row-first">
                                            <label>Username or email <span class="required">*</span></label>
                                            <input type="text">
                                        </p>
                                        <p class="form-row-last">
                                            <label>Password <span class="required">*</span></label>
                                            <input type="text">
                                        </p>
                                        <p class="form-row">
                                            <input value="Login" type="submit">
                                            <label>
                                                <input type="checkbox">
                                                Remember me
                                            </label>
                                        </p>
                                        <p class="lost-password"><a href="javascript:void(0)">Lost your password?</a></p>
                                    </form>
                                </div>
                            </div>
                            <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                            <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">
                                    <form action="javascript:void(0)">
                                        <p class="checkout-coupon">
                                            <input placeholder="Coupon code" type="text">
                                            <input class="coupon-inner_btn" value="Apply Coupon" type="submit">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                	
                	<div class="col-lg-6 col-12">

<<<<<<< Updated upstream
                		
                		<div class="checkbox-form">
                			<h3>Billing Details</h3>
                			<div class="row">
                				
                				<div class="col-md-12">
                					<form action="{{route('order-submit')}}" method="post">
                				@csrf
                					<div class="checkout-form-list">
                						<label>Full Name</label>
                						<input required name="name" placeholder="" type="text" value="{{Auth::user()->name}}">
                					</div>
                				</div>
                				<div class="col-md-6">
                					<div class="country-select clearfix">
                						<label>Region <span class="required">*</span></label>
                						<select id="region" required class="myniceselect nice-select wide" name="region_id">
                							<option value="" selected disabled>Select Region</option>
=======
            <div class="col-lg-6 col-12">

                <div class="checkbox-form">
                    {{-- <h3>Billing Details</h3> --}}
                    <div class="row">

                        <div class="col-md-12">
                            <h3>Shipping Details</h3>

                            <span>Deliver to: {{$defaultShippingAddress->full_name}}</span><br>
                            <span>{{$defaultShippingAddress->phone}} |
                                {{$defaultShippingAddress->address}}</span><br><br>
                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#firstModal">Change</button>
                            <hr>
                            <h3>Billing Details</h3>

                            <span>Bill to: {{$defaultBillingAddress->full_name}}</span><br>
                            <span>{{$defaultBillingAddress->phone}} | {{$defaultBillingAddress->address}}</span><br><br>
                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#firstModal">Change</button>
                            <form action="{{route('order-submit')}}" method="post">
                                @csrf
                                {{-- <div class="checkout-form-list">
                                    <label>Full Name</label>
                                    <input required name="name" placeholder="" type="text"
                                        value="{{Auth::user()->name}}">
                                </div> --}}
                        </div>

                        {{-- <div class="col-md-6">
                            <div class="country-select clearfix">
                                <label>Region <span class="required">*</span></label>
                                <select id="region" required class="myniceselect nice-select wide" name="region_id">
                                    <option value="" selected disabled>Select Region</option>
>>>>>>> Stashed changes
                                    @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                						</select>
                					</div>
                				</div>
                				<div class="col-md-6">
                					<div class="checkout-form-list">
                						<label>City <span class="required">*</span></label>
                						<select id="city" required class="form-control" name="city_id">  

                                        </select>
                					</div>
                				</div>
                				<div class="col-md-12">
                					<div class="checkout-form-list">
                						<label>Address <span class="required">*</span></label>
                						<input required name="address" placeholder="" type="text">
                					</div>
                				</div>
                				<div class="col-md-12">
                					<div class="country-select clearfix">
                						<label>Payment through <span class="required">*</span></label>
                						<select required name="payment" class="myniceselect nice-select wide" name="region">
                							<option value="COD">Cash on Delivery</option>
                							<option value="Card">Card</option>     
                						</select>
                					</div>
                				</div>

                				<div class="col-md-6">
                					<div class="checkout-form-list">
                						<label>Email Address <span class="required">*</span></label>
                						<input required name="email" placeholder="" type="email" value="{{Auth::user()->email}}">
                					</div>
                				</div>
                				<div class="col-md-6">
                					<div class="checkout-form-list">
                						<label>Phone <span class="required">*</span></label>
                						<input required name="phone" type="text">
                					</div>
                				</div>

                			</div>

<<<<<<< Updated upstream
                		</div>
=======
                                @foreach($cartItems as $item)
                                <?php
                                    $qty = $item->qty;
                                    $price = $item->price;
                                    $total = $qty*$price;
                                ?>
                                <tr class="cart_item">
                                    <td class="cart-product-name"> {{$item->name}}
                                        <!-- <strong class="product-quantity">
                                            	× {{$item->qty}}</strong> -->
                                    </td>
                                    <td class="cart-product-total"><span class="amount"><strong
                                                class="product-quantity">{{$item->price}}</span> x {{$item->qty}} =
                                        {{$total}}</strong></td>
>>>>>>> Stashed changes

                	</div>
                	<div class="col-lg-6 col-12">
                		<div class="your-order">
                			<h3>Your order</h3>
                			<div class="your-order-table table-responsive">
                				<table class="table">
                					<thead>
                						<tr>
                							<th class="cart-product-name">Product</th>
                							<th class="cart-product-total">Total</th>
                						</tr>
                					</thead>
                					<tbody>

                						@foreach($cartItems as $item)
                						<?php

                						$qty = $item->qty;
                						$price = $item->price;
                						$total = $qty*$price;	    	
                						?>
                						<tr class="cart_item">
                                            <td class="cart-product-name"> {{$item->name}}<!-- <strong class="product-quantity">
                                            	× {{$item->qty}}</strong> --></td>
                                            	<td class="cart-product-total"><span class="amount"><strong class="product-quantity">{{$item->price}}</span> x {{$item->qty}} = {{$total}}</strong></td>

                                            </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                        <!-- <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">{{Cart::subtotal()}}</span></td>
                                        </tr> -->
<<<<<<< Updated upstream
                                        <tr class="order-total">
                                        	<th>Order Total</th>
                                        	<td><strong><span class="amount">{{Cart::subtotal()}}</span></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                            	<div class="payment-accordion">

                            		<div class="order-button-payment">
                            			<input value="Place order" type="submit">
                            		</div>
                            	</div>
=======
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">{{Cart::subtotal()}}</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <div class="country-select clearfix">
                            <label>Payment through <span class="required">*</span></label>
                            <select required name="payment" class="form-control">
                                <option value="">Select</option>
                                <option value={{App\Payment::TYPE_COD}}>Cash on Delivery</option>
                                <option value={{App\Payment::TYPE_CARD}}>Card</option>
                            </select>
                        </div>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div class="order-button-payment">
                                <input value="Place order" type="submit">
>>>>>>> Stashed changes
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        $('#region').on('change',function(e) {
            var region_id = e.target.value;
            $.ajax({
<<<<<<< Updated upstream
                url:"{{ route('ajax-get-cities') }}",
                type:"POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    region_id: region_id
                },
=======
                url:`{{ url('get-locations/${region_id}') }}`,
                type:"GET",

>>>>>>> Stashed changes
                success:function (data) {
                    $('#city').empty();
                    $.each(data.cities,function(index,city){
                        $('#city').append('<option value="'+city.id+'">'+city.name+'</option>');
                    })
                }
            })
        });
<<<<<<< Updated upstream
    });
</script>
        @endsection
=======

        $('#city').on('change',function(e) {
            var city_id = e.target.value;
            $.ajax({
                url:`{{ url('get-locations/${city_id}') }}`,
                type:"GET",

                success:function (data) {
                    $('#area').prop("disabled",false);
                    $('#area').empty();
                    $('#area').append('<option value="">Select</option>');
                    $.each(data.locations,function(index,location){
                        $('#area').append('<option value="'+location.id+'">'+location.name+'</option>');
                    })
                }
            })
        });

        $('.openSecondModalBtn').click(function() {
            $('#firstModal').modal('hide');
            $('#secondModal').modal('show');
            // var address = $("#openSecondModalBtn").data("id");
            var address = $(this).data("id");
            console.log(address);
            $.ajax({
                type: "GET",
                url: `./address/${address}`,
                dataType: "json",
                success: function (response) {
                    // console.log(response.location.parent.parent.id);
                    $("#id").val(response.id);
                    $("#full_name").val(response.full_name);
                    $("#phone").val(response.phone);
                    $("#address").val(response.address);

                    if(response.default_shipping_address == 1) {
                        $("#default_shipping_address").prop("checked", true);
                    }
                    if(response.default_billing_address == 1) {
                        $("#default_billing_address").prop("checked", true);
                    }

                    $('#updateAddressForm').attr('action', function(i, val) {
                        var urlAddress = val;
                        urlAddress = urlAddress.substring(0, urlAddress.length - 2);
                        return urlAddress + '/' + response.id;
                    });

                    // $("#city option[value='" + response.location_id + "']").prop('selected', true);
                    // $("#area option[value='" + response.location_id + "']").prop('selected', true);
                }
            });

        });
    });

    $("#editOrderBtn").click(function (e) {
            // alert("hi")
            // $("exampleModal2").modal('show');
        $("exampleModal").modal('hide');

    });
</script>
@endsection
>>>>>>> Stashed changes

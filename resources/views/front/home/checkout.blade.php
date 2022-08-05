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

                		</div>

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
                url:"{{ route('ajax-get-cities') }}",
                type:"POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    region_id: region_id
                },
                success:function (data) {
                    $('#city').empty();
                    $.each(data.cities,function(index,city){
                        $('#city').append('<option value="'+city.id+'">'+city.name+'</option>');
                    })
                }
            })
        });
    });
</script>
        @endsection
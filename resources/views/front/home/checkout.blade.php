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

    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <div class="card" style="width: 20rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk
                                        of the card's content.</p>
                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                    <button type="button" class="btn btn-primary" id="editOrderBtn">
                                        Launch demo modal
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="card" style="width: 20rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk
                                        of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- HTML code for first modal -->
    <div class="modal" id="firstModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Shipping/Billing Details</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            @foreach ($addresses as $item)
                                <div class="col-md-6 mt-3">
                                    <div class="card" style="width: 20rem;">
                                        <div class="card-body">
                                            {{-- <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk
                                        of the card's content.</p> --}}

                                            <span>Fullname: {{ $item->full_name }}</span><br>
                                            <span>Phone: {{ $item->phone }}</span><br>
                                            <span>Address: {{ $item->address }}</span><br>
                                            @if ($item->default_shipping_address == 1)
                                                <span class="badge badge-secondary">Default Shipping Address</span>
                                            @endif
                                            @if ($item->default_billing_address == 1)
                                                <span class="badge badge-secondary">Default Billing Address</span>
                                            @endif
                                            <button data-id="{{ $item->id }}" type="button"
                                                class="btn btn-sm btn-primary mt-3 openSecondModalBtn"
                                                id="openSecondModalBtn">
                                                Edit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- HTML code for second modal -->
    <div class="modal" id="secondModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title">Second Modal</h5> --}}
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="updateAddressForm" action="{{ route('address.update', ['id' => 0]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="checkbox-form">
                            <h3>Details</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Full Name</label>
                                        <input id="id" type="hidden" name="id">
                                        <input id="full_name" name="full_name" placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input name="phone" id="phone" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="country-select clearfix">
                                        <label>Region <span class="required">*</span></label>
                                        <select id="region" required class="form-control" name="">
                                            <option value="">Select Region</option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="checkout-form-list">
                                        <label>City <span class="required">*</span></label>
                                        <select id="city" required class="form-control" name="">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="checkout-form-list">
                                        <label>Area <span class="required">*</span></label>
                                        <select id="area" required class="form-control" name="area_id">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input id="address" name="address" placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <input type="checkbox" name="default_shipping_address"
                                            id="default_shipping_address" placeholder="" type="text">
                                        <label for="default_shipping_address">Default Shipping Address</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <input type="checkbox" name="default_billing_address"
                                            id="default_billing_address" placeholder="" type="text">
                                        <label for="default_billing_address">Default Billing Address</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="checkout-area">
        <div class="container-fluid">

            <div class="row">


                <div class="col-lg-6 col-12">

                    <div class="checkbox-form">
                        {{-- <h3>Billing Details</h3> --}}
                        <div class="row">

                            <div class="col-md-12">
                                <h3>Shipping Details</h3>

                                <span>Deliver to: {{ $defaultShippingAddress->full_name }}</span><br>
                                <span>{{ $defaultShippingAddress->phone }} |
                                    {{ $defaultShippingAddress->address }}</span><br><br>
                                <button class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#firstModal">Change</button>
                                <hr>
                                <h3>Billing Details</h3>

                                <span>Bill to: {{ $defaultBillingAddress->full_name }}</span><br>
                                <span>{{ $defaultBillingAddress->phone }} |
                                    {{ $defaultBillingAddress->address }}</span><br><br>
                                <button class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#firstModal">Change</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <form action="{{ route('order-submit') }}" method="post">
                            @csrf
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

                                        @foreach ($cartItems as $item)
                                            <?php

                                            $qty = $item->qty;
                                            $price = $item->price;
                                            $total = $qty * $price;
                                            ?>
                                            <tr class="cart_item">
                                                <td class="cart-product-name"> {{ $item->name }}
                                                    <!-- <strong class="product-quantity">
                                                                    × {{ $item->qty }}</strong> -->
                                                </td>
                                                <td class="cart-product-total"><span class="amount"><strong
                                                            class="product-quantity">{{ $item->price }}</span> x
                                                    {{ $item->qty }} = {{ $total }}</strong></td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <!-- <tr class="cart-subtotal">
                                                                    <th>Cart Subtotal</th>
                                                                    <td><span class="amount">{{ Cart::subtotal() }}</span></td>
                                                                </tr> -->
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">{{ Cart::subtotal() }}</span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <div class="country-select clearfix">
                                    <label>Payment through <span class="required">*</span></label>
                                    <select required name="payment" class="form-control">
                                        <option value="">Select</option>
                                        <option value={{ App\Payment::TYPE_COD }}>Cash on Delivery</option>
                                        <option value={{ App\Payment::TYPE_CARD }}>Card</option>
                                    </select>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div class="order-button-payment">
                                        <input value="Place order" type="submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#region').on('change', function(e) {
                var region_id = e.target.value;
                $.ajax({
                    url: `{{ url('get-locations/${region_id}') }}`,
                    type: "GET",

                    success: function(data) {
                        $('#city').prop("disabled", false);
                        $('#area').prop("disabled", true);
                        $('#city').empty();
                        $.each(data.cities, function(index, city) {
                            $('#city').append('<option value="' + city.id + '">' + city
                                .name + '</option>');
                        })
                    }
                })
            });

            $('#city').on('change', function(e) {
                var city_id = e.target.value;
                $.ajax({
                    url: `{{ url('get-locations/${city_id}') }}`,
                    type: "GET",

                    success: function(data) {
                        $('#area').prop("disabled", false);
                        $('#area').empty();
                        $('#area').append('<option value="">Select</option>');
                        $.each(data.locations, function(index, location) {
                            $('#area').append('<option value="' + location.id + '">' +
                                location.name + '</option>');
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
                    success: function(response) {
                        // console.log(response.location.parent.parent.id);
                        $("#id").val(response.id);
                        $("#full_name").val(response.full_name);
                        $("#phone").val(response.phone);
                        $("#address").val(response.address);

                        if (response.default_shipping_address == 1) {
                            $("#default_shipping_address").prop("checked", true);
                        }
                        if (response.default_billing_address == 1) {
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

        $("#editOrderBtn").click(function(e) {
            // alert("hi")
            // $("exampleModal2").modal('show');
            $("exampleModal").modal('hide');

        });
    </script>
@endsection

@extends('front.master')

@section('body')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Other</h2>
                <ul>
                    <li><a href="{{ route('/') }}">Home</a></li>
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

            <div class="container-fluid ">
                @if (Session::get('message'))
                    <div class="alert alert-primary col-md-3" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="row">

                    <div class="col-lg-3">

                        <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab"
                                    href="#account-dashboard" role="tab" aria-controls="account-dashboard"
                                    aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders"
                                    role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-details-tab" href="{{ route('client.booking-history') }}"
                                    aria-controls="account-details" aria-selected="false">Booking History</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="account-details-tab" data-toggle="tab" href="#account-details"
                                    role="tab" aria-controls="account-details" aria-selected="false">Account Details</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="account-address-tab" data-toggle="tab" href="#account-address"
                                    role="tab" aria-controls="account-address" aria-selected="false">Address Book</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="account-details-tab" href="{{ route('client.change-password') }}"
                                    aria-controls="account-details" aria-selected="false">Change Password</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="account-logout-tab" href="{{ route('logout') }}" role="tab"
                                    aria-selected="false"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>

                    <div class="col-lg-9">
                        <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                            <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel"
                                aria-labelledby="account-dashboard-tab">
                                <div class="myaccount-dashboard">
                                    <p>Hello <b>{{ Auth::user()->name }}</b></p>
                                    <p>From your account dashboard you can view your order history and edit your account
                                        details.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-orders" role="tabpanel"
                                aria-labelledby="account-orders-tab">
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

                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td><a class="account-order-id" href="javascript:void(0)">#5364</a>
                                                        </td>
                                                        <td>{{ $order->shippingAddress->address ?? '' }}</td>
                                                        <td>{{ $order->payment->amount ?? '' }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->toDateString() }}
                                                        </td>
                                                        <td>
                                                            @if ($order->status == 0)
                                                                Pending
                                                            @elseif($order->status == 1)
                                                                Processing
                                                            @elseif($order->status == 2)
                                                                Shipped
                                                            @elseif($order->status == 3)
                                                                Delivered
                                                            @elseif($order->status == 4)
                                                                Cancelled
                                                            @endif
                                                        </td>

                                                        <td>

                                                            <a href="{{ route('client.order-details', ['id' => $order->id]) }}"
                                                                class="btn btn-sm btn-success"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i></a>
                                                            <a title="Invoice Download"
                                                                href="{{ route('invoice-download', ['id' => $order->id]) }}"
                                                                class="btn btn-sm btn-dark"><i
                                                                    class="fa fa-download"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-address" role="tabpanel"
                                aria-labelledby="account-address-tab">
                                <button class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal">Add
                                    New</button>
                                <div class="myaccount-address">

                                    @foreach ($addresses as $item)
                                        <div class="card">
                                            {{-- <div class="card-header">
                                        Featured
                                    </div> --}}
                                            <div class="card-body">
                                                {{-- <h5 class="card-title">Special title treatment</h5> --}}
                                                <span>Fullname: {{ $item->full_name }}</span><br>
                                                <span>Phone: {{ $item->phone }}</span><br>
                                                <span>Address: {{ $item->address }}</span><br>
                                                @if ($item->default_shipping_address == 1)
                                                    <span class="badge badge-secondary">Default Shipping Address</span>
                                                @endif
                                                @if ($item->default_billing_address == 1)
                                                    <span class="badge badge-secondary">Default Billing Address</span>
                                                @endif
                                                {{-- <p class="card-text">{{$item->full_name}}</p>
                                        <p class="card-text">{{$item->phone}}</p>
                                        <p class="card-text">{{$item->address}}</p> --}}
                                                {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                            </div>
                                        </div>
                                    @endforeach




                                    {{-- <p>The following addresses will be used on the checkout page by default.</p>
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
                                </div> --}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-details" role="tabpanel"
                                aria-labelledby="account-details-tab">
                                <div class="myaccount-details">
                                    <form method="POST" action="{{ route('client.update-profile') }}"
                                        class="uren-form">
                                        @csrf
                                        <div class="uren-form-inner">
                                            <div class="single-input">
                                                <label for="account-details-firstname">Full Name*</label>
                                                <input name="name" value="{{ Auth::user()->name }}" type="text"
                                                    id="account-details-firstname">
                                            </div>

                                            <div class="single-input">
                                                <label for="account-details-email">Email*</label>
                                                <input name="email" value="{{ Auth::user()->email }}" type="email"
                                                    id="account-details-email">
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('address.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="checkbox-form">
                                <h3>Billing Details</h3>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Full Name</label>
                                            <input name="full_name" placeholder="" type="text"
                                                value="{{ Auth::user()->name }}">
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
                                            <select id="region" required class="myniceselect nice-select wide"
                                                name="">
                                                <option value="" selected disabled>Select Region</option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkout-form-list">
                                            <label>City <span class="required">*</span></label>
                                            <select disabled id="city" required class="form-control" name="">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkout-form-list">
                                            <label>Area <span class="required">*</span></label>
                                            <select disabled id="area" required class="form-control" name="area_id">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Address <span class="required">*</span></label>
                                            <input name="address" placeholder="" type="text">
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
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Uren's Account Page Area End Here -->
    </main>

    <script>
        $(function() {
            $('#region').on('change', function(e) {
                var region_id = e.target.value;
                $.ajax({
                    url: `{{ url('get-locations/${region_id}') }}`,
                    type: "GET",

                    success: function(data) {
                        $('#city').prop("disabled", false);
                        $('#area').prop("disabled", true);
                        $('#city').empty();
                        $('#area').empty();
                        $('#city').append('<option value="">Select</option>');
                        $.each(data.locations, function(index, location) {
                            $('#city').append('<option value="' + location.id + '">' +
                                location.name + '</option>');
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
        });
    </script>
@endsection

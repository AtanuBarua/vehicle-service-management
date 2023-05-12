@extends('front.master')

@section('body')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Other</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Login & Register</li>
            </ul>
        </div>
    </div>
</div>
<!-- Uren's Breadcrumb Area End Here -->
<!-- Begin Uren's Login Register Area -->
<div class="uren-login-register_area">
    <div class="container-fluid">
        @if (Session::get('message'))

        <div class="alert alert-primary" role="alert">
            {{Session::get('message')}}
        </div>
        @endif
        <div class="row">

            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">

                <!-- Login Form s-->
                <form action="{{route('client.booking-submit')}}" method="post">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Service Details</h4>
                        <div class="row">
                            <div class="col-md-12 ">
                                <label>Required Service*</label>
                                <select required name="service_id" class="form-control">
                                    <option value="" selected disabled>Select Service</option>
                                    @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4  mt-3">
                                <label>Region</label>
                                <select id="region" required name="region_id" class="form-control">
                                    <option value="" selected disabled>Select Region</option>
                                    @foreach($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>City</label>
                                <select disabled id="city" required name="city_id" class="form-control">
                                </select>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Area</label>
                                <select disabled id="area" required name="area_id" class="form-control">
                                </select>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>Date</label>
                                <input id="date" required min="{{$date}}" type="date" name="date">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>Dropoff Time</label>
                                <select id="time" required name="time" class="form-control">
                                    {{-- <option value="10am - 2pm" selected>10am - 2pm</option>
                                    <option value="2pm - 6pm">2pm - 6pm</option> --}}
                                </select>
                            </div>


                        </div>
                    </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <div class="login-form">
                    <h4 class="login-title">Personal Details</h4>
                    <div class="row">
                        <div class="col-12">
                            <label>Full Name</label>
                            <input required type="text" name="name" value="{{Auth::user()->name}}">
                        </div>

                        <div class="col-md-12">
                            <label>Email Address*</label>
                            <input required type="email" name="email" value="{{Auth::user()->email}}">
                        </div>
                        <div class="col-md-12">
                            <label>Phone*</label>
                            <input required type="text" placeholder="Phone" name="phone">
                        </div>

                        <div class="col-12">
                            <button class="uren-register_btn">Submit</button>
                        </div>
                    </div>
                </div>
                </form>
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
        $('#region').on('change',function(e) {
            var region_id = e.target.value;
            $.ajax({
                url:`{{ url('get-locations/${region_id}') }}`,
                type:"GET",
              
                success:function (data) {
                    $('#city').prop("disabled",false);
                    $('#area').prop("disabled",true);
                    $('#city').empty();
                    $('#area').empty();
                    $('#city').append('<option value="">Select</option>');
                    $.each(data.locations,function(index,location){
                        $('#city').append('<option value="'+location.id+'">'+location.name+'</option>');
                    })
                }
            })
        });

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
</script>

<script>
    $(document).ready(function () {
    $('#date').on('change',function(e) {
        var date = e.target.value;
        $.ajax({
            url:"{{ route('ajax-available-times') }}",
            type:"POST",
            data: {
                _token: "{{ csrf_token() }}",
                date: date
            },
            success:function (data) {
                $('#time').empty();
                if(data.available1){
                    $('#time').append("<option value='10am - 2pm'>10am - 2pm</option>");
                    $('#time').append("<option value='2pm - 6pm'>2pm - 6pm</option>");
                }
                else if(data.available2){
                    $('#time').append("<option value='10am - 2pm'>10am - 2pm</option>");
                }
                else if(data.available3){
                    $('#time').append("<option value='2pm - 6pm'>2pm - 6pm</option>");
                }
                else{
                    $('#time').append("<option value=''>Please select another date</option>");
                }
            }
        })
    });
});
</script>
@endsection
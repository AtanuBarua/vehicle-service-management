@extends('dashboard.master')

@section('body')
<div class="sl-mainpanel">

    @include('dashboard.include.breadcrumb')
    
    <div class="sl-pagebody">
        {{--<div class="sl-page-title">
            <h5>Category List</h5>
            <h3 class="text-center text-danger"> {{Session::get('message')}} </h3>
            
        </div><!-- sl-page-title -->--}}
        
        <div class="card pd-20 pd-sm-40">
            <!-- <h3 class="text-center text-success"> {{Session::get('message')}} </h3> -->
            @if (Session::get('message'))
            <div class="alert alert-success"  role="alert">
                {{Session::get('message')}}
            </div>
            @endif
            @if (Session::get('alert'))
            <div class="alert alert-danger"  role="alert">
                {{Session::get('alert')}}
            </div>
            @endif
            <div class="table-wrapper">
                
                <div class="sl-page-title d-flex justify-content-end">
                    <a type="button" data-toggle="modal" data-target="#exampleModal" href="#" class="btn btn-success">Booking Invoice PDF</a>
                </div>
                <!-- <div class="sl-page-title d-flex justify-content-end">
                </div> -->
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th style="width: 5%; overflow:hidden">SERVICE</th>
                            <th style="width: 5%; overflow:hidden">ADDRESS</th>
                            <th style="width: 5%; overflow:hidden">DROPOFF TIME</th>
                            <th style="width: 5%; overflow:hidden">STATUS</th>
                            <th style="width: 5%; overflow:hidden">TECHNICIAN</th>
                            <th style="width: 5%; overflow:hidden">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($bookings as $booking)
                        <tr>
                            <td style="width: 5%">{{$booking->service->name}}</td>
                            <td style="width: 5%">{{$booking->region->name}} - {{$booking->city->name}}</td>
                            <td style="width: 5%">{{$booking->date}} - {{$booking->time}}</td>
                            {{-- <td style="width: 5%">{{ \Carbon\Carbon::parse($booking->created_at)->toDateString()}}</td> --}}
                            <td style="width: 5%">
                                @if($booking->status==0)
                                <span class="badge bg-warning">Pending</span> 
                                @elseif($booking->status==1)
                                <span class="badge bg-secondary">Accepted</span>
                                @elseif($booking->status==2)
                                <span class="badge bg-primary">Processing</span>
                                @elseif($booking->status==3)
                                <span class="badge bg-dark">Done</span>
                                @elseif($booking->status==4)
                                <span class="badge bg-success">Delivered</span>
                                @elseif($booking->status==5)
                                <span class="badge bg-danger">Cancelled</span>
                                @endif
                            </td>
                            <td style="width: 5%"><a href="{{route('technician.manage')}}">{{($booking->technician) ?$booking->technician->name : ''}}</a></td>
                            <td style="width: 5%">
                                
                                @if($booking->status==0)
                                <a onclick="return confirm('Are you sure to confirm?');" class="btn btn-warning btn-sm" href="{{route('booking.confirm',['booking'=>$booking])}}"><i title="Confirm Booking" class="fa fa-check-square-o" aria-hidden="true"></i>
                                </a>
                                <a onclick="return confirm('Are you sure to cancel?');" class="btn btn-danger btn-sm" href="{{route('booking.cancel',['booking'=>$booking])}}" class="ml-2"><i title="Cancel Booking" class="fa fa-ban" aria-hidden="true"></i></a>
                                @elseif($booking->status==3)
                                <a onclick="return confirm('Process again?');" class="btn btn-danger btn-sm" href="{{route('booking.process-again',['booking'=>$booking])}}"><i title="Process Again" class="fa fa-check-circle" aria-hidden="true"></i>
                                </a>
                                <a onclick="return confirm('Delivery done?');" class="btn btn-success btn-sm" href="{{route('booking.delivered',['booking'=>$booking])}}"><i title="Done Delivery" class="fa fa-check-circle" aria-hidden="true"></i>
                                </a>
                                
                                @endif
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
        
        
        <!-- card -->
        
        <!-- modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Select Dropoff Date</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('booking-invoice-download')}}">
                        @csrf
                        <div class="modal-body">
                            <input type="date" name="date">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
    </div><!-- sl-pagebody -->
    @include('admin.include.footer')
</div>
@endsection
@section('scripts')
<script src="{{asset('/')}}admin/assets/lib/jquery/jquery.js"></script>
<script src="{{asset('/')}}admin/assets/lib/popper.js/popper.js"></script>
{{--<script src="{{asset('/')}}admin/assets/lib/bootstrap/bootstrap.js"></script>--}}
<script src="{{asset('/')}}admin/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="{{asset('/')}}admin/assets/lib/highlightjs/highlight.pack.js"></script>
<script src="{{asset('/')}}admin/assets/lib/datatables/jquery.dataTables.js"></script>
<script src="{{asset('/')}}admin/assets/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="{{asset('/')}}admin/assets/lib/select2/js/select2.min.js"></script>

<script>
    $(function () {
        'use strict';
        
        $('#datatable1').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });
        
        $('#datatable2').DataTable({
            bLengthChange: false,
            searching: false,
            responsive: true
        });
        
        // Select2
        $('.dataTables_length select').select2({minimumResultsForSearch: Infinity});
        
    });
</script>
@endsection


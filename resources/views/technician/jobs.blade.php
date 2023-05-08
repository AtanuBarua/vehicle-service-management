@extends('technician.master')
@section('body')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Dashboard</a>
        <span class="breadcrumb-item active">Manage Jobs</span>
    </nav>
    
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
                <!-- <div class="sl-page-title d-flex justify-content-end">
                </div> -->
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th>SERVICE</th>
                            <th>ADDRESS</th>
                            <th>DROPOFF TIME</th>
                            <th>NAME</th>
                            <th>PHONE</th>
                            <th>STATUS</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($jobs as $job)
                        <tr>
                            <td>{{$job->service_name}}</td>
                            <td>{{$job->region_name}} - {{$job->city_name}}</td>
                            <td>{{$job->date}} - {{$job->time}}</td>
                            <td>{{$job->name}}</td>
                            <td>{{$job->phone}}</td>
                            <td>
                                @if($job->status==1)
                                <span class="badge bg-warning">Pending</span> 
                                @elseif($job->status==2)
                                <span class="badge bg-primary">Processing</span>
                                @elseif($job->status==3)
                                <span class="badge bg-dark">Done</span>
                                @elseif($job->status==4)
                                <span class="badge bg-success">Delivered</span>
                                @else
                                <span class="badge bg-danger">Cancelled</span>
                                @endif
                            </td>
                            <td>
                                
                                @if($job->status==1)
                                <a onclick="return confirm('Start processing?');" class="btn btn-warning btn-sm" href="{{route('process-booking',['id'=>$job->id])}}"><i title="Start Processing" class="fa fa-check-square-o" aria-hidden="true"></i>
                                </a>
                                @elseif($job->status==2)
                                <a onclick="return confirm('Servicing done?');" class="btn btn-success btn-sm" href="{{route('done-booking',['id'=>$job->id])}}"><i title="Servicing Done" class="fa fa-check-circle" aria-hidden="true"></i>
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
        
        
    </div><!-- sl-pagebody -->
    @include('technician.include.footer')
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
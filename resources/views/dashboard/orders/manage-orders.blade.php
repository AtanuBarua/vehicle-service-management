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
            <div class="alert alert-success" role="alert">
              {{Session::get('message')}}
          </div>
          @endif

            <div class="table-wrapper">
                <!-- <div class="sl-page-title d-flex justify-content-end">
                </div> -->
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <!-- <th>Email</th> -->
                        <th>Phone</th>
                        <th>Amount</th>
                        {{-- <th>Payment</th> --}}
                        <th>Address</th>
                        <th>Status</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->user->name}}</td>
                            <!-- <td>{{$order->user->email}}</td> -->
                            <td>{{$order->user->phone ?? '-'}}</td>
                            <td>{{$order->amount}}</td>
                            {{-- <td>{{$order->payment}}</td> --}}
                            <td>{{substr($order->address,0,20)}}</td>
                            <td>
                                @if($order->status==\app\Order::ORDER_PENDING)
                                Pending
                                @elseif($order->status==\app\Order::ORDER_PROCESSING)
                                Processing
                                @elseif($order->status==\app\Order::ORDER_SHIPPED)
                                Shipped
                                @elseif($order->status==\app\Order::ORDER_DELIVERED)
                                Delivered
                                @elseif($order->status==\app\Order::ORDER_CANCELLED)
                                Cancelled
                                @endif
                            </td>
                            <td>
                                <a href="{{route('manage-order-details',['id'=>$order->id])}}">Details</a>
                            </td>
                            <td>
                                @if($order->status==0)
                                <a title="Process Order" onclick="return confirm('Are you sure to change status to processing?');" href="{{route('order.process',['order'=>$order])}}"  class="btn btn-sm btn-warning"><i style="color:black;" class="fa fa-check-square-o" aria-hidden="true"></i></a>
                                <a title="Cancel Order" onclick="return confirm('Are you sure to change status to cancelled?');" href="{{route('order.cancel',['order'=>$order])}}"  class="btn btn-sm btn-danger"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                @elseif($order->status==1)
                                <a title="Order Shipped" onclick="return confirm('Are you sure to change status to shipped?');" href="{{route('order.ship',['order'=>$order])}}"  class="btn btn-sm btn-primary"><i class="fa fa-check-circle" aria-hidden="true"></i></a>
                                @elseif($order->status==2)
                                <a title="Order Delivered" onclick="return confirm('Are you sure to change status to delivered?');" href="{{route('order.deliver',['order'=>$order])}}"  class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true"></i></a>
                                @endif
                                <a title="Invoice Download" href="{{ route('admin-invoice-download',['id'=>$order->id]) }}" class="btn btn-sm btn-dark"><i class="fa fa-download" ></i></a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->

        <!-- card -->

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


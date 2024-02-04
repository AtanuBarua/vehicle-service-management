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
            <h3 class="text-center text-success"> {{Session::get('message')}} </h3>

            <div class="table-wrapper">
                <div class="sl-page-title d-flex justify-content-end">
                    <a type="button" href="{{route('product.create')}}" class="btn btn-success">Add Product</a>
                </div>
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Regular Price</th>
                            <th>Discount Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->category->name}}</td>
                            <td>{{substr($product->name,0,20).'...'}}</td>
                            <td><img loading="lazy" src="{{$product->image}}?random={{$i}}" height="70"></td>
                            <td>{{$product->regular_price}}</td>
                            <td>{{$product->discount_price}}</td>
                            <td>{{$product->stock}}</td>
                            <td>{{$product->status == 1 ? 'Shown' : 'Hidden'}}</td>
                            <td>
                                <a title="Edit" href="{{route('product.edit',['product'=>$product])}}"
                                    class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a title="Delete" href="#" id="{{$product->id}}" class="btn btn-sm btn-danger" onclick="event.preventDefault();
                                       var check = confirm('Are you sure you want to delete?');
                                       if(check){
                                       document.getElementById('deleteProductForm'+'{{$product->id}}').submit();
                                       }"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                <form id="deleteProductForm{{$product->id}}"
                                    action="{{route('product.destroy',['product'=>$product])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>

                        </tr>
                        @php($i++)
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

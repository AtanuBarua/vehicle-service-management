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
            @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{Session::get('message')}}
            </div>
            @endif
            @if (Session::has('danger'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('danger')}}
            </div>
            @endif


            <div class="table-wrapper">
                <form action="{{route('product.index')}}" method="get">
                    <div class="sl-page-title d-flex justify-content-between align-items-center">
                        <div class=" d-flex col-10">
                                <input value="{{$search['name'] ?? ''}}" name="name" type="text" class="form-control col-4" placeholder="Product Name">
                                <select name="category_id" id="" class="form-control ml-2 col-2">
                                    <option value="">Category</option>
                                    @foreach ($categories as $item)
                                        <option {{$search['category_id'] == $item->id ? 'selected': ''}} value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <select name="status" id="" class="form-control ml-2 col-2">
                                    <option value="">Status</option>
                                    <option {{$search['status'] == '1' ? 'selected': ''}} value="1">Shown</option>
                                    <option {{$search['status'] == '0' ? 'selected': ''}} value="0">Hidden</option>
                                </select>
                                <input value="{{$search['min_price'] ?? ''}}" name="min_price" type="text" class="form-control col-2 ml-2" placeholder="Min Price">
                                <input value="{{$search['max_price'] ?? ''}}" name="max_price" type="text" class="form-control col-2 ml-2" placeholder="Max Price">

                                <button type="submit" class="btn btn-primary ml-2">Search</button>
                                <a class="ml-3" href="{{route('product.index')}}">Reset Result</a>
                        </div>
                    </div>
                </form>

                <div class="d-flex justify-content-between">
                    <div class="">
                        <form action="{{route('export-products')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary ml-3">Export</button>
                        </form>
                    </div>

                    <div class="col-5">
                        <form action="{{route('import-products')}}" method="POST" enctype="multipart/form-data" class="d-flex">
                            {{-- <div class="row"> --}}
                                    @csrf
                                    <input required type="file" name="products" class="form-control">
                                    <button type="submit" class="btn btn-primary ml-3">Bulk Upload</button>
                                {{-- </div> --}}
                            </form>
                    </div>
                    <a type="button" href="{{route('product.create')}}" class="btn btn-success col-2">Add Product</a>
                </div>

                <table id="" class="table display responsive nowrap mt-2">
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
                        @if (count($products) > 0)
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
                        @else
                        <h4 class="text-danger text-center">No data found</h4>
                        @endif
                    </tbody>
                </table>
                {{$products->links()}}
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
{{-- <script src="{{asset('/')}}admin/assets/lib/datatables/jquery.dataTables.js"></script> --}}
{{-- <script src="{{asset('/')}}admin/assets/lib/datatables-responsive/dataTables.responsive.js"></script> --}}
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

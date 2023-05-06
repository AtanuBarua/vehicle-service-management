@extends('admin.master')

@section('body')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
        <span class="breadcrumb-item active">Manage Category</span>
    </nav>

    <div class="sl-pagebody">
        {{--<div class="sl-page-title">
            <h5>Category List</h5>
            <h3 class="text-center text-danger"> {{Session::get('message')}} </h3>
        </div><!-- sl-page-title -->--}}

        <div class="card pd-20 pd-sm-40">
            <h3 class="text-center text-success"> {{Session::get('message')}} </h3>

            <div class="table-wrapper">
                <div class="sl-page-title d-flex justify-content-end">
                    <a type="button" href="{{route('brand.create')}}" class="btn btn-success">Add Brand</a>
                </div>
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Image</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-15p">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{$brand->name}}</td>
                            <td><img src="{{$brand->image}}" height="70"></td>
                            <td>{{$brand->status == 1 ? 'Active' : 'Inactive'}}</td>
                            <td>
                                <a title="Edit" href="{{route('brand.edit',['id'=>$brand->id])}}"
                                    class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a title="Delete" href="#" id="{{$brand->id}}" class="btn btn-danger" onclick="event.preventDefault();
                                       var check = confirm('Are you sure you want to delete?');
                                       if(check){
                                       document.getElementById('deleteBrandForm'+'{{$brand->id}}').submit();
                                       }"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                <form id="deleteBrandForm{{$brand->id}}" action="{{route('brand.destroy',['id'=>$brand->id])}}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{$brand->id}}">
                                </form>

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
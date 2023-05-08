@extends('dashboard.master')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@section('body')
<div class="sl-mainpanel">
    
    @include('dashboard.include.breadcrumb')

    <div class="sl-pagebody">
        {{--<div class="sl-page-title">
            <h5>Category List</h5>
            <h3 class="text-center text-danger"> {{Session::get('message')}} </h3>
        </div><!-- sl-page-title -->--}}

        <div class="card pd-20 pd-sm-40">
            {{-- <h3 class="text-center text-success"> {{Session::get('message')}} </h3> --}}

            @if (Session::get('message'))
            <div class="alert alert-success" role="alert">
                {{Session::get('message')}}
            </div>
            @endif
            @if (Session::get('alert'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('alert')}}
            </div>
            @endif

            <div class="table-wrapper">
                {{-- <div class="sl-page-title d-flex justify-content-end">
                    <a type="button" href="{{route('add-product')}}" class="btn btn-success">Add Product</a>
                </div> --}}
                <div class="sl-page-title d-flex justify-content-end">
                    {{-- <a type="button" href="{{route('category.create')}}" class="btn btn-success">Create
                        Technician</a> --}}
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newTechnicianModal">
                        Create Technician
                    </button>
                </div>
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Branch</th>
                            <th>Availability</th>
                            <th>Slot</th>
                            <th>Queue</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($technicians as $technician)
                        <tr>
                            <td>{{$technician->name}}</td>
                            <td>{{$technician->email}}</td>
                            <td>{{$technician->region}} - {{$technician->city}}</td>
                            <td>{{$technician->availability == 1 ? 'Available' : 'Unavailable'}}</td>
                            <td><a href="#" technician-id="{{$technician->id}}" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">{{$technician->slot}}</a></td>
                            <td>{{$technician->queue}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->


        <!-- card -->

    </div><!-- sl-pagebody -->

    {{-- create new technician modal --}}
    <div class="modal fade" id="newTechnicianModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width:550px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('technician.create')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input name="name" type="text" class="form-control" id=""
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input name="phone" type="number" class="form-control" id="" aria-describedby="emailHelp">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Slot</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('technician.update-slot')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input id="technicianId" type="hidden" name="id">
                        <input name="slot" type="number" max="10" min="3">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
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
<script>
    $("a").on('click', function(){
        $("#technicianId").val($(this).attr('technician-id'));
        $("input[name='slot']").val($(this).html());
    })
</script>
@endsection
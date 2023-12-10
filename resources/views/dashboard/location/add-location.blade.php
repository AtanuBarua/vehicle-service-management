@extends('dashboard.master')


@section('body')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('dashboard')}}">Dashboard</a>
        <span class="breadcrumb-item active">Add Location</span>
    </nav>

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h3 class="text-center text-success"> {{Session::get('message')}} </h3>

            <form action="{{route('location.store')}}" method="post" class="form-horizontal">
                @csrf
                <div class="form-layout">

                    <div class="mg-b-25">
                        <div class=" row col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Parent: </label><br>
                                <select name="parent_id" class="form-control select2 ">
                                    <option value="">Select</option>
                                    @foreach ($locations as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class=" row col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input class="form-control" type="text" name="name">
                            </div>
                        </div>

                        <div class=" row col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Type: <span class="tx-danger">*</span></label>
                                @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <select name="type" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="region">Region</option>
                                    <option value="city">City</option>
                                    <option value="area">Area</option>
                                </select>
                            </div>
                        </div>


                    </div><!-- col-4 -->

                </div><!-- row -->

                <div class="form-group form-layout-footer">
                    <input type="submit" class="btn btn-info mg-r-5" value="Submit">
                </div><!-- form-layout-footer -->
            </form>
        </div><!-- form-layout -->
    </div><!-- card -->

    <!-- row -->

    <!-- card -->

    <!-- sl-pagebody -->
    @include('admin.include.footer')
</div>
@endsection
<script src="{{asset('/')}}admin/assets/lib/jquery/jquery.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
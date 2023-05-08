@extends('dashboard.master')


@section('body')
<div class="sl-mainpanel">
    
    @include('dashboard.include.breadcrumb')

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h3 class="text-center text-success"> {{Session::get('message')}} </h3>

            <form action="{{route('service.store')}}" method="post" class="form-horizontal"
                enctype="multipart/form-data">
                @csrf
                <div class="form-layout">


                    <div class="mg-b-25">
                        <div class=" row col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Service Name: <span class="tx-danger">*</span></label>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input class="form-control" type="text" name="name">
                            </div>
                        </div>

                        <div class="row col-lg-4 mt-3">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Status: <span class="tx-danger">*</span></label>

                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="col-md-9 radio">
                                    <label> <input type="radio" name="status" value="1">
                                        Show </label>
                                    <label> <input type="radio" name="status" value="0">
                                        Hide </label>
                                </div>

                            </div>
                        </div>
                    </div><!-- col-4 -->

                </div><!-- row -->

                <div class="form-group form-layout-footer">
                    <input type="submit" class="btn btn-info mg-r-5" value="Submit Form">
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
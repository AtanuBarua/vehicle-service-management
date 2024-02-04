@extends('dashboard.master')


@section('body')
<div class="sl-mainpanel">

    @include('dashboard.include.breadcrumb')

    <div class="sl-pagebody">
        {{--<div class="sl-page-title">
            <h5>Add Category</h5>
        </div><!-- sl-page-title -->--}}

        <div class="card pd-20 pd-sm-40">
            <h3 class="text-center text-success"> {{Session::get('message')}} </h3>

            <form action="{{route('category.update',['category'=>$category])}}" method="post" class="form-horizontal"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-layout">

                    <div class="mg-b-25">
                        <div class=" row col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Category Name: <span
                                        class="tx-danger">*</span></label>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input class="form-control" type="text" name="name" value="{{$category->name}}">
                                <input type="hidden" name="id" class="form-control" value="{{$category->id}}">
                            </div>
                        </div>

                        <div class=" row col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Category Image: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="category_image">
                                <br>
                                <img src="{{asset($category->image)}}" alt="" height="100" width="120">

                            </div>
                        </div>

                        <div class="row col-lg-4 mt-3">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Status: <span class="tx-danger">*</span></label>

                                <div class="col-md-9 radio">
                                    @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label> <input type="radio" {{$category->status==1 ? 'checked' : '' }}
                                        name="status" value="1"> Active </label>
                                    <label> <input type="radio" {{$category->status==0 ? 'checked' : '' }}
                                        name="status" value="0"> Inactive </label>
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

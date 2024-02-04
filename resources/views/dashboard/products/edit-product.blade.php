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

            <form name="editProductForm" action="{{route('product.update',['product'=>$product->id])}}" method="post"
                class="form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input required class="form-control" type="hidden" name="id" value="{{$product->id}}">
                <div class="form-layout">


                    <div class="mg-b-25">
                        <div class=" row col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class=" row col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                @error('brand_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <select name="brand_id" class="form-control">
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class=" row col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input class="form-control" type="text" name="name" value="{{$product->name}}">
                            </div>
                        </div>
                        <div class=" row col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Description: <span
                                        class="tx-danger">*</span></label>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <textarea class="form-control" cols="70" name="description">{{$product->description}}</textarea>
                            </div>
                        </div>


                        <div class=" row col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Image: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="image">
                                <br>
                                <img src="{{asset($product->image)}}" alt="" height="100" width="120">
                            </div>
                        </div>
                        <div class=" row col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Regular Price: <span
                                        class="tx-danger">*</span></label>
                                @error('regular_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input class="form-control" type="number" name="regular_price"
                                    value="{{$product->regular_price}}">
                            </div>
                        </div>
                        <div class=" row col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Discount Price: </label>
                                <input class="form-control" type="number" name="discount_price"
                                    value="{{$product->discount_price}}" placeholder="Not mandatory">
                            </div>
                        </div>
                        <div class=" row col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Stock: <span class="tx-danger">*</span></label>
                                @error('stock')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input class="form-control" type="number" name="stock" value="{{$product->stock}}">
                            </div>
                        </div>

                        <div class="row col-lg-4 mt-3">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Availability: <span class="tx-danger">*</span></label>

                                @error('availability')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="col-md-9 radio">
                                    <label> <input type="radio" {{$product->availability == 1 ? 'checked' : ''}}
                                        name="availability" value="1"> Yes </label>
                                    <label> <input type="radio" {{$product->availability == 0 ? 'checked' : ''}}
                                        name="availability" value="0"> No </label>
                                </div>

                            </div>
                        </div>

                        <div class="row col-lg-4 mt-3">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Status: <span class="tx-danger">*</span></label>

                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="col-md-9 radio">
                                    <label> <input type="radio" {{$product->status == 1 ? 'checked' : ''}} name="status"
                                        value="1"> Shown </label>
                                    <label> <input type="radio" {{$product->status == 0 ? 'checked' : ''}} name="status"
                                        value="0"> Hidden </label>
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

<script>
    document.forms['editProductForm'].elements['category_id'].value = '{{ $product->category_id }}'
                                            document.forms['editProductForm'].elements['brand_id'].value = '{{ $product->brand_id }}'
</script>
@endsection

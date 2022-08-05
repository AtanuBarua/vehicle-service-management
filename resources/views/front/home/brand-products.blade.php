@extends('front.master')

@section('body')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Brand Products</h2>
            <ul>
                <li><a href="{{route('/')}}">Home</a></li>
                <li class="active">Brand Products</li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-content_wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- <div class="shop-toolbar">
                    <div class="product-view-mode">
                        <a class="grid-1" data-target="gridview-1" data-toggle="tooltip" data-placement="top" title="1">1</a>
                        <a class="grid-2" data-target="gridview-2" data-toggle="tooltip" data-placement="top" title="2">2</a>
                        <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="3">3</a>
                        <a class="grid-4" data-target="gridview-4" data-toggle="tooltip" data-placement="top" title="4">4</a>
                        <a class="grid-5" data-target="gridview-5" data-toggle="tooltip" data-placement="top" title="5">5</a>
                        <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top" title="List"><i class="fa fa-th-list"></i></a>
                    </div>
                    <div class="product-item-selection_area">
                        <div class="product-short">
                            <label class="select-label">Short By:</label>
                            <select class="myniceselect nice-select">
                                <option value="1">Default</option>
                                <option value="2">Name, A to Z</option>
                                <option value="3">Name, Z to A</option>
                                <option value="4">Price, low to high</option>
                                <option value="5">Price, high to low</option>
                                <option value="5">Rating (Highest)</option>
                                <option value="5">Rating (Lowest)</option>
                                <option value="5">Model (A - Z)</option>
                                <option value="5">Model (Z - A)</option>
                            </select>
                        </div>
                        <div class="product-showing">
                            <label class="select-label">Show:</label>
                            <select class="myniceselect short-select nice-select">
                                <option value="1">15</option>
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="1">3</option>
                                <option value="1">4</option>
                            </select>
                        </div>
                    </div>
                </div> -->
                <div class="shop-product-wrap grid gridview-3 listfullwidth img-hover-effect_area row">
                    
                    @php($i=1)
                    @foreach($products as $product)
                    <div class="col-lg-4">
                        <div class="product-slide_item">
                            <div class="inner-slide">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{route('single-product',['slug'=>$product->slug])}}">
                                            @if(str_contains($product->image,'product-images'))
                                            <img class="primary-img" src="{{asset($product->image)}}" alt="Uren's Product Image">
                                            <img class="secondary-img" src="{{asset($product->image)}}" alt="Uren's Product Image">
                                            
                                            @else
                                            <img class="primary-img" src="{{asset($product->image)}}?random=<?php echo $i ?>" alt="Uren's Product Image">
                                            <img class="secondary-img" src="{{asset($product->image)}}?random=<?php echo $i ?>" alt="Uren's Product Image">
                                            @endif
                                        </a>
                                        <div class="sticker-area-2">
                                            <span class="sticker-2">-20%</span>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="add-actions">
                                            <ul>
                                                <li>
                                                    <form action="{{route('add-to-cart')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$product->id}}">
                                                        <input type="hidden" id="quantity" name="qty" value="1">
                                                        @if($product->discount_price)
                                                        <input type="hidden" name="price" value="{{$product->discount_price}}">
                                                        @else
                                                        <input type="hidden" name="price" value="{{$product->regular_price}}">
                                                        @endif
                                                        <button onclick="addToCart({{$product->id}})" type="submit" class="btn btn-success mt-2 uren-add_cart"><i
                                                            class="ion-bag"></i> Add to cart <i
                                                            class="ion-bag"></i></button>
                                                        </form>
                                                        <!-- <a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                                            class="ion-bag"></i></a> -->
                                                        </li>
                                                        <!-- <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                            class="ion-android-favorite-outline"></i></a>
                                                        </li>
                                                        <li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                            class="ion-android-options"></i></a>
                                                        </li> -->
                                                        <!-- <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                            class="ion-android-open"></i></a></li> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-desc_info">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h6><a class="product-name" href="single-product.html">{{$product->name}}</a></h6>
                                                        @if($product->discount_price)
                                                        <div class="price-box">
                                                            <span class="new-price new-price-2">{{$product->discount_price}} bdt</span>
                                                            <span class="old-price">{{$product->regular_price}} bdt</span>
                                                        </div>
                                                        @else
                                                        <div class="price-box">
                                                            <span class="new-price">{{$product->regular_price}} bdt</span>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-slide_item">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="single-product.html">
                                                    <img class="primary-img" src="{{asset($product->image)}}" alt="Uren's Product Image">
                                                    <img class="secondary-img" src="{{asset($product->image)}}" alt="Uren's Product Image">
                                                </a>
                                                <div class="sticker-area-2">
                                                    <span class="sticker-2">-20%</span>
                                                    <span class="sticker">New</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-desc_info">
                                                    <div class="rating-box">
                                                        <ul>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li><i class="ion-android-star"></i></li>
                                                            <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            <li class="silver-color"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <h6><a class="product-name" href="single-product.html">{{$product->name}}</a></h6>
                                                    <div class="price-box">
                                                        <span class="new-price new-price-2">$194.00</span>
                                                        <span class="old-price">$241.00</span>
                                                    </div>
                                                    <div class="product-short_desc">
                                                        <p>The invention relates to an electromechanical brake booster with an
                                                            electric motor and a helical gearing. The brake booster is used for
                                                            coupling an auxiliary force via a driver into a piston rod. The
                                                            invention proposes connecting a spindle of the helical gearing
                                                            elastically via a spring element to the piston rod such that, in the
                                                            event of rapid actuation of the brake, the helical gearing and a rotor
                                                            of the electric motor do not have to be accelerated entirely muscle
                                                            power. The muscle power required for actuating a brake is reduced as a
                                                            result in the event of a rapid actuation of the brake.</p>
                                                        </div>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul>
                                                            <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                            </li>
                                                            <!-- <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                                class="ion-android-favorite-outline"></i></a>
                                                            </li>
                                                            <li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                                class="ion-android-options"></i></a>
                                                            </li> -->
                                                            <!-- <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                                class="ion-android-open"></i></a>
                                                            </li> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php($i++)
                                    @endforeach
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="uren-paginatoin-area">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    {{  $products->appends(Request::all())->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <!-- <div class="row">
                                    <div class="col-lg-12">
                                        <div class="uren-paginatoin-area">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <ul class="uren-pagination-box primary-color">
                                                        <li class="active"><a href="javascript:void(0)">1</a></li>
                                                        <li><a href="javascript:void(0)">2</a></li>
                                                        <li><a href="javascript:void(0)">3</a></li>
                                                        <li><a href="javascript:void(0)">4</a></li>
                                                        <li><a href="javascript:void(0)">5</a></li>
                                                        <li><a class="Next" href="javascript:void(0)">Next</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Uren's Shop Grid Fullwidth  Area End Here -->
                @endsection
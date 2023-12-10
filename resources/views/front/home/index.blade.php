@extends('front.master')

@section('body')
<!-- Begin Popular Search Area -->
<div class="popular-search_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="popular-search">
                    <!-- <label>Popular Search:</label> -->
                    <!-- <a href="javascript:void(0)">Brakes & Rotors,</a>
                        <a href="javascript:void(0)">Lighting,</a>
                        <a href="javascript:void(0)">Perfomance,</a>
                        <a href="javascript:void(0)">Wheels & Tires</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Popular Search Area End Here -->

<div class="uren-slider_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-slider slider-navigation_style-2">
                    <!-- Begin Single Slide Area -->
                    <div class="single-slide animation-style-01 bg-1">
                        <div class="slider-content">
                            <span>New thinking new possibilities</span>
                            <h3>Car interior</h3>
                            <h4>Starting at <span>$99.00</span></h4>
                            <div class="uren-btn-ps_left slide-btn">
                                <a class="uren-btn" href="shop-left-sidebar.html">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Slide Area End Here -->
                    <!-- Begin Single Slide Area -->
                    <div class="single-slide animation-style-02 bg-2">
                        <div class="slider-content slider-content-2">
                            <span class="primary-text_color">Car, Truck, CUV &amp; SUV Tires</span>
                            <h3>Wheels &amp; Tires</h3>
                            <h4>Sale up to 20% off</h4>
                            <div class="uren-btn-ps_left slide-btn">
                                <a class="uren-btn" href="shop-left-sidebar.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Begin Uren's Shipping Area -->
<div class="uren-shipping_area">
    <div class="container-fluid">
        <div class="shipping-nav">
            <div class="row no-gutters">
                <div class="shipping-grid">
                    <div class="shipping-item">
                        <div class="shipping-icon">
                            <i class="ion-ios-paperplane-outline"></i>
                        </div>
                        <div class="shipping-content">
                            <h6>Free Shipping</h6>
                            <p>Free shipping on all US order</p>
                        </div>
                    </div>
                </div>
                <div class="shipping-grid">
                    <div class="shipping-item">
                        <div class="shipping-icon">
                            <i class="ion-ios-help-outline"></i>
                        </div>
                        <div class="shipping-content">
                            <h6>Support 24/7</h6>
                            <p>Contact us 24 hours a day</p>
                        </div>
                    </div>
                </div>
                <div class="shipping-grid">
                    <div class="shipping-item">
                        <div class="shipping-icon">
                            <i class="ion-ios-refresh-empty"></i>
                        </div>
                        <div class="shipping-content">
                            <h6>100% Money Back</h6>
                            <p>You have 30 days to Return</p>
                        </div>
                    </div>
                </div>
                <div class="shipping-grid">
                    <div class="shipping-item">
                        <div class="shipping-icon">
                            <i class="ion-ios-undo-outline"></i>
                        </div>
                        <div class="shipping-content">
                            <h6>90 Days Return</h6>
                            <p>If goods have problems</p>
                        </div>
                    </div>
                </div>
                <div class="shipping-grid">
                    <div class="shipping-item">
                        <div class="shipping-icon">
                            <i class="ion-ios-locked-outline"></i>
                        </div>
                        <div class="shipping-content last-child">
                            <h6>Payment Secure</h6>
                            <p>We ensure secure payment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Uren's Shipping Area End Here -->

<!-- Begin Uren's Product Area -->
<div class="uren-product_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title_area">
                    <span>Top New On This Week</span>
                    <h3>New Arrivals Products</h3>
                </div>
                <div class="product-slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area"
                    data-slick-options='{
                        "slidesToShow": 6,
                        "arrows" : true
                    }' data-slick-responsive='[
                    {"breakpoint":1501, "settings": {"slidesToShow": 4}},
                    {"breakpoint":1200, "settings": {"slidesToShow": 3}},
                    {"breakpoint":992, "settings": {"slidesToShow": 2}},
                    {"breakpoint":767, "settings": {"slidesToShow": 1}},
                    {"breakpoint":480, "settings": {"slidesToShow": 1}}
                    ]'>

                    @php($i=1)
                    @foreach($newProducts as $product)
                    <div class="product-slide_item">
                        <div class="inner-slide">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="{{route('single-product',['slug'=>$product->slug])}}">

                                        @if(str_contains($product->image,'product-images'))
                                        <img loading="lazy" class="primary-img" src="{{asset($product->image)}}"
                                            alt="Uren's Product Image">
                                        <img loading="lazy" class="secondary-img" src="{{asset($product->image)}}"
                                            alt="Uren's Product Image">

                                        @else
                                        <img loading="lazy" class="primary-img"
                                            src="{{asset($product->image)}}?random=<?php echo $i ?>"
                                            alt="Uren's Product Image">
                                        <img loading="lazy" class="secondary-img"
                                            src="{{asset($product->image)}}?random=<?php echo $i ?>"
                                            alt="Uren's Product Image">
                                        @endif

                                    </a>
                                    @if($product->availability==1)
                                    <div class="sticker">

                                        <span class="sticker">New</span>


                                    </div>
                                    @else
                                    <div class="sticker-area-2">
                                        <span class="sticker-2">Unavailable</span>

                                    </div>
                                    @endif

                                    @if($product->availability==1)
                                    <div class="add-actions">
                                        <ul>
                                            <li>
                                                <form action="{{route('add-to-cart')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" id="productId" name="id"
                                                        value="{{$product->id}}">
                                                    <input type="hidden" id="quantity" name="qty" value="1">
                                                    @if($product->discount_price)
                                                    <input type="hidden" name="price"
                                                        value="{{$product->discount_price}}">
                                                    @else
                                                    <input type="hidden" name="price"
                                                        value="{{$product->regular_price}}">
                                                    @endif
                                                    <button class="mt-2 btn btn-success btn-sm"
                                                        onclick="addToCart({{$product->id}})" type="submit"
                                                        class="uren-add_cart btn btn-sm"><i class="ion-bag"></i> Add to
                                                        Cart <i class="ion-bag"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <h6><a class="product-name"
                                                href="{{route('single-product',['slug'=>$product->slug])}}">{{$product->name}}</a>
                                        </h6>

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
                    @php($i++)
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
<!-- Uren's Product Area End Here -->


<!-- Begin Uren's Product Area -->
<div class="uren-product_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title_area">
                    <span>Top Products of Uren</span>
                    <h3>Best Selling Products</h3>
                </div>
                <div class="product-slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area"
                    data-slick-options='{
                        "slidesToShow": 6,
                        "arrows" : true
                    }' data-slick-responsive='[
                    {"breakpoint":1501, "settings": {"slidesToShow": 4}},
                    {"breakpoint":1200, "settings": {"slidesToShow": 3}},
                    {"breakpoint":992, "settings": {"slidesToShow": 2}},
                    {"breakpoint":767, "settings": {"slidesToShow": 1}},
                    {"breakpoint":480, "settings": {"slidesToShow": 1}}
                    ]'>

                    @php($i=10)
                    @foreach($topProducts as $product)
                    <div class="product-slide_item">
                        <div class="inner-slide">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="{{route('single-product',['slug'=>$product->slug])}}">

                                        @if(str_contains($product->image,'product-images'))
                                        <img loading="lazy" class="primary-img" src="{{asset($product->image)}}"
                                            alt="Uren's Product Image">
                                        <img loading="lazy" class="secondary-img" src="{{asset($product->image)}}"
                                            alt="Uren's Product Image">

                                        @else
                                        <img loading="lazy" class="primary-img"
                                            src="{{asset($product->image)}}?random=<?php echo $i ?>"
                                            alt="Uren's Product Image">
                                        <img loading="lazy" class="secondary-img"
                                            src="{{asset($product->image)}}?random=<?php echo $i ?>"
                                            alt="Uren's Product Image">
                                        @endif

                                    </a>
                                    @if($product->availability==0)
                                    <div class="sticker-area-2">
                                        <span class="sticker-2">Unavailable</span>

                                    </div>
                                    @endif

                                    @if($product->availability==1)
                                    <div class="add-actions">
                                        <ul>
                                            <li>
                                                <form action="{{route('add-to-cart')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" id="productId" name="id"
                                                        value="{{$product->id}}">
                                                    <input type="hidden" id="quantity" name="qty" value="1">
                                                    @if($product->discount_price)
                                                    <input type="hidden" name="price"
                                                        value="{{$product->discount_price}}">
                                                    @else
                                                    <input type="hidden" name="price"
                                                        value="{{$product->regular_price}}">
                                                    @endif
                                                    <button class="mt-2 btn btn-success btn-sm"
                                                        onclick="addToCart({{$product->id}})" type="submit"
                                                        class="uren-add_cart btn btn-sm"><i class="ion-bag"></i> Add to
                                                        Cart <i class="ion-bag"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <h6><a class="product-name"
                                                href="{{route('single-product',['slug'=>$product->slug])}}">{{$product->name}}</a>
                                        </h6>

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
                    @php($i++)
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
<!-- Uren's Product Area End Here -->

<!-- Begin Featured Categories Area -->
<div class="featured-categories_area">
    <div class="container-fluid">
        <div class="section-title_area">
            <span>Top Featured Collections</span>
            <h3>Featured Categories</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="featured-categories_slider uren-slick-slider slider-navigation_style-1" data-slick-options='{
                        "slidesToShow": 4,
                        "spaceBetween": 30,
                        "arrows" : true
                    }' data-slick-responsive='[
                    {"breakpoint":1599, "settings": {"slidesToShow": 3}},
                    {"breakpoint":1200, "settings": {"slidesToShow": 2}},
                    {"breakpoint":768, "settings": {"slidesToShow": 1}}
                    ]'>

                    @foreach($categories as $category)
                    <div class="slide-item">
                        <div class="slide-inner">
                            <div class="slide-image_area">
                                <a href="{{route('category-products',['slug'=>$category->slug])}}">
                                    <img loading="lazy" src="{{asset($category->image)}}"
                                        alt="Uren's Featured Categories">
                                </a>
                            </div>
                            <div class="slide-content_area">
                                <h3><a
                                        href="{{route('category-products',['slug'=>$category->slug])}}">{{$category->name}}</a>
                                </h3>
                                <!-- <span>(8 Products)</span> -->
                                <ul class="product-item">
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i>
                                            Accessories</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Auto GPS
                                            Units</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Fitness GPS
                                            Units</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Handheld GPS
                                            Units</a>
                                    </li>
                                </ul>
                                <div class="uren-btn-ps_left">
                                    <a class="uren-btn"
                                        href="{{route('category-products',['slug'=>$category->slug])}}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featured Categories Area End Here -->


<!-- Begin Uren's Product Area -->
<div class="uren-product_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title_area">
                    <span>Popular Products in Bodkits</span>
                    <h3>Best Selling Products in Bodykits</h3>
                </div>
                <div class="product-slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area"
                    data-slick-options='{
                    "slidesToShow": 6,
                    "arrows" : true
                }' data-slick-responsive='[
                {"breakpoint":1501, "settings": {"slidesToShow": 4}},
                {"breakpoint":1200, "settings": {"slidesToShow": 3}},
                {"breakpoint":992, "settings": {"slidesToShow": 2}},
                {"breakpoint":767, "settings": {"slidesToShow": 1}},
                {"breakpoint":480, "settings": {"slidesToShow": 1}}
                ]'>

                    @php($i=20)
                    @foreach($popularBodykits as $product)
                    <div class="product-slide_item">
                        <div class="inner-slide">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="{{route('single-product',['slug'=>$product->slug])}}">

                                        @if(str_contains($product->image,'product-images'))
                                        <img loading="lazy" class="primary-img" src="{{asset($product->image)}}"
                                            alt="Uren's Product Image">
                                        <img loading="lazy" class="secondary-img" src="{{asset($product->image)}}"
                                            alt="Uren's Product Image">

                                        @else
                                        <img loading="lazy" class="primary-img"
                                            src="{{asset($product->image)}}?random=<?php echo $i ?>"
                                            alt="Uren's Product Image">
                                        <img loading="lazy" class="secondary-img"
                                            src="{{asset($product->image)}}?random=<?php echo $i ?>"
                                            alt="Uren's Product Image">
                                        @endif

                                    </a>
                                    @if($product->availability==0)
                                    <div class="sticker-area-2">
                                        <span class="sticker-2">Unavailable</span>
                                    </div>
                                    @endif

                                    @if($product->availability==1)
                                    <div class="add-actions">
                                        <ul>

                                            <li>
                                                <form action="{{route('add-to-cart')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" id="productId" name="id"
                                                        value="{{$product->id}}">
                                                    <input type="hidden" id="quantity" name="qty" value="1">
                                                    @if($product->discount_price)
                                                    <input type="hidden" name="price"
                                                        value="{{$product->discount_price}}">
                                                    @else
                                                    <input type="hidden" name="price"
                                                        value="{{$product->regular_price}}">
                                                    @endif
                                                    <button class="mt-2 btn btn-success btn-sm"
                                                        onclick="addToCart({{$product->id}})" type="submit"
                                                        class="uren-add_cart btn btn-sm"><i class="ion-bag"></i> Add to
                                                        Cart <i class="ion-bag"></i></button>
                                                </form>
                                            </li>

                                        </ul>
                                    </div>
                                    @endif
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <h6><a class="product-name"
                                                href="{{route('single-product',['slug'=>$product->slug])}}">{{$product->name}}</a>
                                        </h6>

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
                    @php($i++)
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>

<div class="uren-brand_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title_area">
                    <span>Top Quality Partner</span>
                    <h3>Shop By Brands</h3>
                </div>
                <div class="brand-slider uren-slick-slider img-hover-effect_area" data-slick-options='{
                            "slidesToShow": 6
                        }' data-slick-responsive='[
                        {"breakpoint":1200, "settings": {"slidesToShow": 5}},
                        {"breakpoint":992, "settings": {"slidesToShow": 3}},
                        {"breakpoint":767, "settings": {"slidesToShow": 3}},
                        {"breakpoint":577, "settings": {"slidesToShow": 2}},
                        {"breakpoint":321, "settings": {"slidesToShow": 1}}
                        ]'>

                    @foreach($brands as $brand)
                    <div class="slide-item">
                        <div class="inner-slide">
                            <div class="single-product">
                                <a href="{{route('brand-products',['slug'=>$brand->slug])}}">
                                    <img loading="lazy" src="{{asset($brand->image)}}" alt="Uren's Brand Image">
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<div class="popular-search_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="popular-search">
                    <!-- <label>Popular Search:</label> -->
                    <!-- <a href="javascript:void(0)">Brakes & Rotors,</a>
                        <a href="javascript:void(0)">Lighting,</a>
                        <a href="javascript:void(0)">Perfomance,</a>
                        <a href="javascript:void(0)">Wheels & Tires</a> -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Begin Uren's Footer Area -->
<div class="uren-footer_area">
    <div class="footer-top_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter-area">
                        <h3 class="title">Join Our Newsletter Now</h3>
                        <p class="short-desc">Get E-mail updates about our latest shop and special offers.</p>
                        <div class="newsletter-form_wrap">
                            <form
                                action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef"
                                method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                class="newsletters-form validate" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll">
                                    <div id="mc-form" class="mc-form subscribe-form">
                                        <input id="mc-email" class="newsletter-input" type="email" autocomplete="off"
                                            placeholder="Enter your email" />
                                        <button class="newsletter-btn" id="mc-submit">Subscribe</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popular-search_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="popular-search">
                        <!-- <label>Popular Search:</label> -->
                        <!-- <a href="javascript:void(0)">Brakes & Rotors,</a>
                                <a href="javascript:void(0)">Lighting,</a>
                                <a href="javascript:void(0)">Perfomance,</a>
                                <a href="javascript:void(0)">Wheels & Tires</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });



<<<<<<< Updated upstream
            </script>

            <script>
                $( document ).ready(function() {
                    @if (Session::get('message'))
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: '{{Session::get('message')}}',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    @endif
                });
            </script>

            @endsection
=======
    </script>

    <script>
        $( document ).ready(function() {
            @if (Session::get('message'))
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{Session::get('message')}}',
                showConfirmButton: false,
                timer: 2000
            })
            @endif
            @if (Session::get('error'))
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: '{{Session::get('error')}}',
                showConfirmButton: false,
                timer: 3000
            })
            @endif
        });
    </script>

    @endsection
>>>>>>> Stashed changes

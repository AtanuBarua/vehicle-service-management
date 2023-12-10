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
                    <div class="product-slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area" data-slick-options='{
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
                                        <img loading="lazy" class="primary-img" src="{{asset($product->image)}}" alt="Uren's Product Image">
                                        <img loading="lazy" class="secondary-img" src="{{asset($product->image)}}" alt="Uren's Product Image">

                                        @else
                                        <img loading="lazy" class="primary-img" src="{{asset($product->image)}}?random=<?php echo $i ?>" alt="Uren's Product Image">
                                        <img loading="lazy" class="secondary-img" src="{{asset($product->image)}}?random=<?php echo $i ?>" alt="Uren's Product Image">
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
                                            <!-- <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                            </li> -->
                                            <li>
                                                <form action="{{route('add-to-cart')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" id="productId" name="id" value="{{$product->id}}">
                                                    <input type="hidden" id="quantity" name="qty" value="1">
                                                    @if($product->discount_price)
                                                    <input type="hidden" name="price" value="{{$product->discount_price}}">
                                                    @else
                                                    <input type="hidden" name="price" value="{{$product->regular_price}}">
                                                    @endif
                                                    <button class="mt-2 btn btn-success btn-sm" onclick="addToCart({{$product->id}})" type="submit" class="uren-add_cart btn btn-sm"><i class="ion-bag"></i> Add to Cart <i class="ion-bag"></i></button>
                                                </form>
                                            </li>
                                            <!-- <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                            </li>
                                            <li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                class="ion-android-options"></i></a>
                                            </li> -->
                                            <!-- <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                class="ion-android-open"></i></a></li> -->
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
                                            <h6><a class="product-name" href="{{route('single-product',['slug'=>$product->slug])}}">{{$product->name}}</a></h6>
                                            
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
                    <div class="product-slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area" data-slick-options='{
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
                                        <img loading="lazy" class="primary-img" src="{{asset($product->image)}}" alt="Uren's Product Image">
                                        <img loading="lazy" class="secondary-img" src="{{asset($product->image)}}" alt="Uren's Product Image">

                                        @else
                                        <img loading="lazy" class="primary-img" src="{{asset($product->image)}}?random=<?php echo $i ?>" alt="Uren's Product Image">
                                        <img loading="lazy" class="secondary-img" src="{{asset($product->image)}}?random=<?php echo $i ?>" alt="Uren's Product Image">
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
                                            <!-- <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                            </li> -->
                                            <li>
                                                <form action="{{route('add-to-cart')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" id="productId" name="id" value="{{$product->id}}">
                                                    <input type="hidden" id="quantity" name="qty" value="1">
                                                    @if($product->discount_price)
                                                    <input type="hidden" name="price" value="{{$product->discount_price}}">
                                                    @else
                                                    <input type="hidden" name="price" value="{{$product->regular_price}}">
                                                    @endif
                                                    <button class="mt-2 btn btn-success btn-sm" onclick="addToCart({{$product->id}})" type="submit" class="uren-add_cart btn btn-sm"><i class="ion-bag"></i> Add to Cart <i class="ion-bag"></i></button>
                                                </form>
                                            </li>
                                            <!-- <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                            </li>
                                            <li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                class="ion-android-options"></i></a>
                                            </li> -->
                                            <!-- <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                class="ion-android-open"></i></a></li> -->
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
                                            <h6><a class="product-name" href="{{route('single-product',['slug'=>$product->slug])}}">{{$product->name}}</a></h6>
                                            
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
                                    <img loading="lazy" src="{{asset($category->image)}}" alt="Uren's Featured Categories">
                                </a>
                            </div>
                            <div class="slide-content_area">
                                <h3><a href="{{route('category-products',['slug'=>$category->slug])}}">{{$category->name}}</a></h3>
                                <!-- <span>(8 Products)</span> -->
                                <ul class="product-item">
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Accessories</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Auto GPS Units</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Fitness GPS Units</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Handheld GPS Units</a>
                                    </li>
                                </ul>
                                <div class="uren-btn-ps_left">
                                    <a class="uren-btn" href="{{route('category-products',['slug'=>$category->slug])}}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- <div class="slide-item">
                        <div class="slide-inner">
                            <div class="slide-image_area">
                                <a href="shop-left-sidebar.html">
                                    <img src="{{asset('/')}}assets/front/images/featured-categories/2.png" alt="Uren's Featured Categories">
                                </a>
                            </div>
                            <div class="slide-content_area">
                                <h3><a href="shop-left-sidebar.html">Interior</a></h3>
                                <span>(0 Products)</span>
                                <ul class="product-item">
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Dash Kits</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Floor Mats</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Seat Covers</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Steering Wheels</a>
                                    </li>
                                </ul>
                                <div class="uren-btn-ps_left">
                                    <a class="uren-btn" href="shop-left-sidebar.html">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="slide-inner">
                            <div class="slide-image_area">
                                <a href="shop-left-sidebar.html">
                                    <img src="{{asset('/')}}assets/front/images/featured-categories/3.png" alt="Uren's Featured Categories">
                                </a>
                            </div>
                            <div class="slide-content_area">
                                <h3><a href="shop-left-sidebar.html">Lighting</a></h3>
                                <span>(8 Products)</span>
                                <ul class="product-item">
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Smart Appliances</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Smart Appliances</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Smart Energy</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Smart Health</a>
                                    </li>
                                </ul>
                                <div class="uren-btn-ps_left">
                                    <a class="uren-btn" href="shop-left-sidebar.html">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="slide-inner">
                            <div class="slide-image_area">
                                <a href="shop-left-sidebar.html">
                                    <img src="{{asset('/')}}assets/front/images/featured-categories/4.png" alt="Uren's Featured Categories">
                                </a>
                            </div>
                            <div class="slide-content_area">
                                <h3><a href="shop-left-sidebar.html">Perfomance</a></h3>
                                <span>(13 Products)</span>
                                <ul class="product-item">
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Home Theater</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Speakers Systems</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Sports</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Stereo Receivers</a>
                                    </li>
                                </ul>
                                <div class="uren-btn-ps_left">
                                    <a class="uren-btn" href="shop-left-sidebar.html">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="slide-inner">
                            <div class="slide-image_area">
                                <a href="shop-left-sidebar.html">
                                    <img src="{{asset('/')}}assets/front/images/featured-categories/5.png" alt="Uren's Featured Categories">
                                </a>
                            </div>
                            <div class="slide-content_area">
                                <h3><a href="shop-left-sidebar.html">Suspension Systems</a></h3>
                                <span>(15 Products)</span>
                                <ul class="product-item">
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Clothing</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Jewelry</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Sunglasses</a>
                                    </li>
                                </ul>
                                <div class="uren-btn-ps_left">
                                    <a class="uren-btn" href="shop-left-sidebar.html">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="slide-item">
                        <div class="slide-inner">
                            <div class="slide-image_area">
                                <a href="shop-left-sidebar.html">
                                    <img src="{{asset('/')}}assets/front/images/featured-categories/6.png" alt="Uren's Featured Categories">
                                </a>
                            </div>
                            <div class="slide-content_area">
                                <h3><a href="shop-left-sidebar.html">Wheels & Tires</a></h3>
                                <span>(13 Products)</span>
                                <ul class="product-item">
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Cellphone Accessories</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Mobile Hotspots & Plans</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Phones With Plans</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Prepaid Plans</a>
                                    </li>
                                </ul>
                                <div class="uren-btn-ps_left">
                                    <a class="uren-btn" href="shop-left-sidebar.html">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
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
                <div class="product-slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area" data-slick-options='{
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
                                        <img loading="lazy" class="primary-img" src="{{asset($product->image)}}" alt="Uren's Product Image">
                                        <img loading="lazy" class="secondary-img" src="{{asset($product->image)}}" alt="Uren's Product Image">

                                        @else
                                        <img loading="lazy" class="primary-img" src="{{asset($product->image)}}?random=<?php echo $i ?>" alt="Uren's Product Image">
                                        <img loading="lazy" class="secondary-img" src="{{asset($product->image)}}?random=<?php echo $i ?>" alt="Uren's Product Image">
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
                                        <!-- <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                        </li> -->
                                        <li>
                                            <form action="{{route('add-to-cart')}}" method="post">
                                                @csrf
                                                <input type="hidden" id="productId" name="id" value="{{$product->id}}">
                                                <input type="hidden" id="quantity" name="qty" value="1">
                                                @if($product->discount_price)
                                                <input type="hidden" name="price" value="{{$product->discount_price}}">
                                                @else
                                                <input type="hidden" name="price" value="{{$product->regular_price}}">
                                                @endif
                                                <button class="mt-2 btn btn-success btn-sm" onclick="addToCart({{$product->id}})" type="submit" class="uren-add_cart btn btn-sm"><i class="ion-bag"></i> Add to Cart <i class="ion-bag"></i></button>
                                            </form>
                                        </li>
                                        <!-- <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                        </li>
                                        <li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                            class="ion-android-options"></i></a>
                                        </li> -->
                                        <!-- <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                            class="ion-android-open"></i></a></li> -->
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
                                        <h6><a class="product-name" href="{{route('single-product',['slug'=>$product->slug])}}">{{$product->name}}</a></h6>
                                        
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

<!-- Begin Uren's Banner Area -->
<!-- <div class="uren-banner_area ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner-item img-hover_effect">
                    <div class="banner-img-1"></div>
                    <div class="banner-content">
                        <span class="offer">Get 20% off your order</span>
                        <h4>Car and Truck</h4>
                        <h3>Mercedes Benz</h3>
                        <p>Explore and immerse in exciting 360 content with
                            Fulldive’s all-in-one virtual reality platform</p>
                            <div class="uren-btn-ps_left">
                                <a class="uren-btn" href="shop-left-sidebar.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-item img-hover_effect">
                        <div class="banner-img-1 banner-img-2"> </div>
                        <div class="banner-content">
                            <span class="offer">Save $120 when you buy</span>
                            <h4>Rotiform SFO </h4>
                            <h3>Custom Forged</h3>
                            <p>Explore and immerse in exciting 360 content with
                                Fulldive’s all-in-one virtual reality platform</p>
                                <div class="uren-btn-ps_left">
                                    <a class="uren-btn" href="shop-left-sidebar.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Uren's Banner Area End Here -->
        
        <!-- Begin Uren's Banner Two Area -->
        <!-- <div class="uren-banner_area uren-banner_area-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-item img-hover_effect">
                            <a href="shop-left-sidebar.html">
                                <img class="img-full" src="{{asset('/')}}assets/front/images/banner/1-3.jpg" alt="Uren's Banner">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-item img-hover_effect">
                            <a href="shop-left-sidebar.html">
                                <img class="img-full" src="{{asset('/')}}assets/front/images/banner/1-4.jpg" alt="Uren's Banner">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-item img-hover_effect">
                            <a href="shop-left-sidebar.html">
                                <img class="img-full" src="{{asset('/')}}assets/front/images/banner/1-5.jpg" alt="Uren's Banner">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Uren's Banner Two Area End Here -->
        
        
        <!-- Begin Special Product Area -->
        <!-- <div class="special-product_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title_area">
                            <span>Special Offer Limited Time</span>
                            <h3>Deal Of The Day</h3>
                        </div>
                        <div class="special-product_slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area" data-slick-options='{
                            "slidesToShow": 2,
                            "arrows" : true
                        }' data-slick-responsive='[
                        {"breakpoint":768, "settings": {"slidesToShow": 1}}
                        ]'>
                        <div class="slide-item">
                            <div class="inner-slide">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="{{asset('/')}}assets/front/images/product/medium-size/1-1.jpg" alt="Uren's Product Image">
                                            <img class="secondary-img" src="{{asset('/')}}assets/front/images/product/medium-size/4-1.jpg" alt="Uren's Product Image">
                                        </a>
                                        <div class="sticker-area-2">
                                            <span class="sticker-2">-33%</span>
                                            <span class="sticker">New</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <div class="uren-countdown_area">
                                                <span class="product-offer">Hurry up!  Offer ends in:</span>
                                                <div class="countdown-wrap">
                                                    <div class="countdown item-4" data-countdown="2020/10/01" data-format="short">
                                                        <div class="countdown__item">
                                                            <span class="countdown__time daysLeft"></span>
                                                            <span class="countdown__text daysText"></span>
                                                        </div>
                                                        <div class="countdown__item">
                                                            <span class="countdown__time hoursLeft"></span>
                                                            <span class="countdown__text hoursText"></span>
                                                        </div>
                                                        <div class="countdown__item">
                                                            <span class="countdown__time minsLeft"></span>
                                                            <span class="countdown__text minsText"></span>
                                                        </div>
                                                        <div class="countdown__item">
                                                            <span class="countdown__time secsLeft"></span>
                                                            <span class="countdown__text secsText"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-android-star"></i></li>
                                                    <li><i class="ion-android-star"></i></li>
                                                    <li><i class="ion-android-star"></i></li>
                                                    <li class="silver-color"><i class="ion-android-star"></i></li>
                                                    <li class="silver-color"><i class="ion-android-star"></i></li>
                                                </ul>
                                            </div>
                                            <h6 class="product-name"><a href="single-product.html">Veniam officiis voluptates</a></h6>
                                            <div class="price-box">
                                                <span class="new-price new-price-2">$98.00</span>
                                                <span class="old-price">$146.00</span>
                                            </div>
                                            <div class="add-actions">
                                                <ul>
                                                    <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                                        class="ion-bag"></i>Add To Cart</a>
                                                    </li>
                                                    <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                    </li>
                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-android-open"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item">
                            <div class="inner-slide">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="{{asset('/')}}assets/front/images/product/medium-size/4-2.jpg" alt="Uren's Product Image">
                                            <img class="secondary-img" src="{{asset('/')}}assets/front/images/product/medium-size/5-2.jpg" alt="Uren's Product Image">
                                        </a>
                                        <div class="sticker-area-2">
                                            <span class="sticker-2">-10%</span>
                                            <span class="sticker">New</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <div class="uren-countdown_area">
                                                <span class="product-offer">Hurry up!  Offer ends in:</span>
                                                <div class="countdown-wrap">
                                                    <div class="countdown item-4" data-countdown="2020/09/01" data-format="short">
                                                        <div class="countdown__item">
                                                            <span class="countdown__time daysLeft"></span>
                                                            <span class="countdown__text daysText"></span>
                                                        </div>
                                                        <div class="countdown__item">
                                                            <span class="countdown__time hoursLeft"></span>
                                                            <span class="countdown__text hoursText"></span>
                                                        </div>
                                                        <div class="countdown__item">
                                                            <span class="countdown__time minsLeft"></span>
                                                            <span class="countdown__text minsText"></span>
                                                        </div>
                                                        <div class="countdown__item">
                                                            <span class="countdown__time secsLeft"></span>
                                                            <span class="countdown__text secsText"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-android-star"></i></li>
                                                    <li><i class="ion-android-star"></i></li>
                                                    <li><i class="ion-android-star"></i></li>
                                                    <li><i class="ion-android-star"></i></li>
                                                    <li><i class="ion-android-star"></i></li>
                                                </ul>
                                            </div>
                                            <h6 class="product-name"><a href="single-product.html">Accusantium corporis odio</a></h6>
                                            <div class="price-box">
                                                <span class="new-price new-price-2">$110.00</span>
                                                <span class="old-price">$122.00</span>
                                            </div>
                                            <div class="add-actions">
                                                <ul>
                                                    <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                                        class="ion-bag"></i>Add To Cart</a>
                                                    </li>
                                                    <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                    </li>
                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-android-open"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item">
                            <div class="inner-slide">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="{{asset('/')}}assets/front/images/product/medium-size/6-1.jpg" alt="Uren's Product Image">
                                            <img class="secondary-img" src="{{asset('/')}}assets/front/images/product/medium-size/6-2.jpg" alt="Uren's Product Image">
                                        </a>
                                        <div class="sticker-area-2">
                                            <span class="sticker-2">-15%</span>
                                            <span class="sticker">New</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <div class="uren-countdown_area">
                                                <span class="product-offer">Hurry up!  Offer ends in:</span>
                                                <div class="countdown-wrap">
                                                    <div class="countdown item-4" data-countdown="2020/08/01" data-format="short">
                                                        <div class="countdown__item">
                                                            <span class="countdown__time daysLeft"></span>
                                                            <span class="countdown__text daysText"></span>
                                                        </div>
                                                        <div class="countdown__item">
                                                            <span class="countdown__time hoursLeft"></span>
                                                            <span class="countdown__text hoursText"></span>
                                                        </div>
                                                        <div class="countdown__item">
                                                            <span class="countdown__time minsLeft"></span>
                                                            <span class="countdown__text minsText"></span>
                                                        </div>
                                                        <div class="countdown__item">
                                                            <span class="countdown__time secsLeft"></span>
                                                            <span class="countdown__text secsText"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-android-star"></i></li>
                                                    <li><i class="ion-android-star"></i></li>
                                                    <li><i class="ion-android-star"></i></li>
                                                    <li><i class="ion-android-star"></i></li>
                                                    <li><i class="ion-android-star"></i></li>
                                                </ul>
                                            </div>
                                            <h6 class="product-name"><a href="single-product.html">Accusantium corporis odio</a></h6>
                                            <div class="price-box">
                                                <span class="new-price new-price-2">$95.00</span>
                                                <span class="old-price">$120.00</span>
                                            </div>
                                            <div class="add-actions">
                                                <ul>
                                                    <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                                        class="ion-bag"></i>Add To Cart</a>
                                                    </li>
                                                    <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                    </li>
                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-android-open"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Special Product Area End Here -->
    
    <!-- Begin Uren's Banner Three Area -->
    
    <!-- <div class="uren-banner_area uren-banner_area-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-item img-hover_effect">
                        <div class="banner-img"></div>
                        <div class="banner-content">
                            <span class="contact-info"><i class="ion-android-call"></i> +123 321 345</span>
                            <h4>Anytime & Anywhere </h4>
                            <h3>You are.</h3>
                            <p>Est erat faucibus purus, eget viverra nulla sem vitae
                                Quisque id sodales libero...</p>
                                <a href="javascript:void(0)" class="read-more">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        
        
        <!-- Uren's Banner Three Area End Here -->
        
        <!-- Begin Uren's Banner Two Area -->
        <!-- <div class="uren-banner_area uren-banner_area-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-item img-hover_effect">
                            <a href="shop-left-sidebar.html">
                                <img class="img-full" src="{{asset('/')}}assets/front/images/banner/2-3.jpg" alt="Uren's Banner">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-item img-hover_effect">
                            <a href="shop-left-sidebar.html">
                                <img class="img-full" src="{{asset('/')}}assets/front/images/banner/2-4.jpg" alt="Uren's Banner">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-item img-hover_effect">
                            <a href="shop-left-sidebar.html">
                                <img class="img-full" src="{{asset('/')}}assets/front/images/banner/2-5.jpg" alt="Uren's Banner">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Uren's Banner Two Area End Here -->
        
        <!-- Begin Uren's Brand Area -->
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
    <!-- Uren's Brand Area End Here -->
    
    <!-- Begin Uren's Blog Area -->
    <!-- <div class="uren-blog_area bg--white_smoke">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title_area">
                        <span>Our Recent Posts</span>
                        <h3>From Our Blogs</h3>
                    </div>
                    <div class="blog-slider uren-slick-slider slider-navigation_style-1" data-slick-options='{
                        "slidesToShow": 4,
                        "spaceBetween": 30,
                        "arrows" : true
                    }' data-slick-responsive='[
                    {"breakpoint":1200, "settings": {"slidesToShow": 3}},
                    {"breakpoint":992, "settings": {"slidesToShow": 2}},
                    {"breakpoint":768, "settings": {"slidesToShow": 2}},
                    {"breakpoint":576, "settings": {"slidesToShow": 1}}
                    ]'>
                    <div class="slide-item">
                        <div class="inner-slide">
                            <div class="blog-img img-hover_effect">
                                <a href="blog-details-left-sidebar.html">
                                    <img src="{{asset('/')}}assets/front/images/blog/large-size/1.jpg" alt="Uren's Blog Image">
                                </a>
                                <span class="post-date">12-09-19</span>
                            </div>
                            <div class="blog-content">
                                <h3><a href="blog-details-left-sidebar.html">Quaerat eligendi dolores autem omnis sed</a></h3>
                                <p>Maiores accusamus unde nulla quaerat deserunt, beatae molestias blanditiis aut recusandae saepe, quis, culpa voluptatum?</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="inner-slide">
                            <div class="blog-img img-hover_effect">
                                <a href="blog-details-left-sidebar.html">
                                    <img src="{{asset('/')}}assets/front/images/blog/large-size/2.jpg" alt="Uren's Blog Image">
                                </a>
                                <span class="post-date">15-09-19</span>
                            </div>
                            <div class="blog-content">
                                <h3><a href="blog-details-left-sidebar.html">Nulla voluptatum maiores dolorem nobis</a></h3>
                                <p>Maiores accusamus unde nulla quaerat deserunt, beatae molestias blanditiis aut recusandae saepe, quis, culpa voluptatum?</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="inner-slide">
                            <div class="blog-img img-hover_effect">
                                <a href="blog-details-left-sidebar.html">
                                    <img src="{{asset('/')}}assets/front/images/blog/large-size/3.jpg" alt="Uren's Blog Image">
                                </a>
                                <span class="post-date">19-09-19</span>
                            </div>
                            <div class="blog-content">
                                <h3><a href="blog-details-left-sidebar.html">Laudantium minus excepturi expedita dolore</a></h3>
                                <p>Maiores accusamus unde nulla quaerat deserunt, beatae molestias blanditiis aut recusandae saepe, quis, culpa voluptatum?</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="inner-slide">
                            <div class="blog-img img-hover_effect">
                                <a href="blog-details-left-sidebar.html">
                                    <img src="{{asset('/')}}assets/front/images/blog/large-size/4.jpg" alt="Uren's Blog Image">
                                </a>
                                <span class="post-date">16-09-19</span>
                            </div>
                            <div class="blog-content">
                                <h3><a href="blog-details-left-sidebar.html">Aliquam nihil dolorem beatae totam tempora</a></h3>
                                <p>Maiores accusamus unde nulla quaerat deserunt, beatae molestias blanditiis aut recusandae saepe, quis, culpa voluptatum?</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="inner-slide">
                            <div class="blog-img img-hover_effect">
                                <a href="blog-details-left-sidebar.html">
                                    <img src="{{asset('/')}}assets/front/images/blog/large-size/5.jpg" alt="Uren's Blog Image">
                                </a>
                                <span class="post-date">20-09-19</span>
                            </div>
                            <div class="blog-content">
                                <h3><a href="blog-details-left-sidebar.html">Reprehenderit illum iusto sit asperiores</a></h3>
                                <p>Maiores accusamus unde nulla quaerat deserunt, beatae molestias blanditiis aut recusandae saepe, quis, culpa voluptatum?</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="inner-slide">
                            <div class="blog-img img-hover_effect">
                                <a href="blog-details-left-sidebar.html">
                                    <img src="{{asset('/')}}assets/front/images/blog/large-size/6.jpg" alt="Uren's Blog Image">
                                </a>
                                <span class="post-date">25-09-19</span>
                            </div>
                            <div class="blog-content">
                                <h3><a href="blog-details-left-sidebar.html">Corrupti, dolore tempore totam voluptate</a></h3>
                                <p>Maiores accusamus unde nulla quaerat deserunt, beatae molestias blanditiis aut recusandae saepe, quis, culpa voluptatum?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Uren's Blog Area End Here -->


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
                                <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="newsletters-form validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll">
                                        <div id="mc-form" class="mc-form subscribe-form">
                                            <input id="mc-email" class="newsletter-input" type="email" autocomplete="off" placeholder="Enter your email" />
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

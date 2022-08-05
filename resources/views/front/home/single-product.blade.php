@extends('front.master')

@section('body')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Single Product</h2>
            <ul>
                <li><a href="{{route('/')}}">Home</a></li>
                <li class="active">Single Product</li>
            </ul>
        </div>
    </div>
</div>
<!-- Uren's Breadcrumb Area End Here -->

<!-- Begin Uren's Single Product Area -->
<div class="sp-area">
    <div class="container-fluid">
        <div class="sp-nav">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sp-img_area">
                        <div class="sp-img_slider slick-img-slider uren-slick-slider" data-slick-options='{
                            "slidesToShow": 1,
                            "arrows": false,
                            "fade": true,
                            "draggable": false,
                            "swipe": false,
                            "asNavFor": ".sp-img_slider-nav"
                        }'>
                        <div class="single-slide red zoom">
                            <img src="{{asset($product->image)}}" alt="Uren's Product Image">
                        </div>
                        <div class="single-slide orange zoom">
                            <img src="{{asset('/')}}assets/front/images/product/large-size/2.jpg" alt="Uren's Product Image">
                        </div>
                        <div class="single-slide brown zoom">
                            <img src="{{asset('/')}}assets/front/images/product/large-size/3.jpg" alt="Uren's Product Image">
                        </div>
                        <div class="single-slide umber zoom">
                            <img src="{{asset('/')}}assets/front/images/product/large-size/4.jpg" alt="Uren's Product Image">
                        </div>
                        <div class="single-slide black zoom">
                            <img src="{{asset('/')}}assets/front/images/product/large-size/5.jpg" alt="Uren's Product Image">
                        </div>
                        <div class="single-slide green zoom">
                            <img src="{{asset('/')}}assets/front/images/product/large-size/6.jpg" alt="Uren's Product Image">
                        </div>
                    </div>
                    <div class="sp-img_slider-nav slick-slider-nav uren-slick-slider slider-navigation_style-3" data-slick-options='{
                        "slidesToShow": 3,
                        "asNavFor": ".sp-img_slider",
                        "focusOnSelect": true,
                        "arrows" : true,
                        "spaceBetween": 30
                    }' data-slick-responsive='[
                    {"breakpoint":1501, "settings": {"slidesToShow": 3}},
                    {"breakpoint":992, "settings": {"slidesToShow": 4}},
                    {"breakpoint":768, "settings": {"slidesToShow": 3}},
                    {"breakpoint":575, "settings": {"slidesToShow": 2}}
                    ]'>
                    <!-- <div class="single-slide red">
                        <img src="{{asset('/')}}assets/front/images/product/small-size/1.jpg" alt="Uren's Product Thumnail">
                    </div>
                    <div class="single-slide orange">
                        <img src="{{asset('/')}}assets/front/images/product/small-size/2.jpg" alt="Uren's Product Thumnail">
                    </div>
                    <div class="single-slide brown">
                        <img src="{{asset('/')}}assets/front/images/product/small-size/3.jpg" alt="Uren's Product Thumnail">
                    </div>
                    <div class="single-slide umber">
                        <img src="{{asset('/')}}assets/front/images/product/small-size/4.jpg" alt="Uren's Product Thumnail">
                    </div>
                    <div class="single-slide red">
                        <img src="{{asset('/')}}assets/front/images/product/small-size/5.jpg" alt="Uren's Product Thumnail">
                    </div>
                    <div class="single-slide orange">
                        <img src="{{asset('/')}}assets/front/images/product/small-size/6.jpg" alt="Uren's Product Thumnail">
                    </div> -->
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="sp-content">
                <div class="sp-heading">
                    
                    
                    <h5>{{$product->name}}</h5>
                </div>
                <span class="reference">Reference: demo_1</span>
                <div class="rating-box">
                    <ul>
                        <li><i class="ion-android-star"></i></li>
                        <li><i class="ion-android-star"></i></li>
                        <li><i class="ion-android-star"></i></li>
                        <li class="silver-color"><i class="ion-android-star"></i></li>
                        <li class="silver-color"><i class="ion-android-star"></i></li>
                    </ul>
                </div>
                <div class="sp-essential_stuff">
                    <ul>
                        <li>Brands <a href="javascript:void(0)">{{$product->brand_name}}</a></li>
                        <li>Product Code: <a href="javascript:void(0)">Product 16</a></li>
                        <!--                                         <li>Reward Points: <a href="javascript:void(0)">100</a></li>
                        -->    
                        @if($product->availability==1)
                        <li>Availability: <a href="javascript:void(0)">In Stock</a></li>
                        @else
                        <li>Availability: <a href="javascript:void(0)">Out of Stock</a></li>
                        @endif
                        @if($product->discount_price)
                        <li>Price: <a href="javascript:void(0)"><strike><span>{{$product->regular_price}} bdt</span></strike> <span>{{$product->discount_price}} bdt</span></a></li>
                        @else
                        <li>Price: <a href="javascript:void(0)"><span>{{$product->regular_price}} bdt</span></a></li>
                        @endif
                        <!--                                         <li>Price in reward points: <a href="javascript:void(0)">400</a></li>
                        -->                                    </ul>
                    </div>
                    
                    @if($product->availability==1)
                    <form action="{{route('add-to-cart')}}" method="post">
                        @csrf
                        <div class="quantity">
                            <label>Quantity</label>
                            <div class="cart-plus-minus">
                                
                                <input id="quantity" class="cart-plus-minus-box" name="qty" value="1" type="text">
                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                
                                
                                
                                
                                
                            </div>
                        </div>
                        
                        <input type="hidden" name="id" value="{{$product->id}}">
                        @if($product->discount_price)
                        <input type="hidden" name="price" value="{{$product->discount_price}}">
                        @else
                        <input type="hidden" name="price" value="{{$product->regular_price}}">
                        @endif
                        
                        
                        
                        <div class="qty-btn_area">
                            <ul>
                                <li><button onclick="addToCart({{$product->id}})" class="btn btn-success qty-cart_btn" type="submit">Add To Cart</button></li>
                            </form>
                            
                        </ul>
                    </div>
                    @else
                    <h3 class="mt-3 text-danger">Out of Stock</h3>
                    @endif
                    <div class="uren-tag-line">
                        <h6>Tags:</h6>
                        <a href="javascript:void(0)">vehicle</a>,
                        <a href="javascript:void(0)">car</a>,
                        <a href="javascript:void(0)">bike</a>
                    </div>
                    <!-- <div class="uren-social_link">
                        <ul>
                            <li class="facebook">
                                <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                            <li class="twitter">
                                <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">
                                    <i class="fab fa-twitter-square"></i>
                                </a>
                            </li>
                            <li class="youtube">
                                <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank" title="Youtube">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            <li class="google-plus">
                                <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                    <i class="fab fa-google-plus"></i>
                                </a>
                            </li>
                            <li class="instagram">
                                <a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Uren's Single Product Area End Here -->

<!-- Begin Uren's Single Product Tab Area -->
<div class="sp-product-tab_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="sp-product-tab_nav">
                    <div class="product-tab">
                        <ul class="nav product-menu">
                            <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a>
                            </li>
                            <!-- <li><a data-toggle="tab" href="#specification"><span>Specification</span></a></li> -->
                            <li><a data-toggle="tab" href="#reviews"><span>Reviews ({{count($reviews)}})</span></a></li>
                        </ul>
                    </div>
                    <div class="tab-content uren-tab_content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                                <p>{{$product->description}}</p>
                            </div>
                        </div>
                        <div id="specification" class="tab-pane" role="tabpanel">
                            <table class="table table-bordered specification-inner_stuff">
                                <tbody>
                                    <tr>
                                        <td colspan="2"><strong>Memory</strong></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td>test 1</td>
                                        <td>8gb</td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td colspan="2"><strong>Processor</strong></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td>No. of Cores</td>
                                        <td>1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        
                        <div id="reviews" class="tab-pane" role="tabpanel">
                            <div class="tab-pane active" id="tab-review">
                                <div class="form-horizontal" id="form-review">
                                    @if(!$reviews->isEmpty())
                                    <div id="review">
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                                @foreach($reviews as $review)
                                                <tr>
                                                    <td style="width: 50%;"><strong>{{$review->name}}</strong></td>
                                                    <td class="text-right">15/09/20</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 50%;">
                                                        <p>{{$review->review}}</p>
                                                        <div class="rating-box">
                                                            
                                                            <ul style="white-space: nowrap;">
                                                                @if($review->star==1)
                                                                <li style="display: inline;"><i class="ion-android-star"></i></li>
                                                                @elseif($review->star==2)
                                                                <li style="display: inline;"><i class="ion-android-star"></i></li>
                                                                <li style="display: inline;"><i class="ion-android-star"></i></li>
                                                                @elseif($review->star==3)
                                                                <li style="display: inline;"><i class="ion-android-star"></i></li>
                                                                <li style="display: inline;"><i class="ion-android-star"></i></li>
                                                                <li style="display: inline;"><i class="ion-android-star"></i></li>
                                                                @elseif($review->star==4)
                                                                <li style="display: inline;"><i class="ion-android-star"></i></li>
                                                                <li style="display: inline;"><i class="ion-android-star"></i></li>
                                                                <li style="display: inline;"><i class="ion-android-star"></i></li>
                                                                <li style="display: inline;"><i class="ion-android-star"></i></li>
                                                                @elseif($review->star==5)
                                                                <li style="display: inline;"><i class="ion-android-star"></i></li>
                                                                <li style="display: inline;"><i class="ion-android-star"></i></li>
                                                                <li style="display: inline;"><i class="ion-android-star"></i></li>
                                                                <li style="display: inline;"><i class="ion-android-star"></i></li>
                                                                <li style="display: inline;"><i class="ion-android-star"></i></li>
                                                                @endif
                                                                
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                <!-- <tr>
                                                    
                                                    
                                                </tr> -->
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif
                                    @if($reviewer)
                                    <h2>Write a review</h2>
                                    <form action="{{route('submit-review')}}" method="post" class="form-horizontal" id="form-review">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="form-group required second-child">
                                            <div class="col-sm-12 p-0">
                                                <label class="control-label">Share your opinion</label>
                                                <textarea required name="review" class="review-textarea" id="con_message"></textarea>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group last-child required">
                                            <div class="col-sm-12 p-0">
                                                <div class="your-opinion">
                                                    <label>Your Rating</label>
                                                    <span>
                                                        <select required name="star" class="star-rating">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="uren-btn-ps_right">
                                                <button class="uren-btn-2">Continue</button>
                                            </div>
                                        </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Uren's Single Product Tab Area End Here -->

<!-- Begin Uren's Product Area -->
<div class="uren-product_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title_area">
                    <span></span>
                    <h3>Related Products</h3>
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
                @foreach($relatedProducts as $product)
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
                                
                                @if($product->availability==1)
                                <div class="sticker-area-2">
                                    <span class="sticker-2">-20%</span>
                                    <span class="sticker">New</span>
                                </div>
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
                                                <button class="mt-2 btn btn-sm btn-success" onclick="addToCart({{$product->id}})" type="submit" class="uren-add_cart btn btn-sm"><i
                                                    class="ion-bag"></i> Add to Cart <i
                                                    class="ion-bag"></i></button>
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
                                        @else
                                        <div class="sticker-area-2">
                                            <span class="sticker-2">Unavailable</span>
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
    
    @endsection
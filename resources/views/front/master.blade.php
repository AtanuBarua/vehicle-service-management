<!doctype html>
    <html class="no-js" lang="zxx">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Uren - Car Accessories Shop</title>
        <meta name="robots" content="noindex, follow" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}assets/front/images/favicon.ico">

    <!-- CSS
       ============================================ -->

       <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="{{asset('/')}}assets/front/css/vendor/bootstrap.min.css">
       <!-- Fontawesome -->
       <link rel="stylesheet" href="{{asset('/')}}assets/front/css/vendor/font-awesome.css">
       <!-- Fontawesome Star -->
       <link rel="stylesheet" href="{{asset('/')}}assets/front/css/vendor/fontawesome-stars.css">
       <!-- Ion Icon -->
       <link rel="stylesheet" href="{{asset('/')}}assets/front/css/vendor/ion-fonts.css">
       <!-- Slick CSS -->
       <link rel="stylesheet" href="{{asset('/')}}assets/front/css/plugins/slick.css">
       <!-- Animation -->
       <link rel="stylesheet" href="{{asset('/')}}assets/front/css/plugins/animate.css">
       <!-- jQuery Ui -->
       <link rel="stylesheet" href="{{asset('/')}}assets/front/css/plugins/jquery-ui.min.css">
       <!-- Lightgallery -->
       <link rel="stylesheet" href="{{asset('/')}}assets/front/css/plugins/lightgallery.min.css">
       <!-- Nice Select -->
       <link rel="stylesheet" href="{{asset('/')}}assets/front/css/plugins/nice-select.css">



       <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from the above) -->
    <!--
    <script src="{{asset('/')}}assets/front/js/vendor/vendor.min.js"></script>
    <script src="{{asset('/')}}assets/front/js/plugins/plugins.min.js"></script>
-->

<!-- Main Style CSS (Please use minify version for better website load performance) -->
<link rel="stylesheet" href="{{asset('/')}}assets/front/css/style.css">
<!--<link rel="stylesheet" href="{{asset('/')}}assets/front/css/style.min.css">-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body class="template-color-1">

    <div class="main-wrapper">

        <!-- Begin Uren's Newsletter Popup Area -->
        <!-- <div class="popup_wrapper">
            <div class="test">
                <span class="popup_off"><i class="ion-android-close"></i></span>
                <div class="subscribe_area">
                    <h2>Sign Up Newsletter</h2>
                    <p>Subscribe to the our store mailing list to receive updates on new arrivals, special offers and other discount information.</p>
                    <div class="subscribe-form-group">
                        <form class="subscribe-form" action="#">
                            <input autocomplete="off" type="text" name="message" id="message" placeholder="Enter your email address">
                            <button type="submit">subscribe</button>
                        </form>
                    </div>
                    <div class="subscribe-bottom">
                        <input type="checkbox" id="newsletter-permission">
                        <label for="newsletter-permission">Don't show this popup again</label>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Uren's Newsletter Popup Area Here -->

        <!-- Begin Uren's Header Main Area -->
        <header class="header-main_area bg--sapphire">
            <div class="header-top_area d-lg-block d-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-7 col-lg-8">
                            <div class="main-menu_area position-relative">
                                <nav class="main-nav">
                                    <ul>
                                        <li class="dropdown-holder active"><a href="{{route('/')}}">Home</a>
                                            <!-- <ul class="hm-dropdown">
                                                <li><a href="index.html">Home One</a></li>
                                                <li><a href="index-2.html">Home Two</a></li>
                                                <li><a href="index-3.html">Home Three</a></li>
                                            </ul> -->
                                        </li>
                                        <!-- <li class="megamenu-holder "><a href="shop-left-sidebar.html">Shop <i class="ion-ios-arrow-down"></i></a>
                                            <ul class="hm-megamenu">
                                                <li><span class="megamenu-title">Shop Page Layout</span>
                                                    <ul>
                                                        <li><a href="shop-grid-fullwidth.html">Grid Fullwidth</a></li>
                                                        <li><a href="shop-left-sidebar.html">Left Sidebar</a></li>
                                                        <li><a href="shop-right-sidebar.html">Right Sidebar</a></li>
                                                        <li><a href="shop-list-fullwidth.html">List Fullwidth</a></li>
                                                        <li><a href="shop-list-left-sidebar.html">List Left Sidebar</a></li>
                                                        <li><a href="shop-list-right-sidebar.html">List Right Sidebar</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span class="megamenu-title">Single Product Style</span>
                                                    <ul>
                                                        <li><a href="single-product-gallery-left.html">Gallery Left</a></li>
                                                        <li><a href="single-product-gallery-right.html">Gallery Right</a>
                                                        </li>
                                                        <li><a href="single-product-tab-style-left.html">Tab Style Left</a>
                                                        </li>
                                                        <li><a href="single-product-tab-style-right.html">Tab Style
                                                                Right</a>
                                                        </li>
                                                        <li><a href="single-product-sticky-left.html">Sticky Left</a></li>
                                                        <li><a href="single-product-sticky-right.html">Sticky Right</a></li>
                                                    </ul>
                                                </li>
                                                <li><span class="megamenu-title">Single Product Type</span>
                                                    <ul>
                                                        <li><a href="single-product.html">Single Product</a></li>
                                                        <li><a href="single-product-sale.html">Single Product Sale</a></li>
                                                        <li><a href="single-product-group.html">Single Product Group</a>
                                                        </li>
                                                        <li><a href="single-product-variable.html">Single Product Variable</a>
                                                        </li>
                                                        <li><a href="single-product-affiliate.html">Single Product
                                                                Affiliate</a>
                                                        </li>
                                                        <li><a href="single-product-slider.html">Single Product Slider</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0)">Specials</a></li>
                                        <li class=""><a href="javascript:void(0)">Pages <i class="ion-ios-arrow-down"></i></a>
                                            <ul class="hm-dropdown">
                                                <li><a href="my-account.html">My Account</a></li>
                                                <li><a href="login-register.html">Login | Register</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="compare.html">Compare</a></li>
                                                <li><a href="faq.html">FAQ</a></li>
                                                <li><a href="404.html">404 Error</a></li>
                                            </ul>
                                        </li> -->
                                        {{-- <li class=""><a href="#">About Us</a></li>
                                        <li class=""><a href="#">Contact</a></li> --}}
                                        <li><a href="#">Categories</a>
                                            <ul class="hm-dropdown hm-sub_dropdown">
                                                @foreach ($categories as $category)
                                                <li><a href="{{route('category-products',['slug'=>$category->slug])}}">{{$category->name}}</a></li>
                                                @endforeach
                                                </li>
                                            </ul>
                                        </li>
                                        <li class=""><a href="{{route('client.book-service')}}">Book a Service</a></li>
                                        <li class=""><a href="{{route('admin-login')}}">Admin</a></li>
                                        <li class=""><a href="{{route('technician-login')}}">Technician</a></li>
                                        {{-- <li class=""><a href="{{route('chat')}}">ChatBot</a></li> --}}
                                        
                                        <!-- <li class=""><a href="blog-left-sidebar.html">Blog <i class="ion-ios-arrow-down"></i></a>
                                            <ul class="hm-dropdown">
                                                <li><a href="blog-left-sidebar.html">Grid View</a>
                                                    <ul class="hm-dropdown hm-sub_dropdown">
                                                        <li><a href="blog-2-column.html">Column Two</a></li>
                                                        <li><a href="blog-3-column.html">Column Three</a></li>
                                                        <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                                                        <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="blog-list-left-sidebar.html">List View</a>
                                                    <ul class="hm-dropdown hm-sub_dropdown">
                                                        <li><a href="blog-list-fullwidth.html">List Fullwidth</a></li>
                                                        <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a></li>
                                                        <li><a href="blog-list-right-sidebar.html">List Right Sidebar</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="blog-details-left-sidebar.html">Blog Details</a>
                                                    <ul class="hm-dropdown hm-sub_dropdown">
                                                        <li><a href="blog-details-left-sidebar.html">Left Sidebar</a></li>
                                                        <li><a href="blog-details-right-sidebar.html">Right Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="blog-gallery-format.html">Blog Format</a>
                                                    <ul class="hm-dropdown hm-sub_dropdown">
                                                        <li><a href="blog-gallery-format.html">Gallery Format</a></li>
                                                        <li><a href="blog-audio-format.html">Audio Format</a></li>
                                                        <li><a href="blog-video-format.html">Video Format</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4">
                            <div class="ht-right_area">
                                <div class="ht-menu">
                                    <ul>
                                        <!-- <li><a href="javascript:void(0)">Currency<i class="fa fa-chevron-down"></i></a>
                                            <ul class="ht-dropdown ht-currency">
                                                <li><a href="javascript:void(0)">€ EUR</a></li>
                                                <li class="active"><a href="javascript:void(0)">£ Pound Sterling</a></li>
                                                <li><a href="javascript:void(0)">$ Us Dollar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0)">Language <i class="fa fa-chevron-down"></i></a>
                                            <ul class="ht-dropdown">
                                                <li class="active"><a href="javascript:void(0)"><img src="{{asset('/')}}assets/front/images/menu/icon/1.jpg" alt="JB's Language Icon">English</a></li>
                                                <li><a href="javascript:void(0)"><img src="{{asset('/')}}assets/front/images/menu/icon/2.jpg" alt="JB's Language Icon">Français</a>
                                                </li>
                                            </ul>
                                        </li> -->
                                        <li><a href="{{route('home')}}">My Account<i class="fa fa-chevron-down"></i></a>
                                            <ul class="ht-dropdown ht-my_account">
                                                @guest
                                                <li><a href="{{ route('register') }}">Register</a></li>
                                                <li class="active"><a href="{{ route('login') }}">Login</a></li>
                                                @else
                                                <li class="active"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Logout</a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                                @endguest
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-top_area header-sticky bg--sapphire">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-8 col-lg-7 d-lg-block d-none">
                            <div class="main-menu_area position-relative">
                                <nav class="main-nav">
                                    <ul>
                                        <li class="dropdown-holder active"><a href="{{route('/')}}">Home</a>
                                            <!-- <ul class="hm-dropdown">
                                                <li><a href="index.html">Home One</a></li>
                                                <li><a href="index-2.html">Home Two</a></li>
                                                <li><a href="index-3.html">Home Three</a></li>
                                            </ul> -->
                                        </li>
                                        <!-- <li class="megamenu-holder "><a href="shop-left-sidebar.html">Shop <i
                                                class="ion-ios-arrow-down"></i></a>
                                            <ul class="hm-megamenu">
                                                <li><span class="megamenu-title">Shop Page Layout</span>
                                                    <ul>
                                                        <li><a href="shop-grid-fullwidth.html">Grid Fullwidth</a></li>
                                                        <li><a href="shop-left-sidebar.html">Left Sidebar</a></li>
                                                        <li><a href="shop-right-sidebar.html">Right Sidebar</a></li>
                                                        <li><a href="shop-list-fullwidth.html">List Fullwidth</a></li>
                                                        <li><a href="shop-list-left-sidebar.html">List Left Sidebar</a>
                                                        </li>
                                                        <li><a href="shop-list-right-sidebar.html">List Right
                                                                Sidebar</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span class="megamenu-title">Single Product Style</span>
                                                    <ul>
                                                        <li><a href="single-product-gallery-left.html">Gallery Left</a>
                                                        </li>
                                                        <li><a href="single-product-gallery-right.html">Gallery
                                                                Right</a>
                                                        </li>
                                                        <li><a href="single-product-tab-style-left.html">Tab Style
                                                                Left</a>
                                                        </li>
                                                        <li><a href="single-product-tab-style-right.html">Tab Style
                                                                Right</a>
                                                        </li>
                                                        <li><a href="single-product-sticky-left.html">Sticky Left</a>
                                                        </li>
                                                        <li><a href="single-product-sticky-right.html">Sticky Right</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span class="megamenu-title">Single Product Type</span>
                                                    <ul>
                                                        <li><a href="single-product.html">Single Product</a></li>
                                                        <li><a href="single-product-sale.html">Single Product Sale</a>
                                                        </li>
                                                        <li><a href="single-product-group.html">Single Product Group</a>
                                                        </li>
                                                        <li><a href="single-product-variable.html">Single Product
                                                                Variable</a>
                                                        </li>
                                                        <li><a href="single-product-affiliate.html">Single Product
                                                                Affiliate</a>
                                                        </li>
                                                        <li><a href="single-product-slider.html">Single Product
                                                                Slider</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0)">Specials</a></li>
                                        <li class=""><a href="javascript:void(0)">Pages <i
                                                class="ion-ios-arrow-down"></i></a>
                                            <ul class="hm-dropdown">
                                                <li><a href="my-account.html">My Account</a></li>
                                                <li><a href="login-register.html">Login | Register</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="compare.html">Compare</a></li>
                                                <li><a href="faq.html">FAQ</a></li>
                                                <li><a href="404.html">404 Error</a></li>
                                            </ul>
                                        </li> -->
                                        {{-- <li class=""><a href="#">About Us</a></li>
                                        <li class=""><a href="#">Contact</a></li> --}}
                                        <li class=""><a href="{{route('client.book-service')}}">Book a Service</a></li>
                                        <li class=""><a href="{{route('admin-login')}}">Admin</a></li>
                                        <li class=""><a href="{{route('technician-login')}}">Technician</a></li>
                                        {{-- <li class=""><a href="{{route('chat')}}">ChatBot</a></li> --}}
                                        <!-- <li class=""><a href="blog-left-sidebar.html">Blog <i
                                                class="ion-ios-arrow-down"></i></a>
                                            <ul class="hm-dropdown">
                                                <li><a href="blog-left-sidebar.html">Grid View</a>
                                                    <ul class="hm-dropdown hm-sub_dropdown">
                                                        <li><a href="blog-2-column.html">Column Two</a></li>
                                                        <li><a href="blog-3-column.html">Column Three</a></li>
                                                        <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                                                        <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="blog-list-left-sidebar.html">List View</a>
                                                    <ul class="hm-dropdown hm-sub_dropdown">
                                                        <li><a href="blog-list-fullwidth.html">List Fullwidth</a></li>
                                                        <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a>
                                                        </li>
                                                        <li><a href="blog-list-right-sidebar.html">List Right
                                                                Sidebar</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="blog-details-left-sidebar.html">Blog Details</a>
                                                    <ul class="hm-dropdown hm-sub_dropdown">
                                                        <li><a href="blog-details-left-sidebar.html">Left Sidebar</a>
                                                        </li>
                                                        <li><a href="blog-details-right-sidebar.html">Right Sidebar</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="blog-gallery-format.html">Blog Format</a>
                                                    <ul class="hm-dropdown hm-sub_dropdown">
                                                        <li><a href="blog-gallery-format.html">Gallery Format</a></li>
                                                        <li><a href="blog-audio-format.html">Audio Format</a></li>
                                                        <li><a href="blog-video-format.html">Video Format</a></li>
                                                    </ul>
                                                </li> -->
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-sm-3 d-block d-lg-none">
                            <div class="header-logo_area header-sticky_logo">
                                <a href="{{route('/')}}">
                                    <img src="{{asset('/')}}assets/front/images/menu/logo/1.png" alt="Uren's Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-sm-9">
                            <div class="header-right_area">
                                <ul>
                                    <li class="mobile-menu_wrap d-flex d-lg-none">
                                        <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                            <i class="ion-navicon"></i>
                                        </a>
                                    </li>
                                    <li class="minicart-wrap">
                                        <a href="#miniCart" class="minicart-btn toolbar-btn">
                                            <div class="minicart-count_area">
                                                <span class="item-count cartQty"></span>
                                                <i class="ion-bag"></i>
                                            </div>
                                            <div class="minicart-front_text">
                                                <span>Cart:</span>
                                                <span class="total-price cartSubTotal"></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="contact-us_wrap">
                                        <a href="tel://+123123321345"><i class="ion-android-call"></i>+8801712345678</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="custom-logo_col col-12">
                            <div class="header-logo_area">
                                <a href="{{route('/')}}">
                                    <img src="{{asset('/')}}assets/front/images/menu/logo/1.png" alt="Uren's Logo">
                                </a>
                            </div>
                        </div>
                        <!-- <div class="custom-category_col col-12">
                            <div class="category-menu category-menu-hidden">
                                <div class="category-heading">
                                    <h2 class="categories-toggle">
                                        <span>Shop By</span>
                                        <span>Department</span>
                                    </h2>
                                </div>
                                <div id="cate-toggle" class="category-menu-list">
                                    <ul>
                                        <li class="right-menu"><a href="shop-left-sidebar.html">Car Parts</a>
                                            <ul class="cat-mega-menu">
                                                <li class="right-menu cat-mega-title">
                                                    <a href="shop-left-sidebar.html">Active body control</a>
                                                    <ul>
                                                        <li><a href="shop-left-sidebar.html">Aluminum Nonstick</a></li>
                                                        <li><a href="shop-left-sidebar.html">Calphalon</a></li>
                                                        <li><a href="shop-left-sidebar.html">Contemporary</a></li>
                                                        <li><a href="shop-left-sidebar.html">Hard-Anodized</a></li>
                                                    </ul>
                                                </li>
                                                <li class="right-menu cat-mega-title">
                                                    <a href="shop-left-sidebar.html">Battery Indicator</a>
                                                    <ul>
                                                        <li><a href="shop-left-sidebar.html">Sanai laptops</a></li>
                                                        <li><a href="shop-left-sidebar.html">Byteflight</a></li>
                                                        <li><a href="shop-left-sidebar.html">EXcaliberPC</a></li>
                                                        <li><a href="shop-left-sidebar.html">Gaming Laptops</a></li>
                                                    </ul>
                                                </li>
                                                <li class="right-menu cat-mega-title">
                                                    <a href="shop-left-sidebar.html">Remote Starter</a>
                                                    <ul>
                                                        <li><a href="shop-left-sidebar.html">Dual Core</a></li>
                                                        <li><a href="shop-left-sidebar.html">Gaming Monitors</a></li>
                                                        <li><a href="shop-left-sidebar.html">GPS Monitors</a></li>
                                                        <li><a href="shop-left-sidebar.html">Heat Shield</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="right-menu"><a href="shop-left-sidebar.html">Tools &amp; Accessories</a>
                                            <ul class="cat-mega-menu cat-mega-menu-2">
                                                <li class="right-menu cat-mega-title">
                                                    <a href="shop-left-sidebar.html">Drills</a>
                                                    <ul>
                                                        <li><a href="shop-left-sidebar.html">Angle Drills</a></li>
                                                        <li><a href="shop-left-sidebar.html">Combi Drills</a></li>
                                                        <li><a href="shop-left-sidebar.html">Drill Drivers</a></li>
                                                        <li><a href="shop-left-sidebar.html">PercussionDrills</a></li>
                                                    </ul>
                                                </li>
                                                <li class="right-menu cat-mega-title">
                                                    <a href="shop-left-sidebar.html">Nail Guns</a>
                                                    <ul>
                                                        <li><a href="shop-left-sidebar.html">Air Nail Guns</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cordless Nail Guns</a></li>
                                                        <li><a href="shop-left-sidebar.html">Electric Nail Guns</a></li>
                                                        <li><a href="shop-left-sidebar.html">Gas Nail Guns</a></li>
                                                    </ul>
                                                </li>
                                                <li class="right-menu cat-mega-title">
                                                    <a href="shop-left-sidebar.html">Sanders</a>
                                                    <ul>
                                                        <li><a href="shop-left-sidebar.html">1/2 Sheet Sanders</a></li>
                                                        <li><a href="shop-left-sidebar.html">1/4 Sheet Sanders</a></li>
                                                        <li><a href="shop-left-sidebar.html">Belt Sanders</a></li>
                                                        <li><a href="shop-left-sidebar.html">Drywall Sanders</a></li>
                                                    </ul>
                                                </li>
                                                <li class="right-menu cat-mega-title">
                                                    <a href="shop-left-sidebar.html">Saws</a>
                                                    <ul>
                                                        <li><a href="shop-left-sidebar.html">Circular Saws</a></li>
                                                        <li><a href="shop-left-sidebar.html">Jigsaws</a></li>
                                                        <li><a href="shop-left-sidebar.html">Mitre Saws</a></li>
                                                        <li><a href="shop-left-sidebar.html">Reciprocating Saws</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="right-menu"><a href="shop-left-sidebar.html">Suspension Systems</a>
                                            <ul class="cat-mega-menu cat-mega-menu-3">
                                                <li class="right-menu cat-mega-title">
                                                    <a href="shop-left-sidebar.html">Clothing</a>
                                                    <ul>
                                                        <li><a href="shop-left-sidebar.html">Cuisinart</a></li>
                                                        <li><a href="shop-left-sidebar.html">Homeinart</a></li>
                                                        <li><a href="shop-left-sidebar.html">Kettle Stainless</a></li>
                                                        <li><a href="shop-left-sidebar.html">Steel Stovetop</a></li>
                                                    </ul>
                                                </li>
                                                <li class="right-menu cat-mega-title">
                                                    <a href="shop-left-sidebar.html">Jewelry</a>
                                                    <ul>
                                                        <li><a href="shop-left-sidebar.html">Hard Anodized</a></li>
                                                        <li><a href="shop-left-sidebar.html">Scratch Resistant</a></li>
                                                        <li><a href="shop-left-sidebar.html">Thermo-Spot</a></li>
                                                        <li><a href="shop-left-sidebar.html">Ultimate</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="right-menu"><a href="shop-left-sidebar.html">Turbo System</a>
                                            <ul class="cat-mega-menu">
                                                <li class="right-menu cat-mega-title">
                                                    <a href="shop-left-sidebar.html">BMW</a>
                                                    <ul>
                                                        <li><a href="shop-left-sidebar.html">Dining Chairs</a></li>
                                                        <li><a href="shop-left-sidebar.html">Dining Tables</a></li>
                                                        <li><a href="shop-left-sidebar.html">Gramophone</a></li>
                                                        <li><a href="shop-left-sidebar.html">Sideboards</a></li>
                                                    </ul>
                                                </li>
                                                <li class="right-menu cat-mega-title">
                                                    <a href="shop-left-sidebar.html">FORD</a>
                                                    <ul>
                                                        <li><a href="shop-left-sidebar.html">Chairs & Sofas</a></li>
                                                        <li><a href="shop-left-sidebar.html">Chest</a></li>
                                                        <li><a href="shop-left-sidebar.html">Loungers</a></li>
                                                        <li><a href="shop-left-sidebar.html">Sets</a></li>
                                                    </ul>
                                                </li>
                                                <li class="right-menu cat-mega-title">
                                                    <a href="shop-left-sidebar.html">POSCHER</a>
                                                    <ul>
                                                        <li><a href="shop-left-sidebar.html">Bed</a></li>
                                                        <li><a href="shop-left-sidebar.html">Daybed</a></li>
                                                        <li><a href="shop-left-sidebar.html">Futon</a></li>
                                                        <li><a href="shop-left-sidebar.html">Hammock</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="right-menu"><a href="shop-left-sidebar.html">Oils & Fluids</a>
                                            <ul class="cat-dropdown">
                                                <li>
                                                    <a href="shop-left-sidebar.html">Daylesford</a>
                                                    <a href="shop-left-sidebar.html">Delaware</a>
                                                    <a href="shop-left-sidebar.html">Fayence</a>
                                                    <a href="shop-left-sidebar.html">Franzea</a>
                                                    <a href="shop-left-sidebar.html">Mable</a>
                                                    <a href="shop-left-sidebar.html">Mobo</a>
                                                    <a href="shop-left-sidebar.html">Pippins</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="right-menu"><a href="shop-left-sidebar.html">Exterior</a>
                                            <ul class="cat-dropdown cat-dropdown-2">
                                                <li>
                                                    <a href="shop-left-sidebar.html">Coffee & side tables</a>
                                                    <a href="shop-left-sidebar.html">Living room lighting</a>
                                                    <a href="shop-left-sidebar.html">Living room storage</a>
                                                    <a href="shop-left-sidebar.html">Living room textiles & rugs</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="shop-left-sidebar.html">Body Parts</a></li>
                                        <li><a href="shop-left-sidebar.html">Interior</a></li>
                                        <li><a href="shop-left-sidebar.html">Audio</a></li>
                                        <li><a href="shop-left-sidebar.html">End Tables</a></li>
                                        <li class="rx-child"><a href="shop-left-sidebar.html">Uncategorized</a></li>
                                        <li class="rx-child"><a href="shop-left-sidebar.html">Appliances</a></li>
                                        <li class="rx-parent">
                                            <a class="rx-default">More Categories</a>
                                            <a class="rx-show">Collapse</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="custom-search_col col-12">
                            <div class="hm-form_area">
                                <form action="#" class="hm-searchbox">
                                    <select class="nice-select select-search-category">
                                        <option value="0">All Categories</option>
                                        <option value="10">Laptops</option>
                                        <option value="17">Prime Video</option>
                                        <option value="20">All Videos</option>
                                        <option value="21">Blouses</option>
                                        <option value="22">Evening Dresses</option>
                                        <option value="23">Summer Dresses</option>
                                        <option value="24">T-shirts</option>
                                        <option value="25">Rent or Buy</option>
                                        <option value="26">Your Watchlist</option>
                                        <option value="27">Watch Anywhere</option>
                                        <option value="28">Getting Started</option>
                                        <option value="18">Computers</option>
                                        <option value="29">More to Explore</option>
                                        <option value="30">TV &amp; Video</option>
                                        <option value="31">Audio &amp; Theater</option>
                                        <option value="32">Camera, Photo </option>
                                        <option value="33">Cell Phones</option>
                                        <option value="34">Headphones</option>
                                        <option value="35">Video Games</option>
                                        <option value="36">Wireless Speakers</option>
                                        <option value="19">Electronics</option>
                                        <option value="37">Amazon Home</option>
                                        <option value="38">Kitchen &amp; Dining</option>
                                        <option value="39">Furniture</option>
                                        <option value="40">Bed &amp; Bath</option>
                                        <option value="41">Appliances</option>
                                        <option value="11">TV &amp; Audio</option>
                                        <option value="42">Chamcham</option>
                                        <option value="45">Office</option>
                                        <option value="47">Gaming</option>
                                        <option value="48">Chromebook</option>
                                        <option value="49">Refurbished</option>
                                        <option value="50">Touchscreen</option>
                                        <option value="51">Ultrabooks</option>
                                        <option value="52">Blouses</option>
                                        <option value="43">Sanai</option>
                                        <option value="53">Hard Drives</option>
                                        <option value="54">Graphic Cards</option>
                                        <option value="55">Processors (CPU)</option>
                                        <option value="56">Memory</option>
                                        <option value="57">Motherboards</option>
                                        <option value="58">Fans &amp; Cooling</option>
                                        <option value="59">CD/DVD Drives</option>
                                        <option value="44">Meito</option>
                                        <option value="60">Sound Cards</option>
                                        <option value="61">Cases &amp; Towers</option>
                                        <option value="62">Casual Dresses</option>
                                        <option value="63">Evening Dresses</option>
                                        <option value="64">T-shirts</option>
                                        <option value="65">Tops</option>
                                        <option value="12">Smartphone</option>
                                        <option value="66">Camera Accessories</option>
                                        <option value="68">Octa Core</option>
                                        <option value="69">Quad Core</option>
                                        <option value="70">Dual Core</option>
                                        <option value="71">7.0 Screen</option>
                                        <option value="72">9.0 Screen</option>
                                        <option value="73">Bags &amp; Cases</option>
                                        <option value="67">XailStation</option>
                                        <option value="74">Batteries</option>
                                        <option value="75">Microphones</option>
                                        <option value="76">Stabilizers</option>
                                        <option value="77">Video Tapes</option>
                                        <option value="78">Memory Card Readers</option>
                                        <option value="79">Tripods</option>
                                        <option value="13">Cameras</option>
                                        <option value="14">headphone</option>
                                        <option value="15">Smartwatch</option>
                                        <option value="16">Accessories</option>
                                    </select>
                                    <input type="text" placeholder="Enter your search key ...">
                                    <button class="header-search_btn" type="submit"><i
                                        class="ion-ios-search-strong"><span>Search</span></i></button>
                                </form>
                            </div>
                        </div> -->
                        <div class="custom-cart_col col-12">
                            <div class="header-right_area">
                                <ul>
                                    <li class="mobile-menu_wrap d-flex d-lg-none">
                                        <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                            <i class="ion-navicon"></i>
                                        </a>
                                    </li>
                                    <li class="minicart-wrap">
                                        <a href="#miniCart" class="minicart-btn toolbar-btn">
                                            <div class="minicart-count_area">
                                                <span class="item-count cartQty"></span>
                                                <i class="ion-bag"></i>
                                            </div>
                                            <div class="minicart-front_text">
                                                <span>Cart:</span>
                                                <span class="total-price cartSubTotal"></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="contact-us_wrap">
                                        <a href="tel://+123123321345"><i class="ion-android-call"></i>+8801712345678</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="offcanvas-minicart_wrapper" id="miniCart">

                <div class="offcanvas-menu-inner">
                    <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                    <div class="minicart-content">
                        <div class="minicart-heading">
                            <h4>Shopping Cart</h4>
                        </div>
                        <ul class="minicart-list" id="miniCartAjax">
                            <!-- ekhan thke cut -->

                            <!-- cut sesh -->
                        </ul>
                    </div>
                    <div class="minicart-item_total">
                        <span>Total</span>
                        <span class="ammount cartSubTotal"></span>
                    </div>
                    <div class="minicart-btn_area">
                        <a href="{{route('cart')}}" class="uren-btn uren-btn_dark uren-btn_fullwidth">Cart</a>
                    </div>
                    <div class="minicart-btn_area">
                        <a href="{{route('checkout')}}" class="uren-btn uren-btn_dark uren-btn_fullwidth">Checkout</a>
                    </div>
                </div>

                

            </div>



            <div class="mobile-menu_wrapper" id="mobileMenu">
                <div class="offcanvas-menu-inner">
                    <div class="container">
                        <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                        <div class="offcanvas-inner_search">
                            <form action="#" class="inner-searchbox">
                                <input type="text" placeholder="Search for item...">
                                <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                        <nav class="offcanvas-navigation">
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children active"><a href="{{route('/')}}"><span
                                    class="mm-text">Home</span></a>
                                    
                                </li>
                                <li class="menu-item-has-children active"><a href="{{route('home')}}"><span
                                    class="mm-text">My Account</span></a>
                                    
                                </li>
                                <li class="menu-item-has-children active"><a href="{{route('client.book-service')}}"><span
                                    class="mm-text">Book a Service</span></a>
                                    
                                </li>
                                <li class="menu-item-has-children active"><a href="{{route('admin-login')}}"><span
                                    class="mm-text">Admin</span></a>       
                                </li>
                                <li class="menu-item-has-children active"><a href="{{route('technician-login')}}"><span
                                    class="mm-text">Technician</span></a>       
                                </li>
                                {{-- <li class="menu-item-has-children active"><a href="{{route('chat')}}"><span
                                    class="mm-text">ChatBot</span></a>       
                                </li> --}}
                                
                                <!-- <li class="menu-item-has-children">
                                    <a href="shop-left-sidebar.html">
                                        <span class="mm-text">Shop</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="shop-left-sidebar.html">
                                                <span class="mm-text">Grid View</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="shop-grid-fullwidth.html">
                                                        <span class="mm-text">Column Three</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="shop-4-column.html">
                                                        <span class="mm-text">Column Four</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="shop-left-sidebar.html">
                                                        <span class="mm-text">Left Sidebar</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="shop-right-sidebar.html">
                                                        <span class="mm-text">Right Sidebar</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="shop-list-left-sidebar.html">
                                                <span class="mm-text">Shop List</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="shop-list-fullwidth.html">
                                                        <span class="mm-text">Full Width</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="shop-list-left-sidebar.html">
                                                        <span class="mm-text">Left Sidebar</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="shop-list-right-sidebar.html">
                                                        <span class="mm-text">Right Sidebar</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="single-product-gallery-left.html">
                                                <span class="mm-text">Single Product Style</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="single-product-gallery-left.html">
                                                        <span class="mm-text">Gallery Left</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-gallery-right.html">
                                                        <span class="mm-text">Gallery Right</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-tab-style-left.html">
                                                        <span class="mm-text">Tab Style Left</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-tab-style-right.html">
                                                        <span class="mm-text">Tab Style Right</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-sticky-left.html">
                                                        <span class="mm-text">Sticky Left</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-sticky-right.html">
                                                        <span class="mm-text">Sticky Right</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="single-product.html">
                                                <span class="mm-text">Single Product Type</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="single-product.html">
                                                        <span class="mm-text">Single Product</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-sale.html">
                                                        <span class="mm-text">Single Product Sale</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-group.html">
                                                        <span class="mm-text">Single Product Group</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-variable.html">
                                                        <span class="mm-text">Single Product Variable</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-affiliate.html">
                                                        <span class="mm-text">Single Product Affiliate</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-slider.html">
                                                        <span class="mm-text">Single Product Slider</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="blog-left-sidebar.html">
                                        <span class="mm-text">Blog</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children has-children">
                                            <a href="blog-left-sidebar.html">
                                                <span class="mm-text">Grid View</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="blog-2-column.html">
                                                        <span class="mm-text">Column Two</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-3-column.html">
                                                        <span class="mm-text">Column Three</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-left-sidebar.html">
                                                        <span class="mm-text">Left Sidebar</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-right-sidebar.html">
                                                        <span class="mm-text">Right Sidebar</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children has-children">
                                            <a href="blog-list-left-sidebar.html">
                                                <span class="mm-text">List View</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="blog-list-fullwidth.html">
                                                        <span class="mm-text">List Fullwidth</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-list-left-sidebar.html">
                                                        <span class="mm-text">List Left Sidebar</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-list-right-sidebar.html">
                                                        <span class="mm-text">List Right Sidebar</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children has-children">
                                            <a href="blog-details-left-sidebar.html">
                                                <span class="mm-text">Blog Details</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="blog-details-left-sidebar.html">
                                                        <span class="mm-text">Left Sidebar</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-details-right-sidebar.html">
                                                        <span class="mm-text">Right Sidebar</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children has-children">
                                            <a href="blog-gallery-format.html">
                                                <span class="mm-text">Blog Format</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="blog-gallery-format.html">
                                                        <span class="mm-text">Gallery Format</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-audio-format.html">
                                                        <span class="mm-text">Audio Format</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-video-format.html">
                                                        <span class="mm-text">Video Format</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li> -->
                                <!-- <li class="menu-item-has-children">
                                    <a href="index.html">
                                        <span class="mm-text">Pages</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="my-account.html">
                                                <span class="mm-text">My Account</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="login-register.html">
                                                <span class="mm-text">Login | Register</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html">
                                                <span class="mm-text">Wishlist</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="cart.html">
                                                <span class="mm-text">Cart</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="checkout.html">
                                                <span class="mm-text">Checkout</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="compare.html">
                                                <span class="mm-text">Compare</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="faq.html">
                                                <span class="mm-text">FAQ</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="404.html">
                                                <span class="mm-text">Error 404</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li> -->
                            </ul>
                        </nav>
                        <!-- <nav class="offcanvas-navigation user-setting_area">
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children active"><a href="javascript:void(0)"><span
                                    class="mm-text">User
                                Setting</span></a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="my-account.html">
                                            <span class="mm-text">My Account</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="login-register.html">
                                            <span class="mm-text">Login | Register</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="javascript:void(0)"><span
                                class="mm-text">Currency</span></a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="mm-text">EUR €</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="mm-text">USD $</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="javascript:void(0)"><span
                                class="mm-text">Language</span></a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="mm-text">English</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="mm-text">Français</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="mm-text">Romanian</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="mm-text">Japanese</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav> -->
                </div>
            </div>
        </div>
    </header>
    <!-- Uren's Header Main Area End Here -->

    @yield('body')



    <div class="footer-middle_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-widgets_info">
                        <div class="footer-widgets_logo">
                            <a href="#">
                                <img src="{{asset('/')}}assets/front/images/menu/logo/1.png" alt="Uren's Footer Logo">
                            </a>
                        </div>
                        <div class="widget-short_desc">
                            <p>We are a team of designers and developers that create high quality HTML Template &
                                Woocommerce, Shopify Theme.
                            </p>
                        </div>
                        <div class="widgets-essential_stuff">
                            <ul>
                                <li class="uren-address"><span>Address:</span> Chittagong, Bangladesh</li>
                                <li class="uren-phone"><span>Call
                                Us:</span> <a href="tel://+123123321345">+8801712345678</a>
                            </li>
                            <li class="uren-email"><span>Email:</span> <a href="mailto://info@yourdomain.com">info@uren.com</a></li>
                        </ul>
                    </div>
                    <div class="uren-social_link">
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
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="footer-widgets_area">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-widgets_title">
                                <h3>Information</h3>
                            </div>
                            <div class="footer-widgets">
                                <ul>
                                    <li><a href="javascript:void(0)">About Us</a></li>
                                    <li><a href="javascript:void(0)">Delivery Information</a></li>
                                    <li><a href="javascript:void(0)">Privacy Policy</a></li>
                                    <li><a href="javascript:void(0)">Terms & Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-widgets_title">
                                <h3>Customer Service</h3>
                            </div>
                            <div class="footer-widgets">
                                <ul>
                                    <li><a href="javascript:void(0)">Contact Us</a></li>
                                    <li><a href="javascript:void(0)">Returns</a></li>
                                    <li><a href="javascript:void(0)">Site Map</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-widgets_title">
                                <h3>Extras</h3>
                            </div>
                            <div class="footer-widgets">
                                <ul>
                                    <li><a href="javascript:void(0)">About Us</a></li>
                                    <li><a href="javascript:void(0)">Delivery Information</a></li>
                                    <li><a href="javascript:void(0)">Privacy Policy</a></li>
                                    <li><a href="javascript:void(0)">Terms & Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-widgets_title">
                                <h3>My Account</h3>
                            </div>
                            <div class="footer-widgets">
                                <ul>
                                    <li><a href="javascript:void(0)">My Account</a></li>
                                    <li><a href="javascript:void(0)">Order History</a></li>
                                    <li><a href="javascript:void(0)">Wish List</a></li>
                                    <li><a href="javascript:void(0)">Newsletter</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- <div class="footer-bottom_area">
                <div class="container-fluid">
                    <div class="footer-bottom_nav">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="copyright">
                                    <span></span>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="payment">
                                    <a href="#">
                                        <img src="{{asset('/')}}assets/front/images/footer/payment/1.png" alt="Uren's Payment Method">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- Uren's Footer Area End Here -->
        <!-- Begin Uren's Modal Area -->
        <div class="modal fade modal-wrapper" id="exampleModalCenter">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-inner-area sp-area row">
                            <div class="col-lg-5">
                                <div class="sp-img_area">
                                    <div class="sp-img_slider slick-img-slider uren-slick-slider" data-slick-options='{
                                        "slidesToShow": 1,
                                        "arrows": false,
                                        "fade": true,
                                        "draggable": false,
                                        "swipe": false,
                                        "asNavFor": ".sp-img_slider-nav"
                                    }'>
                                    <div class="single-slide red">
                                        <img src="{{asset('/')}}assets/front/images/product/large-size/1.jpg" alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide orange">
                                        <img src="{{asset('/')}}assets/front/images/product/large-size/2.jpg" alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide brown">
                                        <img src="{{asset('/')}}assets/front/images/product/large-size/3.jpg" alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide umber">
                                        <img src="{{asset('/')}}assets/front/images/product/large-size/4.jpg" alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide black">
                                        <img src="{{asset('/')}}assets/front/images/product/large-size/5.jpg" alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide golden">
                                        <img src="{{asset('/')}}assets/front/images/product/large-size/6.jpg" alt="Uren's Product Image">
                                    </div>
                                </div>
                                <div class="sp-img_slider-nav slick-slider-nav uren-slick-slider slider-navigation_style-3" data-slick-options='{
                                 "slidesToShow": 4,
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
                             <div class="single-slide red">
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
                            <div class="single-slide black">
                                <img src="{{asset('/')}}assets/front/images/product/small-size/5.jpg" alt="Uren's Product Thumnail">
                            </div>
                            <div class="single-slide golden">
                                <img src="{{asset('/')}}assets/front/images/product/small-size/6.jpg" alt="Uren's Product Thumnail">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="sp-content">
                        <div class="sp-heading">
                            <h5><a href="#">Dolorem odio provident ut nihil</a></h5>
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
                        <div class="price-box">
                            <span class="new-price new-price-2">$194.00</span>
                            <span class="old-price">$241.00</span>
                        </div>
                        <div class="sp-essential_stuff">
                            <ul>
                                <li>Brands <a href="javascript:void(0)">Buxton</a></li>
                                <li>Product Code: <a href="javascript:void(0)">Product 16</a></li>
                                <li>Reward Points: <a href="javascript:void(0)">100</a></li>
                                <li>Availability: <a href="javascript:void(0)">In Stock</a></li>
                                <li>EX Tax: <a href="javascript:void(0)"><span>$453.35</span></a></li>
                                <li>Price in reward points: <a href="javascript:void(0)">400</a></li>
                            </ul>
                        </div>
                        <div class="color-list_area">
                            <div class="color-list_heading">
                                <h4>Available Options</h4>
                            </div>
                            <span class="sub-title">Color</span>
                            <div class="color-list">
                                <a href="javascript:void(0)" class="single-color active" data-swatch-color="red">
                                    <span class="bg-red_color"></span>
                                    <span class="color-text">Red (+$150)</span>
                                </a>
                                <a href="javascript:void(0)" class="single-color" data-swatch-color="orange">
                                    <span class="burnt-orange_color"></span>
                                    <span class="color-text">Orange (+$170)</span>
                                </a>
                                <a href="javascript:void(0)" class="single-color" data-swatch-color="brown">
                                    <span class="brown_color"></span>
                                    <span class="color-text">Brown (+$120)</span>
                                </a>
                                <a href="javascript:void(0)" class="single-color" data-swatch-color="umber">
                                    <span class="raw-umber_color"></span>
                                    <span class="color-text">Umber (+$125)</span>
                                </a>
                                <a href="javascript:void(0)" class="single-color" data-swatch-color="black">
                                    <span class="black_color"></span>
                                    <span class="color-text">Black (+$125)</span>
                                </a>
                                <a href="javascript:void(0)" class="single-color" data-swatch-color="golden">
                                    <span class="golden_color"></span>
                                    <span class="color-text">Golden (+$125)</span>
                                </a>
                            </div>
                        </div>
                        <div class="quantity">
                            <label>Quantity</label>
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" value="1" type="text">
                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                            </div>
                        </div>
                        <div class="uren-group_btn">
                            <ul>
                                <li><a href="cart.html" class="add-to_cart">Cart To Cart</a></li>
                                <li><a href="cart.html"><i class="ion-android-favorite-outline"></i></a></li>
                                <li><a href="cart.html"><i class="ion-ios-shuffle-strong"></i></a></li>
                            </ul>
                        </div>
                        <div class="uren-tag-line">
                            <h6>Tags:</h6>
                            <a href="javascript:void(0)">Ring</a>,
                            <a href="javascript:void(0)">Necklaces</a>,
                            <a href="javascript:void(0)">Braid</a>
                        </div>
                        <div class="uren-social_link">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Uren's Modal Area End Here -->

</div>

    <!-- JS
        ============================================ -->

        <!-- jQuery JS -->
        <script src="{{asset('/')}}assets/front/js/vendor/jquery-1.12.4.min.js"></script>
        <!-- Modernizer JS -->
        <script src="{{asset('/')}}assets/front/js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- Popper JS -->
        <script src="{{asset('/')}}assets/front/js/vendor/popper.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="{{asset('/')}}assets/front/js/vendor/bootstrap.min.js"></script>

        <!-- Slick Slider JS -->
        <script src="{{asset('/')}}assets/front/js/plugins/slick.min.js"></script>
        <!-- Barrating JS -->
        <script src="{{asset('/')}}assets/front/js/plugins/jquery.barrating.min.js"></script>
        <!-- Counterup JS -->
        <script src="{{asset('/')}}assets/front/js/plugins/jquery.counterup.js"></script>
        <!-- Nice Select JS -->
        <script src="{{asset('/')}}assets/front/js/plugins/jquery.nice-select.js"></script>
        <!-- Sticky Sidebar JS -->
        <script src="{{asset('/')}}assets/front/js/plugins/jquery.sticky-sidebar.js"></script>
        <!-- Jquery-ui JS -->
        <script src="{{asset('/')}}assets/front/js/plugins/jquery-ui.min.js"></script>
        <script src="{{asset('/')}}assets/front/js/plugins/jquery.ui.touch-punch.min.js"></script>
        <!-- Lightgallery JS -->
        <script src="{{asset('/')}}assets/front/js/plugins/lightgallery.min.js"></script>
        <!-- Scroll Top JS -->
        <script src="{{asset('/')}}assets/front/js/plugins/scroll-top.js"></script>
        <!-- Theia Sticky Sidebar JS -->
        <script src="{{asset('/')}}assets/front/js/plugins/theia-sticky-sidebar.min.js"></script>
        <!-- Waypoints JS -->
        <script src="{{asset('/')}}assets/front/js/plugins/waypoints.min.js"></script>
        <!-- jQuery Zoom JS -->
        <script src="{{asset('/')}}assets/front/js/plugins/jquery.zoom.min.js"></script>

        <!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
    <!--
<script src="{{asset('/')}}assets/front/js/vendor/vendor.min.js"></script>
<script src="{{asset('/')}}assets/front/js/plugins/plugins.min.js"></script>
-->

<!-- Main JS -->
<script src="{{asset('/')}}assets/front/js/main.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">


    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

    //minicart-------------------------------------------------------------------------

    function miniCart(){
        $.ajax({
            type: 'GET',
            url: "{{route('mini-cart')}}",
            dataType:'json',
            success:function(response){
                $('.cartQty').html(response.cartQty);
                $('.cartSubTotal').html(response.cartTotal);
                var miniCart = "";
                $.each(response.cartItems, function(key,value){
                    miniCart += 
                    `
                    <li class="minicart-product">
                    <a id="${value.rowId}" onclick="if(confirm('Are you sure to remove?'))  minicartItemRemove(this.id)" class="product-item_remove"><i
                    class="ion-android-close"></i></a>
                    <div class="product-item_img">
                    <img src="${value.options.image}" alt="Uren's Product Image">
                    </div>
                    <div class="product-item_content">
                    <a class="product-item_title" href="{{url('product/${value.options.slug}')}}">${value.name}</a>
                    <span class="product-item_quantity">${value.qty} x ${value.price}</span>
                    </div>
                    </li>

                    `
                });
                
                $('#miniCartAjax').html(miniCart);
            }
        })
    }

    miniCart();  

    //cart-------------------------------------------------------------------
    function cart(){
        $.ajax({
            type: 'GET',
            url: "{{route('cart-ajax')}}",
            dataType:'json',
            success:function(response){
                // $('.cartQty').html(response.cartQty);
                $('#cartSubTotal').html(response.cartTotal);
                var cart = ""
                $.each(response.cartItems, function(key,value){
                    cart += 
                    `

                    <tr>
                    <td class="uren-product-remove"><a id="${value.rowId}" onclick="if (confirm('Are your sure to remove?'))  cartItemRemove(this.id)"><i class="fa fa-trash"
                    title="Remove"></i></a></td>
                    <td class="uren-product-thumbnail"><a href="{{url('product/${value.options.slug}')}}"><img height="100" width="100" src="${value.options.image}" alt="Uren's Cart Thumbnail"></a></td>
                    <td class="uren-product-name"><a href="{{url('product/${value.options.slug}')}}">${value.name}</a></td>
                    <td class="uren-product-price"><span class="amount">${value.price}৳</span></td>

                    <td class="quantity">
                    <label>Quantity</label>
                    <div class="cart-plus-minus">
                    <input name="qty" min="1" max="10" class="cart-plus-minus-box" value="${value.qty}" type="text">
                    <div class="dec qtybutton"><i id="${value.rowId}" onclick="cartDecrement(this.id)" class="fa fa-angle-down"></i></div>
                    <div class="inc qtybutton"><i id="${value.rowId}" onclick="cartIncrement(this.id)" class="fa fa-angle-up"></i></div>
                    </div>
                    </td>
                    
                    <td class="product-subtotal"><span class="amount">${value.price*value.qty}</span></td>
                    <td class="product-subtotal">

                    <input type="hidden" name="id" value="${value.rowId}">
                    

                    </td>
                    </tr>

                    `
                });
                
                $('#cartAjax').html(cart);
            }
        })
    }

    cart();    

    //add to cart-----------------------------------------------------
    function addToCart(id){

        event.preventDefault();

                //var productId = this.id;                
                var quantity = $('#quantity').val();
                //console.log(productId);
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data:{
                        "_token": "{{ csrf_token() }}",
                        id:id, 
                        qty:quantity
                    },
                    url: "{{route('add-to-cart')}}",
                    success: function(data){
                        miniCart();
                        Swal.fire({
                          position: 'top-end',
                          icon: 'success',
                          title: data.success,
                          showConfirmButton: false,
                          timer: 1000
                      })
                    }
                })
                
            }

            //minicart item remove-------------------------------------------------------------

            function minicartItemRemove(rowId){
                $.ajax({
                    type: 'GET',
                    url: '{{url("minicart-item-remove")}}'+'/'+rowId,
                    dataType:'json',
                    success:function(data){
                        miniCart();
                        cart();

             // Start Message 

             Swal.fire({
              position: 'top-left',
              icon: 'success',
              title: data.success,
              showConfirmButton: false,
              timer: 1000
          });



                // End Message 

            }
        });

            }

            //cart item remove----------------------------------------------------

            function cartItemRemove(rowId){
                $.ajax({
                    type: 'GET',
                    url: '{{url("minicart-item-remove")}}'+'/'+rowId,
                    dataType:'json',
                    success:function(data){
                        cart();
                        miniCart();

             // Start Message 

             Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: data.success,
              showConfirmButton: false,
              timer: 1000
          });



                // End Message 

            }
        });

            }

    //cart increment
    function cartIncrement(rowId){
        $.ajax({
            type:'GET',
            url: '{{url("cart-increment")}}'+'/'+rowId,
            dataType:'json',
            success:function(data){
                cart();
                miniCart();
            }
        });
    }

    //cart decrement
    function cartDecrement(rowId){
        $.ajax({
            type:'GET',
            url: '{{url("cart-decrement")}}'+'/'+rowId,
            dataType:'json',
            success:function(data){
                cart();
                miniCart();
            }
        });
    }        

</script>


</body>

</html>
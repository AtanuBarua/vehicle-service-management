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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}assets/front/images/favicon.ico">

    <!-- CSS
       ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/front/css/vendor/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/front/css/vendor/font-awesome.css">
    <!-- Fontawesome Star -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/front/css/vendor/fontawesome-stars.css">
    <!-- Ion Icon -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/front/css/vendor/ion-fonts.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/front/css/plugins/slick.css">
    <!-- Animation -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/front/css/plugins/animate.css">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/front/css/plugins/jquery-ui.min.css">
    <!-- Lightgallery -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/front/css/plugins/lightgallery.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/front/css/plugins/nice-select.css">

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from the above) -->
    <!--
    <script src="{{ asset('/') }}assets/front/js/vendor/vendor.min.js"></script>
    <script src="{{ asset('/') }}assets/front/js/plugins/plugins.min.js"></script>
-->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/front/css/style.css">
    <!--<link rel="stylesheet" href="{{ asset('/') }}assets/front/css/style.min.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="template-color-1">

    <div class="main-wrapper">

        <!-- Begin Uren's Header Main Area -->
        <header class="header-main_area bg--sapphire">
            <div class="header-top_area d-lg-block d-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-7 col-lg-8">
                            <div class="main-menu_area position-relative">
                                @include('front.include.navbar')
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4">
                            <div class="ht-right_area">
                                <div class="ht-menu">
                                    <ul>
                                        <li><a href="#">My Account<i
                                                    class="fa fa-chevron-down"></i></a>
                                            <ul class="ht-dropdown ht-my_account">
                                                @guest
                                                    <li><a href="{{ route('register') }}">Register</a></li>
                                                    <li class="active"><a href="{{ route('login') }}">Login</a></li>
                                                @else
                                                    <li><a href="{{ route('home') }}">Panel</a></li>
                                                    <li class="active"><a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Logout</a>
                                                    </li>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        style="display: none;">
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
                                @include('front.include.navbar')
                            </div>
                        </div>
                        <div class="col-sm-3 d-block d-lg-none">
                            <div class="header-logo_area header-sticky_logo">
                                <a href="{{ route('/') }}">
                                    <img src="{{ asset('/') }}assets/front/images/menu/logo/1.png"
                                        alt="Uren's Logo">
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
                                <a href="{{ route('/') }}">
                                    <img src="{{ asset('/') }}assets/front/images/menu/logo/1.png"
                                        alt="Uren's Logo">
                                </a>
                            </div>
                        </div>

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
                                        <a href="tel://+123123321345"><i
                                                class="ion-android-call"></i>+8801712345678</a>
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
                        <a href="{{ route('cart') }}" class="uren-btn uren-btn_dark uren-btn_fullwidth">Cart</a>
                    </div>
                    <div class="minicart-btn_area">
                        <a href="{{ route('checkout') }}"
                            class="uren-btn uren-btn_dark uren-btn_fullwidth">Checkout</a>
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
                                <button class="search_btn" type="submit"><i
                                        class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                        <nav class="offcanvas-navigation">
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children active"><a href="{{ route('/') }}"><span
                                            class="mm-text">Home</span></a>

                                </li>
                                <li class="menu-item-has-children active"><a href="{{ route('home') }}"><span
                                            class="mm-text">My Account</span></a>

                                </li>
                                <li class="menu-item-has-children active"><a
                                        href="{{ route('client.book-service') }}"><span class="mm-text">Book a
                                            Service</span></a>
                                </li>
                                @guest
                                    <li class="menu-item-has-children active"><a href="{{ route('login') }}"><span
                                                class="mm-text">Login</span></a>
                                    </li>
                                @endguest

                            </ul>
                        </nav>
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
                                    <img src="{{ asset('/') }}assets/front/images/menu/logo/1.png"
                                        alt="Uren's Footer Logo">
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
                                    <li class="uren-email"><span>Email:</span> <a
                                            href="mailto://info@yourdomain.com">info@uren.com</a></li>
                                </ul>
                            </div>
                            <div class="uren-social_link">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank"
                                            title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com/" data-toggle="tooltip" target="_blank"
                                            title="Twitter">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://www.plus.google.com/discover" data-toggle="tooltip"
                                            target="_blank" title="Google Plus">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://rss.com/" data-toggle="tooltip" target="_blank"
                                            title="Instagram">
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
                                <div class="sp-img_slider slick-img-slider uren-slick-slider"
                                    data-slick-options='{
                                        "slidesToShow": 1,
                                        "arrows": false,
                                        "fade": true,
                                        "draggable": false,
                                        "swipe": false,
                                        "asNavFor": ".sp-img_slider-nav"
                                    }'>
                                    <div class="single-slide red">
                                        <img src="{{ asset('/') }}assets/front/images/product/large-size/1.jpg"
                                            alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide orange">
                                        <img src="{{ asset('/') }}assets/front/images/product/large-size/2.jpg"
                                            alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide brown">
                                        <img src="{{ asset('/') }}assets/front/images/product/large-size/3.jpg"
                                            alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide umber">
                                        <img src="{{ asset('/') }}assets/front/images/product/large-size/4.jpg"
                                            alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide black">
                                        <img src="{{ asset('/') }}assets/front/images/product/large-size/5.jpg"
                                            alt="Uren's Product Image">
                                    </div>
                                    <div class="single-slide golden">
                                        <img src="{{ asset('/') }}assets/front/images/product/large-size/6.jpg"
                                            alt="Uren's Product Image">
                                    </div>
                                </div>
                                <div class="sp-img_slider-nav slick-slider-nav uren-slick-slider slider-navigation_style-3"
                                    data-slick-options='{
                                 "slidesToShow": 4,
                                 "asNavFor": ".sp-img_slider",
                                 "focusOnSelect": true,
                                 "arrows" : true,
                                 "spaceBetween": 30
                             }'
                                    data-slick-responsive='[
                             {"breakpoint":1501, "settings": {"slidesToShow": 3}},
                             {"breakpoint":992, "settings": {"slidesToShow": 4}},
                             {"breakpoint":768, "settings": {"slidesToShow": 3}},
                             {"breakpoint":575, "settings": {"slidesToShow": 2}}
                             ]'>
                                    <div class="single-slide red">
                                        <img src="{{ asset('/') }}assets/front/images/product/small-size/1.jpg"
                                            alt="Uren's Product Thumnail">
                                    </div>
                                    <div class="single-slide orange">
                                        <img src="{{ asset('/') }}assets/front/images/product/small-size/2.jpg"
                                            alt="Uren's Product Thumnail">
                                    </div>
                                    <div class="single-slide brown">
                                        <img src="{{ asset('/') }}assets/front/images/product/small-size/3.jpg"
                                            alt="Uren's Product Thumnail">
                                    </div>
                                    <div class="single-slide umber">
                                        <img src="{{ asset('/') }}assets/front/images/product/small-size/4.jpg"
                                            alt="Uren's Product Thumnail">
                                    </div>
                                    <div class="single-slide black">
                                        <img src="{{ asset('/') }}assets/front/images/product/small-size/5.jpg"
                                            alt="Uren's Product Thumnail">
                                    </div>
                                    <div class="single-slide golden">
                                        <img src="{{ asset('/') }}assets/front/images/product/small-size/6.jpg"
                                            alt="Uren's Product Thumnail">
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
                                        <a href="javascript:void(0)" class="single-color active"
                                            data-swatch-color="red">
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
                                            <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank"
                                                title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="https://twitter.com/" data-toggle="tooltip" target="_blank"
                                                title="Twitter">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>
                                        <li class="youtube">
                                            <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank"
                                                title="Youtube">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="https://www.plus.google.com/discover" data-toggle="tooltip"
                                                target="_blank" title="Google Plus">
                                                <i class="fab fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://rss.com/" data-toggle="tooltip" target="_blank"
                                                title="Instagram">
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
    <script src="{{ asset('/') }}assets/front/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Modernizer JS -->
    <script src="{{ asset('/') }}assets/front/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Popper JS -->
    <script src="{{ asset('/') }}assets/front/js/vendor/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('/') }}assets/front/js/vendor/bootstrap.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="{{ asset('/') }}assets/front/js/plugins/slick.min.js"></script>
    <!-- Barrating JS -->
    <script src="{{ asset('/') }}assets/front/js/plugins/jquery.barrating.min.js"></script>
    <!-- Counterup JS -->
    <script src="{{ asset('/') }}assets/front/js/plugins/jquery.counterup.js"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('/') }}assets/front/js/plugins/jquery.nice-select.js"></script>
    <!-- Sticky Sidebar JS -->
    <script src="{{ asset('/') }}assets/front/js/plugins/jquery.sticky-sidebar.js"></script>
    <!-- Jquery-ui JS -->
    <script src="{{ asset('/') }}assets/front/js/plugins/jquery-ui.min.js"></script>
    <script src="{{ asset('/') }}assets/front/js/plugins/jquery.ui.touch-punch.min.js"></script>
    <!-- Lightgallery JS -->
    <script src="{{ asset('/') }}assets/front/js/plugins/lightgallery.min.js"></script>
    <!-- Scroll Top JS -->
    <script src="{{ asset('/') }}assets/front/js/plugins/scroll-top.js"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="{{ asset('/') }}assets/front/js/plugins/theia-sticky-sidebar.min.js"></script>
    <!-- Waypoints JS -->
    <script src="{{ asset('/') }}assets/front/js/plugins/waypoints.min.js"></script>
    <!-- jQuery Zoom JS -->
    <script src="{{ asset('/') }}assets/front/js/plugins/jquery.zoom.min.js"></script>

    <!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
    <!--
<script src="{{ asset('/') }}assets/front/js/vendor/vendor.min.js"></script>
<script src="{{ asset('/') }}assets/front/js/plugins/plugins.min.js"></script>
-->

    <!-- Main JS -->
    <script src="{{ asset('/') }}assets/front/js/main.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @include('front.cart')

</body>

</html>

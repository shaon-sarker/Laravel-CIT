<!doctype html>
<html class="no-js" lang="en">

<head>

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    {{-- <meta property="og:url"
        content="http://www.nytimes.com/2015/02/19/arts/international/when-great-minds-dont-think-alike.html" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="When Great Minds Don’t Think Alike" />
    <meta property="og:description" content="How much does culture influence creative thinking?" />
    <meta property="og:image"
        content="http://static01.nyt.com/images/2015/02/19/arts/international/19iht-btnumbers19A/19iht-btnumbers19A-facebookJumbo-v2.jpg" />

    <meta name="twitter:card" content="[Preview Type]" />
    <meta name="twitter:creator" content="[@Your-twitter-handle] (optional)" />
    <meta name="twitter:site" content="[@Your-twitter-site-handle (optional)]" />
    <meta name="twitter:image" content="[Image URL]" />
    <meta name="twitter:description" content=[Page description] /> --}}

    {{-- <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe"> --}}

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {{-- <title>Tohoney - Home Page</title> --}}
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- bootstrap v4.0.0-beta.2 css -->
    <link rel="stylesheet" href="{{ asset('forntend_asset/css/bootstrap.min.css') }}">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{ asset('forntend_asset/css/owl.carousel.min.css') }}">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{ asset('forntend_asset/css/font-awesome.min.css') }}">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{ asset('forntend_asset/css/flaticon.css') }}">
    <!-- jquery-ui.css -->
    <link rel="stylesheet" href="{{ asset('forntend_asset/css/jquery-ui.css') }}">
    <!-- metisMenu.min.css -->
    <link rel="stylesheet" href="{{ asset('forntend_asset/css/metisMenu.min.css') }}">
    <!-- swiper.min.css -->
    <link rel="stylesheet" href="{{ asset('forntend_asset/css/swiper.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('forntend_asset/css/styles.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('forntend_asset/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('forntend_asset/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--Start Preloader-->
    <div class="preloader-wrap">
        <div class="spinner"></div>
    </div>
    <!-- search-form here -->
    <div class="search-area flex-style">
        <span class="closebar">Close</span>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-12">
                    <div class="search-form">
                        <form action="{{ url('/search') }}" method="GET">
                            <input type="text" name="q" placeholder="Search Here...">
                            <select name="order_by" class="form-control">
                                <option value="">--Search By--</option>
                                <option value="1">Order(A-Z)</option>
                                <option value="2">Order(Z-A)</option>
                            </select>
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search-form here -->
    <!-- header-area start -->
    <header class="header-area">
        <div class="header-top bg-2">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <ul class="d-flex header-contact">
                            <li><i class="fa fa-phone"></i> +01 123 456 789</li>
                            <li><i class="fa fa-envelope"></i> youremail@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-12">
                        <ul class="d-flex account_login-area">
                            <li>
                                @if (session()->get('language') == 'bangla')
                                    <a href="javascript:void(0);"><i class="fa fa-user"></i>আমার অ্যাকাউন্ট<i
                                            class="fa fa-angle-down"></i></a>
                                @else
                                    <a href="javascript:void(0);"><i class="fa fa-user"></i> My Account <i
                                            class="fa fa-angle-down"></i></a>
                                @endif

                                <ul class="dropdown_style">
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">wishlist</a></li>
                                </ul>
                            </li>

                            <li>
                                @if (session()->get('language') == 'bangla')
                                    <a href="javascript:void(0);"><i class="fa fa-user"></i>ভাষা<i
                                            class="fa fa-angle-down"></i></a>
                                @else
                                    <a href="javascript:void(0);"><i class="fa fa-user"></i>Language<i
                                            class="fa fa-angle-down"></i></a>
                                @endif

                                <ul class="dropdown_style">
                                    @if (session()->get('language') == 'bangla')
                                        <li><a href="{{ route('english.language') }}">English</a></li>
                                    @else
                                        <li><a href="{{ route('bangla.language') }}">বাংলা</a></li>
                                    @endif


                                    {{-- <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">wishlist</a></li> --}}
                                </ul>
                            </li>
                            <li><a href="{{ url('/register') }}"> Login/Register </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                        <div class="logo">
                            <a href="index.html">
                                <img src="{{ asset('forntend_asset/images/logo.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <nav class="mainmenu">
                            <ul class="d-flex">
                                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('/about') }}">About</a></li>
                                <li>
                                    <a href="javascript:void(0);">Shop <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="{{ url('/product/shop') }}">Shop Page</a></li>
                                        <li><a href="#">Product Details</a></li>
                                        <li><a href="{{ url('/details/cart') }}">Shopping cart</a></li>
                                        <li><a href="{{ url('/checkout') }}">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                {{-- <li>
                                    <a href="javascript:void(0);">Pages <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="about.html">About Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Blog <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="blog.html">blog Page</a></li>
                                        <li><a href="blog-details.html">blog Details</a></li>
                                    </ul>
                                </li> --}}
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                        <ul class="search-cart-wrapper d-flex">
                            <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-like"></i>
                                    <span>{{ App\Models\Wishlist::where('user_id', Auth::id())->count() }}</span></a>
                                <ul class="cart-wrap dropdown_style">
                                    {{-- @php
                                        $sub_total = 0;
                                    @endphp --}}
                                    {{-- @foreach (App\Models\Wishlist::where('generated_cart_id', Cookie::get('generated_cart_id'))->get() as $wishlist_product)
                                        <li class="cart-items">
                                            <div class="cart-img">
                                                <img width="60px"
                                                    src="{{ asset('uploads/products') }}/{{ App\Models\Product::find($wishlist_product->product_id)->product_image }}"
                                                    alt="">
                                            </div>
                                            <div class="cart-content">
                                                <a href="{{ url('/details/cart') }}">
                                                    {{ App\Models\Product::find($wishlist_product->product_id)->product_name }}</a>

                                                <p>${{ App\Models\Product::find($wishlist_product->product_id)->product_price }}
                                                </p>
                                                <i class="fa fa-times"></i>
                                            </div>
                                        </li>
                                    @endforeach --}}


                                    {{-- <li>Subtotol: <span class="pull-right">$70.00</span></li> --}}
                                    <li>
                                        <a href="{{ route('wishlist.show') }}"
                                            class="btn btn-danger text-white">Wishlist</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);"><i
                                        class="flaticon-shop"></i><span>{{ App\Models\Cart::where('generated_cart_id', Cookie::get('generated_cart_id'))->count() }}</span></a>
                                <ul class="cart-wrap dropdown_style">
                                    @php
                                        $sub_total = 0;
                                    @endphp
                                    @foreach (App\Models\Cart::where('generated_cart_id', Cookie::get('generated_cart_id'))->get() as $cart_product)
                                        <li class="cart-items">
                                            <div class="cart-img">
                                                <img width="60px"
                                                    src="{{ asset('uploads/products') }}/{{ App\Models\Product::find($cart_product->product_id)->product_image }}"
                                                    alt="">
                                            </div>
                                            <div class="cart-content">
                                                <a href="{{ url('/details/cart') }}">
                                                    {{ App\Models\Product::find($cart_product->product_id)->product_name }}</a>
                                                <span>QTY : {{ $cart_product->cart_amount }}</span>
                                                <p>${{ App\Models\Product::find($cart_product->product_id)->product_price * $cart_product->cart_amount }}
                                                </p>
                                                <a href="{{ url('/delete/cart') }}/{{ $cart_product->id }}"><i
                                                        class="fa fa-times"></i></a>
                                            </div>
                                        </li>
                                        @php
                                            $sub_total = $sub_total + App\Models\Product::find($cart_product->product_id)->product_price * $cart_product->cart_amount;
                                        @endphp
                                    @endforeach
                                    <li>Subtotol: <span class="pull-right">${{ $sub_total }}</span></li>
                                    <li>
                                        <a href="{{ url('/details/cart') }}" class="btn btn-danger text-white">Check
                                            Out</a>
                                    </li>
                                </ul>
                            </li>


                        </ul>
                    </div>
                    <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                        <div class="responsive-menu-tigger">
                            <a href="javascript:void(0);">
                                <span class="first"></span>
                                <span class="second"></span>
                                <span class="third"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
            <div class="responsive-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-block d-lg-none">
                            <ul class="metismenu">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Shop </a>
                                    <ul aria-expanded="false">
                                        <li><a href="shop.html">Shop Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Pages
                                    </a>
                                    <ul aria-expanded="false">
                                        <li><a href="about.html">About Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Blog</a>
                                    <ul aria-expanded="false">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
        </div>
    </header>
    <!-- header-area end -->



    @yield('content')







    <!-- start social-newsletter-section -->
    <section class="social-newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter text-center">
                        <h3>Subscribe Newsletter</h3>
                        <div class="newsletter-form">
                            <form>
                                <input type="text" class="form-control" placeholder="Enter Your Email Address...">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end social-newsletter-section -->
    <!-- .footer-area start -->
    <div class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="footer-top-item">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="footer-top-text text-center">
                                <ul>
                                    <li><a href="home.html">home</a></li>
                                    <li><a href="#">our story</a></li>
                                    <li><a href="#">feed shop</a></li>
                                    <li><a href="blog.html">how to eat blog</a></li>
                                    <li><a href="contact.html">contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="footer-icon">
                            <ul class="d-flex">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-12">
                        <div class="footer-content">
                            <p>On the other hand, we denounce with righteous indignation and dislike men who are so
                                beguiled and demoralized by the charms of pleasure righteous indignation and dislike</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-8 col-sm-12">
                        <div class="footer-adress">
                            <ul>
                                <li><a href="#"><span>Email:</span> domain@gmail.com</a></li>
                                <li><a href="#"><span>Tel:</span> 0131234567</a></li>
                                <li><a href="#"><span>Adress:</span> 52 Web Bangale , Adress line2 , ip:3105</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="footer-reserved">
                            <ul>
                                <li>Copyright © 2019 Tohoney All rights reserved.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .footer-area end -->

    <!-- jquery latest version -->
    <script src="{{ asset('forntend_asset/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('forntend_asset/js/bootstrap.min.js') }}"></script>
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <script src="{{ asset('forntend_asset/js/owl.carousel.min.js') }}"></script>
    <!-- scrollup.js -->
    <script src="{{ asset('forntend_asset/js/scrollup.js') }}"></script>
    <!-- isotope.pkgd.min.js -->
    <script src="{{ asset('forntend_asset/js/isotope.pkgd.min.js') }}"></script>
    <!-- imagesloaded.pkgd.min.js -->
    <script src="{{ asset('forntend_asset/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- jquery.zoom.min.js -->
    <script src="{{ asset('forntend_asset/js/jquery.zoom.min.js') }}"></script>
    <!-- countdown.js -->
    <script src="{{ asset('forntend_asset/js/countdown.js') }}"></script>
    <!-- swiper.min.js -->
    <script src="{{ asset('forntend_asset/js/swiper.min.js') }}"></script>
    <!-- metisMenu.min.js -->
    <script src="{{ asset('forntend_asset/js/metisMenu.min.js') }}"></script>
    <!-- mailchimp.js -->
    <script src="{{ asset('forntend_asset/js/mailchimp.js') }}"></script>
    <!-- jquery-ui.min.js -->
    <script src="{{ asset('forntend_asset/js/jquery-ui.min.js') }}"></script>
    <!-- main js -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('forntend_asset/js/scripts.js') }}"></script>
    @yield('footer_script')
</body>


<!-- Mirrored from themepresss.com/tf/html/tohoney/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Mar 2020 03:33:34 GMT -->

</html>

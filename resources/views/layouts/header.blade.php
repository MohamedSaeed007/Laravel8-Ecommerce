<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bella Shop</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('frontend') }}/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="{{ asset('frontend') }}/assets/ico/favicon.ico">

    <!-- CSS Global -->
    <link href="{{ asset('frontend') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    @if (LaravelLocalization::getCurrentLocale() == 'ar')
        <link href="{{ asset('frontend') }}/assets/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet">
    @endif
    <link href="{{ asset('frontend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.min.css"
        rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/plugins/animate/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" rel="stylesheet"/>
    @if (LaravelLocalization::getCurrentLocale() == 'ar')
        <!-- Theme CSS -->
        <link href="{{ asset('frontend') }}/bella-rtl/assets/css/theme.css" rel="stylesheet">
        <link href="{{ asset('frontend') }}/bella-rtl/assets/css/theme-green-1.css" rel="stylesheet"
            id="theme-config-link">
    @else
        <!-- Theme CSS -->
        <link href="{{ asset('frontend') }}/bella/assets/css/theme.css" rel="stylesheet">
        <link href="{{ asset('frontend') }}/bella/assets/css/theme-green-1.css" rel="stylesheet"
            id="theme-config-link">
    @endif

    {{-- home page styles --}}
    <link href="{{ asset('frontend') }}/assets/plugins/owl-carousel2/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/plugins/owl-carousel2/assets/owl.theme.default.min.css"
        rel="stylesheet">

    <!-- Head Libs -->
    <script src="{{ asset('frontend') }}/assets/plugins/modernizr.custom.js"></script>

    <!--[if lt IE 9]>
        <script src="{{ asset('frontend') }}/assets/plugins/iesupport/html5shiv.js"></script>
        <script src="{{ asset('frontend') }}/assets/plugins/iesupport/respond.min.js"></script>
        <![endif]-->
</head>

<body id="home" class="wide">
    <!-- PRELOADER -->
    <div id="preloader">
        <div id="preloader-status">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
            <div id="preloader-title">Loading</div>
        </div>
    </div>
    <!-- /PRELOADER -->

    <!-- WRAPPER -->
    <div class="wrapper">

        <!-- Popup: Shopping cart items -->
        <div class="modal fade popup-cart" id="popup-cart" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="container">
                    <div class="cart-items">
                        <div class="cart-items-inner">
                            <div class="media">
                                <a class="pull-left" href="#"><img class="media-object item-image"
                                        src="{{ asset('frontend') }}/assets/img/preview/shop/order-1s.jpg"
                                        alt=""></a>
                                <p class="pull-right item-price">$450.00</p>
                                <div class="media-body">
                                    <h4 class="media-heading item-title"><a href="#">1x Standard Product</a></h4>
                                    <p class="item-desc">Lorem ipsum dolor</p>
                                </div>
                            </div>
                            <div class="media">
                                <p class="pull-right item-price">$450.00</p>
                                <div class="media-body">
                                    <h4 class="media-heading item-title summary">Subtotal</h4>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                    <div>
                                        <a href="#" class="btn btn-theme btn-theme-dark" data-dismiss="modal">Close</a>
                                        <!--
                                            --><a href="shopping-cart.html"
                                            class="btn btn-theme btn-theme-transparent btn-call-checkout">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Popup: Shopping cart items -->

        <!-- Header top bar -->
        <div class="top-bar">
            <div class="container">
                <div class="top-bar-left">
                    <ul class="list-inline">
                        @auth
                            <li class="icon-user"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><img
                                        src="{{ asset('frontend') }}/assets/img/icon-1.png" alt="" />
                                    <span>{{ __('Logout') }}</span></a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hide">
                                @csrf
                            </form>
                        @else
                            <li class="icon-user"><a href="{{ route('login') }}"><img
                                        src="{{ asset('frontend') }}/assets/img/icon-1.png" alt="" />
                                    <span>{{ __('Login') }}</span></a></li>
                            <li class="icon-form"><a href="{{ route('register') }}"><img
                                        src="{{ asset('frontend') }}/assets/img/icon-2.png" alt="" /> <span>Not a Member?
                                        <span class="colored">{{ __('register') }}</span></span></a></li>
                        @endauth

                        <li><a href="mailto:support@yourdomain.com"><i class="fa fa-envelope"></i>
                                <span>support@yourdomain.com</span></a></li>
                    </ul>
                </div>
                <div class="top-bar-right">
                    <ul class="list-inline">
                        <li class="hidden-xs"><a href="about.html">About</a></li>
                        <li class="hidden-xs"><a href="blog.html">Blog</a></li>
                        <li class="hidden-xs"><a href="accountinformation.html">My Account</a></li>
                        <li class="hidden-xs"><a href="contact.html">Contact</a></li>
                        <li class="hidden-xs"><a href="faq.html">FAQ</a></li>
                        <li class="hidden-xs"><a href="wishlist.html">My Wishlist</a></li>
                        <li class="dropdown currency">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">€ EURO<i
                                    class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="#">€ EURO</a></li>
                                <li><a href="#">€ EURO</a></li>
                                <li><a href="#">€ EURO</a></li>
                            </ul>
                        </li>
                        <li class="dropdown flags">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="flag-icon flag-icon-{{ LaravelLocalization::getCurrentLocaleRegional() }}"></span>
                                {{ LaravelLocalization::getCurrentLocaleNative() }}<i
                                    class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="dropdown-menu">
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li><a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"><span class="flag-icon flag-icon-{{ $properties['regional'] }}"></span>
                                        {{ $properties['native'] }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Header top bar -->

        <!-- HEADER -->
        <header class="header fixed">
            <div class="header-wrapper">
                <div class="container">

                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="{{ asset('frontend') }}/assets/img/logo-bella-shop.png"
                                alt="Bella Shop" /></a>
                    </div>
                    <!-- /Logo -->

                    <!-- Header search -->
                    <div class="header-search">
                        <input class="form-control" type="text" placeholder="What are you looking?" />
                        <button><i class="fa fa-search"></i></button>
                    </div>
                    <!-- /Header search -->

                    <!-- Header shopping cart -->
                    <div class="header-cart">
                        <div class="cart-wrapper">
                            <a href="wishlist.html" class="btn btn-theme-transparent hidden-xs hidden-sm"><i
                                    class="fa fa-heart"></i></a>
                            <a href="compare-products.html" class="btn btn-theme-transparent hidden-xs hidden-sm"><i
                                    class="fa fa-exchange"></i></a>
                            <a href="#" class="btn btn-theme-transparent" data-toggle="modal"
                                data-target="#popup-cart"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs"> 0
                                    item(s) - $0.00 </span> <i class="fa fa-angle-down"></i></a>
                            <!-- Mobile menu toggle button -->
                            <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>
                            <!-- /Mobile menu toggle button -->
                        </div>
                    </div>
                    <!-- Header shopping cart -->

                </div>
            </div>
            <div class="navigation-wrapper">
                <div class="container">
                    <!-- Navigation -->
                    <nav class="navigation closed clearfix">
                        <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                        <ul class="nav sf-menu">
                            <li class="active"><a href="index.html">Homepage</a>
                                <ul>
                                    <li><a href="index.html">Homepage 1</a></li>
                                    <li><a href="index-2.html">Homepage 2</a></li>
                                    <li><a href="index-3.html">Homepage 3</a></li>
                                    <li><a href="index-4.html">Homepage 4</a></li>
                                    <li><a href="index-5.html">Homepage 5</a></li>
                                    <li><a href="index-6.html">Homepage 6</a></li>
                                    <li><a href="index-7.html">Homepage 7</a></li>
                                    <li><a href="index-8.html">Homepage 8</a></li>
                                    <li><a href="index-9.html">Homepage 9</a></li>
                                </ul>
                            </li>
                            <li><a href="category.html">Shop</a>
                                <ul>
                                    <li><a href="category.html">Shop Sidebar Left</a></li>
                                    <li><a href="category-right.html">Shop Sidebar Right</a></li>
                                    <li><a href="category-list.html">Shop List View</a></li>
                                    <li><a href="product-details.html">Product Page</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Blog</a>
                                <ul>
                                    <li><a href="blog.html">Blog Sidebar Left </a></li>
                                    <li><a href="blog-right.html">Blog Sidebar Right</a></li>
                                    <li><a href="blog-post.html">Blog Single Post</a></li>
                                </ul>
                            </li>
                            <li><a href="portfolio.html">Portfolio</a>
                                <ul>
                                    <li><a href="portfolio.html">Portfolio 3 columns</a></li>
                                    <li><a href="portfolio-4col.html">Portfolio 4 columns</a></li>
                                    <li><a href="portfolio-alt.html">Portfolio Alternate</a></li>
                                    <li><a href="portfolio-single.html">Portfolio Single</a></li>
                                </ul>
                            </li>
                            <li class="megamenu"><a href="#">Features</a>
                                <ul>
                                    <li class="row">
                                        <div class="col-md-2">
                                            <h4 class="block-title"><span>Womens</span></h4>
                                            <ul>
                                                <li><a href="#">Dresses</a></li>
                                                <li><a href="#">Rompers & Jumpsuits</a></li>
                                                <li><a href="#">Bodysuits</a></li>
                                                <li><a href="#">Shirts & Blouses</a></li>
                                                <li><a href="#">Coats & Jackets</a></li>
                                                <li><a href="#">Blazers</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-2">
                                            <h4 class="block-title"><span>Mens</span></h4>
                                            <ul>
                                                <li><a href="#">T-Shirts & Vests</a></li>
                                                <li><a href="#">Sweaters & Cardigans</a></li>
                                                <li><a href="#">Hoodies & Sweats</a></li>
                                                <li><a href="#">Coats & Jackets</a></li>
                                                <li><a href="#">Shirts</a></li>
                                                <li><a href="#">Shorts</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-2">
                                            <h4 class="block-title"><span>Pages</span></h4>
                                            <ul>
                                                <li><a href="shortcodes.html"><strong>Shortcodes</strong></a></li>
                                                <li><a href="typography.html"><strong>Typography</strong></a></li>
                                                <li><a href="coming-soon.html"><strong>Coming soon</strong></a></li>
                                                <li><a href="error-page.html"><strong>404 Page</strong></a></li>
                                                <li><a href="about.html"><strong>About</strong></a></li>
                                                <li><a href="login.html"><strong>Login</strong></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-2 visible-xs">
                                            <h4 class="block-title"><span>My Account</span></h4>
                                            <ul>
                                                <li><a href="accountinformation.html"> Account Information </a></li>
                                                <li><a href="myaccount.html">My Account</a></li>
                                                <li><a href="cng-pw.html">Change Password</a></li>
                                                <li><a href="address-book.html">Address Books</a></li>
                                                <li><a href="order-history.html">Order History</a></li>
                                                <li><a href="review-rating.html">Reviews and Ratings</a></li>
                                                <li><a href="return.html">Returns Requests</a></li>
                                                <li><a href="newsletter.html">Newsletter</a></li>
                                                <li><a href="myaccount-leftsidebar.html">Left Sidebar</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-3">
                                            <h4 class="block-title"><span>Header styles</span></h4>
                                            <ul>
                                                <li><a href="index-style-1.html"><strong>Header style 1</strong></a>
                                                </li>
                                                <li><a href="index-style-2.html"><strong>Header style 2</strong></a>
                                                </li>
                                                <li><a href="index-style-3.html"><strong>Header style 3</strong></a>
                                                </li>
                                                <li><a href="index-style-4.html"><strong>Header style 4</strong></a>
                                                </li>
                                                <li><a href="index-style-5.html"><strong>Header style 5</strong></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product-list">
                                                <div class="media">
                                                    <a class="pull-left media-link" href="#">
                                                        <img class="media-object"
                                                            src="{{ asset('frontend') }}/assets/img/preview/shop/top-sellers-2.jpg"
                                                            alt="">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><a href="#">Standard Product
                                                                Header</a></h4>
                                                        <div class="rating">
                                                            <span class="star"></span>
                                                            <!--
                                                                --><span class="star active"></span>
                                                            <!--
                                                                --><span class="star active"></span>
                                                            <!--
                                                                --><span class="star active"></span>
                                                            <!--
                                                                --><span class="star active"></span>
                                                        </div>
                                                        <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                                    </div>
                                                </div>
                                                <div class="media">
                                                    <a class="pull-left media-link" href="#">
                                                        <img class="media-object"
                                                            src="{{ asset('frontend') }}/assets/img/preview/shop/top-sellers-3.jpg"
                                                            alt="">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><a href="#">Standard Product
                                                                Header</a></h4>
                                                        <div class="rating">
                                                            <span class="star"></span>
                                                            <!--
                                                                --><span class="star active"></span>
                                                            <!--
                                                                --><span class="star active"></span>
                                                            <!--
                                                                --><span class="star active"></span>
                                                            <!--
                                                                --><span class="star active"></span>
                                                        </div>
                                                        <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="category.html">Men</a></li>
                            <li><a href="category.html">Women</a></li>
                            <li><a href="category.html">Kids</a></li>
                            <li><a href="category.html">New</a></li>
                            <li class="sale"><a href="category.html">Sale</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                    <!-- /Navigation -->
                </div>
            </div>
        </header>
        <!-- /HEADER -->

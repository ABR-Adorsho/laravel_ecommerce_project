<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('pageTitle')</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('/')}}front/assets/images/icons/favicon.png">

    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700,800', 'Playfair+Display:900', 'Shadows+Into+Light:400']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = '{{asset('/')}}front/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('/')}}front/assets/css/bootstrap.min.css">



    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('/')}}front/assets/css/demo14.min.css">
    <link rel="stylesheet" href="{{asset('/')}}front/assets/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}front/assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}front/assets/vendor/fontawesome-free/css/all.min.css">
</head>

<body>
<div class="page-wrapper">

    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="header-left header-dropdowns">
                    <div class="header-dropdown lang-menu">
                        <a href="#">
                            <i class="flag-us flag"></i>ENG</a>
                        <div class="header-menu">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="flag-us flag mr-2"></i>ENG</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="flag-fr flag mr-2"></i>FRA</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End .header-menu -->
                    </div>
                    <!-- End .header-dropown -->

                    <div class="header-dropdown lang-menu">
                        <a href="#">USD</a>
                        <div class="header-menu">
                            <ul>
                                <li>
                                    <a href="#">EUR</a>
                                </li>
                                <li>
                                    <a href="#">USD</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End .header-menu -->
                    </div>
                    <!-- End .header-dropown -->
                </div>
                <!-- End .header-left -->

                <div class="header-right">
                    <p class="top-message text-uppercase d-none d-sm-block">Free returns. Standard shipping orders $99+
                    </p>

                    <span class="separator"></span>

                    <div class="header-dropdown dropdown-expanded mx-2 px-1">
                        <a href="#">Links</a>
                        <div class="header-menu">
                            <ul>
                                <li>
                                    <a href="contact.html">Contact Us</a>
                                </li>
                                <li>
                                    <a href="blog.html">Blog</a>
                                </li>
                                <li>
                                    <a href="contact.html">Wishlist</a>
                                </li>

                                @if(Session::get('customer_id'))
                                    <li>
                                        <a href="{{route('customer-dashboard')}}">
                                            <i class="fa fa-user"></i> Hello, {{Session::get('customer_name')}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('customer-logout')}}">Log Out</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('customer-account')}}">Log In/Register</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <!-- End .header-menu -->
                    </div>
                    <!-- End .header-dropown -->

                    <span class="separator"></span>

                    <div class="social-icons d-flex">
                        <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
                        <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a>
                        <a href="#" class="social-icon social-instagram icon-instagram" target="_blank"></a>
                    </div>
                    <!-- End .social-icons -->
                </div>
                <!-- End .header-right -->
            </div>
            <!-- End .container -->
        </div>
        <!-- End .header-top -->

        <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
            <div class="container">
                <div class="header-left w-lg-max ml-auto ml-lg-0">
                    <div class="header-icon header-search header-search-inline header-search-category">
                        <a href="#" class="search-toggle" role="button">
                            <i class="icon-magnifier"></i>
                        </a>
                        <form action="#" method="get">
                            <div class="header-search-wrapper">
                                <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                                <div class="select-custom body-text">
                                    <select id="cat" name="cat">
                                        @foreach($categories as $category)
                                            <option value="">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- End .select-custom -->
                                <button class="btn icon-magnifier p-0" type="submit"></button>
                            </div>
                            <!-- End .header-search-wrapper -->
                        </form>
                    </div>
                    <!-- End .header-search -->
                </div>
                <!-- End .header-left -->

                <div class="header-center order-first order-lg-0 ml-0 ml-lg-auto">
                    <button class="mobile-menu-toggler" type="button">
                        <i class="fas fa-bars"></i>
                    </button>
                    <a href="{{route('home')}}" class="logo">
                        <img src="{{asset('/')}}front/assets/images/logo-black.png" alt="Porto Logo" width="202" height="80">
                    </a>
                </div>
                <!-- End .header-center -->

                <div class="header-right w-lg-max ml-0 ml-lg-auto">
                    <div class="header-contact d-none d-lg-flex align-items-center ml-auto mr-4">
                        <i class="icon-phone-2"></i>
                        <h6 class="line-height-1 pr-2">Call us now
                            <a href="tel:#" class="d-block text-dark font1">+8801774526244</a>
                        </h6>
                    </div>
                    <!-- End .header-contact -->

                    @if(Session::get('customer_id'))
                        <a href="{{route('customer-dashboard')}}" class="header-icon" title="login">
                            <i class="icon-user-2"></i>
                        </a>
                    @else
                        <a href="{{route('customer-account')}}" class="header-icon" title="login">
                            <i class="icon-user-2"></i>
                        </a>
                    @endif

                    <a href="#" class="header-icon btn-wishlist pl-1 pr-2">
                        <i class="icon-wishlist-2"></i>
                    </a>

                    <div class="dropdown cart-dropdown">
                        <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <i class="minicart-icon"></i>
                            <span class="cart-count badge-circle">{{count($cartProducts)}}</span>
                        </a>

                        <div class="cart-overlay"></div>

                        <div class="dropdown-menu mobile-cart">
                            <a href="#" title="Close (Esc)" class="btn-close">×</a>

                            <div class="dropdownmenu-wrapper custom-scrollbar">
                                <div class="dropdown-cart-header">Shopping Cart</div>
                                <!-- End .dropdown-cart-header -->

                                <div class="dropdown-cart-products">
                                    @php($total = 0)
                                    @foreach($cartProducts as $cartProduct)
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="{{route('product-detail', ['id' => $cartProduct->id])}}">{{$cartProduct->name}}</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                        <span class="cart-product-qty">{{$cartProduct->quantity}}</span> × Tk. {{$cartProduct->price}}
                                                </span>

                                                <p class="cart-product-info">Item-Total: Tk. {{number_format($cartProduct->quantity*$cartProduct->price)}}</p>
                                            </div>
                                            <!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="product-detail.html" class="product-image">
                                                    <img src="{{asset($cartProduct->attributes->image)}}" alt="product" width="80" height="80">
                                                </a>

                                                <a href="{{route('delete-cart-product', ['id' => $cartProduct->id])}}" class="btn-remove" title="Remove Product">
                                                    <span>×</span>
                                                </a>
                                            </figure>
                                        </div>
                                        <!-- End .product -->

                                        @php($total += ($cartProduct->price*$cartProduct->quantity))
                                    @endforeach
                                </div>
                                <!-- End .cart-product -->
                                @if($total!=0)
                                    <div class="dropdown-cart-total">
                                        <span>Cart Subtotal</span>

                                        <span class="cart-total-price float-right">Tk. {{number_format($total)}}</span>
                                    </div>
                                    <!-- End .dropdown-cart-total -->
                                    <div class="dropdown-cart-action">
                                        <a href="{{route('show-cart')}}" class="btn btn-gray btn-block view-cart">View Cart
                                        </a>
                                        <a href="{{route('checkout')}}" class="btn btn-dark btn-block">Checkout</a>
                                    </div>
                                    <!-- End .dropdown-cart-total -->
                                @else
                                    <div style="margin-bottom: 30px;"></div>
                                    <div class="product" style="border-top: 1px solid #e6ebee;">
                                        <div class="product-details">
                                            <h4 class="product-title" style="padding-left: 60px; padding-top: 10px;">
                                               Your Cart is Empty
                                            </h4>
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <!-- End .product -->
                                @endif
                            </div>
                            <!-- End .dropdownmenu-wrapper -->
                        </div>
                        <!-- End .dropdown-menu -->
                    </div>
                    <!-- End .dropdown -->
                </div>
                <!-- End .header-right -->
            </div>
            <!-- End .container -->
        </div>
        <!-- End .header-middle -->

        <div class="header-bottom sticky-header d-lg-block d-none" data-sticky-options="{'mobile': false}">
            <div class="container">
                <div class="header-left">
                    <a href="{{route('home')}}" class="logo">
                        <img src="{{asset('/')}}front/assets/images/logo-black.png" class="white-logo sticky-logo" alt="Porto Logo" width="110" height="46">
                    </a>
                </div>
                <nav class="main-nav d-flex w-lg-max justify-content-center">
                    <ul class="menu">
                        <li class="active">
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        @foreach($categories as $category)
                            <li>
                                <a href="{{route('product-category', ['id' => $category->id])}}">{{$category->name}}</a>
                                @if(count($category->subCategories) > 0 )
                                    <ul>
                                        @foreach($category->subCategories as $subCategory)
                                            <li>
                                                <a href="{{route('product-sub-category', ['id' => $subCategory->id])}}">{{$subCategory->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                            </li>
                        @endforeach
                    </ul>
                </nav>
                <div class="header-right">
                    <div class="header-search header-icon header-search-inline header-search-category w-lg-max">
                        <a href="#" class="search-toggle" role="button">
                            <i class="icon-magnifier"></i>
                        </a>
                        <form action="#" method="get">
                            <div class="header-search-wrapper">
                                <input type="search" class="form-control" name="q" id="qqq" placeholder="Search..." required>
                                <div class="select-custom">
                                    <select id="cat-1" name="cat">
                                        @foreach($categories as $category)
                                            <option value="">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- End .select-custom -->
                                <button class="btn p-0 icon-magnifier" type="submit"></button>
                            </div>
                            <!-- End .header-search-wrapper -->
                        </form>
                    </div>
                    <!-- End .header-search -->

                    @if(Session::get('customer_id'))
                        <a href="{{route('customer-dashboard')}}" class="header-icon" title="login">
                            <i class="icon-user-2"></i>
                        </a>
                    @else
                        <a href="{{route('customer-account')}}" class="header-icon" title="login">
                            <i class="icon-user-2"></i>
                        </a>
                    @endif

                    <a href="wishlist.html" class="header-icon">
                        <i class="icon-wishlist-2"></i>
                    </a>

                    <div class="dropdown cart-dropdown">
                        <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <i class="minicart-icon"></i>
                            <span class="cart-count badge-circle">{{count($cartProducts)}}</span>
                        </a>

                        <div class="cart-overlay"></div>

                        <div class="dropdown-menu mobile-cart">
                            <a href="#" title="Close (Esc)" class="btn-close">×</a>

                            <div class="dropdownmenu-wrapper custom-scrollbar">
                                <div class="dropdown-cart-header">Shopping Cart</div>
                                <!-- End .dropdown-cart-header -->

                                <div class="dropdown-cart-products">
                                    <div class="product">
                                        <div class="product-details">
                                            <h4 class="product-title">
                                                <a href="product-detail.html">Ultimate 3D Bluetooth Speaker</a>
                                            </h4>

                                            <span class="cart-product-info">
													<span class="cart-product-qty">1</span> × $99.00
                                                </span>
                                        </div>
                                        <!-- End .product-details -->

                                        <figure class="product-image-container">
                                            <a href="product-detail.html" class="product-image">
                                                <img src="{{asset('/')}}front/assets/images/products/product-1.jpg" alt="product" width="80" height="80">
                                            </a>

                                            <a href="#" class="btn-remove" title="Remove Product">
                                                <span>×</span>
                                            </a>
                                        </figure>
                                    </div>
                                    <!-- End .product -->

                                    <div class="product">
                                        <div class="product-details">
                                            <h4 class="product-title">
                                                <a href="product-detail.html">Brown Women Casual HandBag</a>
                                            </h4>

                                            <span class="cart-product-info">
													<span class="cart-product-qty">1</span> × $35.00
                                                </span>
                                        </div>
                                        <!-- End .product-details -->

                                        <figure class="product-image-container">
                                            <a href="product-detail.html" class="product-image">
                                                <img src="{{asset('/')}}front/assets/images/products/product-2.jpg" alt="product" width="80" height="80">
                                            </a>

                                            <a href="#" class="btn-remove" title="Remove Product">
                                                <span>×</span>
                                            </a>
                                        </figure>
                                    </div>
                                    <!-- End .product -->

                                    <div class="product">
                                        <div class="product-details">
                                            <h4 class="product-title">
                                                <a href="product-detail.html">Circled Ultimate 3D Speaker</a>
                                            </h4>

                                            <span class="cart-product-info">
													<span class="cart-product-qty">1</span> × $35.00
                                                </span>
                                        </div>
                                        <!-- End .product-details -->

                                        <figure class="product-image-container">
                                            <a href="product-detail.html" class="product-image">
                                                <img src="{{asset('/')}}front/assets/images/products/product-3.jpg" alt="product" width="80" height="80">
                                            </a>
                                            <a href="#" class="btn-remove" title="Remove Product">
                                                <span>×</span>
                                            </a>
                                        </figure>
                                    </div>
                                    <!-- End .product -->
                                </div>
                                <!-- End .cart-product -->

                                <div class="dropdown-cart-total">
                                    <span>SUBTOTAL:</span>

                                    <span class="cart-total-price float-right">$134.00</span>
                                </div>
                                <!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="cart.html" class="btn btn-gray btn-block view-cart">View Cart
                                    </a>
                                    <a href="checkout.html" class="btn btn-dark btn-block">Checkout</a>
                                </div>
                                <!-- End .dropdown-cart-total -->
                            </div>
                            <!-- End .dropdownmenu-wrapper -->
                        </div>
                        <!-- End .dropdown-menu -->
                    </div>
                    <!-- End .dropdown -->
                </div>
            </div>
            <!-- End .container -->
        </div>
        <!-- End .header-bottom -->
    </header>
    <!-- End .header -->

    @yield('mainContent')

    <footer class="footer bg-dark position-relative">
        <div class="footer-middle">
            <div class="container position-static">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="widget">
                            <h4 class="widget-title font-weight-bold">Contact Info</h4>
                            <ul class="contact-info">
                                <li>
                                    <span class="contact-info-label">Address:</span>1234 Street Name, City, England
                                </li>
                                <li>
                                    <span class="contact-info-label">Phone:</span>
                                    <a href="tel:">(123) 456-7890
                                    </a>
                                </li>
                                <li>
                                    <span class="contact-info-label">Email:</span>
                                    <a href="mailto:mail@example.com">mail@example.com</a>
                                </li>
                                <li>
                                    <span class="contact-info-label">Working Days/Hours:</span> Mon - Sun / 9:00 AM - 8:00 PM
                                </li>
                            </ul>
                            <div class="social-icons">
                                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                <a href="#" class="social-icon social-instagram icon-instagram" target="_blank" title="instagram"></a>
                            </div>
                            <!-- End .social-icons -->
                        </div>
                        <!-- End .widget -->
                    </div>
                    <!-- End .col-lg-3 -->

                    <div class="col-lg-9 col-md-8">
                        <div class="widget widget-newsletter">
                            <h4 class="widget-title">Subscribe newsletter</h4>
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-12 mb-1">
                                    <p class="mb-0">Get all the latest information on Events, Sales and Offers. Sign up for newsletter today.</p>
                                </div>
                                <!-- End .col-lg-6 -->

                                <div class="col-lg-6 col-md-12 mb-1">
                                    <form action="#" class="d-flex mb-0 w-100">
                                        <input type="email" class="form-control mb-0" placeholder="Email address" required>

                                        <input type="submit" class="btn btn-primary shadow-none" value="Subscribe">
                                    </form>
                                </div>
                                <!-- End .col-lg-6 -->
                            </div>
                            <!-- End .row -->
                        </div>
                        <!-- End .widget -->

                        <div class="row widget-middle">
                            <div class="col-sm-5">
                                <div class="widget">
                                    <h4 class="widget-title">Customer Service</h4>

                                    <div class="links link-parts row mb-0">
                                        <ul class="link-part col-lg-6 col-md-12">
                                            <li>
                                                <a href="demo14-about.html">About us</a>
                                            </li>
                                            <li>
                                                <a href="contact.html">Contact us</a>
                                            </li>
                                            <li>
                                                <a href="{{route('login')}}">My Account</a>
                                            </li>
                                        </ul>
                                        <ul class="link-part col-lg-6 col-md-12">
                                            <li>
                                                <a href="#">Order history</a>
                                            </li>
                                            <li>
                                                <a href="#">Advanced search</a>
                                            </li>
                                            <li>
                                                <a href="{{route('login')}}">Login</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End .widget -->
                            </div>
                            <!-- End .col-sm-6 -->

                            <div class="col-sm-7">
                                <div class="widget">
                                    <h4 class="widget-title">About Us</h4>

                                    <div class="links link-parts row mb-0">
                                        <ul class="link-part col-lg-6 col-md-12">
                                            <li>
                                                <a href="#">Super Fast Html Template</a>
                                            </li>
                                            <li>
                                                <a href="#">1st Fully working Ajax Theme</a>
                                            </li>
                                            <li>
                                                <a href="#">36 Unique Shop Layouts</a>
                                            </li>
                                        </ul>
                                        <ul class="link-part col-lg-6 col-md-12">
                                            <li>
                                                <a href="#">Powerful Admin Panel</a>
                                            </li>
                                            <li>
                                                <a href="#">Mobile & Retina Optimized</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End .widget -->
                            </div>
                            <!-- End .col-sm-6 -->
                        </div>
                        <!-- End .row -->
                    </div>
                    <!-- End .col-lg-9 -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .container -->
        </div>
        <!-- End .footer-middle -->

        <div class="container">
            <div class="footer-bottom d-sm-flex align-items-center">
                <div class="footer-left">
                    <span class="footer-copyright">© BlueTorpedo 2022. All Rights Reserved.</span>
                </div>

                <div class="footer-right ml-auto mt-1 mt-sm-0">
                    <div class="payment-icons mr-0">
                        <span class="payment-icon visa" style="background-image: url({{asset('/')}}front/assets/images/payments/payment-visa.svg)"></span>
                        <span class="payment-icon paypal" style="background-image: url({{asset('/')}}front/assets/images/payments/payment-paypal.svg)"></span>
                        <span class="payment-icon stripe" style="background-image: url({{asset('/')}}front/assets/images/payments/payment-stripe.png)"></span>
                        <span class="payment-icon verisign" style="background-image:  url({{asset('/')}}front/assets/images/payments/payment-verisign.svg)"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .footer-bottom -->
    </footer>
    <!-- End .footer -->
</div>

<div class="loading-overlay">
    <div class="bounce-loader">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<div class="mobile-menu-overlay"></div>
<!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close">
				<i class="fa fa-times"></i>
			</span>
        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <form class="search-wrapper mb-2" action="#">
                    <input type="text" class="form-control mb-0" placeholder="Search..." required />
                    <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
                </form>
                <li class="active">
                    <a href="{{route('home')}}">Home</a>
                </li>
                @foreach($categories as $category)
                    <li>
                        <a href="{{route('product-category', ['id' => $category->id])}}">{{$category->name}}</a>
                        @if(count($category->subCategories) > 0 )
                            <ul>
                                @foreach($category->subCategories as $subCategory)
                                    <li>
                                        <a href="#">{{$subCategory->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                    </li>
                @endforeach
            </ul>

            <ul class="mobile-menu">
                <li>
                    <a href="{{route('login')}}">My Account</a>
                </li>
                <li>
                    <a href="contact.html">Contact Us</a>
                </li>
                <li>
                    <a href="blog.html">Blog</a>
                </li>
                <li>
                    <a href="wishlist.html">My Wishlist</a>
                </li>
                <li>
                    <a href="cart.html">Cart</a>
                </li>
                <li>
                    <a href="{{route('login')}}" class="login-link">Log In</a>
                </li>
            </ul>
        </nav>
        <!-- End .mobile-nav -->

        <div class="social-icons">
            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
            </a>
            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
            </a>
            <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
            </a>
        </div>
    </div>
    <!-- End .mobile-menu-wrapper -->
</div>
<!-- End .mobile-menu-container -->

<div class="sticky-navbar">
    <div class="sticky-info">
        <a href="{{route('home')}}">
            <i class="icon-home"></i>Home
        </a>
    </div>
    <div class="sticky-info">
        <a href="{{route('product-category', ['id' => $category->id])}}" class="">
            <i class="icon-bars"></i>Categories
        </a>
    </div>
    <div class="sticky-info">
        <a href="wishlist.html" class="">
            <i class="icon-wishlist-2"></i>Wishlist
        </a>
    </div>
    <div class="sticky-info">
        @if(Session::get('customer_id'))
         <a href="{{route('customer-dashboard')}}" class="">
            <i class="icon-user-2"></i>Account
        </a>
        @else
            <a href="{{route('customer-account')}}" class="">
                <i class="icon-user-2"></i>Account
            </a>
        @endif
    </div>
    <div class="sticky-info">
        <a href="cart.html" class="">
            <i class="icon-shopping-cart position-relative">
                <span class="cart-count badge-circle">{{count($cartProducts)}}</span>
            </i>Cart
        </a>
    </div>
</div>


<a id="scroll-top" href="#top" title="Top" role="button">
    <i class="icon-angle-up"></i>
</a>

<!-- Plugins JS File -->
<script src="{{asset('/')}}front/assets/js/jquery.min.js"></script>
<script src="{{asset('/')}}front/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}front/assets/js/plugins.min.js"></script>
<script src="{{asset('/')}}front/assets/js/nouislider.min.js"></script>

<!-- Main JS File -->
<script src="{{asset('/')}}front/assets/js/main.min.js"></script>
</body>

</html>

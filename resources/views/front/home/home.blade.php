@extends('master.front.master')

@section('pageTitle')
    Homepage | Bluetorpedo
@endsection

@section('mainContent')
    <main class="main">
        <section class="home-slider owl-carousel owl-theme text-uppercase nav-big bg-gray" data-owl-options="{
					'loop': false
				}">
            <div class="home-slide home-slide2 banner">
                <img class="slide-bg" src="{{asset('/')}}front/assets/images/demoes/demo14/slider/slide-2.jpg" alt="slider image" width="1120" height="500" style="background-color: #eee;">

                <div class="container">
                    <div class="banner-layer banner-layer-middle banner-layer-left">
                        <h4 class="mb-0">Extra</h4>
                        <h3 class="m-b-2">20% off</h3>
                        <h3 class="m-b-3 heading-border">Accessories</h3>
                        <h2 class="m-b-4">Drones on sale</h2>
                        <a href="demo14-shop.html" class="btn btn-block btn-dark">Shop All Sale</a>
                    </div>
                </div>
                <!-- End .container -->
            </div>
            <!-- End .home-slide -->
        </section>
        <!-- End .home-slider -->

        <div class="info-boxes-container bg-gray">
            <div class="container py-3">
                <div class="info-boxes-slider owl-carousel owl-theme py-3" data-owl-options="{
							'dots': false,
							'margin': 20,
							'loop': false,
							'responsive': {
								'576': {
									'items': 2
								},
								'992': {
									'items': 3
								}
							}
						}">
                    <div class="info-box info-box-icon-left">
                        <i class="icon-shipping"></i>

                        <div class="info-box-content">
                            <h4 class="pb-1">FREE SHIPPING & RETURN</h4>
                            <p>Free shipping on all orders over $99</p>
                        </div>
                        <!-- End .info-box-content -->
                    </div>
                    <!-- End .info-box -->

                    <div class="info-box info-box-icon-left">
                        <i class="icon-money"></i>

                        <div class="info-box-content">
                            <h4 class="pb-1">MONEY BACK GUARANTEE</h4>
                            <p>100% money back guarantee</p>
                        </div>
                        <!-- End .info-box-content -->
                    </div>
                    <!-- End .info-box -->

                    <div class="info-box info-box-icon-left">
                        <i class="icon-support"></i>

                        <div class="info-box-content">
                            <h4 class="pb-1">ONLINE SUPPORT 24/7</h4>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                        <!-- End .info-box-content -->
                    </div>
                    <!-- End .info-box -->
                </div>
                <!-- End .info-boxes-slider -->
            </div>
            <!-- End .container -->
        </div>
        <!-- End .info-boxes-container -->

        <div class="home-product-tabs product-slider-tab mt-5 pt-5 pt-md-0">
            <div class="container">
                <!--- New Featured Products --->
                <section class="featured-products-section appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="100">
                    <h4 class="text-uppercase text-center heading-bottom-border mt-4 mb-2">Latest Arrivals</h4>
                    <div class="owl-carousel owl-theme show-nav-hover nav-outer nav-image-center" data-owl-options="{
					'dots': false,
					'margin': 20,
					'loop': false,
					'nav': true,
					'autoplay': true,
					'responsive': {
						'480': {
							'items': 2
						},
						'768': {
							'items': 3
						},
						'992': {
							'items': 5
						}
					}}">
                        @foreach($products as $product)
                        <div class="product-default left-details product-unfold">
                            <figure>
                                <a href="{{route('product-detail', ['id' => $product->id])}}">
                                    <img src="{{asset($product->image)}}" width="300" height="300" alt="product">
                                    <img src="{{asset($product->otherImages[1]->image)}}" width="300" height="300" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="category.html" class="product-category">{{$product->category->name}}</a>,
                                    <a href="category.html" class="product-category">{{$product->subCategory->name}}</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="{{route('product-detail', ['id' => $product->id])}}">{{$product->name}}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">Tk. {{number_format($product->selling_price)}}</span>
                                </div>
                                <!-- End .price-box -->
                                <div class="product-action">
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('quantity{{$product->id}}').submit()" class="btn-icon btn-add-cart product-type-simple">
                                        <i class="icon-shopping-cart"></i><span>ADD TO CART</span>
                                    </a>
                                    <a href="wishlist.html" class="btn-icon-wish" style="margin-left: 5px;" title="wishlist">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                            <form action="{{route('add-to-cart', ['id' => $product->id])}}" id="quantity{{$product->id}}" method="post" type="hidden">
                                @csrf
                                <input type="hidden" value="1" name="qty">
                            </form>
                        </div>
                        @endforeach
                    </div>

                </section>
            </div>
            <!-- End .container -->
        </div>
        <!-- End .home-product-tabs -->


        <div class="promo-section bg-gray" data-parallax="{'speed': 2, 'enableOnMobile': true}" data-image-src="{{asset('/')}}front/assets/images/demoes/demo14/banners/promo-bg.png">
            <div class="promo-banner banner container text-uppercase">
                <div class="banner-content row align-items-center text-center">
                    <div class="col-md-4 ml-xl-auto text-md-right left-text">
                        <h2 class="mb-md-0">Top electronic
                            <br>Deals</h2>
                    </div>
                    <div class="col-md-3 pb-4 pb-md-0">
                        <a href="#" class="btn btn-primary ls-10">View Sale</a>
                    </div>
                    <div class="col-md-4 mr-xl-auto text-md-left right-text">
                        <h4 class="mb-1 coupon-sale-text p-0 d-block text-transform-none">
                            <b class="bg-dark text-white font1">Exclusive COUPON</b>
                        </h4>
                        <h5 class="mb-2 coupon-sale-text ls-10 p-0">
                            <i class="ls-0">UP TO</i>
                            <b class="text-white bg-secondary">$100</b> OFF</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <hr class="mb-5">

            <div class="product-widgets row pt-1">
                <div class="col-md-4 col-sm-6 pb-5">
                    <h4 class="section-sub-title text-uppercase">Top Rated Products</h4>
                    <!-- product-1 -->
                    <div class="product-default left-details product-widget mb-2">
                        <figure>
                            <a href="demo14-product.html">
                                <img src="{{asset('/')}}front/assets/images/demoes/demo14/products/small/1.jpg" width="175" height="175" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="demo14-shop.html" class="product-category">TOYS</a>,
                                <a href="demo14-shop.html" class="product-category">WATCHES</a>
                            </div>
                            <h3 class="product-title"> <a href="demo14-product.html">25 Acoustic Noise</a> </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:100%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$299.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                    <!-- product-2 -->
                    <div class="product-default left-details product-widget mb-2">
                        <figure>
                            <a href="demo14-product.html">
                                <img src="{{asset('/')}}front/assets/images/demoes/demo14/products/small/2.jpg" width="175" height="175" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="demo14-shop.html" class="product-category">HEADPHONE</a>,
                                <a href="demo14-shop.html" class="product-category">TROUSERS</a>
                            </div>
                            <h3 class="product-title"> <a href="demo14-product.html">Porto Evolution Headset</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:100%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top">5.00</span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$101.00 – $111.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                    <!-- product-3 -->
                    <div class="product-default left-details product-widget mb-2">
                        <figure>
                            <a href="demo14-product.html">
                                <img src="{{asset('/')}}front/assets/images/demoes/demo14/products/small/3.jpg" width="175" height="175" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="demo14-shop.html" class="product-category">TOYS</a>,
                                <a href="demo14-shop.html" class="product-category">WAYCHES</a>
                            </div>
                            <h3 class="product-title"> <a href="demo14-product.html">Porto Sticky info</a> </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$101.00 – $111.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 pb-5">
                    <h4 class="section-sub-title text-uppercase">Best Selling Products</h4>
                    <!-- product-4 -->
                    <div class="product-default left-details product-widget mb-2">
                        <figure>
                            <a href="demo14-product.html">
                                <img src="{{asset('/')}}front/assets/images/demoes/demo14/products/small/3.jpg" width="175" height="175" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="demo14-shop.html" class="product-category">TOYS</a>,
                                <a href="demo14-shop.html" class="product-category">WAYCHES</a>
                            </div>
                            <h3 class="product-title"> <a href="demo14-product.html">Porto Sticky info</a> </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$101.00 – $111.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                    <!-- product-5 -->
                    <div class="product-default left-details product-widget mb-2">
                        <figure>
                            <a href="demo14-product.html">
                                <img src="{{asset('/')}}front/assets/images/demoes/demo14/products/small/4.jpg" width="175" height="175" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="demo14-shop.html" class="product-category">HEADPHONE</a>,
                                <a href="demo14-shop.html" class="product-category">WATCHES</a>
                            </div>
                            <h3 class="product-title"> <a href="demo14-product.html">Porto Headset</a> </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$39.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                    <!-- product-6 -->
                    <div class="product-default left-details product-widget mb-2">
                        <figure>
                            <a href="demo14-product.html">
                                <img src="{{asset('/')}}front/assets/images/demoes/demo14/products/small/5.jpg" width="175" height="175" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="demo14-shop.html" class="product-category">TOYS</a>,
                                <a href="demo14-shop.html" class="product-category">WATCHES</a>
                            </div>
                            <h3 class="product-title"> <a href="demo14-product.html">Porto Both Sticky info</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top">5.00</span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$101.00 – $108.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 pb-5">
                    <h4 class="section-sub-title text-uppercase">Latest Products</h4>
                    <!-- product-7 -->
                    <div class="product-default left-details product-widget mb-2">
                        <figure>
                            <a href="demo14-product.html">
                                <img src="{{asset('/')}}front/assets/images/demoes/demo14/products/small/6.jpg" width="175" height="175" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="demo14-shop.html" class="product-category">T-SHIRTS</a>,
                                <a href="demo14-shop.html" class="product-category">WATCHES</a>
                            </div>
                            <h3 class="product-title"> <a href="demo14-product.html">IdeaPad</a> </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:100%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top">5.00</span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <del class="old-price">$1,999.00</del>
                                <span class="product-price">$1,699.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                    <!-- product-8 -->
                    <div class="product-default left-details product-widget mb-2">
                        <figure>
                            <a href="demo14-product.html">
                                <img src="{{asset('/')}}front/assets/images/demoes/demo14/products/small/5.jpg" width="175" height="175" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="demo14-shop.html" class="product-category">TOYS</a>,
                                <a href="demo14-shop.html" class="product-category">WATCHES</a>
                            </div>
                            <h3 class="product-title"> <a href="demo14-product.html">Porto Both Sticky info</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top">5.00</span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$101.00 – $108.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                    <!-- product-9 -->
                    <div class="product-default left-details product-widget mb-2">
                        <figure>
                            <a href="demo14-product.html">
                                <img src="{{asset('/')}}front/assets/images/demoes/demo14/products/small/4.jpg" width="175" height="175" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="demo14-shop.html" class="product-category">HEADPHONE</a>,
                                <a href="demo14-shop.html" class="product-category">WATCHES</a>
                            </div>
                            <h3 class="product-title"> <a href="demo14-product.html">Porto Headset</a> </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$39.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
            </div>
            <!-- End .product-widgets -->
        </div>
        <!-- End .container -->
    </main>
    <!-- End .main -->
@endsection

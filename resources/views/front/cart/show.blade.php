@extends('master.front.master')

@section('pageTitle')
    BlueTorpedo - View Cart

@endsection

@section('mainContent')

    <main class="main">
        <div class="container">
            <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
                <li class="active">
                    <a href="cart.html">Shopping Cart</a>
                </li>
                <li>
                    <a href="checkout.html">Checkout</a>
                </li>
                <li class="disabled">
                    <a href="cart.html">Order Complete</a>
                </li>
            </ul>

            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-table-container">
                        <h4 class="my-3 text-center">{{Session::get('message')}}</h4>
                        <table class="table table-cart">
                            <thead>
                            <tr>
                                <th class="thumbnail-col  text-left"></th>
                                <th class="product-col  text-left">Product Name</th>
                                <th class="price-col  text-left">Unit Price</th>
                                <th class="qty-col text-center">Quantity</th>
                                <th class="text-right">Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php($total = 0 )
                            @foreach($cartProducts as $cartProduct)
                                <tr class="product-row">
                                    <td>
                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="{{asset($cartProduct->attributes->image)}}" alt="product">
                                            </a>

                                            <a href="{{route('delete-cart-product', ['id' => $cartProduct->id])}}" class="btn-remove icon-cancel" title="Remove Product"></a>
                                        </figure>
                                    </td>
                                    <td class="product-col">
                                        <h5 class="product-title">
                                            <a href="product.html">{{$cartProduct->name}}</a>
                                        </h5>
                                    </td>
                                    <td>Tk. {{number_format($cartProduct->price)}}</td>
                                    <td class="text-center">
                                        <form style="margin-bottom: 0;" action="{{route('update-cart-product', ['id' => $cartProduct->id])}}" method="post" id="updateCart">
                                            @csrf
                                            <div class="product-single-qty">
                                                <input class="horizontal-quantity form-control" value="{{$cartProduct->quantity}}" name="qty" type="number">
                                            </div><!-- End .product-single-qty -->
                                            <button class="btn btn-primary btn-sm align-center"><i class="fa fa-edit"></i></button>
                                        </form>
                                    </td>
                                    <td class="text-right"><span class="subtotal-price">Tk. {{number_format($cartProduct->quantity*$cartProduct->price)}}</span></td>
                                </tr>
                                @php($total += ($cartProduct->quantity*$cartProduct->price) )
                            @endforeach

                            </tbody>


                            <tfoot>
                            <tr>
                                <td colspan="5" class="clearfix">
                                    <div class="float-left">
                                        <div class="cart-discount">
                                            <form action="#">
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm" placeholder="Coupon Code" required>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-sm" type="submit">Apply Coupon</button>
                                                    </div>
                                                </div><!-- End .input-group -->
                                            </form>
                                        </div>
                                    </div><!-- End .float-left -->

                                    <div class="float-right">
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('updateCart').submit();" class="btn btn-shop btn-update-cart">
                                            Update Cart
                                        </a>
                                    </div><!-- End .float-right -->
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- End .cart-table-container -->
                </div><!-- End .col-lg-8 -->

                <div class="col-lg-4">
                    <div class="cart-summary">
                        <h3>CART TOTALS</h3>

                        <table class="table table-totals">
                            <tbody>
                            <tr>
                                <td>Subtotal</td>
                                <td>Tk. {{number_format($total)}}</td>
                            </tr>
                            <tr>
                                <td>Tax Amount (15%)</td>
                                @php($tax = round((($total*15)/100)))
                                <td>Tk. {{number_format($tax)}}</td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td>Tk. {{$shipping = 60}}</td>
                            </tr>

                            </tbody>

                            <tfoot>
                            <tr>
                                <td>Total Payable</td>
                                @php($grandTotal = $total + $tax + $shipping)
                                <td>Tk. {{number_format($grandTotal)}}</td>
                            </tr>
                            </tfoot>
                        </table>

                        <div class="checkout-methods">
                            <a href="{{route('checkout')}}" class="btn btn-block btn-primary">Proceed to Checkout
                                <i class="fa fa-arrow-right"></i>
                            </a>
                            <a href="{{route('home')}}" class="btn btn-block btn-dark">Continue Shopping
                                <i class="fa fa-store"></i>
                            </a>
                        </div>
                    </div><!-- End .cart-summary -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-6"></div><!-- margin -->
    </main><!-- End .main -->
@endsection

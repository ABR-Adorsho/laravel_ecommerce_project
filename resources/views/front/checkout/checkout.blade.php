@extends('master.front.master')

@section('pageTitle')
    BlueTorpedo - Checkout

@endsection

@section('mainContent')
    <main class="main main-test">
        <div class="container checkout-container">
            <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
                <li>
                    <a href="{{route('show-cart')}}">Shopping Cart</a>
                </li>
                <li class="active">
                    <a href="checkout.html">Checkout</a>
                </li>
                <li class="disabled">
                    <a href="#">Order Complete</a>
                </li>
            </ul>

            <div class="login-form-container">
                <h4>Returning customer?
                    <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="btn btn-link btn-toggle">Login</button>
                </h4>

                <div id="collapseOne" class="collapse">
                    <div class="login-section feature-box">
                        <div class="feature-box-content">
                            <form action="{{route('customer-login')}}" method="post" id="login-form">
                                @csrf
                                <p>
                                    If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing & Shipping section.
                                </p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-0 pb-1">Username or email <span
                                                    class="required">*</span></label>
                                            <input type="text" name="mobile" class="form-control" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-0 pb-1">Password <span
                                                    class="required">*</span></label>
                                            <input name="password" type="password" class="form-control" required />
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn">LOGIN</button>

                                <div class="form-footer mb-1">
                                    <div class="custom-control custom-checkbox mb-0 mt-0">
                                        <input type="checkbox" class="custom-control-input" id="lost-password" />
                                        <label class="custom-control-label mb-0" for="lost-password">Remember
                                            me</label>
                                    </div>

                                    <a href="forgot-password.html" class="forget-password">Lost your password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <ul class="checkout-steps">
                        <li>
                            <h2 class="step-title">Billing details</h2>

                            <form action="{{route('new-order')}}" method="post" id="checkout-form">
                                @csrf

                                @if(!Session::get('customer_id'))
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Full Name<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="name" class="form-control" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Phone No.<abbr class="required" title="required">*</abbr></label>
                                                <input name="mobile" type="number" class="form-control" required />
                                            </div>
                                        </div>

                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Email Adress<abbr class="required" title="required">*</abbr></label>
                                                <input name="email" type="email" class="form-control" required />
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group mb-1 pb-2">
                                    <label>Delivery address
                                        <abbr class="required" title="required">*</abbr></label>
                                    <textarea name="delivery_address" class="form-control"  placeholder="House number and street name" required></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-2 ">
                                        <h4>Payment Methods</h4>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" checked type="radio"  name="payment_method" id="inlineRadio1" value="1">
                                            <label class="form-check-label mb-0" style="padding-left: 1px" for="inlineRadio1">Cash on Delivery</label>
                                        </div>
                                        <div class="form-check form-check-inline" style="padding-left: 15px">
                                            <input class="form-check-input" type="radio" name="payment_method" id="inlineRadio2" value="2">
                                            <label class="form-check-label mb-0" style="padding-left: 1px" for="inlineRadio2">Online Payment</label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-place-order" form="checkout-form">
                                    Place order
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- End .col-lg-8 -->

                <div class="col-lg-4">
                    <div class="order-summary" style="background-color: #f1f1f1">
                        <h3>Order Summary </h3>
                        <p class="text-center">({{count($cartProducts)}} items in the cart)</p>

                        <table class="table table-mini-cart">
                            <thead>
                            <tr>
                                <th colspan="2">Product</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($total = 0)
                            @foreach($cartProducts as $cartProduct)
                                <tr>
                                <td class="product-col">
                                    <h3 class="product-title">
                                        <a href="#" class="text-dark">{{$cartProduct->name}}  (qty: {{$cartProduct->quantity}})</a>
                                    </h3>
                                </td>
                                <td class="price-col">
                                    <span>Tk. {{number_format($cartProduct->quantity * $cartProduct->price)}}</span>
                                </td>
                            </tr>
                                @php($total+=($cartProduct->quantity * $cartProduct->price))
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="cart-subtotal">
                                <td>
                                    <h4>Subtotal :</h4>
                                </td>
                                <td class="price-col">
                                    <span>Tk. {{number_format($total)}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Tax Charge (15%) :</h4>
                                </td>
                                @php($tax = round((($total*15)/100)))
                                <td class="price-col">
                                    <span>Tk. {{number_format($tax)}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Shipment Cost :</h4>
                                </td>
                                <td class="price-col my-0">
                                    <span>Tk. {{$shipping = 50}}</span>
                                </td>
                            </tr>
                            <tr class="order-total">
                                <td>
                                    <h4>Total :</h4>
                                </td>
                                @php($grandTotal = $total + $tax + $shipping)
                                <td>
                                    <b class="total-price"><span>Tk. {{number_format($grandTotal)}}</span></b>
                                    <?php
                                        Session::put('grand_total',  $grandTotal);
                                        Session::put('tax',  $tax);
                                        Session::put('shipping',  $shipping);
                                    ?>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- End .cart-summary -->
                </div>
                <!-- End .col-lg-4 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container -->
    </main>
    <!-- End .main -->
@endsection

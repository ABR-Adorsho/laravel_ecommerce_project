@extends('master.front.master')

@section('pageTitle')
    BlueTorpedo - Complete Order

@endsection

@section('mainContent')
    <main class="main main-test">
        <div class="container checkout-container">
            <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
                <li>
                    <a href="{{route('show-cart')}}">Shopping Cart</a>
                </li>
                <li >
                    <a href="checkout.html">Checkout</a>
                </li>
                <li class="active">
                    <a href="#">Order Complete</a>
                </li>
            </ul>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-body">
                        <h4 class="text-center text-primary">{{Session::get('message')}}</h4>
                    </div>
                </div>
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container -->
    </main>
    <!-- End .main -->
@endsection

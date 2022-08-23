@extends('master.front.master')

@section('pageTitle')
    Customer Dashboard | Bluetorpedo
@endsection

@section('mainContent')
    <main class="main">
        <div class="page-header">
            <div class="container d-flex flex-column align-items-center">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="category.html">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                My Account
                            </li>
                        </ol>
                    </div>
                </nav>
            </div>
        </div>

        <div class="container account-container custom-account-container">
            <div class="row">
                <div class="sidebar widget widget-dashboard mb-lg-0 mb-3 col-lg-3 order-0">
                    <h2 class="text-dark">
                        Hello, <strong class="text-dark"> {{Session::get('customer_name')}}</strong>
                    </h2>
                    <ul class="nav nav-tabs list flex-column mb-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('customer-dashboard')}}" aria-selected="false">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" id="order-tab" data-toggle="tab" href="{{route('customer-order')}}" role="tab"
                               aria-controls="order" aria-selected="true">Orders</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="download-tab" data-toggle="tab" href="#download" role="tab"
                               aria-controls="download" aria-selected="false">Downloads</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab"
                               aria-controls="address" aria-selected="false">Addresses</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab"
                               aria-controls="edit" aria-selected="false">Account
                                details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="shop-address-tab" data-toggle="tab" href="#shipping" role="tab"
                               aria-controls="edit" aria-selected="false">Shopping Addres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="wishlist.html">Wishlist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.html">Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-7 order-lg-last order-1 tab-content">

                    <div class="tab-pane fade show active" id="order" role="tabpanel">
                        <div class="order-content">
                            <h3 class="account-sub-title d-none d-md-block"><i
                                    class="sicon-social-dropbox align-middle mr-3"></i>Orders</h3>
                            <div class="order-table-container text-center">
                                <table class="table table-order text-left">
                                    <thead>
                                    <tr>
                                        <th class="order-id text-center">ORDER ID</th>
                                        <th class="order-date text-center">DATE</th>
                                        <th class="order-date text-center">Delivery Address</th>
                                        <th class="order-status text-center">STATUS</th>
                                        <th class="order-price text-right">TOTAL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td class="text-center p-2">{{$order->id}}</td>
                                            <td class="text-center p-2">{{$order->order_date}}</td>
                                            <td class="text-center p-2">{{$order->delivery_address}}</td>
                                            <td class="text-center p-2">{{$order->order_status}}</td>
                                            <td class="text-right p-2">Tk. {{number_format($order->order_total)}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <hr class="mt-0 mb-3 pb-2" />
                                <h5>{{$orders->links()}}</h5>

                                <a href="category.html" class="btn btn-dark">Go Shop</a>
                            </div>
                        </div>
                    </div><!-- End .tab-pane -->

                </div><!-- End .tab-content -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-5"></div><!-- margin -->
    </main><!-- End .main -->
@endsection

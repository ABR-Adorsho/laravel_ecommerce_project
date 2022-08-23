@extends('master.front.master')

@section('pageTitle')
    Login Page | Bluetorpedo
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

        <div class="container login-container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center mb-3">Login or Registration Form</h3>
                            <h5 class="text-center text-danger">{{Session::get('message')}}</h5>
                            <div class="tabs mb-3">
                                <ul class="nav nav-tabs nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="tab-popular4" data-toggle="tab"
                                           href="#popular-content4" role="tab" aria-controls="popular-content4"
                                           aria-selected="true"><i class=" text-primary pr-2"></i>Login
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="recent-tab4" data-toggle="tab" href="#recent-content4"
                                           role="tab" aria-controls="recent-content4" aria-selected="true">Register</a>
                                    </li>
                                </ul>
                                <div class="tab-content mb-0">
                                    <div class="tab-pane fade show active" id="popular-content4" role="tabpanel" aria-labelledby="tab-popular4">
                                        <form action="{{route('customer-login')}}" method="post">
                                            @csrf
                                            <label for="login-mobile">
                                                Your Mobile Number
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" name="mobile" class="form-control form-wide" id="login-mobile" required />

                                            <label for="login-password">
                                                Password
                                                <span class="required">*</span>
                                            </label>
                                            <input type="password" name="password" class="form-control form-wide" id="login-password" required />

                                            <div class="form-footer">
                                                <div class="custom-control custom-checkbox mb-0">
                                                    <input type="checkbox" class="custom-control-input" id="lost-password" />
                                                    <label class="custom-control-label mb-0" for="lost-password">Remember
                                                        me</label>
                                                </div>

                                                <a href="forgot-password.html"
                                                   class="forget-password text-dark form-footer-right">Forgot
                                                    Password?
                                                </a>
                                            </div>

                                            <button type="submit" class="btn btn-dark btn-md w-100">
                                                LOGIN
                                            </button>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="recent-content4" role="tabpanel"
                                         aria-labelledby="recent-tab4">
                                        <form action="{{route('customer-register')}}" method="post">
                                            @csrf

                                            <label for="register-name">
                                                FUll Name
                                                <span class="required">*</span>
                                            </label>
                                            <input name="name" type="text" class="form-control form-wide" id="register-name" required />

                                            <label for="register-mobile">
                                                Mobile Number
                                                <span class="required">*</span>
                                            </label>
                                            <input name="mobile" type="text" class="form-control form-wide" id="register-mobile" required />

                                            <label for="register-email">
                                                Email address
                                                <span class="required">*</span>
                                            </label>
                                            <input type="email" name="email" class="form-control form-wide" id="register-email" required />

                                            <label for="register-password">
                                                Password
                                                <span class="required">*</span>
                                            </label>
                                            <input type="password" name="password" class="form-control form-wide" id="register-password" required />

                                            <div class="form-footer mb-2">
                                                <button type="submit" class="btn btn-dark btn-md w-100 mr-0">
                                                    Register
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- End .main -->
@endsection

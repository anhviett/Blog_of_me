@extends('site.layouts.master')
@section('title'){{'Login Checkout'}}@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        @include('site.shop.products.product-categories_menu')
                        @include('site.shop.brands.brand')
                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well">
                                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                <b>$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->

                        <div class="shipping text-center"><!--shipping-->
                            <img src="images/home/shipping.jpg" alt="" />
                        </div><!--/shipping-->

                    </div>
                </div>
                @if(session()->has('error'))
                    <div class="alert alert-warning">
                        {{ session()->get('error') }}
                    </div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="col-sm-9 padding-right">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-1">
                            <div class="login-form"><!--login form-->
                                <h2>Đăng nhập tài khoản</h2>
                                <form action="{{route('login_customer')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id">
                                    <input type="text" name="AccountEmail" placeholder="Email" required/>
                                    <input type="password" name="AccountPassword" placeholder="Mật khẩu" />
                                    <span>
								<input type="checkbox" class="checkbox">
								Ghi nhớ
							</span>
                                    <button type="submit" class="btn btn-default">Đăng nhập</button>
                                </form>
                            </div><!--/login form-->
                        </div>
                        <div class="col-sm-1">
                            <h2 class="or">Hoặc</h2>
                        </div>
                        <div class="col-sm-4">
                            <div class="signup-form"><!--sign up form-->
                                <h2>Đăng ký tài khoản</h2>
                                <form action="{{route('register_customer')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id">
                                    <input type="text" name="CustomerName" placeholder="Tên người dùng"/>
                                    <input type="email" name="CustomerEmail" placeholder="Email"/>
                                    <input type="password" name="CustomerPassword" placeholder="Mật khẩu"/>
                                    <input type="text" name="CustomerPhone" placeholder="Phone">
                                    <button type="submit" class="btn btn-default">Đăng ký</button>
                                </form>
                            </div><!--/sign up form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

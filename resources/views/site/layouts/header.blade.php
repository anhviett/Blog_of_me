<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{route('home.index')}}">
                            <img src="{{asset('site/assets/images/home/logo.png')}}" alt="" />

                        </a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">

                            <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
                            <li class="cart-hover"><a href="{{route('cart.index', session()->get('id'))}}"><i class="fa fa-shopping-cart"></i>
                                    Giỏ hàng
                                    <span class="show-cart">{{\Gloudemans\Shoppingcart\Facades\Cart::count()}}</span>
                                    <div class="clearfix"></div>
                                    <span class="giohang-hover">
                                        </span>
                                </a>

                            </li>
                                @php
                                $customer = \Illuminate\Support\Facades\Session::get('customer_id');
                                $shipping = \Illuminate\Support\Facades\Session::get('id');
                                var_dump($customer);
                                var_dump($shipping);
                                @endphp

                                @if($customer != null && $shipping == null)
                                <li><a href="{{route('checkout.index', session()->get('id'))}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                            @elseif($customer != null && $shipping != null)
                                <li><a href="{{route('payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                            @else
                                <li><a href="{{route('login_register')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                            @endif
                            @if($customer != null)
                                <li><a href="{{route('logout')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
                            @else
                                <li><a href="{{route('login_register')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    @include('site.home.menu.main-menu')
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

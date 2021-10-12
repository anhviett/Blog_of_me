@extends('site.layouts.master')
@section('title'){{'Checkout'}}@endsection
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="step-one">
            <h2 class="heading">Step1</h2>
        </div>
        <div class="checkout-options">
            <h3>New User</h3>
            <p>Checkout options</p>
            <ul class="nav">
                <li>
                    <label><input type="checkbox"> Register Account</label>
                </li>
                <li>
                    <label><input type="checkbox"> Guest Checkout</label>
                </li>
                <li>
                    <a href=""><i class="fa fa-times"></i>Cancel</a>
                </li>
            </ul>
        </div><!--/checkout-options-->

        <div class="register-req">
            <p>Vui lòng sử dụng Đăng ký và Thanh toán để dễ dàng truy cập vào lịch sử đơn đặt hàng của bạn hoặc sử dụng Thanh toán với tư cách Khách hàng</p>
        </div><!--/register-req-->
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
        <div class="shopper-informations">
            <div class="row">
                <form action="{{route('save_checkout')}}" method="POST">
                    @csrf
                <div class="col-sm-5">
                    <div class="shopper-info">
                        <p>Thông tin người mua hàng</p>
                        <input type="hidden" name="id">
                            <input type="text" name="shipping_name" placeholder="Họ và tên" required value="{{$customer->customer_name ? : ""}}">
                            <input type="email" name="shipping_email" placeholder="Email" required
                                   value="{{$customer->email ? : ""}}">
                            <input type="text" name="shipping_address" placeholder="Địa chỉ" required
                                   value="{{$customer->customer_address ? : ""}}">
                            <input type="number" name="shipping_phone" placeholder="Điện thoại"
                                   value="{{$customer->customer_phone ? : ""}}">
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="order-message">
                        <p>Ghi chú</p>
                        <textarea name="shipping_notes"  placeholder="Ghi chú đơn hàng" rows="16"></textarea>
                    </div>
                </div>
                    <div class="col-sm-12 text-center">
                    <button class="btn btn-primary" type="submit"> Gửi </button>
                        </div>
                </form>
            </div>
        </div>
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $products)
                <tr>

                    <td class="cart_product">
                        <a href=""><img src="@foreach($product as $prod)
                            @if($prod->id == $products->id)
                            {{asset('/uploads/').'/'.$prod->avatar}}
                            @endif
                            @endforeach" style="width: 80px; height: 80px;" alt=""></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href="">{{$products->name}}</a></h4>
                        <p>Web ID: 1089772</p>
                    </td>
                    <td class="cart_price">
                        <p>{{number_format($products->price,0,',','.').' VND'}}</p>
                    </td>
                        <td class="cart_quantity">

                            <input type="number" name="qty" id="qty" value="{{$products->qty}}" min=""
                                   onchange="updateCart(this.value, '{{$products->rowId}}')"
                            >

                            <span id="output" aria-live="polite" aria-atomic="true"></span>


                        </td>
                    <td class="cart_total">
                        <p class="cart_total_price">{{number_format($products->price,0,',','.').' VND'}}</p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href="{{route('cart.delete', $products->id)}}"><i class="fa fa-times"></i></a>
                    </td>

                </tr>
                @endforeach

                <tr>
                    <td colspan="4">&nbsp;</td>
                    <td colspan="2">
                        <table class="table table-condensed total-result">
                            <tr>
                                <td>Tổng</td>
                                <td>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal(0,',','.').' VND'}}</td>
                            </tr>
                            <tr>
                                <td>Thuế</td>
                                <td>{{\Gloudemans\Shoppingcart\Facades\Cart::tax(0,',','.').' VND'}}</td>
                            </tr>
                            <tr class="shipping-cost">
                                <td>Phí Ship</td>
                                <td>Free</td>
                            </tr>
                            <tr>
                                <td>Tổng đã giảm</td>
                                <td><span>{{\Gloudemans\Shoppingcart\Facades\Cart::total(0,',','.').' VND'}}</span></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
            <span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
            <span>
						<label><input type="checkbox"> Paypal</label>
					</span>
        </div>
    </div>
</section> <!--/#cart_items-->
@endsection

@extends('site.layouts.master')
@section('title'){{'Payment'}}@endsection
@section('content')
    <section id="cart_items">
        <div class="container">
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
            <div class="col-sm-9 padding-right">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Thanh toán giỏ hàng</li>
                    </ol>
                </div><!--/breadcrums-->





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

                <div class="review-payment">
                    <h2>Xem lại & thanh toán</h2>
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
                                    <p>$ {{number_format($products->price,0,',','.')}}</p>
                                </td>
                                <td class="cart_quantity">

                                    <input type="number" name="qty" id="qty" value="{{$products->qty}}" min=""
                                           onchange="updateCart(this.value, '{{$products->rowId}}')"
                                    >

                                    <span id="output" aria-live="polite" aria-atomic="true"></span>


                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">$ {{number_format($products->price,0,',','.')}}</p>
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
                                        <td>Cart Sub Total</td>
                                        <td>$ {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                                    </tr>
                                    <tr>
                                        <td>Exo Tax</td>
                                        <td>$ {{\Gloudemans\Shoppingcart\Facades\Cart::tax()}}</td>
                                    </tr>
                                    <tr class="shipping-cost">
                                        <td>Shipping Cost</td>
                                        <td>Free</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td><span>$ {{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="review-payment" style="padding-bottom: 20px">
                    <h3>Chọn hình thức thanh toán</h3>
                </div>
                <form action="{{route('order_place.store')}}" method="POST">
                    @csrf
                <div class="payment-options d-flex align-items-center">
                    @foreach($payment_categories as $payment_category)
					<span>
						<label><input name="payment_option" value="{{$payment_category->id}}" type="checkbox"> {{$payment_category->name}} </label>
					</span>
                    @endforeach
                    <button class="btn btn-primary" style="margin-top: 0px" name="send_order" type="submit"> Đặt hàng </button>
                </div>
                </form>
            </div>

        </div>
    </section> <!--/#cart_items-->
@endsection

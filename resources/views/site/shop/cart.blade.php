@extends('site.layouts.master')
@section('title'){{'Home'}}@endsection
@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Trang chủ</a></li>
                <li class="active">Giỏ hàng</li>
            </ol>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-warning">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu text-center">
                    <td class="image">Hình ảnh</td>
                    <td class="description">Mô tả</td>
                    <td class="price">Giá</td>
                    <td class="quantity">Số lượng</td>
                    <td class="total">Tổng tiền</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $products)
                <form action="{{route('cart.update', $products->id)}}">
                    @csrf
                    @if(\Illuminate\Support\Facades\Session::get('cart') == true)
                <tr>
                    <td class="cart_product">

                        <a href=""><img src="
                       @foreach($product as $prod)
                            @if($prod->id == $products->id)
                            {{asset('/uploads/').'/'.$prod->avatar}}
                            @endif
                            @endforeach
                            " style="width: 100px; height: 100px;" alt=""></a>


                    </td>
                    <td class="cart_description">
                        <h4><a href="">{{$products->name}}</a></h4>
                        <p>ID: {{$products->id}}</p>
                    </td>
                    <td class="cart_price text-center">
                        <p>{{number_format($products->price,0,',','.')}} </p>
                    </td>
                    <td class="cart_quantity text-center">

                        <input type="number" name="qty" id="qty" value="{{$products->qty}}" min=""
                        onchange="updateCart(this.value, '{{$products->rowId}}')"
                        style="width: 20%;border: 1px solid gray;"
                        >

                        <span id="output" aria-live="polite" aria-atomic="true"></span>


                    </td>
                    <td class="cart_total text-center">
                        <p class="cart_total_price text-center">{{number_format($products->price * $products->qty,0,',','.').' '.'VND'}}
                        </p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href="{{route('cart.delete', $products->id)}}"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                    @endif
                </form>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">

        <div class="row">
            <div class="col-sm-5"></div>
            <div class="col-sm-7">
                <div class="total_area">
                    <ul>
                        @php
                            $coupon = \Illuminate\Support\Facades\Session::get('coupon');
                            $total = \Gloudemans\Shoppingcart\Facades\Cart::total(0,',','.');

                        @endphp
                        <li>Tổng <span>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal(0,',','.'). ' VND'}}</span></li>
                        <li>Thuế <span>{{\Gloudemans\Shoppingcart\Facades\Cart::tax(0,',','.'). ' VND'}}</span></li>
                        <li>Phí ship <span>Free</span></li>

                        @if($coupon)
                        <li>
                                        @if($coupon['coupon_condition'] == 1)
                                        Mã giảm : {{number_format($coupon['coupon_number'],0,',','.'). ' VND'}} %
                                            @php
                                                $total_coupon = ($total * $coupon['coupon_number']) / 100;
                                            @endphp
                                        <li>Tổng đã giảm: {{number_format($subtotal - $total_coupon, 0,',', '.')}}  </li>
                                        @elseif($coupon['coupon_condition'] == 2)

                                        Mã giảm : {{number_format($coupon['coupon_number'],0,',','.'). ' VND'}}
                            <li>
                                Tổng đã giảm:  {{$total}}đ
                            </li>
                                        @endif

                        </li>
                        @endif

                    </ul>
                    <a class="btn btn-default update" href="{{route('home.index')}}">Tiếp tục mua hàng</a>
                    <a class="btn btn-default update" href="{{route('cart.deleteAll')}}">Xóa tất cả</a>


                    <a class="btn btn-default check_out" href="{{route('checkout.index', session()->get('id'))}}" style="float: right">Thanh toán</a>
                    @if(\Illuminate\Support\Facades\Session::get('cart'))
                    <form action="{{route('check.coupon')}}" method="post" style="display: flex;margin-left: 20px;align-items: center">
                        @csrf
                        <input type="text" class="form-control" name="Coupon" placeholder="Nhập mã giảm giá" style="width: 30%; order: 2;margin: 18px 0 0 18px;"
                        value="{{$coupon['coupon_code'] ? : ''}}"
                        >
                        <input type="submit" class="btn btn-default check_out" value="Tính mã giảm giá">
                    </form>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::get('coupon'))
                    <a class="btn btn-default update" href="{{route('unset.coupon')}}">Xóa mã khuyến mãi</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection
@section('footer_script')
    <script>
        function updateCart(qty, rowId) {
           $.ajax({
               type:'GET',
               url: '{{route('cart.update')}}',
                data:{
                   qty:qty,
                    rowId:rowId
                },
                success: function(data){
                    location.reload();


                }
           })
        }
    </script>
@endsection

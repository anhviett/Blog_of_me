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

                </div>
            </div>
            <div class="col-sm-9 padding-right">
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
                    <h2>Cảm ơn bạn đã đặt hàng</h2>
                </div>

            </div>

        </div>
    </section> <!--/#cart_items-->
@endsection

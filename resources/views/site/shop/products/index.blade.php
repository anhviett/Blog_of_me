@extends('site.layouts.master')
@section('title'){{'Product'}}@endsection
@section('content')
    <section id="advertisement">
        <div class="container">
            <img src="images/shop/advertisement.jpg" alt="" />
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>
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
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">
                        {{$category->name}}
</h2>
                        @if(!$paginateProducts->isEmpty())
                            @foreach($paginateProducts as $product)
                                @php

                                @endphp
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="
                            @if($product->avatar)
                                        {{asset('/uploads/').'/'.$product->avatar}}
                                        @else
                                        {{asset('/backend/assets/img/images.gif')}}
                                        @endif
" alt="" />
                                        <h2>{{number_format($product->price,0,',','.').' VND'}}</h2>
                                        <p>{{$product->name}}</p>
                                        <a href="{{route('product-details.index', $product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                            @endforeach

                                <div class="pagination-area">
                                    <div class="pagination-number">
                            {{$paginateProducts->appends(Request::all())->links()}}
                        </div>
                                </div>>
                        @else
                            <h2 class="text-center">Không có sản phẩm nào</h2>
@endif
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>

@endsection

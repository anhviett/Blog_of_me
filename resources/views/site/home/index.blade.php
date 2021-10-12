@extends('site.layouts.master')
@section('title'){{'Home'}}@endsection
@section('content')

@include('site.home.sliders.index')
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
                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b class="pull-left"> 0</b> <b class="pull-right"> 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="{{asset('site/assets/images/home/shipping.jpg')}}" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Sản phẩm mới nhất</h2>
                    @foreach($products as $prod)
                    <div class="col-sm-4"
                         @if($prod->status == 0)
                                              style="display: none";
                        @endif
                        >
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <form action="">
                                    @csrf
                                    <input type="hidden" name="" value="{{$prod->id}}" class="cart_product_id_{{$prod->id}}">
                                    <input type="hidden" name="" value="{{$prod->avatar}}" class="cart_product_avatar_{{$prod->id}}">
                                    <input type="hidden" name="" value="{{$prod->name}}" class="cart_product_name_{{$prod->id}}">
                                    <input type="hidden" name="" value="{{$prod->content}}" class="cart_product_content_{{$prod->id}}">
                                    <input type="hidden" name="" value="{{$prod->price}}" class="cart_product_price_{{$prod->id}}">
                                    <input type="hidden" value="1" class="cart_product_quantity_{{$prod->id}}">
                                    <div class="productinfo text-center">
                                    <img src="
                        @if($prod->avatar)
                                    {{asset('/uploads/').'/'.$prod->avatar}}
                                    @else
                                    {{asset('/backend/assets/img/images.gif')}}
                                    @endif
" alt="" />
                                    <h2 style="margin: 10px 0;">{{number_format($prod->price,0,',','.').' VND'}}</h2>
                                    <p style="margin: 10px 0; text-align: center">{{$prod->name}}</p>
                                    <a href="{{route('product-details.index', $prod->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                                </form>
                            </div>

                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div><!--features_items-->

                @include('site.shop.styles.index')

                @include('site.shop.recommend-items.index')
                <div class="fb-comments" data-href="http://localhost/site/home" data-width="" data-numposts="20"></div>

            </div>
        </div>

    </div>
</section>


@endsection



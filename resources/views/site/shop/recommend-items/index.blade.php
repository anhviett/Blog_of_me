<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">các mục đề xuất</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <div class="item active">
                @foreach($recommend_items as $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-prod">
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
                                <a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="item">
                @foreach($recommend_items as $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-prod">
                            <div class="productinfo text-center">
                                <img src="
                                    @if($product->avatar)
                                {{asset('/uploads/').'/'.$product->avatar}}
                                @else
                                {{asset('/backend/assets/img/images.gif')}}
                                @endif
                                    " alt="" />
                                <h2>{{number_format($product->price,0,',','.').' VND'}}</h2>
                                <p>{{$product->description}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div><!--/recommended_items-->

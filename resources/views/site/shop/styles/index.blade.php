<div class="category-tab"><!--category-tab-->

    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach($styles as $style)
                <li class="{{$style['id'] == 1 ? 'active' : ''}}"><a href="#{{$style->name}}" data-toggle="tab">{{$style->name}}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="tab-content">
        @foreach($styles as $style)
            <div class="tab-pane fade {{$style['id'] == 1 ? 'active' : ''}} in" id="{{$style->name}}">
                @foreach($products as $product)
                    {{--@php
                        echo "<pre>";
                            print_r($style->id);
                        echo "</pre>";
                    @endphp--}}
                    @if($product->style_id == $style->id)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-prod">
                                    <div class="productinfo text-center">
                                        <img src="
                                            @if($product->avatar)
                                            {{asset('/uploads/').'/'.$product->avatar}}
                                            @else
                                            {{asset('/backend/assets/img/images.gif')}}
                                            @endif" alt="" />
                                        <h2>{{number_format($product->price,0,',','.').' VND'}}</h2>
                                        <p>{{$product->name}}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>


</div><!--/category-tab-->

<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    @foreach($product_categories as $product_category)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#{{$product_category->slug}}">
                    <span class="badge pull-right">
                        @if($product_category->categoryChildrents->count())
                            <i class="fa fa-plus"></i>
                        @endif
                    </span>
                        {{$product_category->name}}
                    </a>
                </h4>
            </div>
            <div id="{{$product_category->slug}}" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul>

                        @foreach($product_category->categoryChildrents as $categoryChildrent)

                            <li><a href="{{ route('product.categories', [
                            'slug'=>\Illuminate\Support\Str::slug($categoryChildrent->name) ]) }}">
                                    {{ $categoryChildrent->name }}

                                </a></li>

                        @endforeach


                    </ul>
                </div>
            </div>
        </div>
    @endforeach

</div><!--/category-products-->

@if($categoriesParent->categoryChildrents->count())
    <ul role="menu" class="sub-menu">
        @foreach($categoriesParent->categoryChildrents as $categoryChild)
            <li><a href="shop.html">{{$categoryChild->name}}</a>
    {{--@if($categoryChild->categoryChildrent->count())
            @include('site.home.menu.child-menu',['categoriesParent' => $categoryChild ])
                @endif--}}
            </li>
        @endforeach
        {{-- <li><a href="product-details.html">Product Details</a></li>
         <li><a href="checkout.html">Checkout</a></li>
         <li><a href="cart.html">Cart</a></li>
         <li><a href="login.html">Login</a></li>--}}
    </ul>
@endif

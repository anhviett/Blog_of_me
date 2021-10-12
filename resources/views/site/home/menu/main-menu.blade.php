<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        @foreach($menu_items as $menu_item)
            @if(count($menu_item->submenus) > 0)
                <li class="dropdown"><a href="#">{{$menu_item->name}}<i class="fa fa-angle-down"></i></a>
                    <ul role="menu" class="sub-menu">
                        @foreach($post_categories as $post)

                            <li><a href="{{route('blog_list.index', [
                            'slug'=>\Illuminate\Support\Str::slug($post->name) ])}}">{{$post->name}}</a></li>
                        @endforeach


                    </ul>
                </li>

                @else
        <li><a href="{{$menu_item->link}}" class="{{$menu_item['id'] == 1 ? 'active' : ''}}">{{$menu_item->name}}</a></li>
        {{--<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
            <ul role="menu" class="sub-menu">
                <li><a href="{{route('blog.index')}}">Blog List</a></li>
                <li><a href="{{route('blog-single.index')}}">Blog Single</a></li>
            </ul>
        </li>
        <li><a href="{{route('404.index')}}">404</a></li>
        <li><a href="{{route('contact')}}">Contact</a></li>--}}
            @endif
        @endforeach
    </ul>
</div>

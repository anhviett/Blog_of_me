@extends('site.layouts.master')
@section('title'){{'Blog Single'}}@endsection
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
                            <div class="well">
                                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                <b>$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->

                        <div class="shipping text-center"><!--shipping-->
                            <img src="{{asset('site/assets/images/home/shipping.jpg')}}" alt="" />
                        </div><!--/shipping-->
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="blog-post-area">
                        @foreach($posts as $post)
                        <h2 class="title text-center">Danh sách Blog</h2>
                        <div class="single-blog-post">
                            <h3>{{$post->title}}</h3>
                            <div class="post-meta">
                                <ul>
                                    <li><i class="fa fa-user"></i> {{$post->name}}</li>
                                    <li><i class="fa fa-clock-o"></i> {{$post->hours}}</li>
                                    <li><i class="fa fa-calendar"></i> {{$post->days}}</li>
                                </ul>
                                <span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
                            </div>
                            <a href="" style="float: right;margin: 0 auto;text-align: center;">
                                <img src="

                            @if($post->image)
                                {{asset('/uploads/').'/'.$post->image}}
                                @else
                                {{asset('/backend/assets/img/images.gif')}}
                                @endif
                               " alt="">
                            </a>
                            <p>
                                {!! $post->content !!}
                                 </p>
                            <div class="pager-area">
                                <ul class="pager pull-right">
                                    <li><a href="#">Pre</a></li>
                                    <li><a href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                        <h2 class="title text-center">Bài viết liên quan</h2>
                        <ul class="post_related">
                            @foreach($related as $post_relate)
                            <li style="list-style-type: disc;font-size: 16px;padding: 6px;">
                                <a style="color: #000000d1;" href="{{route('blog_single.index', $post_relate->slug)}}">{{$post_relate->title}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div><!--/blog-post-area-->

                    <div class="rating-area">
                        <ul class="ratings">
                            <li class="rate-this">Rate this item:</li>
                            <li>
                                <i class="fa fa-star color"></i>
                                <i class="fa fa-star color"></i>
                                <i class="fa fa-star color"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </li>
                            <li class="color">(6 votes)</li>
                        </ul>
                        <ul class="tag">
                            <li>TAG:</li>
                            <li><a class="color" href="">Pink <span>/</span></a></li>
                            <li><a class="color" href="">T-Shirt <span>/</span></a></li>
                            <li><a class="color" href="">Girls</a></li>
                        </ul>
                    </div><!--/rating-area-->

                    <div class="socials-share">
                        <a href=""><img src="{{asset('site/assets/images/blog/socials.png')}}" alt=""></a>
                    </div><!--/socials-share-->

                    <div class="media commnets">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="{{asset('site/assets/images/blog/man-one.jpg')}}" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Annie Davis</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <div class="blog-socials">
                                <ul>
                                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                                <a class="btn btn-primary" href="">Other Posts</a>
                            </div>
                        </div>
                    </div><!--Comments-->
                    <div class="response-area">
                        <h2>3 RESPONSES</h2>
                        <ul class="media-list">
                            <li class="media">

                                <a class="pull-left" href="#">
                                    <img class="media-object" src="{{asset('site/assets/images/blog/man-two.jpg')}}" alt="">
                                </a>
                                <div class="media-body">
                                    <ul class="sinlge-post-meta">
                                        <li><i class="fa fa-user"></i>Janis Gallagher</li>
                                        <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                        <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                                </div>
                            </li>
                            <li class="media second-media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="{{asset('site/assets/images/blog/man-three.jpg')}}" alt="">
                                </a>
                                <div class="media-body">
                                    <ul class="sinlge-post-meta">
                                        <li><i class="fa fa-user"></i>Janis Gallagher</li>
                                        <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                        <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                                </div>
                            </li>
                            <li class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="{{asset('site/assets/')}}images/blog/man-four.jpg" alt="">
                                </a>
                                <div class="media-body">
                                    <ul class="sinlge-post-meta">
                                        <li><i class="fa fa-user"></i>Janis Gallagher</li>
                                        <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                        <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                                </div>
                            </li>
                        </ul>
                    </div><!--/Response-area-->
                    <div class="replay-box">
                        <div class="row">
                            <div class="col-sm-4">
                                <h2>Leave a replay</h2>
                                <form>
                                    <div class="blank-arrow">
                                        <label>Your Name</label>
                                    </div>
                                    <span>*</span>
                                    <input type="text" placeholder="write your name...">
                                    <div class="blank-arrow">
                                        <label>Email Address</label>
                                    </div>
                                    <span>*</span>
                                    <input type="email" placeholder="your email address...">
                                    <div class="blank-arrow">
                                        <label>Web Site</label>
                                    </div>
                                    <input type="email" placeholder="current city...">
                                </form>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-area">
                                    <div class="blank-arrow">
                                        <label>Your Name</label>
                                    </div>
                                    <span>*</span>
                                    <textarea name="message" rows="11"></textarea>
                                    <a class="btn btn-primary" href="">post comment</a>
                                </div>
                            </div>
                        </div>
                    </div><!--/Repaly Box-->
                </div>
            </div>
        </div>
    </section>
@endsection

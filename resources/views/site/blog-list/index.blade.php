@extends('site.layouts.master')
@section('title'){{'Blog List'}}@endsection
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

                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Danh sách bai viet mới nhất</h2>
                        @foreach($posts as $post)

                        <div class="single-blog-post" style="padding-top: 30px">
                            <h3>{{$post->title}}</h3>
                            <div class="post-meta">
                                <ul>
                                    <li><i class="fa fa-user"></i> {{$post->name}}</li>
                                    <li><i class="fa fa-clock-o"></i> {{$post->hours}}</li>
                                    <li><i class="fa fa-calendar"></i> {{$post->days}}</li>
                                </ul>

                            </div>

                            <div class="blog-list-box" style="display: flex">
                                <a href="" class="text-center" style="width: 30%">
                                    <img src="@if($post->image)
                                    {{asset('/uploads/').'/'.$post->image}}
                                    @else
                                    {{asset('/backend/assets/img/images.gif')}}
                                    @endif" alt="">
                                </a>
                                <div class="blog-single-box">
                                    {!! $post->summary !!}
                                    <a  class="btn btn-primary" href="{{route('blog_single.index', $post->slug)}}">Xem bài viết</a>

                                </div>
                                   </div>

                        </div>
                        @endforeach
                       {{-- <div class="pagination-area">
                            <ul class="pagination">
                                <li><a href="" class="active">{!! $posts->links() !!}</a></li>

                            </ul>
                        </div>--}}
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection



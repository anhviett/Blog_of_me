<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link  rel="canonical" href="{{$meta_canonical}}" />
    <meta name="author" content="">
    <link  rel="icon" type="image/x-icon" href="" />

    {{--<meta property="og:image" content="{{$image_og}}" />--}}
    <meta property="og:site_name" content="http://localhost/site/home" />
    <meta property="og:description" content="{{$meta_desc}}" />
    <meta property="og:title" content="{{$meta_title}}" />
    <meta property="og:url" content="{{$meta_canonical}}" />
    <meta property="og:type" content="website" />

    <title>E-Shopper - {{$meta_title}}</title>
    <link href="{{asset('site/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/css/sweetalert.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('site/assets/css/style.css')}}">
    <!--[if lt IE 9]>
    <script src="{{asset('site/assets/js/html5shiv.js')}}"></script>
    <script src="{{asset('site/assets/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('site/assets/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('site/assets/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('site/assets/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('site/assets/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('site/assets/images/ico/apple-touch-icon-57-precomposed.png')}}">

</head><!--/head-->
<body>
@include('site.layouts.header')
@yield('content')
@include('site.layouts.footer')
<script src="{{asset('site/assets/js/sweetalert.min.js')}}"></script>
<script src="{{asset('site/assets/js/jquery.js')}}"></script>
<script src="{{asset('site/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('site/assets/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('site/assets/js/price-range.js')}}"></script>
<script src="{{asset('site/assets/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('site/assets/js/main.js')}}"></script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="NgEnzbey"></script>


@yield('footer_script')

</body>

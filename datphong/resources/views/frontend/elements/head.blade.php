@php
$settingSeo = \App\Helpers\Fetch::get(public_path('cache/setting-seo.json'), true);
@endphp

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <title>{{ $settingSeo['meta_title'] }} @yield('title')</title>
    <meta property="og:title" content="{{ $settingSeo['meta_title'] }}  @yield('title')">
    <meta name="keywords" content="{{ $settingSeo['meta_keyword'] }}">
    <meta name="description" content="@yield('description'){{ $settingSeo['meta_description'] }}">
    <meta property="og:description" content="@yield('description'){{ $settingSeo['meta_description'] }}">
    <meta property="twitter:description" content="@yield('description'){{ $settingSeo['meta_description'] }}">

    {{-- @if (in_array(
        request()->route()->getName(),
        ['blog/detail'],
    ))
        <meta property="og:image" content="@yield('thumbnail')">
        <meta property="twitter:image" content="@yield('thumbnail')">
    @else --}}
    <meta property="og:image" content="{{ asset('frontend/assets/images/thumb.png') }}">
    <meta property="twitter:image" content="{{ asset('frontend/assets/images/thumb.png') }}">
    {{-- @endif --}}

    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="628">
    <!-- ================================================================
        ***CSS Files datdphong***
    ================================================================= -->
    <!-- GOOGLE FONT -->
    <link href="http://fonts.googleapis.com/css?family=Hind:400,300,500,600%7cMontserrat:400,300,500,600,700"
        rel="stylesheet" type="text/css">
    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/combine-all-assets.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/myStyle.css?v='.time()) }}">
    @livewireStyles
    {{-- <script type="text/javascript" src="{{ asset('frontend/js/lib/jquery-1.11.0.min.js') }}"></script> --}}
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>

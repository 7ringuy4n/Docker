@extends('frontend.main')
@section('title', ' - Home')
@section('description', ' - Home')
@section('content')
    @include('frontend.pages.index.child.slider', ['items' => $sliders])
    @include('frontend.pages.index.child.about')
    @include('frontend.pages.index.child.rooms')
    @if (count($reviews) > 0)
        @include('frontend.pages.index.child.reviews')
    @endif
    <style>
        #header .header_content.header-sticky .header_logo {
            display: none;
        }

        #header .header_content.header-sticky .header_menu {
            float: left;
            margin-top: 0;
        }

        #header .header_content.header-sticky .header_menu .menu li a {
            line-height: 60px;
        }

    </style>
@endsection

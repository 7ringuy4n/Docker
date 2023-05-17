@php ob_start() @endphp
<!DOCTYPE html>
<html lang="en">

@include('frontend.elements.head')
<!--[if IE 7]> 
<body class="ie7 lt-ie8 lt-ie9 lt-ie10">
<![endif]-->
<!--[if IE 8]> 
<body class="ie8 lt-ie9 lt-ie10">
<![endif]-->
<!--[if IE 9]> 
<body class="ie9 lt-ie10">
<![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->

<body>
    {{-- <div id="preloader">
        <span class="preloader-dot"></span>
    </div> --}}
    <div id="page-wrap">
        @include('frontend.elements.header')
        @yield('content')
        @include('frontend.elements.footer')
    </div>
    <!-- END / PAGE WRAP -->
    <!-- LOAD JQUERY -->
    @include('frontend.elements.script')
</body>

</html>

@php
$content = ob_get_clean();
echo \App\Libs\TinyMinify\TinyMinify::html($content, $options = [
    'collapse_whitespace' => true,
    'collapse_json_lt' => true, // WARNING - EXPERIMENTAL FEATURE
]);
@endphp

@extends('frontend.main')
@section('title', ' - Benefit')
@section('description', ' - Benefit')
@section('content')
    <section class="section-sub-banner dhts-section-sub-banner awe-parallax dhts-bg-primary">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                </div>
            </div>
        </div>
    </section>
    <section class="section-about section-benefit">
        <div class="container">
            <div class="about">
                @foreach ($benefits as $benefit)
                    <div class="benefit-item about-item @if ($loop->index % 2 != 0) about-right @endif"
                         id="{{ Str::slug($benefit->name) }}">
                        <div class="img">
                            <img src="{{ asset('images/benefit/' . $benefit->thumb) }}"
                                 alt="">
                        </div>
                        <div class="text">
                            <h2 class="heading"><span>{{ $benefit->translateOrDefault($locale)->name }}</span></h2>
                            <div class="desc">
                                {!! $benefit->translateOrDefault($locale)->description !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

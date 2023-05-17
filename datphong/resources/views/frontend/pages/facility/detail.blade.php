@extends('frontend.main')
@section('title', ' - ' . $facility->translateOrDefault($locale)->name)
@section('description', ' - ' . $facility->translateOrDefault($locale)->name)
@section('content')
    <section class="section-sub-banner awe-parallax bg-3" id="section-facility"
        style="background-image: url({{ asset('images/facility/' . $facility->thumb) }});">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>{{ $facility->translateOrDefault($locale)->name }}</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="section-about section-benefit" id="facility-detail">
        <div class="container">
            <div class="about">
                <div class="intro">
                    <h2 class="heading text-center">{{ $facility->translateOrDefault($locale)->head_title }}</h2>
                    <div class="dhts-line"></div>
                    <p class="text-center intro-text">{{ $facility->translateOrDefault($locale)->head_description }}</p>
                </div>
                <div class="content">
                    <div class="img">
                        <img src="{{ asset('images/facility/' . $facility->thumb_content) }}"
                            alt="{{ $facility->translateOrDefault($locale)->name }}">
                    </div>
                    <div class="text border-2">
                        <div>
                            <h2 class="heading mb-2">{{ $facility->translateOrDefault($locale)->main_title }}</h2>
                            <div class="desc">
                                {!! $facility->translateOrDefault($locale)->main_description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

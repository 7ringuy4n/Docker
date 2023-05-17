@extends('frontend.main')
@section('title', ' - ' . __('all.gallery'))
@section('description', ' - ' . __('all.gallery'))
@section('pageTitle', '' . __('all.gallery'))
@section('content')
    <!-- SUB BANNER -->
    <section class="section-sub-banner dhts-section-sub-banner awe-parallax dhts-bg-primary">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                </div>
            </div>
        </div>
    </section>
    <!-- END / SUB BANNER -->
    <!-- GALLERY -->
    <section class="section_page-gallery">
        <div class="container">
            <div class="gallery">
                <h1 class="element-invisible">{{ __('all.gallery') }}</h1>
                <!-- FILTER -->
                <div class="gallery-cat text-center">
                    <ul class="list-inline">
                        <li class="active"><a href="#" data-filter="*">All</a></li>
                        @foreach ($medias as $media)
                            <li><a href="#"
                                    data-filter=".{{ Str::slug($media->name) }}">{{ $media->translate($locale)->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- END / FILTER -->
                <!-- GALLERY CONTENT -->
                <div class="gallery-content">
                    <div class="row">
                        <div class="gallery-isotope col-4">
                            <!-- ITEM SIZE -->
                            <div class="item-size"></div>
                            <!-- END / ITEM SIZE -->
                            <!-- ITEM -->
                            @foreach ($images as $image)
                                <div class="item-isotope {{ Str::slug($image->media->name) }}">
                                    <div class="gallery_item">
                                        <a href="{{ asset('images/media/' . $image->name) }}"
                                            class="mfp-image">
                                            <img src="{{ asset('images/media/' . $image->name) }}" alt="{{ $image->media->name }}">
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                            {{-- <!-- END / ITEM -->
                            <!-- ITEM -->
                            <div class="item-isotope ground bathroom suite">
                                <div class="gallery_item">
                                    <a href="{{ asset('frontend/images/gallery/popup/img-1.jpg') }}" class="mfp-image">
                                        <img src="{{ asset('frontend/images/gallery/img-2.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- END / ITEM -->
                            <!-- ITEM -->
                            <div class="item-isotope  ground bathroom dinin">
                                <div class="gallery_item">
                                    <a href="{{ asset('frontend/images/gallery/popup/img-1.jpg') }}" class="mfp-image">
                                        <img src="{{ asset('frontend/images/gallery/img-3.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- END / ITEM -->
                            <!-- ITEM -->
                            <div class="item-isotope suite dining">
                                <div class="gallery_item">
                                    <a href="{{ asset('frontend/images/gallery/popup/img-1.jpg') }}" class="mfp-image">
                                        <img src="{{ asset('frontend/images/gallery/img-4.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- END / ITEM -->
                            <!-- ITEM -->
                            <div class="item-isotope  ground suite dining">
                                <div class="gallery_item">
                                    <a href="{{ asset('frontend/images/gallery/popup/img-1.jpg') }}" class="mfp-image">
                                        <img src="{{ asset('frontend/images/gallery/img-5.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- END / ITEM -->
                            <!-- ITEM -->
                            <div class="item-isotope ground bathroom dining">
                                <div class="gallery_item">
                                    <a href="{{ asset('frontend/images/gallery/popup/img-1.jpg') }}" class="mfp-image">
                                        <img src="{{ asset('frontend/images/gallery/img-6.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- END / ITEM -->
                            <!-- ITEM -->
                            <div class="item-isotope ground suite dining">
                                <div class="gallery_item">
                                    <a href="{{ asset('frontend/images/gallery/popup/img-1.jpg') }}" class="mfp-image">
                                        <img src="{{ asset('frontend/images/gallery/img-7.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- END / ITEM -->
                            <!-- ITEM -->
                            <div class="item-isotope bathroom suite dining">
                                <div class="gallery_item">
                                    <a href="{{ asset('frontend/images/gallery/popup/img-1.jpg') }}" class="mfp-image">
                                        <img src="{{ asset('frontend/images/gallery/img-8.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- END / ITEM -->
                            <!-- ITEM -->
                            <div class="item-isotope bathroom suite dining">
                                <div class="gallery_item">
                                    <a href="{{ asset('frontend/images/gallery/popup/img-1.jpg') }}" class="mfp-image">
                                        <img src="{{ asset('frontend/images/gallery/img-9.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- END / ITEM -->
                            <!-- ITEM -->
                            <div class="item-isotope  ">
                                <div class="gallery_item">
                                    <a href="{{ asset('frontend/images/gallery/popup/img-1.jpg') }}" class="mfp-image">
                                        <img src="{{ asset('frontend/images/gallery/img-10.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- END / ITEM -->
                            <!-- ITEM -->
                            <div class="item-isotope ground bathroom suite">
                                <div class="gallery_item">
                                    <a href="{{ asset('frontend/images/gallery/popup/img-1.jpg') }}" class="mfp-image">
                                        <img src="{{ asset('frontend/images/gallery/img-11.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- END / ITEM -->
                            <!-- ITEM -->
                            <div class="item-isotope ground bathroom">
                                <div class="gallery_item">
                                    <a href="{{ asset('frontend/images/gallery/popup/img-1.jpg') }}" class="mfp-image">
                                        <img src="{{ asset('frontend/images/gallery/img-12.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- END / ITEM --> --}}
                        </div>
                    </div>
                </div>
                <!-- GALLERY CONTENT -->
            </div>
        </div>
    </section>
    <!-- END / GALLERY -->
@endsection

@extends('frontend.main')
@section('title', ' - ' . $room->translateOrDefault($locale)->name)
@section('description', ' - ' . $room->translateOrDefault($locale)->name)
@section('pageTitle', $room->translateOrDefault($locale)->name)
@section('content')
    @php
    $images = json_decode($room->images, true);
    $imagesGallery = json_decode($room->images_extra, true);
    @endphp
    <section class="section-sub-banner dhts-section-sub-banner awe-parallax dhts-bg-primary">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                </div>
            </div>
        </div>
    </section>
    <section class="section-room-detail bg-white">
        <div class="container">
            <div class="room-detail">
                <div class="row">
                    <div class="col-lg-9">
                        @include('frontend.pages.room.child.room_images', ['images' => $images])
                    </div>
                    <div class="col-lg-3">
                        @livewire('frontend.booking-room-form', ['room' => $room])
                    </div>
                </div>
            </div>
            <div class="room-detail_tab">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="room-detail_tab-header">
                            <li class="active"><a href="#overview" data-toggle="tab">OVERVIEW</a></li>
                            <li><a href="#amenities" data-toggle="tab">GALLERY</a></li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="room-detail_tab-content tab-content">
                            <div class="tab-pane fade active in" id="overview">
                                <div class="room-detail_overview">
                                    {!! $room->translateOrDefault($locale)->overview !!}
                                    @include('frontend.pages.room.child.room_utility')
                                </div>
                            </div>
                            <div class="tab-pane fade" id="amenities">
                                <div class="room-detail_amenities">
                                    @if (!empty($imagesGallery))
                                        @include('frontend.pages.room.child.room_gallery', ['imagesGallery' =>
                                        $imagesGallery])
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="room-detail_compare">
                <h2 class="room-compare_title">OTHER SUITES</h2>
                <div class="room-compare_content">
                    <div class="___class_+?25___" id="others-room">
                        @foreach ($otherRooms as $item)
                            @php
                                $image = json_decode($item->images, true)[0];
                            @endphp
                            <div class="___class_+?26___">
                                <div class="room-compare_item">
                                    <div class="img">
                                        <a
                                            href="{{ route('room.detail', ['slug' => Str::slug($item->name), 'room' => $item]) }}"><img
                                                src="{{ asset('images/room/' . $image['name']) }}"
                                                alt="{{ $image['alt'] }}"></a>
                                    </div>
                                    <div class="text text-center">
                                        <h2><a class="dhts-text-primary"
                                                href="{{ route('room.detail', ['slug' => Str::slug($item->name), 'room' => $item]) }}">{{ $item->translateOrDefault($locale)->name }}</a>
                                        </h2>
                                        <a
                                            href="{{ route('room.detail', ['slug' => Str::slug($item->name), 'room' => $item]) }}">View Detail <i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

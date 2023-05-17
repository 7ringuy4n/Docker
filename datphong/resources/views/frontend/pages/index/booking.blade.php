@extends('frontend.main')
@section('title', ' - Booking')
@section('description', ' - Booking')
@section('pageTitle', 'BOOKING INFORMATION')
@section('content')
    <section class="section-sub-banner awe-parallax dhts-bg-primary">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                </div>
            </div>
        </div>
    </section>
    <section class="section-contact">
        <div class="container">
            <div class="contact">
                <div class="row d-flex justify-content-center">
                    <div class="col-xs-12">
                        <div class="contact-form">
                            @livewire('frontend.booking-form', ['booking' => session('booking')])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

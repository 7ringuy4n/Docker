@extends('frontend.main')
@section('title', ' - Contact')
@section('description', ' - Contact')
@section('content')
    <section class="section-sub-banner awe-parallax bg-9">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2 style="margin-top: 20px">REACH US</h2>
                    <p>We would love to hear from you !</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section-contact">
        <div class="container">
            <div class="contact">
                <h2 class="mb-4">CONTACT DETAILS</h2>
                <div class="row dhts-contact-info">
                    <div class="col-xs-12 col-sm-6 mb-3 col-md-3">
                        <div class="contact-item p-3">38/16 Nguyen Van Troi, 15 Ward, Phu Nhuan District, HCMC</div>
                    </div>
                    <div class="col-xs-12 col-sm-6 mb-3 col-md-3">
                        <div class="contact-item p-3">
                            <p class="my-0">Hotline: + 091 258 9988</p>
                            <p class="my-0">Phone: + 84 283 811 0910</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 mb-3 col-md-3">
                        <div class="contact-item p-3">Email: sales.apartment@dhts.com</div>
                    </div>
                    <div class="col-xs-12 col-sm-6 mb-3 col-md-3">
                        <div class="contact-item p-3">Website: dhts.com</div>
                    </div>
                </div>
                <div class="row dhts-contact-form-wrapper">
                    <div class="col-xs-12 col-sm-6">
                        <div class="h-100">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15676.879128115917!2d106.6799039!3d10.794472!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7c699b57845834a2!2sDHTS%20Business%20Apartment!5e0!3m2!1sen!2s!4v1629444738634!5m2!1sen!2s"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="contact-form">
                            @livewire('frontend.contact')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .contact-item {
            background-color: #eee;
        }
    </style>
@endsection

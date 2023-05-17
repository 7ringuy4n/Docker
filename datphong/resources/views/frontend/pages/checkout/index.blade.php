@extends('frontend.main')
@section('title', ' - Check Out')
@section('description', ' - Check Out')
@section('content')
<!-- SUB BANNER -->
<section class="section-sub-banner awe-parallax bg-4">
    <div class="awe-overlay"></div>
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center">
                <h2>CheckOut</h2>
                <p>Lorem Ipsum is simply dummy text</p>
            </div>
        </div>
    </div>
</section>
<!-- END / SUB BANNER -->
<!-- BLOG -->
<section class="section-checkout">
    <div class="container">
        <div class="checkout">
            <p class="checkout_login">Returning customer? <a href="#">Click here to login</a></p>
            <div class="row">
                <div class="col-md-6">
                    <div class="checkout_head">
                        <h3>BILLING DETAILS</h3>
                        <span>Lorem Ipsum is simply dummy text</span>
                    </div>
                    <div class="checkout_form">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <label>Name*</label>
                                <input type="text" class="field-text">
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <label>Email Address*</label>
                                <input type="text" class="field-text">
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <label>Phone*</label>
                                <input type="text" class="field-text">
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <label>Order Notes</label>
                                <textarea class="field-textarea" placeholder="Notes about your order, eg. special notes for delivery"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="checkout_head checkout_margin">
                        <h3>Your payment details</h3>
                    </div>
                    <div class="checkout_form checkout_margin">
                        <div class="checkout_cart">
                            <!-- ITEM -->
                            <div class="cart-item">
                                <div class="img">
                                    <a href="#"><img src="{{ asset('frontend/images/cart/img-2.jpg') }}" alt=""></a>
                                </div>
                                <div class="text">
                                    <a href="#">Luxury Room</a>
                                    <p><span>2 days  - 3 rooms</span> <b>$960</b></p>
                                </div>
                                <a href="#" class="remove"><i class="fa fa-close"></i></a>
                            </div>
                            <!-- END / ITEM -->
                            <!-- ITEM -->
                            <div class="cart-item">
                                <div class="img">
                                    <a href="#"><img src="{{ asset('frontend/images/cart/img-3.jpg') }}" alt=""></a>
                                </div>
                                <div class="text">
                                    <a href="#">Standard Room</a>
                                    <p><span>2 days  - 3 rooms</span> <b>$960</b></p>
                                </div>
                                <a href="#" class="remove"><i class="fa fa-close"></i></a>
                            </div>
                            <!-- END / ITEM -->
                            <!-- ITEM -->
                            <div class="cart-item">
                                <div class="img">
                                    <a href="#"><img src="{{ asset('frontend/images/cart/img-2.jpg') }}" alt=""></a>
                                </div>
                                <div class="text">
                                    <a href="#">Couple Room</a>
                                    <p><span>2 days  - 3 rooms</span> <b>$960</b></p>
                                </div>
                                <a href="#" class="remove"><i class="fa fa-close"></i></a>
                            </div>
                            <!-- END / ITEM -->
                        </div>
                        <div class="checkout_cartinfo">
                            <p><span>Cart Subtotal:</span> $1080</p>
                        </div>
                        <div class="checkout_btn">
                            <button class="awe-btn awe-btn-13">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / BLOG -->
@endsection
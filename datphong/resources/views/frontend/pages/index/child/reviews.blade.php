<section class="section-event-news bg-white dhts-section-reviews">
    <div class="container">
        <div class="event-news">
            <div class="row">
                <div class="col-md-12">
                    <div class="news">
                        <h2 class="heading text-center" style="margin-bottom: 20px">Guest Reviews <input type="text"
                                class="dhts-show-rating"
                                value="{{ ($reviews->avg('rating_cleaness') + $reviews->avg('rating_staff_service')) / 2 }}">
                        </h2>
                        <div class="text-center pb-1">
                            <button class="btn btn-dhts-primary" data-toggle="modal"
                                data-target="#myModal">Send a Review</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <div class="testimonials">
                        @foreach ($reviews as $review)
                            <div class="guest-book_item guest-book_item-2">
                                <p>{{ $review->message }}</p>
                                <span><b>{{ $review->name }}</b> - {{ $review->country }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Review</h4>
            </div>
            <div class="modal-body">
                <div>
                    <div class="contact">
                        <div class="contact-form mt-0">
                            @livewire('frontend.review-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

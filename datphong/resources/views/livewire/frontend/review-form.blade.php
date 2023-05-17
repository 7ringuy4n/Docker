<div>
    <form id="send-contact-form" wire:submit.prevent="send">
        @if (session()->has('success_message'))
            <div class="alert alert-success alert-dismissible mb-3" id="dhts-message" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                {{ session('success_message') }}
            </div>
        @endif
        <div class="row text-center">
            <div class="col-sm-6 mb-3" wire:ignore>
                <h3 class="dhts-text-primary">Cleaness</h3>
                <input type="text" class="dhts-rating" name="rating_cleaness" wire:model.lazy="rating_cleaness"
                    value="{{ $rating_cleaness }}">
            </div>
            <div class="col-sm-6 mb-3" wire:ignore>
                <h3 class="dhts-text-primary">Staff & Service</h3>
                <input type="text" class="dhts-rating" name="rating_staff_service"
                    wire:model.lazy="rating_staff_service" value="{{ $rating_staff_service }}">
            </div>
        </div>
        <div class="form-group position-relative">
            <input type="text" class="form-control @error('name') border-danger @enderror" placeholder="Your Name"
                wire:model.lazy="name" @error('name') data-toggle="popover" data-trigger="focus"
                data-content="{{ $message }}" @enderror />
        </div>
        <div class="form-group position-relative">
            <input type="text" class="form-control @error('country') border-danger @enderror" placeholder="Your Country"
                wire:model.lazy="country" @error('country') data-toggle="popover" data-trigger="focus"
                data-content="{{ $message }}" @enderror />
        </div>
        <div class="form-group position-relative">
            <textarea rows="10" class="form-control @error('message') border-danger @enderror"
                placeholder="Write what do you want" wire:model.lazy="message" @error('message') data-toggle="popover"
                data-trigger="focus" data-content="{{ $message }}" @enderror>
                        </textarea>
        </div>
        <div class="form-group text-center">
            <button class="btn btn-dhts-primary py-3 px-5">SEND</button>
        </div>
    </form>
</div>

@push('scripts')
    <script type="text/javascript">
        $('.dhts-rating').rating({
            theme: 'krajee-fa',
            showClear: false,
            step: 1,
            min: 0,
            max: 5,
            size: 'sm',
            starCaptions: function(val) {
                return val;
            },
        });
        $('.dhts-rating').on('rating:change', function(event, value, caption) {
            @this.set($(this).attr('name'), value);
        });
        document.addEventListener("livewire:load", function(event) {
            window.livewire.hook('afterDomUpdate', function() {
                setTimeout(function() {
                    $('#dhts-message').fadeOut('slow', function() {
                        $(this).remove();
                    });
                }, 5000);

                $('[data-toggle="popover"]').popover({
                    placement: 'top'
                });
                $('[data-toggle="popover"]').popover('show');
                $('.popover-content').addClass('text-danger');

                $('.dhts-rating').rating({
                    theme: 'krajee-fa',
                    showClear: false,
                    step: 1,
                    min: 0,
                    max: 5,
                    size: 'sm',
                    starCaptions: function(val) {
                        return val;
                    },
                });
                $('.dhts-rating').on('rating:change', function(event, value, caption) {
                    @this.set($(this).attr('name'), value);
                });
            });
        });
    </script>
@endpush

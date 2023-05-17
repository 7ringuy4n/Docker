<form id="send-contact-form" wire:submit.prevent="send">
    <h4 style="font-size: 14px" class="dhts-text-primary mb-3 text-center">Feel free to send us any questions may you have</h4>
    @if (session()->has('success_message'))
        <div class="alert alert-success alert-dismissible mb-2 mt-4" id="dhts-message" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            {{ session('success_message') }}
        </div>
    @endif
    <div class="form-group">
        <label>Fullname *</label>
        <input type="text" class="form-control @error('fullname') border-danger @enderror" wire:model.lazy="fullname"
            @error('fullname') data-toggle="popover" data-trigger="focus" data-content="{{ $message }}" @enderror>
    </div>
    <div class="form-group">
        <label>Email *</label>
        <input type="email" class="form-control @error('email') border-danger @enderror" wire:model.lazy="email"
            @error('email') data-toggle="popover" data-trigger="focus" data-content="{{ $message }}" @enderror>
    </div>
    <div class="form-group">
        <label>Phone *</label>
        <input type="text" class="form-control @error('phone') border-danger @enderror" wire:model.lazy="phone"
            @error('phone') data-toggle="popover" data-trigger="focus" data-content="{{ $message }}" @enderror>
    </div>
    <div class="form-group">
        <label>Question *</label>
        <textarea rows="10" class="form-control @error('question') border-danger @enderror" wire:model.lazy="question"
            @error('question') data-toggle="popover" data-trigger="focus" data-content="{{ $message }}"
            @enderror></textarea>
    </div>
    <div class="form-group text-center">
        <button class="btn btn-dhts-primary px-5 py-3" wire:loading.attr="disabled" wire:target="send"><i
            wire:loading wire:target="send" class="fa fa-circle-o-notch fa-spin"></i> <span
            wire:target="send">SEND</span><span wire:loading wire:target="send">ING</span></button>
    </div>
    </div>
</form>

@push('scripts')
    <script type="text/javascript">
        document.addEventListener("livewire:load", function(event) {
            window.livewire.hook('afterDomUpdate', function() {
                setTimeout(function() {
                    $('#dhts-message').fadeOut('slow', function() {
                        $(this).remove();
                    });
                }, 4000);

                $('[data-toggle="popover"]').popover({
                    placement: 'top'
                });
                $('[data-toggle="popover"]').popover('show');
                $('.popover-content').addClass('text-danger');
            });
        });
    </script>
@endpush

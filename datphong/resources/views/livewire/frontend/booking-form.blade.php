<div>
    <div class="text-center mb-4">
        <h2 class="text-center border border-2 d-inline-block p-3 text-uppercase">
            {{ $room->translateOrDefault($locale)->name }}</h2>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form id="send-contact-form"
                  wire:submit.prevent="send">
                @if (session()->has('success_message'))
                    <div class="alert alert-success alert-dismissible mb-2 mt-4"
                         id="dhts-message"
                         role="alert">
                        <button type="button"
                                class="close"
                                data-dismiss="alert"
                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ session('success_message') }}
                    </div>
                @endif
                <div class="form-group">
                    <label>Fullname *</label>
                    <input type="text"
                           class="form-control @error('fullname') border-danger @enderror"
                           wire:model.lazy="fullname"
                           @error('fullname')
                               data-toggle="popover"
                               data-trigger="focus"
                               data-content="{{ $message }}"
                           @enderror>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Phone *</label>
                            <input type="text"
                                   class="form-control @error('phone') border-danger @enderror"
                                   wire:model.lazy="phone"
                                   @error('phone')
                                       data-toggle="popover"
                                       data-trigger="focus"
                                       data-content="{{ $message }}"
                                   @enderror>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email"
                                   class="form-control @error('email') border-danger @enderror"
                                   wire:model.lazy="email"
                                   @error('email')
                                       data-toggle="popover"
                                       data-trigger="focus"
                                       data-content="{{ $message }}"
                                   @enderror>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label>Arrive *</label>
                            <input type="text"
                                   name="arrive_date"
                                   class="dhts-datepicker form-control @error('arrive_date') border-danger @enderror"
                                   wire:model="arrive_date"
                                   autocomplete="off"
                                   data-provide="datepicker"
                                   data-date-start-date="+0d"
                                   data-date-autoclose="true"
                                   data-date-format="dd/mm/yyyy"
                                   data-date-today-highlight="true"
                                   onchange="this.dispatchEvent(new InputEvent('input'))"
                                   @error('arrive_date')
                                       data-toggle="popover"
                                       data-trigger="focus"
                                       data-content="{{ $message }}"
                                   @enderror>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label>Departure *</label>
                            <input type="text"
                                   name="departure_date"
                                   class="dhts-datepicker form-control @error('departure_date') border-danger @enderror"
                                   wire:model="departure_date"
                                   autocomplete="off"
                                   data-provide="datepicker"
                                   data-date-start-date="+0d"
                                   data-date-autoclose="true"
                                   data-date-format="dd/mm/yyyy"
                                   data-date-today-highlight="true"
                                   onchange="this.dispatchEvent(new InputEvent('input'))"
                                   @error('departure_date')
                                       data-toggle="popover"
                                       data-trigger="focus"
                                       data-content="{{ $message }}"
                                   @enderror>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Nationality</label>
                    <input type="text"
                           class="form-control @error('nationality') border-danger @enderror"
                           wire:model.lazy="nationality"
                           @error('nationality')
                               data-toggle="popover"
                               data-trigger="focus"
                               data-content="{{ $message }}"
                           @enderror>
                </div>
                <div class="form-group">
                    <label>Number of person *</label>
                    <select class="form-control"
                            wire:model.lazy="number_of_person">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        @if (!in_array($room->id, [2, 3, 4, 5]))
                            <option value="3">3</option>
                            <option value="4">4</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label>Note</label>
                    <textarea cols="30"
                              rows="10"
                              class="form-control"
                              wire:model.lazy="note"></textarea>
                </div>
                <div class="text-center">
                    <button class="btn btn-dhts-primary px-5 py-3"
                            wire:loading.attr="disabled"
                            wire:target="send">
                        <i wire:loading
                           wire:target="send"
                           class="fa fa-circle-o-notch fa-spin"></i>
                        <span wire:target="send">SEND</span>
                        <span wire:loading
                              wire:target="send">ING</span>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            @php
                $image = json_decode($room->images, true)[0];
            @endphp
            <div class="border rounded p-3"
                 style="margin-top: 25px">
                <img src="{{ asset('images/room/' . $image['name']) }}"
                     class="img-fluid"
                     alt="{{ $room->translateOrDefault($locale)->name }}">
                <div>
                    {!! $room->translateOrDefault($locale)->overview !!}
                </div>
            </div>
        </div>
    </div>

</div>


@push('scripts')
    <script>
        document.addEventListener("livewire:load", function(event) {
            window.livewire.hook('afterDomUpdate', function() {
                $('[data-toggle="popover"]').popover({
                    placement: 'top'
                });
                $('[data-toggle="popover"]').popover('show');
                $('.popover-content').addClass('text-danger');
            });
        });
    </script>
@endpush

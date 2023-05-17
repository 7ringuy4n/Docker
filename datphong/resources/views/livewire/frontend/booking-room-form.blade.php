<div class="room-detail_book">
    <div class="room-detail_total">
        <img src="images/icon-logo.png"
             alt=""
             class="icon-logo">
        <h6>STARTING ROOM FROM</h6>
        <p class="price"><span class="amout">${{ number_format($room->price_month) }}</span> /Month
        </p>
        <p>${{ number_format($room->price_day) }} /Day</p>
    </div>
    <div class="room-detail_form">
        <form action=""
              wire:submit.prevent="booking" method="POST">
            <label>Arrive</label>
            <div wire:ignore>
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
            <label>Depature</label>
            <div wire:ignore>
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
            <label>Number of person</label>
            <select class="form-control form-control @error('number_of_person') border-danger @enderror"
                    wire:model.lazy="number_of_person"
                    @error('number_of_person')
                        data-toggle="popover"
                        data-content="{{ $message }}"
                    @enderror>
                <option value="1">1</option>
                <option value="2">2</option>
                @if (!in_array($room->id, [2, 3, 4, 5]))
                    <option value="3">3</option>
                    <option value="4">4</option>
                @endif
            </select>
            <div class="text-center"
                 style="padding-top: 15px">
                <button class="btn btn-dhts-primary">Book Now</button>
            </div>
        </form>
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

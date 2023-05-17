<section class="section-our-rooms">
    <div class="container">
        <h2 class="heading text-center mb-3">{{ __('all.our_room') }}</h2>
        <div class="dhts-line"></div>
        <div id="our-room">
            @foreach ($rooms as $room)
                @php
                    $image = json_decode($room->images, true)[0];
                @endphp
                <div class="room-item">
                    <div class="room-compare_item">
                        <div class="img">
                            <a href="{{ route('room.detail', ['slug' => Str::slug($room->name), 'room' => $room]) }}"><img
                                    src="{{ asset('images/room/' . $image['name']) }}"
                                    alt="{{ $image['alt'] }}"></a>
                        </div>
                        <div class="text text-center">
                            <h2 class="room-name"><a
                                    href="{{ route('room.detail', ['slug' => Str::slug($room->name), 'room' => $room]) }}">{{ $room->room_translations->first()->name }}</a>
                            </h2>
                            <h2 class="room-price"><span>${{ number_format($room->price_month) }}</span> per month</h2>
                            <a href="{{ route('room.detail', ['slug' => Str::slug($room->name), 'room' => $room]) }}"
                                class="btn-view-detail">view room detail <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

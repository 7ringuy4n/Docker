<div class="room-detail_img">
    @foreach ($images as $image)
        <div class="room_img-item">
            <img src="{{ asset('images/room/' . $image['name']) }}" alt="{{ $image['alt'] }}">
            <h6>{{ $image['alt'] }}</h6>
        </div>
    @endforeach
</div>
<div class="room-detail_thumbs">
    @foreach ($images as $image)
        <div class="room_img-item">
            <a href="#"><img src="{{ asset('images/room/' . $image['name']) }}"
                    alt="{{ $image['alt'] }}"></a>
        </div>
    @endforeach
</div>
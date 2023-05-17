<div class="gallery-content mt-0">
    <div class="row">
        <div class="gallery-isotope col-4">
            <div class="item-size"></div>
            @foreach ($imagesGallery as $image)
                <div class="item-isotope all">
                    <div class="gallery_item">
                        <a href="{{ asset('images/room/' . $image['name']) }}"
                            class="mfp-image">
                            <img src="{{ asset('images/room/' . $image['name']) }}" alt="{{ $image['alt'] }}">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
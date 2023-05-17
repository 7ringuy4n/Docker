<section class="section-slider">
    <div class="banner-slider" id="banner-slider" data-height="100vh">
        @foreach ($items as $item)
            <div class="slider-item text-center" data-image="{{ asset('images/slider/' . $item->thumb) }}">
                <div class="slider-text">
                    <span class="slider-caption-sub slider-caption-sub-1">{{ $item->slider_translations->first()->name }}</span>
                    <h2 class="slider-caption slider-caption-1">{{ $item->slider_translations->first()->description }}</h2>
                    {{-- <span class="slider-caption-sub slider-caption-sub-1">{{ $item->translateOrDefault($locale)->name }}</span>
                    <h2 class="slider-caption slider-caption-1">{{ $item->translateOrDefault($locale)->description }}</h2> --}}
                    <a href="{{ empty($item->link) ? route('gallery.index') : $item->link }}" class="awe-btn awe-btn-12 awe-btn-slider">VIEW NOW</a>
                </div>
            </div>
        @endforeach
    </div>
</section>

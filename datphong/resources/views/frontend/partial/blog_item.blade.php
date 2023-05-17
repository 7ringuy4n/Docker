@php
    $name = $item->name;
    $category = $item->category()->first();
    $cateName = $category->name;
    $tags = $item->tags()->get();
    $month = \Carbon\Carbon::parse($item->created)->format('m');
    $day = \Carbon\Carbon::parse($item->created)->format('d');
    $link = route('blog/detail', ['cate_slug' => \Illuminate\Support\Str::slug($category->name), 'slug' => $item->slug, 'id' => $item->id]);
    $linkCate = route('blog/category', ['slug' => \Illuminate\Support\Str::slug($category->name), 'id' => $category->id]);
@endphp
<div class="card blog-item">
    <div class="card-img-wrapper overlay-rounded-top">
        <img class="card-img-top" src="{{ asset('images/article/'.$item->banner) }}" alt="blog-thumbnail">
    </div>
    <div class="card-body p-0">
        <div class="d-flex h-100">
            <div class="py-3 px-4 border-right text-center">
                <h3 class="text-primary mb-0">
                    {{ $day }}
                </h3>
                <p class="mb-0">Th {{ $month }}</p>
            </div>
            <div class="p-3 h-100 w-100 d-flex flex-column">
                <h5><a href="{{ $link }}" class="font-primary text-dark">{{ $name }}</a></h5>
                <p class="tags mt-auto mb-0 float-right text-right">
                    @foreach($tags as $iTag => $tag)
                        <a href="#">{{ $tag->name }}</a>
                        @if($iTag + 1 < count($tags)),@endif
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</div>
@php
use App\Models\CateConvenienceModel;

$cateConveniences = CateConvenienceModel::withDepth()
    ->with('conveniences')
    ->with('cate_convenience_translations')
    ->having('depth', '>', 0)
    ->active()
    ->defaultOrder()
    ->get()
    ->toTree();
@endphp

<ul class="sub-menu">
    @foreach ($cateConveniences as $cate)
        @include('frontend.elements.cate_convenience_child_item', ['item' => $cate])
    @endforeach
</ul>

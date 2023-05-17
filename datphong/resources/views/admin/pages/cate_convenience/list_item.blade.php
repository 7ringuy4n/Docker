@php
use App\Helpers\Template as Template;
use App\Helpers\Hightlight as Hightlight;
$status = Template::showItemButton($controllerName, $item->id, $item->status, 'status');
$listBtnAction = Template::showButtonAction($controllerName, $item->id);
@endphp

<li class="dd-item dd3-item" data-id="{{ $item->id }}">
    <div class="dd-handle dd3-handle">Drag</div>
    <div class="dd3-content ">
        <div class="category-item">
            <div>{{ $item->name }}</div>
            <div class="area-action">
                <div>{!! $status !!}</div>
                <div>{!! $listBtnAction !!}</div>
            </div>
        </div>
    </div>
    @if (count($item->children) > 0)
        <ol class="dd-list">
            @foreach ($item->children as $itemChild)
                @include('admin.pages.cate_convenience.list_item', ['item' => $itemChild])
            @endforeach
        </ol>
    @endif
</li>

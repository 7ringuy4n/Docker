<li>
    <a href="#">{{ $item->cate_convenience_translations->first()->name }} @if (count($item->children) > 0 || count($item->conveniences) > 0)<span class="fa fa-caret-down"></span>@endif</a>
    @if (count($item->children) > 0)
        <ul class="sub-menu">
            @foreach ($item->children as $itemChild)
                @include('frontend.elements.cate_convenience_child_item', ['item' => $itemChild])
            @endforeach
        </ul>
    @else
        @if (count($item->conveniences) > 0)
            <ul class="sub-menu">
                @foreach ($item->conveniences as $convenience)
                    <li>
                        <a href="{{ $convenience->link }}" target="_blank">{{ $convenience->convenience_translations->first()->name }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    @endif
</li>

@php
use App\Helpers\Template as Template;
use App\Helpers\Highlight as Highlight;
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Tên</th>
                    <th class="column-title">Link</th>
                    <th class="column-title">Danh mục</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Sắp xếp</th>
                    <th class="column-title">Tạo mới</th>
                    {{-- <th class="column-title">Chỉnh sửa</th> --}}
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($items) > 0)
                    @foreach ($items as $key => $val)
                        @php
                            $index = $key + 1;
                            $class = $index % 2 == 0 ? 'even' : 'odd';
                            $id = $val->id;
                            $btnOrdering = Template::showBtnSort($controllerName, $items, $key, $val);
                            $name = Highlight::show($val->name, $params['search'], 'name');
                            $status = Template::showItemButton($controllerName, $id, $val->status, 'status');
                            $createdHistory = Template::showItemHistory($val->created_by, $val->created);
                            $modifiedHistory = Template::showItemHistory($val->modified_by, $val->modified);
                            $listBtnAction = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td>{{ $index }}</td>
                            <td>{!! $name !!}</td>
                            <td>{!! $val->link !!}</td>
                            <td>{!! $val->cateConvenience()->name !!}</td>
                            <td>{!! $status !!}</td>
                            <td>{!! $btnOrdering !!}</td>
                            <td>{!! $createdHistory !!}</td>
                            {{-- <td>{!! $modifiedHistory !!}</td> --}}
                            <td class="last">{!! $listBtnAction !!}</td>
                        </tr>
                    @endforeach
                @else
                    @include('admin.templates.list_empty', ['colspan' => 8])
                @endif
            </tbody>
        </table>
    </div>
</div>

@php
    use App\Helpers\Template as Template;
    use App\Helpers\Highlight as Highlight;

    $cateNews = $category;
    unset($cateNews['default']);
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
            <tr class="headings">
                <th class="column-title">#</th>
                <th class="column-title">Info</th>
                <th class="column-title">Image</th>
                <th class="column-title">Danh mục</th>
                <th class="column-title">Status</th>
                <th class="column-title">Action</th>
            </tr>
            </thead>
            <tbody>
            @if (count($items) > 0)
                @foreach ($items as $key => $val)
                    @php
                        $index           = $key + 1;
                        $class           = ($index % 2 == 0) ? "even" : "odd";
                        $id              = $val['id'];
                        $name            = Highlight::show($val->translate('vi')->name, $params['search'], 'name');
                        $description     = Highlight::show($val->translate('vi')->description, $params['search'], 'description');
                        $thumb           = Template::showItemThumb($controllerName, $val['banner'], $val['name']);
                        $category        = Template::showItemSelect($controllerName, $id, $cateNews, $val['category_id'], 'category_id', false);
                        $status          = Template::showItemButton($controllerName, $id, $val['status'], 'status');
                        $listBtnAction   = Template::showButtonAction($controllerName, $id);
                    @endphp

                    <tr class="{{ $class }} pointer">
                        <td>{{ $index }}</td>
                        <td width="25%">
                            <p><strong>Tên:</strong> {!! $name !!}</p>
                            <p><strong>Mô tả:</strong> {!! $description !!}</p>
                        </td>
                        <td width="15%">
                            <p>{!! $thumb !!}</p>
                        </td>
                        <td width="15%">{!! $category !!}</td>
                        <td>{!! $status !!}</td>
                        <td class="last">{!! $listBtnAction !!}</td>
                    </tr>
                @endforeach
            @else
                @include('admin.templates.list_empty', ['colspan' => 6])
            @endif
            </tbody>
        </table>
    </div>
</div>
           
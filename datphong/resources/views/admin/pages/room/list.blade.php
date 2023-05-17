@php
    use App\Helpers\Template as Template;
    use App\Helpers\Highlight as Highlight;
@endphp

{!! Form::open(['method'  => 'POST', 'url' => route("$controllerName/update"), 'id' => 'update-form']) !!}
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
            <tr class="headings">
                <th>
                    <div class="icheckbox_flat-green" style="position: relative;">
                        <input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;">
                    </div>
                </th>
                <th class="column-title">#</th>
                <th class="column-title">Tên</th>
                <th class="column-title">Hình ảnh</th>
                <th class="column-title">Trạng thái</th>
                <th class="column-title">Sắp xếp</th>
                <th class="column-title">Hành động</th>
                <th class="bulk-actions" colspan="7" style="display: none;">
                    <a class="antoo" style="color:#fff; font-weight:500;">Checked ( <span class="action-cnt">1 Records Selected </span> ) <i class="fa fa-chevron-down"></i></a>
                </th>
            </tr>
            </thead>
            <tbody>
            @if (count($items) > 0)
                @foreach ($items as $key => $val)
                    @php
                        $index  = $key + 1;
                        $id = $val['id'];
                        $images = json_decode($val->images, true);
                        $class  = ($index % 2 == 0) ? "odd" : "even";
                        $name               = Highlight::show($val->name, $params['search'], 'name');
                        $btnOrdering        = Template::showBtnSort($controllerName, $items, $key, $val);
                        $image              = Template::showItemThumb($controllerName, $images[0]['name'], $images[0]['alt']);
                        $status             = Template::showItemStatus($controllerName, $val->id, $val->status);
                        $createHistory      = Template::showItemHistory($val->created_by, $val->created);
                        $listBtnAction      = Template::showButtonAction($controllerName, $val->id);
                    @endphp

                    <tr class="{{ $class }} pointer">
                        <td class="a-center ">
                            <div class="icheckbox_flat-green" style="position: relative;">
                                <input type="checkbox" class="flat table_records" name="cid[{{$id}}]" style="position: absolute; opacity: 0;">
                            </div>
                        </td>
                        <td>{{ $index }}</td>
                        <td>{!! $name !!}</td>
                        <td><p>{!! $image !!}</p></td>
                        <td>{!! $status !!}</td>
                        <td>{!! $btnOrdering !!}</td>
                        <td class="last">{!! $listBtnAction !!}</td>
                    </tr>
                @endforeach
            @else
                @include ('admin.templates.list_empty', ['colspan' => 7])
            @endif
            </tbody>
        </table>
    </div>
</div>
<style>
    img.zvn-thumb {
        height: 80px;
    }
</style>
<input type="hidden" id="type" name="type">
{!! Form::close() !!}
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
                <th class="column-title">Name</th>
                <th class="column-title" style="width: 10%">Order</th>
                <th class="column-title">Status</th>
                <th class="column-title">Created</th>
                <th class="column-title">Updated</th>
                <th class="column-title">Action</th>
            </tr>
            </thead>
            <tbody>
            @if (count($items) > 0)
                @php
                    $a = 0;
                @endphp
                @foreach ($items as $key => $val)
                    @php

                        $index                  = $a + 1;
                        $class                  = ($index % 2 == 0) ? "odd" : "even";
                        $name                   = Highlight::show($val['name'], $params['search'], 'name');
                        $status                 = Template::showItemButton($controllerName, $val['id'], $val['status'], 'status');
                        $ordering               = Template::showInputAjax($controllerName, $val['id'], 'sort', $val['sort']);
                        $createHistory          = Template::showItemHistory($val['created_by'], $val['created']);
                        $modifyHistory          = Template::showItemHistory($val['modified_by'], $val['modified']);
                        $listBtnAction          = Template::showButtonAction($controllerName, $val['id']);
                        $a++;
                    @endphp

                    <tr class=" pointer">
                        <td class="">{{ $index }}</td>
                        <td class="">{!!  $name !!}</td>
                        <td>{!! $ordering !!}</td>
                        <td>{!! $status !!}</td>
                        <td>{!! $createHistory !!}</td>
                        <td>{!! $modifyHistory !!}</td>
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
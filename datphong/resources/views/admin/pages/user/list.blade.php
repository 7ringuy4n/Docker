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
                    <th class="column-title">Username</th>
                    <th class="column-title">Email</th>
                    <th class="column-title">Fullname</th>
                    <th class="column-title">Level</th>
                    <th class="column-title">Avatar</th>
                    <th class="column-title">Status</th>
                    <th class="column-title">Created</th>
                    <th class="column-title">Updated</th>
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
                            $username        = Highlight::show($val['username'], $params['search'], 'username');
                            $fullname        = Highlight::show($val['fullname'], $params['search'], 'fullname');
                            $email           = Highlight::show($val['email'], $params['search'], 'email');
                            $level           = Template::showItemSelect($controllerName, $id, config('zvn.template.level'), $val['level'], 'level');
                            $avatar          = Template::showItemThumb($controllerName, $val['avatar'], $val['name']);
                            $status          = Template::showItemButton($controllerName, $id, $val['status'], 'status'); ;
                            $createdHistory  = Template::showItemHistory($val['created_by'], $val['created']);
                            $modifiedHistory = Template::showItemHistory($val['modified_by'], $val['modified']);
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="10%">{!! $username !!}</td>
                            <td width="10%">{!! $email!!}</td>
                            <td width="10%">{!! $fullname!!}</td>
                            <td width="10%">{!! $level !!}</td>
                            <td width="5%">{!! $avatar !!}</td>
                            <td>{!! $status !!}</td>
                            <td>{!! $createdHistory !!}</td>
                            <td>{!! $modifiedHistory !!}</td>
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
           
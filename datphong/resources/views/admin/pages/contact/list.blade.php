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
                    <th class="column-title">Thông tin</th>
                    <th class="column-title">Câu hỏi</th>
                    <th class="column-title">Trạng thái</th>
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
                            $id = $val['id'];
                            $fullname = Highlight::show($val->surname, $params['search'], 'surname');
                            $phone = Highlight::show($val->phone, $params['search'], 'phone');
                            $email = Highlight::show($val->email, $params['search'], 'email');
                            $question = Highlight::show($val->question, $params['search'], 'question');
                            $link = Highlight::show($val->link, $params['search'], 'link');
                            $thumb = Template::showItemThumb($controllerName, $val->thumb, $val->name);
                            $status = Template::showItemButton($controllerName, $id, $val->status, 'status');
                            $createdHistory = date(config('zvn.format.long_time'), strtotime($val->created));
                            // $modifiedHistory = Template::showItemHistory($val->modified_by, $val->modified);
                            $listBtnAction = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td>{{ $index }}</td>
                            <td>
                                <p><strong>Họ Tên:</strong> {{ $fullname }}</p>
                                <p><strong>Phone:</strong> {!! $phone !!}</p>
                                <p><strong>Email:</strong> {!! $email !!}</p>
                            </td>
                            <td>{!! $question !!}</td>
                            <td>{!! $status !!}</td>
                            <td>{!! $createdHistory !!}</td>
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

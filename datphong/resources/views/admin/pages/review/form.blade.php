@extends('admin.main')
@php
use App\Helpers\Form as FormTemplate;
use App\Helpers\Template;

$formInputAttr = config('zvn.template.form_input');
$formLabelAttr = config('zvn.template.form_label_full');

$elements = [
    [
        'label' => Form::label('name', 'Tên', $formLabelAttr),
        'element' => Form::text('name', @$item['name'], $formInputAttr),
    ],
    [
        'label' => Form::label('country', 'Quốc gia', $formLabelAttr),
        'element' => Form::text('country', @$item['country'], $formInputAttr),
    ],
    [
        'label' => Form::label('message', 'Nội dung', $formLabelAttr),
        'element' => Form::textarea('message', @$item['message'], $formInputAttr),
    ],
    [
        'label' => Form::label('rating', 'Rating', $formLabelAttr),
        'element' => [
            'Cleaness' => Form::text('rating_cleaness', $item['rating_cleaness'] ?? 5, ['class' => 'zvn-rating']),
            'Staff & Service' => Form::text('rating_staff_service', $item['rating_staff_service'] ?? 5, ['class' => 'zvn-rating']),
        ],
        'type' => 'rating',
    ],
    [
        'label' => Form::label('status', 'Trạng thái', $formLabelAttr),
        'element' => [
            'Kích hoạt' => Form::radio('status', 'active', 'active' == @$item['status'] || empty(@$item['status'])),
            'Chưa kích hoạt' => Form::radio('status', 'inactive', 'inactive' == @$item['status']),
        ],
        'type' => 'radio',
    ],
];
@endphp

@section('content')
    {!! Form::open([
    'method' => 'POST',
    'url' => route("$controllerName/save"),
    'enctype' => 'multipart/form-data',
    'class' => 'form-horizontal form-label-left',
]) !!}

    @include ('admin.templates.page_header', ['pageIndex' => false, 'btnSubmit' => true])
    @include ('admin.templates.error')
    @include ('admin.templates.zvn_notify')

    <div class="row">
        <div class="col-sm-12">
            <div class="x_panel">
                @include ('admin.templates.x_title', ['title' => ""])
                <div class="x_content">
                    {!! FormTemplate::show($elements) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::hidden('id', @$item['id']) !!}
    {!! Form::close() !!}

@endsection

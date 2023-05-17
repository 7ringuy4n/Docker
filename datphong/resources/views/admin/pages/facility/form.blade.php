@extends('admin.main')
@php
use App\Helpers\Form as FormTemplate;
use App\Helpers\Template;

$formInputAttr = config('zvn.template.form_input');
$formInputSlug = config('zvn.template.form_slug');
$formEditor = config('zvn.template.form_ckeditor');
$formLabelAttr = config('zvn.template.form_label_full');

$languages = config('language');

$elementsInfo = [];
foreach ($languages as $lang) {
    $locale = $lang['code'];
    if (!empty($item)) {
        $name = @$item->translate($locale)->name;
        $headTitle = @$item->translate($locale)->head_title;
        $headDescription = @$item->translate($locale)->head_description;
        $mainTitle = @$item->translate($locale)->main_title;
        $mainDescription = @$item->translate($locale)->main_description;
    }
    $elementsInfo[$locale] = [
        [
            'label' => Form::label("{$locale}[name]", 'Tên', $formLabelAttr),
            'element' => Form::text("{$locale}[name]", @$name, $formInputAttr),
        ],
        [
            'label' => Form::label("{$locale}[head_title]", 'Tiêu đề', $formLabelAttr),
            'element' => Form::text("{$locale}[head_title]", @$headTitle, $formInputAttr),
        ],
        [
            'label' => Form::label("{$locale}[head_description]", 'Mô tả', $formLabelAttr),
            'element' => Form::textarea("{$locale}[head_description]", @$headDescription, $formInputAttr),
        ],
        [
            'label' => Form::label("{$locale}[main_title]", 'Tiêu đề nội dung', $formLabelAttr),
            'element' => Form::text("{$locale}[main_title]", @$mainTitle, $formInputAttr),
        ],
        [
            'label' => Form::label("{$locale}[main_description]", 'Mô tả nội dung', $formLabelAttr),
            'element' => Form::textarea("{$locale}[main_description]", @$mainDescription, $formEditor),
        ],
    ];
}

$elementsStatus = [
    [
        'label' => Form::label('status', 'Trạng thái', $formLabelAttr),
        'element' => [
            'Kích hoạt' => Form::radio('status', 'active', 'active' == @$item['status'] || empty(@$item['status'])),
            'Chưa kích hoạt' => Form::radio('status', 'inactive', 'inactive' == @$item['status']),
        ],
        'type' => 'radio',
    ],
    [
        'label' => Form::label('thumb', 'Ảnh chính', $formLabelAttr),
        'element' => Form::file('thumb', $formInputAttr),
        'thumb' => @$item->id ? Template::showItemThumb($controllerName, @$item->thumb, @$item->name) : null,
        'type' => 'thumb',
    ],
    [
        'label' => Form::label('thumb_content', 'Ảnh cho nội dung', $formLabelAttr),
        'element' => Form::file('thumb_content', $formInputAttr),
        'thumb' => @$item->id ? Template::showItemThumb($controllerName, @$item->thumb_content, @$item->name) : null,
        'type' => 'thumb',
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
                @include ('admin.templates.x_title', ['title' => "Nội dung"])
                <div class="x_content">

                    <ul class="nav nav-tabs bar_tabs" id="infoTab" role="tablist">
                        @foreach ($languages as $index => $lang)
                            <li class="nav-item @if ($index==0) active @endif">
                                <a class="nav-link @if ($index==0) active @endif" id="lang-infoTab-{{ $lang['code'] }}-tab" data-toggle="tab"
                                    href="#lang-infoTab-{{ $lang['code'] }}" role="tab"
                                    aria-controls="lang-infoTab-{{ $lang['code'] }}"
                                    aria-selected="true">{{ $lang['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content" id="infoTabList">
                        @foreach ($languages as $index => $lang)
                            <div class="tab-pane fade @if ($index==0) active in @endif" id="lang-infoTab-{{ $lang['code'] }}" role="tabpanel"
                                aria-labelledby="lang-infoTab-{{ $lang['code'] }}-tab">
                                {!! FormTemplate::show($elementsInfo[$lang['code']]) !!}
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="x_panel">
                @include ('admin.templates.x_title', ['title' => "Thông tin"])
                <div class="x_content">
                    {!! FormTemplate::show($elementsStatus) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::hidden('thumb_current', @$item->thumb) !!}
    {!! Form::hidden('thumb_content_current', @$item->thumb_content) !!}
    {!! Form::hidden('id', @$item->id) !!}

    {!! Form::close() !!}

    <style>
        .cke_contents {
            height: 500px !important;
        }

    </style>
@endsection

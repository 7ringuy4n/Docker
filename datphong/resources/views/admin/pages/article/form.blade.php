@extends('admin.main')
@section('content')
    @php
        use App\Helpers\Form as FormTemplate;
        use App\Helpers\Template;

        $formInputAttr = config('zvn.template.form_input');
        $formInputSlug = config('zvn.template.form_slug');
        $formEditor = config('zvn.template.form_ckeditor');
        $formLabelAttr = config('zvn.template.form_label_full');

        $languages = config('language');

        $name = $slug = $description = $content = '';

        $elementsInfo = [];
        foreach ($languages as $lang) {
            if(!empty($item)){
                $name = @$item->translate($lang['code'])->name;
                $slug = @$item->translate($lang['code'])->slug;
                $description = @$item->translate($lang['code'])->description;
                $content = @$item->translate($lang['code'])->content;
            }
            $elementsInfo[$lang['code']] = [
               [
                   'label'   => Form::label($lang['code'].'[name]', 'Name', $formLabelAttr),
                   'element' => Form::text($lang['code'].'[name]', $name, $formInputSlug),
               ],
               [
                   'label'   => Form::label($lang['code'].'[slug]', 'Slug', $formLabelAttr),
                   'element' => Form::text($lang['code'].'[slug]', $slug, $formInputAttr),
               ],
               [
                   'label'   => Form::label($lang['code'].'[description]', 'Description', $formLabelAttr),
                   'element' => Form::textarea($lang['code'].'[description]', $description, $formInputAttr),
               ],
               [
                   'label'   => Form::label($lang['code'].'[content]', 'Content', $formLabelAttr),
                   'element' => Form::textarea($lang['code'].'[content]', $content, $formEditor),
               ]
            ];
        }

        $elementsStatus = [
            [
                'label'   => Form::label('category_id', 'Category', $formLabelAttr),
                'element' => Form::select('category_id', $category, @$item['category_id'], $formInputAttr)
            ],
            [
                'label'   => Form::label('status', 'Status', $formLabelAttr),
                'element' => [
                    'Active'       => Form::radio('status', 'active', ('active' == @$item['status'] || empty(@$item['status']))),
                    'Inactive'  => Form::radio('status', 'inactive', ('inactive' == @$item['status'])),
                ],
                'type'    => 'radio'
            ],
            [
                'label'   => Form::label('banner', 'Thumb (Size: 400x220)', $formLabelAttr),
                'element' => Form::file('banner', $formInputAttr ),
                'thumb'   => (!empty(@$item['id'])) ? Template::showItemThumb($controllerName, @$item['banner'] ?? 'default.jpg', @$item['name']) : null ,
                'type'    => "thumb"
            ],
            [
                'label'   => Form::label('thumb', 'ShareFB (Size: 1200x660)', $formLabelAttr),
                'element' => Form::file('thumb', $formInputAttr ),
                'thumb'   => (!empty(@$item['id'])) ? Template::showItemThumb($controllerName, @$item['thumb'] ?? 'default.jpg', @$item['name']) : null ,
                'type'    => "thumb"
            ],
        ];

    @endphp


    {!!
        Form::open([
            'method' => 'POST',
            'url' => route("$controllerName/save"),
            'enctype' => 'multipart/form-data',
            'class' => 'form-horizontal form-label-left'
        ])
    !!}

    @include ('admin.templates.page_header', ['pageIndex' => false, 'btnSubmit' => true])
    @include ('admin.templates.error')
    @include ('admin.templates.zvn_notify')

    <div class="row">
        <div class="col-sm-12">
            <div class="x_panel">
                @include ('admin.templates.x_title', ['title' => "Multiple"])
                <div class="x_content">

                    <ul class="nav nav-tabs bar_tabs" id="infoTab" role="tablist">
                        @foreach($languages as $index => $lang)
                            <li class="nav-item @if($index == 0) active @endif">
                                <a class="nav-link @if($index == 0) active @endif"
                                    id="lang-infoTab-{{$lang['code']}}-tab"
                                    data-toggle="tab" href="#lang-infoTab-{{$lang['code']}}" role="tab"
                                    aria-controls="lang-infoTab-{{$lang['code']}}"
                                    aria-selected="true">{{ $lang['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content" id="infoTabList">
                        @foreach($languages as $index => $lang)
                            <div class="tab-pane fade @if($index == 0) active in @endif"
                                    id="lang-infoTab-{{$lang['code']}}"
                                    role="tabpanel" aria-labelledby="lang-infoTab-{{$lang['code']}}-tab">
                                {!! FormTemplate::show($elementsInfo[$lang['code']]) !!}
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="x_panel">
                @include ('admin.templates.x_title', ['title' => "Info"])
                <div class="x_content">
                    {!! FormTemplate::show($elementsStatus) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::hidden ('thumb_current', @$item['thumb']) !!}
    {!! Form::hidden ('banner_current', @$item['banner']) !!}
    {!! Form::hidden ('id', @$item['id']) !!}

    {!! Form::close() !!}

    <style>
        .cke_contents {
            height: 500px !important;
        }
    </style>
@endsection

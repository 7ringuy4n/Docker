@extends('admin.main')
@section('content')
    @php
        use App\Helpers\Form as FormTemplate;
        use App\Helpers\Template;

        $formInputAttr = config('zvn.template.form_input');
        $formInputSlug = config('zvn.template.form_slug');
        $formLabelAttr = config('zvn.template.form_label_full');

        $languages = config('language');

        $name = $slug = $meta_title = $meta_description = $meta_keyword = '';

        $elementsInfo = [];
        foreach ($languages as $lang) {
            if(!empty($item)){
                $name = @$item->translate($lang['code'])->name;
                $slug = @$item->translate($lang['code'])->slug;
                $meta_title = @$item->translate($lang['code'])->meta_title;
                $meta_description = @$item->translate($lang['code'])->meta_description;
                $meta_description = @$item->translate($lang['code'])->meta_description;
                $meta_keyword = @$item->translate($lang['code'])->meta_keyword;
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
                   'label'   => Form::label($lang['code'].'[meta_title]', 'Meta title', $formLabelAttr),
                   'element' => Form::text($lang['code'].'[meta_title]', $meta_title, $formInputAttr),
               ],
               [
                   'label'   => Form::label($lang['code'].'[meta_description]', 'Meta description', $formLabelAttr),
                   'element' => Form::textarea($lang['code'].'[meta_description]', $meta_description, $formInputAttr),
               ],
               [
                   'label'   => Form::label($lang['code'].'[meta_keyword]', 'Meta keyword', $formLabelAttr),
                   'element' => Form::text($lang['code'].'[meta_keyword]', $meta_keyword, $formInputAttr),
               ]
            ];
        }

        $elementsStatus = [
            [
                'label'   => Form::label('status', 'Status', $formLabelAttr),
                'element' => [
                    'Active' => Form::radio('status', 'active', ('active' == @$item['status'] || empty(@$item['status']))),
                    'Inactive'  => Form::radio('status', 'inactive', ('inactive' == @$item['status'])),
                ],
                'type'    => 'radio'
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
    {!! Form::hidden ('id', @$item['id']) !!}
    {!! Form::close() !!}
@endsection



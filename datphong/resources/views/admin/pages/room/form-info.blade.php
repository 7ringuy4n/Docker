@php
use App\Helpers\Form as FormTemplate;
use App\Helpers\Template;

$formInputAttr = config('zvn.template.form_input');
$formEditor = config('zvn.template.form_ckeditor');
$formLabelAttr = config('zvn.template.form_label_full');

$languages = config('language');

$name = $slug = $meta_title = $meta_description = $meta_keyword = $description = $content = $bed = $view = $overview = '';

$elementsInfo = [];
foreach ($languages as $lang) {
    if (!empty($item)) {
        $name = @$item->translate($lang['code'])->name;
        $overview = @$item->translate($lang['code'])->overview;
        // $content = @$item->translate($lang['code'])->content;
        $meta_title = @$item->translate($lang['code'])->meta_title;
        $meta_description = @$item->translate($lang['code'])->meta_description;
        $meta_description = @$item->translate($lang['code'])->meta_description;
        $meta_keyword = @$item->translate($lang['code'])->meta_keyword;
    }
    $elementsInfo[$lang['code']] = [
        [
            'label' => Form::label($lang['code'] . '[name]', 'Tên', $formLabelAttr),
            'element' => Form::text($lang['code'] . '[name]', $name, $formInputAttr),
        ],
        [
            'label' => Form::label($lang['code'] . '[overview]', 'Tổng quan', $formLabelAttr),
            'element' => Form::textarea($lang['code'] . '[overview]', $overview, $formEditor),
        ],
        // [
        //     'label' => Form::label($lang['code'] . '[content]', 'Nội dung', $formLabelAttr),
        //     'element' => Form::textarea($lang['code'] . '[content]', $content, $formEditor),
        // ],
        [
            'label' => Form::label($lang['code'] . '[meta_title]', 'Meta title', $formLabelAttr),
            'element' => Form::text($lang['code'] . '[meta_title]', $meta_title, $formInputAttr),
        ],
        [
            'label' => Form::label($lang['code'] . '[meta_description]', 'Meta description', $formLabelAttr),
            'element' => Form::textarea($lang['code'] . '[meta_description]', $meta_description, $formInputAttr),
        ],
        [
            'label' => Form::label($lang['code'] . '[meta_keyword]', 'Meta keyword', $formLabelAttr),
            'element' => Form::text($lang['code'] . '[meta_keyword]', $meta_keyword, $formInputAttr),
        ],
    ];
}
@endphp

<div class="x_panel">
    @include ('admin.templates.x_title', ['title' => "Thông tin"])
    <div class="x_content">

        <ul class="nav nav-tabs bar_tabs" id="infoTab" role="tablist">
            @foreach ($languages as $index => $lang)
                <li class="nav-item @if ($index==0) active @endif">
                    <a class="nav-link @if ($index==0) active @endif"
                        id="lang-infoTab-{{ $lang['code'] }}-tab" data-toggle="tab"
                        href="#lang-infoTab-{{ $lang['code'] }}" role="tab"
                        aria-controls="lang-infoTab-{{ $lang['code'] }}" aria-selected="true">{{ $lang['name'] }}
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

@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template as Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label_full');

    $item = json_decode(@$item['value'],1);
    $elements = [
        [
            'label'   => Form::label('facebook', 'Facebook', $formLabelAttr),
            'element' => Form::text('facebook', @$item['facebook'],  $formInputAttr)
        ],
        [
            'label'   => Form::label('youtube', 'Youtube', $formLabelAttr),
            'element' => Form::text('youtube', @$item['youtube'],  $formInputAttr)
        ],
        [
            'label'   => Form::label('skype', 'Skype', $formLabelAttr),
            'element' => Form::text('skype', @$item['youtube'],  $formInputAttr)
        ],
        [
            'label'   => Form::label('tripadvisor', 'Tripadvisor', $formLabelAttr),
            'element' => Form::text('tripadvisor', @$item['tripadvisor'],  $formInputAttr)
        ],
        [
            'label'   => Form::label('instagram', 'Instagram', $formLabelAttr),
            'element' => Form::text('instagram', @$item['instagram'],  $formInputAttr)
        ],
        [
            'label'   => Form::label('twitter', 'Twitter', $formLabelAttr),
            'element' => Form::text('twitter', @$item['twitter'],  $formInputAttr)
        ],
        [
            'label'   => Form::label('linkedin', 'Linkedin', $formLabelAttr),
            'element' => Form::text('linkedin', @$item['linkedin'],  $formInputAttr)
        ],
        [
            'element'  => Form::submit('Save', ['class'=>'btn btn-info']),
            'type'      => "btn-submit"
        ],
    ];

@endphp

<div class="x_panel">
    @include ('admin.templates.x_title', ['title' => "Form"])
    <div class="x_content">
    {!! Form::open([
            'method'  => 'POST',
            'url'     => route("$controllerName/save"),
            'enctype' => 'multipart/form-data',
            'class'   => 'form-horizontal form-label-left',
            'id'      => 'main-form'
        ]) !!}
    {!! FormTemplate::show($elements) !!}
    {!! Form::hidden ('key_value', 'setting-social') !!}
    {!! Form::close() !!}
    </div>
</div>
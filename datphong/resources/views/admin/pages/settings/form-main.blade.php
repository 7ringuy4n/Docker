@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template as Template;

    $formInputAttr = config('zvn.template.form_input');
    $formInputAttrCkEditor = ['class' => $formInputAttr['class'].' ckeditor', 'id' => 'ckeditor'];
    $formLabelAttr = config('zvn.template.form_label_full');

    $item = json_decode(@$item['value'],1);
    $elements = [
        [
            'label'   => Form::label('hotline1', 'Hotline 1', $formLabelAttr),
            'element' => Form::text('hotline1', @$item['hotline1'],  $formInputAttr)
        ],
        [
            'label'   => Form::label('hotline2', 'Hotline 2', $formLabelAttr),
            'element' => Form::text('hotline2', @$item['hotline2'],  $formInputAttr)
        ],
        [
            'label'   => Form::label('fax', 'Email', $formLabelAttr),
            'element' => Form::text('fax', @$item['fax'],  $formInputAttr)
        ],
        [
            'label'   => Form::label('copyright', 'Copyright', $formLabelAttr),
            'element' => Form::text('copyright', @$item['copyright'],  $formInputAttr)
        ],
        [
            'label'   => Form::label('time', 'Working TIme', $formLabelAttr),
            'element' => Form::text('time', @$item['time'],  $formInputAttr)
        ],
        [
            'label'   => Form::label('address', 'Address', $formLabelAttr),
            'element' => Form::text('address', @$item['address'],  $formInputAttr)
        ],
        [
            'label'   => Form::label('logan', 'Slogan', $formLabelAttr),
            'element' => Form::text('logan', @$item['logan'],  $formInputAttr)
        ],
        [
            'label'   => Form::label('introduce', 'Introduce', $formLabelAttr),
            'element' => Form::textarea('introduce', @$item['introduce'],  $formInputAttrCkEditor)
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
    {!! Template::uploadImage('logo1', @$item['logo1']) !!}
    {!! FormTemplate::show($elements) !!}
    {!! Form::hidden ('key_value', 'setting-main') !!}
    {!! Form::close() !!}
    </div>
</div>
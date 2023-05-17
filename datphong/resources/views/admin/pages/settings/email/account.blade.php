@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template as Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label_full');

    $item = json_decode(@$item['value'],1);

    $elementsAccount  = [
        [
            'label'   => Form::label('email', 'Email', $formLabelAttr),
            'element' => Form::text('email', @$item['email'],  $formInputAttr),
        ],
        [
            'label'   => Form::label('password', 'Password', $formLabelAttr),
            'element' => Form::text('password', @$item['password'],  $formInputAttr),
        ],
        [
            'element'  => Form::submit('Save', ['class'=>'btn btn-info']),
            'type'      => "btn-submit"
        ]
    ];

@endphp

<div class="x_panel">
    @include ('admin.templates.x_title', ['title' => 'Account'])
    <div class="x_content">
        {!! Form::open([
               'method'  => 'POST',
               'url'     => route("$controllerName/save"),
               'enctype' => 'multipart/form-data',
               'class'   => 'form-horizontal form-label-left',
               'id'      => 'email-account-form'
           ]) !!}
        {!! FormTemplate::show($elementsAccount) !!}
        {!! Form::hidden ('key_value', 'setting-email') !!}
        {!! Form::close() !!}
    </div>
</div>
@extends('admin.main')
@section('content')
    @php
        use App\Helpers\Form as FormTemplate;
        use App\Helpers\Template as Template;

        $formInputAttr = config('zvn.template.form_input');
        $formLabelAttr = config('zvn.template.form_label_full');

        $statusValue     = ['default' => 'Select status', 'active' => 'Active', 'inactive' => 'Inactive'];

        $elements   = [

            [
                'label'   => Form::label('password', 'Password current', $formLabelAttr),
                'element' => Form::password('password_old', $formInputAttr),
            ],
             [
                'label'   => Form::label('password', 'Pasword new', $formLabelAttr),
                'element' => Form::password('password_new', $formInputAttr),
            ],
            [
                'label'   => Form::label('password_confirmation', 'Confirm password', $formLabelAttr),
                'element' => Form::password('password_confirmation',  $formInputAttr),
            ],

            [
                'element'  => Form::submit('Save', ['class'=>'btn btn-info']),
                'type'      => "btn-submit"
            ], 
        ];

    @endphp

    @include ('admin.templates.page_header', ['pageIndex' => false])
    @include ('admin.templates.error')
    @include ('admin.templates.zvn_notify')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include ('admin.templates.x_title', ['title' => "Form"])
                <div class="x_content">
                    {!! Form::open([
                            'method'  => 'POST', 
                            'url'     => route("$controllerName/post-change-password"),
                            'enctype' => 'multipart/form-data',
                            'class'   => 'form-horizontal form-label-left',
                            'id'      => 'main-form'
                        ]) !!}
                    {!! FormTemplate::show($elements) !!}
                    {!! Form::hidden ('email', $email) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
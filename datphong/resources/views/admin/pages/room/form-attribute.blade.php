@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template as Template;

    $formInputAttr = config('zvn.template.form_input');
    $formInputCurrency = config('zvn.template.form_currency');
    $formLabelAttr = config('zvn.template.form_label_full');

    $elements = [
        [
            'label'   => Form::label('price_day', 'Giá theo ngày', $formLabelAttr),
            'element' => Form::text('price_day', @$item['price_day'], $formInputCurrency),
        ],
        [
            'label'   => Form::label('price_month', 'Giá theo tháng', $formLabelAttr),
            'element' => Form::text('price_month', @$item['price_month'], $formInputCurrency),
        ],
        [
            'label'   => Form::label('status', 'Trạng thái', $formLabelAttr),
            'element' => [
                'Kích hoạt'       => Form::radio('status', 'active', ('active' == @$item['status'] || empty(@$item['status']))),
                'Chưa kích hoạt'  => Form::radio('status', 'inactive', ('inactive' == @$item['status'])),
            ],
            'type'    => 'radio'
        ]
    ];

@endphp
<div class="x_panel">
    <div class="x_title">
        <h2>Thuộc tính</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        {!! FormTemplate::show($elements) !!}
    </div>
</div>

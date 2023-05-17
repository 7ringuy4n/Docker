    @php
        use App\Helpers\Form as FormTemplate;
        use App\Helpers\Template as Template;
        
        $formInputAttr = config('zvn.template.form_input');
        $formLabelAttr = config('zvn.template.form_label_full');
        $statusValue = ['default' => 'Tùy chọn', 'active' => 'Kích hoạt', 'inactive' => 'Chưa kích hoạt'];
        
        $elements = [
            [
                'label' => Form::label('images[]', 'Hình ảnh', $formLabelAttr),
                'type' => 'dropzone',
                'id' => 'dropzone',
            ],
            [
                'label' => Form::label('images_extra[]', 'Hình ảnh khác', $formLabelAttr),
                'type' => 'dropzone',
                'id' => 'dropzone_extra',
            ],
        ];
    @endphp

    <div class="row">
        <div class="col-sm-12">
            <div class="x_panel">
                @include ('admin.templates.x_title', ['title' => "Hình ảnh"])
                <div class="x_content">
                    {!! FormTemplate::show($elements) !!}
                </div>
            </div>
        </div>
    </div>

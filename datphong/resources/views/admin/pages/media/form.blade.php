@extends('admin.main')
@section('content')
    @php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template as Template;

    $formInputAttr = config('zvn.template.form_input');
    $formInputCkeditor = config('zvn.template.form_ckeditor');
    $formLabelAttr = config('zvn.template.form_label_full');
    $statusValue = ['default' => 'Tùy chọn', 'active' => 'Kích hoạt', 'inactive' => 'Chưa kích hoạt'];

    $languages = config('language');
    $images = @$item->images ? $item->images->sortby('sort')->values()->all() : [];
    $srcThumb = asset('images/media/');

    $name = '';

    $elementsInfo = [];
    foreach ($languages as $lang) {
        if (!empty($item)) {
            $name = @$item->translate($lang['code'])->name;
        }
        $elementsInfo[$lang['code']] = [
            [
                'label' => Form::label($lang['code'] . '[name]', 'Tiêu đề', $formLabelAttr),
                'element' => Form::text($lang['code'] . '[name]', @$name, $formInputAttr),
            ],
        ];
    }

    $elements = [
        [
            'label' => Form::label('status', 'Trạng thái', $formLabelAttr),
            'element' => [
                'Kích hoạt' => Form::radio('status', 'active', 'active' == @$item['status'] || empty($item['status'])),
                'Chưa kích hoạt' => Form::radio('status', 'inactive', 'inactive' == @$item['status']),
            ],
            'type' => 'radio',
        ],
        [
            'label' => Form::label('images[]', 'Hình ảnh', $formLabelAttr),
            'type' => 'dropzone',
            'id' => 'dropzone',
        ],
    ];
    @endphp


    {!! Form::open([
    'method' => 'POST',
    'url' => route("$controllerName/save"),
    'enctype' => 'multipart/form-data',
    'class' => 'form-horizontal form-label-left',
    'id' => 'main-form',
]) !!}
    @include ('admin.templates.page_header', ['pageIndex' => false, 'btnSubmit' => true])
    @include ('admin.templates.error')
    @include ('admin.templates.zvn_notify')

    <div class="row">
        <div class="col-sm-12">
            <div class="x_panel">
                @include ('admin.templates.x_title', ['title' => "Thông tin"])
                <div class="x_content">

                    <ul class="nav nav-tabs bar_tabs" id="infoTab" role="tablist">
                        @foreach ($languages as $index => $lang)
                            <li class="nav-item @if ($index==0) active @endif">
                                <a class="nav-link @if ($index==0) active @endif" id="lang-infoTab-{{ $lang['code'] }}-tab" data-toggle="tab"
                                    href="#lang-infoTab-{{ $lang['code'] }}" role="tab"
                                    aria-controls="lang-infoTab-{{ $lang['code'] }}"
                                    aria-selected="true">{{ $lang['name'] }}</a>
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
                @include ('admin.templates.x_title', ['title' => "Trạng thái"])
                <div class="x_content">
                    {!! FormTemplate::show($elements) !!}
                    {!! Form::hidden('id', @$item->id) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    <div id="tpl" style="display: none">
        <div class="dz-preview dz-file-preview">
            <div class="dz-image handle-item"><img data-dz-thumbnail /></div>
            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
            <div class="dz-success-mark"><span>✔</span></div>
            <div class="dz-error-mark"><span>✘</span></div>
            <div class="dz-error-message"><span data-dz-errormessage></span></div>
            <div class="input-thumb">
                <input name="images[alt][]" class="dz-custom-input form-control" placeholder="Alt ảnh"
                    style="resize: none" />
                <input type="hidden" class="img_url">
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg" id="view-image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img src="" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after_script')
    <script>
        $(document).ready(function() {
            $('#dropzone').sortable({
                placeholder: 'sort-highlight',
                handle: '.handle-item .dz-image',
                forcePlaceholderSize: true,
            });
            let uploadedDocumentMap = {};

            $('#dropzone').dropzone({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{ route('media/upload') }}",
                thumbnailWidth: 250,
                dictDefaultMessage: "Click vào đây để tải lên hình ảnh",
                dictRemoveFile: "Xóa",
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                previewTemplate: document.querySelector('#tpl').innerHTML,
                success: function(file, response) {
                    console.log(response);
                    $(file.previewElement)
                        .find('.input-thumb')
                        .append(
                            `<input type="hidden" name="images[name][]" value="${response.name}">`);
                    $(file.previewElement).find('.dz-remove').addClass('btn btn-danger');
                    $(file.previewElement).find('.img_url').val(response.image_url);
                    uploadedDocumentMap[file.name] = response.name;
                    $('#dropzone').sortable({
                        placeholder: 'sort-highlight',
                        handle: '.handle-item',
                        forcePlaceholderSize: true,
                    });
                },
                removedfile: function(file) {
                    file.previewElement.remove();
                    var name = ''
                    if (typeof file.name !== 'undefined') {
                        name = file.name
                    } else {
                        name = uploadedDocumentMap[file.name]
                    }
                    let inputDeleteImages = $('input[name="delete_images"]');
                    inputDeleteImages.val(inputDeleteImages.val() + '||' + name);
                },
                error: function(file, response) {
                    console.log(response);
                    $(file.previewElement).remove();
                    $('#dropzone-image').notify(response, {
                        position: "top center"
                    });
                },
                @if (isset($item) && count($item->images) > 0)
                    init: function () {
                        let files = @json($images);
                        console.log(files);
                        for (let i in files) {
                            let file = files[i];
                            let src = "{{ $srcThumb }}" + "/" + file.name;
                            this.displayExistingFile(file, src);
                            file.previewElement.classList.add('dz-complete');
                            $(file.previewElement).find('.input-thumb').append(`<input type="hidden" name="images[id][]" value="${file.id}">`);
                            $(file.previewElement).find('.input-thumb').append(`<input type="hidden" name="images[name][]" value="${file.name}">`);
                            $(file.previewElement).find('.input-thumb [name="images[alt][]"]').val(file.alt);
                            $(file.previewElement).find('.img_url').val(src);
                            $(file.previewElement).find('.dz-remove').addClass('btn btn-danger');
                        }
                        $('#dropzone').sortable({
                            placeholder: 'sort-highlight',
                            handle: '.handle-item',
                            forcePlaceholderSize: true,
                        });
                    }
                @endif
            });

            $(document).on('click', '.dz-image', function() {
                let imgUrl = $(this).siblings('.input-thumb').find('.img_url').val();
                $('#view-image img').attr('src', imgUrl);
                $('#view-image').modal('show');
            })
        });
    </script>
@endsection

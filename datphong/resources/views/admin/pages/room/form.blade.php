@php
use App\Helpers\Form as FormTemplate;
use App\Helpers\Template as Template;

$formInputAttr = config('zvn.template.form_input');
$formInputAttrCkEditor = ['class' => $formInputAttr['class'] . ' ckeditor', 'id' => 'ckeditor'];
$formLabelAttr = config('zvn.template.form_label_full');
$submit = [
    [
        'element' => Form::submit('Lưu', ['class' => 'btn btn-success']),
        'type' => 'btn-submit',
    ],
];
$pageTitle = 'Quản lý ' . ucfirst(config('zvn.template.header')[$controllerName]);
$images = json_decode(@$item->images);
$images_extra = json_decode(@$item->images_extra);
$srcThumb = asset('images/room/');
@endphp
@extends('admin.main')
@section('content')
    {!! Form::open([
        'method' => 'POST',
        'url' => route("$controllerName/save"),
        'enctype' => 'multipart/form-data',
        'class' => 'form-horizontal form-label-left',
        'id' => 'category-form',
    ]) !!}

    <div class="page-header zvn-page-header clearfix">
        <div class="zvn-page-header-title">
            <h3>{{ $pageTitle }}</h3>
        </div>
        <div class="zvn-add-new pull-right">
            {!! sprintf('<a href="%s" class="btn btn-success"><i class="fa fa-arrow-left"></i> Quay về</a>', route($controllerName)) !!}
        </div>
    </div>

    @include ('admin.templates.error')
    @include ('admin.templates.zvn_notify')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('admin.pages.room.form-info', ['item' => $item])
            @include('admin.pages.room.form-attribute', ['item' => $item])
            @include('admin.pages.room.form-image', ['item' => $item])
        </div>
    </div>
    {!! Form::hidden('id', @$item->id) !!}
    {!! FormTemplate::show($submit) !!}
    {!! Form::hidden('delete_images') !!}
    {!! Form::hidden('delete_images_extra') !!}
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

    <div id="tpl-extra" style="display: none">
        <div class="dz-preview dz-file-preview">
            <div class="dz-image handle-item"><img data-dz-thumbnail /></div>
            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
            <div class="dz-success-mark"><span>✔</span></div>
            <div class="dz-error-mark"><span>✘</span></div>
            <div class="dz-error-message"><span data-dz-errormessage></span></div>
            <div class="input-thumb">
                <input name="images_extra[alt][]" class="dz-custom-input form-control" placeholder="Alt ảnh"
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
            Dropzone.autoDiscover = false;
            $('#dropzone, #dropzone_extra').sortable({
                placeholder: 'sort-highlight',
                handle: '.handle-item .dz-image',
                forcePlaceholderSize: true,
            });
            let uploadedDocumentMap = {};

            $('#dropzone').dropzone({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{ route('room/upload') }}",
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
                @if (isset($item))
                    init: function () {
                    let files = @json($images);
                    for (let i in files) {
                        let file = files[i];
                        let src = "{{ $srcThumb }}" + "/" + file.name;
                        this.displayExistingFile(file, src);
                        file.previewElement.classList.add('dz-complete');
                        $(file.previewElement).find('.input-thumb').append(`<input type="hidden" name="images[id][]" value="${file.id}">`);
                        $(file.previewElement).find('.input-thumb').append(`<input type="hidden" name="images[name][]"
                            value="${file.name}">`);
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

            let uploadedDocumentMapExtra = {};
            $('#dropzone_extra').dropzone({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{ route('room/upload') }}",
                thumbnailWidth: 250,
                dictDefaultMessage: "Click vào đây để tải lên hình ảnh",
                dictRemoveFile: "Xóa",
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                previewTemplate: document.querySelector('#tpl-extra').innerHTML,
                success: function(file, response) {
                    $(file.previewElement)
                        .find('.input-thumb')
                        .append(
                            `<input type="hidden" name="images_extra[name][]" value="${response.name}">`
                        );
                    $(file.previewElement).find('.dz-remove').addClass('btn btn-danger');
                    $(file.previewElement).find('.img_url').val(response.image_url);
                    uploadedDocumentMapExtra[file.name] = response.name;
                    $('#dropzone, #dropzone_extra').sortable({
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
                        name = uploadedDocumentMapExtra[file.name]
                    }
                    let inputDeleteImages = $('input[name="delete_images_extra"]');
                    inputDeleteImages.val(inputDeleteImages.val() + '||' + name);
                },
                error: function(file, response) {
                    $(file.previewElement).remove();
                    $('#dropzone-image').notify(response, {
                        position: "top center"
                    });
                },
                @if (isset($item))
                    init: function () {
                        let files = @json($images_extra);
                        for (let i in files) {
                            let file = files[i];
                            let src = "{{ $srcThumb }}" + "/" + file.name;
                            this.displayExistingFile(file, src);
                            file.previewElement.classList.add('dz-complete');
                            $(file.previewElement).find('.input-thumb').append(`<input type="hidden" name="images_extra[id][]" value="${file.id}">`);
                            $(file.previewElement).find('.input-thumb').append(`<input type="hidden" name="images_extra[name][]"
                                value="${file.name}">`);
                            $(file.previewElement).find('.input-thumb [name="images_extra[alt][]"]').val(file.alt);
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

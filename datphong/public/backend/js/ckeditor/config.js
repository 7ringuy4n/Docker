/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here.
    // For complete reference see:
    // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html

    // The toolbar groups arrangement, optimized for two toolbar rows.
    config.toolbarGroups = [
        {name: 'links'},
        {name: 'insert'},
        {name: 'tools'},
        {name: 'others'},
        { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
        '/',
        {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
        {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi']},
        {name: 'styles'},
        {name: 'colors'},
    ];

    config.height = '400px';

    // Remove some buttons provided by the standard plugins, which are
    // not needed in the Standard(s) toolbar.
    config.removeButtons = 'Underline,Subscript,Superscript';

    // Set the most common block elements.
    config.format_tags = 'p;h1;h2;h3;pre';

    // Simplify the dialog windows.
    config.removeDialogTabs = 'image:advanced;link:advanced';

    config.filebrowserImageBrowseUrl = '/laravel-filemanager?type=Images';
    config.filebrowserImageUploadUrl = '/laravel-filemanager/upload?type=Images&_token=';
    config.filebrowserBrowseUrl = '/laravel-filemanager?type=Files';
    config.filebrowserUploadUrl = '/laravel-filemanager/upload?type=Files&_token=';

    config.extraPlugins = 'bootstrapTabs,btgrid,ckeditorfa';
    config.allowedContent = true;
    config.contentsCss = [
        '/backend/asset/bootstrap/dist/css/bootstrap.min.css',
        '/backend/css/font-awesome/css/font-awesome.min.css'
        // 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'
    ];
};

CKEDITOR.on("instanceReady", function (event) {
    loadBootstrap(event);
});

CKEDITOR.on("mode", function (event) {
    loadBootstrap(event);
});

CKEDITOR.dtd.$removeEmpty['span'] = false;

function loadBootstrap(event) {
    if (event.name == 'mode' && event.editor.mode == 'source')
        return; // Skip loading jQuery and Bootstrap when switching to source mode.

    var jQueryScriptTag = document.createElement('script');
    var bootstrapScriptTag = document.createElement('script');

    jQueryScriptTag.src = 'https://code.jquery.com/jquery-1.11.3.min.js';
    bootstrapScriptTag.src = '/backend/asset/bootstrap/dist/js/bootstrap.min.js';

    var editorHead = event.editor.document.$.head;

    editorHead.appendChild(jQueryScriptTag);
    jQueryScriptTag.onload = function () {
        editorHead.appendChild(bootstrapScriptTag);
    };
}
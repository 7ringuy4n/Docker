@extends('admin.main')
@section('content')
    <div class="page-header zvn-page-header">
        <div class="zvn-page-header-title">
            <h3>Thêm mới Cấu hình</h3>
        </div>
    </div>
    @include ('admin.templates.error')
    @include ('admin.templates.zvn_notify')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <ul class="nav nav-tabs bar_tabs" id="tab-config" role="tablist">
                <li role="presentation" class="@if(empty($key_value) || $key_value == 'setting-main') active @endif">
                    <a id="main-tab" data-toggle="tab" href="#main" role="tab"
                       aria-controls="main" aria-selected="true">Info</a>
                </li>
                <li role="presentation" class="@if($key_value == 'setting-email') active @endif">
                    <a id="home-tab" data-toggle="tab" href="#home" role="tab"
                       aria-controls="home" aria-selected="true">Email</a>
                </li>
                <li role="presentation" class="@if($key_value == 'setting-social') active @endif">
                    <a id="tab-0-tab" data-toggle="tab" href="#tab-0" role="tab"
                       aria-controls="tab-0" aria-selected="false">Social Network</a>
                </li>
                <li role="presentation" class="@if($key_value == 'setting-script') active @endif">
                    <a id="tab-1-tab" data-toggle="tab" href="#tab-1" role="tab"
                       aria-controls="tab-1" aria-selected="false">Script</a>
                </li>
                {{-- <li role="presentation" class="@if($key_value == 'setting-chat') active @endif">
                    <a class="nav-link" id="tab-2-tab" data-toggle="tab" href="#tab-2" role="tab"
                       aria-controls="tab-2" aria-selected="false">Chat</a>
                </li> --}}
                <li role="presentation" class="@if($key_value == 'setting-seo') active @endif">
                    <a class="nav-link" id="tab-seo-tab" data-toggle="tab" href="#tab-seo" role="tab"
                       aria-controls="tab-seo" aria-selected="false">SEO</a>
                </li>
            </ul>
            <div class="tab-content" id="tab-config-content">
                <div class="tab-pane fade @if(empty($key_value) || $key_value == 'setting-main') active in @endif" id="main" role="tabpanel" aria-labelledby="main-tab">
                    @include('admin.pages.settings.form-main', ['item' => $items[1]])
                </div>
                <div class="tab-pane fade @if($key_value == 'setting-email') active in @endif" id="home" role="tabpanel" aria-labelledby="home-tab">
                    @include('admin.pages.settings.form-email', ['item' => $items[0]])
                </div>
                <div class="tab-pane fade @if($key_value == 'setting-social') active in @endif" id="tab-0" role="tabpanel" aria-labelledby="tab-0">
                    @include('admin.pages.settings.form-social', ['item' => $items[2]])
                </div>
                <div class="tab-pane fade @if($key_value == 'setting-script') active in @endif" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                    @include('admin.pages.settings.form-script', ['item' => $items[3]])
                </div>
                {{-- <div class="tab-pane fade @if($key_value == 'setting-chat') active in @endif" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                    @include('admin.pages.settings.form-chat', ['item' => $items[4]])
                </div> --}}
                <div class="tab-pane fade @if($key_value == 'setting-seo') active in @endif" id="tab-seo" role="tabpanel" aria-labelledby="tab-seo">
                    @include('admin.pages.settings.form-seo', ['item' => $items[5]])
                </div>
            </div>
        </div>
    </div>
@endsection


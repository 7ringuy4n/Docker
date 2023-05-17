@extends('admin.main')
@section('content')
    @include ('admin.templates.page_header', ['pageIndex' => false, 'nonForm' => true])
    <iframe src="/laravel-filemanager/?type=Image" style="width: 100%; height: 600px; overflow: hidden; border: none;"></iframe>
@endsection
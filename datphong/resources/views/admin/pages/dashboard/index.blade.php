@extends('admin.main')
@section('content')
    @php
        use App\Helpers\Template as Template;
        use App\Helpers\Highlight as Highlight;
    @endphp
    @include ('admin.templates.page_header', ['pageIndex' => false, 'nonForm' => true])
    <div class="row top_tiles">
        {{-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-tasks"></i></div>
                <div class="count">{{$cateNews}}</div>
                <h3>Total category news</h3>
                <p><a href="{{route('cateNews')}}">View more</a></p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-newspaper-o"></i></div>
                <div class="count">{{$article}}</div>
                <h3>Total news</h3>
                <p><a href="{{route('article')}}">View more</a></p>
            </div>
        </div> --}}
    </div>

    <style>
        .panel_toolbox {
            min-width: 15px;
        }
    </style>
@endsection
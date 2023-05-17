@php
    $userInfo = Session::get('userInfo');
@endphp

<div class="nav_menu">
    <nav>
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('images/user/'.$userInfo['avatar']) }}" alt="">{{$userInfo['username']}}
                        <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{route('auth/logout')}}"><i class="fa fa-sign-out pull-right"></i>Logout</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('index')}}" target="_blank">View site</a>
            </li>
        </ul>
    </nav>
</div>
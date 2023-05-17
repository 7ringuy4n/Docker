@php
$userInfo = Session::get('userInfo');

$action = Route::current()->getAction();
$controller = class_basename($action['controller']);
list($controller, $action) = explode('@', $controller);
$controller = ucwords(str_replace('Controller', '', $controller));
$action = ucwords($action);
$actionName = strtolower($action);
$controllerName = strtolower($controller);
@endphp

<div class="profile clearfix">
    <div class="profile_pic">
        <img src="{{ asset('images/user/' . $userInfo['avatar']) }}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Hello,</span>
        <h2>{{ $userInfo['username'] }}</h2>
    </div>
</div>
<br />

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Menu</h3>
        <ul class="nav side-menu">
            @php
                $menus = config('navigation.admin');
                if ($userInfo['username'] == 'dev') {
                    $menus = array_merge($menus, config('navigation.dev'));
                }
                if ($userInfo['username'] == 'editorzendvn') {
                    $menus = config('navigation.editor');
                }
            @endphp
            @foreach ($menus as $menu)
                @if (empty($menu['child']))
                    @if (isset($menu['params']))
                        <li @if ($actionName == 'form' && $controllerName == strtolower($menu['link'])) class="current-page" @endif>
                            <a href="{{ route($menu['link']) }}">
                                <i class="{{ $menu['icon'] }}"></i>
                                {{ $menu['name'] }}
                            </a>
                        </li>
                    @else
                        <li @if ($actionName == 'form' && $controllerName == strtolower($menu['link'])) class="current-page" @endif>
                            <a href="{{ route($menu['link'], $menu['params']) }}">
                                <i class="{{ $menu['icon'] }}"></i>
                                {{ $menu['name'] }}
                            </a>
                        </li>
                    @endif
                @else
                    <li @if ($actionName == 'form' && in_array($controllerName, $menu['arr_controller'])) class="current-page" @endif>
                        <a><i class="{{ $menu['icon'] }}"></i> {{ $menu['name'] }}
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu" @if ($actionName == 'form' && in_array($controllerName, $menu['arr_controller'])) style="display: block" @endif>
                            @foreach ($menu['child'] as $child)
                                @if (isset($child['params']))
                                    <li @if (($actionName == 'form' && $controllerName == strtolower($child['link'])) || ($controllerName == 'settings' && route($child['link'], $child['params']) == url()->full())) class="current-page" @endif>
                                        <a href="{{ route($child['link'], $child['params']) }}">
                                            {{ $child['name'] }} </a>
                                    </li>
                                @else
                                    <li @if ($actionName == 'form' && $controllerName == strtolower($child['link'])) class="current-page" @endif>
                                        <a href="{{ route($child['link']) }}"> {{ $child['name'] }} </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>

@php
$rooms = App\Models\RoomModel::with('room_translations')
    ->active()
    ->sortLatest()
    ->get();

$benefits = App\Models\BenefitModel::with('benefit_translations')
    ->active()
    ->sortLatest()
    ->get();

$facilities = App\Models\FacilityModel::with('facility_translations')
    ->active()
    ->sortLatest()
    ->get();

$settingMain = \App\Helpers\Fetch::get(public_path('cache/setting-main.json'), true);
@endphp

<header id="header">
    <!-- HEADER TOP -->
    <!-- <div class="header_top">
        <div class="container">
            <div class="header_left float-left">
                <span><i class="fa fa-phone-square" aria-hidden="true"></i> 1-548-854-8898</span>
            </div>
            <div class="header_right float-right">
                <div class="dropdown language">
                    <span>ENG</span>
                    <ul>
                        <li class="active"><a href="#">ENG</a></li>
                        <li><a href="#">JPN</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->
    <!-- END / HEADER TOP -->
    <!-- HEADER LOGO & MENU -->
    <div class="header_content"
         id="header_content">
        <div class="container">
            <div class="header_logo">
                <a href="{{ route('index') }}"><img src="{{ asset($settingMain['logo1']) }}"
                         alt=""></a>
            </div>
            <div class="dhts-section-title">
                <h1>@yield('pageTitle')</h1>
            </div>
            <!-- HEADER MENU -->
            @if (route('contact.index'))

            @endif
            @if (in_array(Route::getCurrentRoute()->action['as'], ['index', 'benefit.index', 'contact.index']))
                <nav class="header_menu">
                    <ul class="menu">
                        <!-- current-menu-item -->
                        <li class="">
                            <a href="tel:842838110910"><span class="hotline-line"></span><strong><i class="fa fa-phone" aria-hidden="true"></i> +84 283 811 0910</strong></a>
                        </li>
                        <li class="">
                            <a href="{{ route('index') }}">{{ __('all.home') }}</a>
                        </li>
                        <li>
                            <a href="#">{{ __('all.suites') }} @if (count($rooms) > 0) <span class="fa fa-caret-down"></span>
                                @endif</a>
                            @if (count($rooms) > 0)
                                <ul class="sub-menu">
                                    @foreach ($rooms as $room)
                                        <li><a
                                               href="{{ route('room.detail', ['slug' => Str::slug($room->name), 'room' => $room]) }}">{{ $room->room_translations->first()->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                        <li>
                            <a href="#">
                                {{ __('all.facilities') }}
                                @if (count($facilities) > 0) <span class="fa fa-caret-down"></span>
                                @endif
                            </a>
                            @if (count($facilities) > 0)
                                <ul class="sub-menu">
                                    @foreach ($facilities as $facility)
                                        <li>
                                            <a
                                               href="{{ route('facility.detail', ['slug' => Str::slug($facility->name), 'facility' => $facility]) }}">
                                                {{ $facility->facility_translations->first()->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                        <li>
                            <a href="#">{{ __('all.benefit') }} <span class="fa fa-caret-down"></span></a>
                            @if (count($benefits) > 0)
                                <ul class="sub-menu">
                                    @foreach ($benefits as $benefit)
                                        <li><a
                                               href="{{ route('benefit.index') }}#{{ Str::slug($benefit->name) }}">{{ $benefit->benefit_translations->first()->name }}</a>
                                        </li>
                                    @endforeach
                                    {{-- <li>
                                <a href="benefit.php#business-service">Business Service <span
                                        class="fa fa-caret-down"></span></a>
                                <ul class="sub-menu">
                                    <li><a href="benefit.php">Copy</a></li>
                                    <li><a href="benefit.php">Photo</a></li>
                                    <li><a href="benefit.php">Print</a></li>
                                    <li><a href="benefit.php">Fax</a></li>
                                </ul>
                            </li> --}}
                                </ul>
                            @endif
                        </li>
                        <li>
                            <a href="#">{{ __('all.explore') }} <span class="fa fa-caret-down"></span></a>
                            @include('frontend.elements.cate_convenience_item')
                        </li>
                        <li><a href="{{ route('gallery.index') }}">{{ __('all.gallery') }}</a></li>
                        <li><a href="{{ route('contact.index') }}">{{ __('all.contact') }}</a></li>

                        <li>
                            <a href="#"><img width="24"
                                     src="{{ asset("frontend/images/nationality_flag/$locale.png") }}"></a>
                            <ul class="sub-menu">
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a rel="alternate"
                                           hreflang="{{ $localeCode }}"
                                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            <img width="24"
                                                 src="{{ asset("frontend/images/nationality_flag/$localeCode.png") }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </nav>
            @else
                <div class="dhts-nav-item-home">
                    <a class="btn btn-dhts-primary"
                       href="{{ route('index') }}">Home</a>
                </div>
            @endif
            <!-- END / HEADER MENU -->
            <!-- MENU BAR -->
            <span class="menu-bars">
                <span></span>
            </span>
            <!-- END / MENU BAR -->
        </div>
    </div>
    <!-- END / HEADER LOGO & MENU -->
</header>
<style>
    .hotline-line {
        padding: 10px;
        padding-right: 0;
        border-left: 2px solid #fff;
    }

    @media (max-width: 1200px) {
        .hotline-line {
            display: none;
        }
    }
</style>
@php
$settingMain = \App\Helpers\Fetch::get(public_path('cache/setting-main.json'), true);
$settingSocial = \App\Helpers\Fetch::get(public_path('cache/setting-social.json'), true);

@endphp

<footer id="footer">
    <!-- FOOTER CENTER -->
    <div class="footer_center pb-4">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 footer-line"></div>
                <div class="col-xs-12 col-sm-6">
                    <div class="widget widget_logo">
                        <div class="widget-logo">
                            {{-- <div class="img">
                                <a href="#"><img src="{{ asset($settingMain['logo1']) }}" alt=""></a>
                            </div> --}}
                            <div class="text">
                                <h2 style="margin-bottom: 10px; font-size: 23px" class="text-uppercase font-weight-bold dhts-text-primary">DHTS Business
                                    Apartment</h2>
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $settingMain['address'] }}
                                </p>
                                <p><i class="fa fa-phone-square" aria-hidden="true"></i>
                                    {{ $settingMain['hotline1'] }} | {{ $settingMain['hotline2'] }}
                                </p>
                                <p><i class="fa fa-envelope-o"></i> <a href="mailto:{{ $settingMain['fax'] }}"><span
                                            class="__cf_email__">{{ $settingMain['fax'] }}</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-1"></div>
                <div class="col-xs-12 col-sm-5 text-right">
                    <div class="widget widget_tripadvisor">
                        <div class="social-media">
                            <span>follow us</span>
                            <div>
                                <a class="fa-social" href="{{ @$settingSocial['tripadvisor'] }}"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
                                <a class="fa-social" href="{{ @$settingSocial['facebook'] }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a class="fa-social" href="{{ @$settingSocial['instagram'] }}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        {{-- <h4 class="widget-title" style="color: #bca36e;">CHI NHÁNH CÔNG TY CỔ PHẦN DHTS</h4>
                        <div class="tripadvisor">
                            <p>Giấy CNĐKDN: 0305113833-003 – Ngày cấp: 17/08/2007 (Thay đổi lần thứ 5, ngày 25/02/2021)
                            </p>
                            <p>Cơ quan cấp: Phòng Đăng ký kinh doanh – Sở kế hoạch và Đầu tư TP.HCM</p>
                            <p>Địa chỉ đăng ký kinh doanh: 127 Pasteur, Phường Võ Thị Sáu, Quận 3, TPHCM, Việt Nam</p>
                            <img src="{{ asset('frontend/images/bo_cong_thuong.png') }}" alt="" style="margin-right: 10px; width: 120px">
                            <img src="{{ asset('frontend/images/wmc.png') }}" alt="" style="width: 60px">
                            <span class="tripadvisor-circle">
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i class="part"></i>
                            </span>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END / FOOTER CENTER -->
    <!-- FOOTER BOTTOM -->
    <div class="footer_bottom">
        <div class="container">
            <p>{{ $settingMain['copyright'] }}.</p>
        </div>
    </div>
    <!-- END / FOOTER BOTTOM -->
</footer>

@php use App\Models\GeneralSetting; @endphp
    <!-- Footer Area Start -->
<div class="footer__area pt-60 pb-60">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12">
                <div class="footer__area-widget t-center">
                    <div class="footer__area-widget-about">
                        <div class="footer__area-widget-about-social three">
                            <ul>
                                <li><a href="{{GeneralSetting::getValueForKey('contact_facebook')}}" target="_blank"><i class="fab fa-facebook-f"></i></a> </li>
                                <li><a href="{{GeneralSetting::getValueForKey('contact_twitter')}}" target="_blank"><i class="fab fa-twitter"></i></a> </li>
                                <li><a href="{{GeneralSetting::getValueForKey('contact_linkedin')}}" target="_blank"><i class="fab fa-linkedin-in"></i></a> </li>
                                <li><a href="{{GeneralSetting::getValueForKey('contact_instagram')}}" target="_blank"><i class="fab fa-instagram"></i></a> </li>
                                <li><a href="{{GeneralSetting::getValueForKey('contact_whats_up')}}" target="_blank"><i class="fab fa-whatsapp"></i></a> </li>
                            </ul>
                        </div>
                        <div class="footer__area-widget-about-menu three">
                            <ul>
                                <li><a href="{{url('/').'/'.app()->getLocale()}}#home">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav1_ar'):GeneralSetting::getValueForKey('nav1_en')}}</a></li>
                                <li><a href="{{url('/').'/'.app()->getLocale()}}#about">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav2_ar'):GeneralSetting::getValueForKey('nav2_en')}}</a></li>
                                <li><a href="{{\route('front.services')}}">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav3_ar'):GeneralSetting::getValueForKey('nav3_en')}}</a></li>
                                <li><a href="{{\route('front.team')}}">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav4_ar'):GeneralSetting::getValueForKey('nav4_en')}}</a></li>
                                <li><a href="{{\route('front.works')}}">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav5_ar'):GeneralSetting::getValueForKey('nav5_en')}}</a></li>
                                <li><a href="{{\route('front.media')}}">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav6_ar'):GeneralSetting::getValueForKey('nav6_en')}}</a></li>
                                <li><a href="{{url('/').'/'.app()->getLocale()}}#contact">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav7_ar'):GeneralSetting::getValueForKey('nav7_en')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Area End -->
<!-- Copyright Area Start -->
<div class="copyright__area">
    <div class="container">
        <div class="row align-items-center copyright__area-border">
            <div class="col-xl-12">
                <div class="copyright__area-left t-center">
                    {!! GeneralSetting::getValueForKey('copyright') !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Copyright Area End -->
<!-- Scroll Btn Start -->
<div class="scroll-up">
    <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
    </svg>
</div>
<!-- Scroll Btn End -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Main JS -->
<script src="{{asset('frontAssets/js/jquery-3.6.0.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('frontAssets/js/bootstrap.min.js')}}"></script>
<!-- Counter up -->
<script src="{{asset('frontAssets/js/jquery.counterup.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('frontAssets/js/popper.min.js')}}"></script>
<!-- Progressbar JS -->
<script src="{{asset('frontAssets/js/progressbar.min.js')}}"></script>
<!-- Magnific JS -->
<script src="{{asset('frontAssets/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Swiper JS -->
<script src="{{asset('frontAssets/js/swiper-bundle.min.js')}}"></script>
<!-- Waypoints JS -->
<script src="{{asset('frontAssets/js/jquery.waypoints.min.js')}}"></script>
<!-- Isotope JS -->
<script src="{{asset('frontAssets/js/isotope.pkgd.min.js')}}"></script>
<!-- Mean menu -->
<script src="{{asset('frontAssets/js/jquery.meanmenu.min.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('frontAssets/js/custom.js')}}"></script>
@yield('script')

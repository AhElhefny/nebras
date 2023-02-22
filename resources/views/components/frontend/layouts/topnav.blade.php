@php use App\Models\GeneralSetting;use Illuminate\Support\Facades\Route; @endphp
<div class="custom__cursor-one"></div>
<div class="custom__cursor-two"></div>
<!-- Preloader start -->
<div class="theme-loader">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>
<!-- Preloader end -->
<!-- Header Area Start -->
<div class="header__area ar-navbar">
    <div class="container">
        <div class="header__area-box">
            <div class="header__area-box-logo two">
                <a href="{{url('/')}}">
                    <img class="one" src="{{asset('frontAssets/images/logo/'.GeneralSetting::getValueForKey('logo1'))}}" alt="Logo">
                    <img class="two" src="{{asset('frontAssets/images/logo/'.GeneralSetting::getValueForKey('logo2'))}}" alt="Logo">
                </a>
                <div class="responsive-menu"></div>
            </div>

            <div class="header__area-box-menu">
                <div class="header__area-box-main-menu meanmenu-responsive">
                    <ul id="mobilemenu">
                        <li class="{{Route::is('front.home')?'active':''}}"><a href="{{url('/').'/'.app()->getLocale()}}#home">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav1_ar'):GeneralSetting::getValueForKey('nav1_en')}}</a></li>
                        <li><a href="{{url('/').'/'.app()->getLocale()}}#about">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav2_ar'):GeneralSetting::getValueForKey('nav2_en')}}</a></li>
                        <li class="{{Route::is('front.services')||Route::is('front.services.show')?'active':''}}"><a
                                href="{{\route('front.services')}}">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav3_ar'):GeneralSetting::getValueForKey('nav3_en')}}</a></li>
                        <li class="{{Route::is('front.team')||Route::is('front.team.show')?'active':''}}"><a
                                href="{{\route('front.team')}}">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav4_ar'):GeneralSetting::getValueForKey('nav4_en')}}</a></li>
                        <li class="{{Route::is('front.works')||Route::is('front.works.show')?'active':''}}"><a
                                href="{{\route('front.works')}}">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav5_ar'):GeneralSetting::getValueForKey('nav5_en')}}</a></li>
                        <li class="{{Route::is('front.media')?'active':''}}"><a href="{{\route('front.media')}}">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav6_ar'):GeneralSetting::getValueForKey('nav6_en')}}</a></li>
                        <li><a href="{{url('/').'/'.app()->getLocale()}}#contact">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav7_ar'):GeneralSetting::getValueForKey('nav7_en')}}</a></li>
                    </ul>
                </div>
                <div class="header__area-box-contact">
                    <div class="header__area-box-contact-icon">
                        <i class="fal fa-phone-alt"></i>
                    </div>
                    <div class="header__area-box-contact-content">
                        <span>{{__('dashboard.Quick Help')}}</span>
                        <h6><a href="tel:+{{GeneralSetting::getValueForKey('contact_number')}}">{{GeneralSetting::getValueForKey('contact_number')}}</a></h6>
                    </div>
                </div>
                <div class="languages">
                    <a href="{{app()->getLocale() == 'ar'?LaravelLocalization::getLocalizedURL('en'):LaravelLocalization::getLocalizedURL('ar')}}"><img src="{{app()->getLocale() == 'ar'?asset('frontAssets/images/languages/en.jpg'):asset('frontAssets/images/languages/ar.jpg')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>

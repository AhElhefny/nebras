@php use App\Models\GeneralSetting; @endphp
<x-frontend.layouts.master >

        <div id="home" class="header-banner">
            <div class="swiper header-swiper">
                <div class="swiper-wrapper">
                    @for($i = 1; $i <= 3; $i++)
                        <div class="swiper-slide item">
                            <div class="banner__area-two" data-background="{{GeneralSetting::getValueForKey('slider'.$i)?asset('frontAssets/images/header/'.GeneralSetting::getValueForKey('slider'.$i)):asset('frontAssets/images/header/01_header.jpg')}}" style="background-image: url('{{asset('frontAssets/images/header/01_header.jpg')}}')">
                                <div class="overlay"></div>
                                <div class="container relative">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="banner__area-two-content">
                                                <span>{{app()->getLocale()=='ar'?GeneralSetting::getValueForKey('slider_title_ar'):GeneralSetting::getValueForKey('slider_title_en')}}</span>
                                                <h1>{{app()->getLocale()=='ar'?GeneralSetting::getValueForKey('website_name_ar'):GeneralSetting::getValueForKey('website_name_en')}}</h1>
                                                <a class="theme-btn-1" href="#about">{{__('dashboard.start')}} <i class="fal fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <x-frontend.home.socialmedia />
                            </div>
                        </div>
                    @endfor
                 </div>
                 <div class="swiper-button-next">
                      <i class="ar-icons-arrow-right"></i>
                 </div>
                 <div class="swiper-button-prev">
                     <i class="ar-icons-arrow-left"></i>
                 </div>
            </div>
        </div>


        <div class="features__area-two">
            <div class="container-fluid px-0">
                <div class="row gx-0">
                    <div class="col-xl-4 col-lg-4">
                        <div class="features__area-two-item">
                            <div>
                                <h4>{{app()->getLocale()=='ar'?GeneralSetting::getValueForKey('feature_section1_title_ar'):GeneralSetting::getValueForKey('feature_section1_title_en')}}</h4>
                                <p>
                                    {{app()->getLocale()=='ar'?GeneralSetting::getValueForKey('feature_section1_desc_ar'):GeneralSetting::getValueForKey('feature_section1_desc_en')}}.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="features__area-two-item features__area-two-item-hover">
                            <div>
                                <h4>{{app()->getLocale()=='ar'?GeneralSetting::getValueForKey('feature_section2_title_ar'):GeneralSetting::getValueForKey('feature_section2_title_en')}}</h4>
                                <p>
                                    {{app()->getLocale()=='ar'?GeneralSetting::getValueForKey('feature_section2_desc_ar'):GeneralSetting::getValueForKey('feature_section2_desc_en')}}.
                                </p>
                                <a class="simple-btn" href="{{route('front.group')}}">{{__('dashboard.Discover More')}}<i class="far fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4">
                        <div class="features__area-two-item">
                            <div>
                                <h4>{{app()->getLocale()=='ar'?GeneralSetting::getValueForKey('feature_section3_title_ar'):GeneralSetting::getValueForKey('feature_section3_title_en')}}</h4>
                                <p>
                                    {{app()->getLocale()=='ar'?GeneralSetting::getValueForKey('feature_section3_desc_ar'):GeneralSetting::getValueForKey('feature_section3_desc_en')}}.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Features Area End -->
        <!-- About Area Start -->
        <div id="about" class="about__page section-padding pb-100">
            <div class="container">
                <div class="row mb-60">
                    <div class="col-xl-6 col-lg-8">
                        <div class="about__page-title">
                            <span class="subtitle">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav2_ar'):GeneralSetting::getValueForKey('nav2_en')}}</span>
                            <h2>{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('about_title_ar'):GeneralSetting::getValueForKey('about_title_en')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="about__page-area">
                            <div class="about__page-area-experience">
                                <h3><span class="counter">{{GeneralSetting::getValueForKey('about_exp_year')}}</span>+</h3>
                                <p>{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('about_exp_desc_ar'):GeneralSetting::getValueForKey('about_exp_desc')}}</p>
                            </div>
                            <img src="{{asset('frontAssets/images/about/'.GeneralSetting::getValueForKey('about_image'))}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Area End -->
        <!-- Services Area Start -->
        <div class="services__area section-padding">
            <div class="container">
                <div class="row mb-60">
                    <div class="col-xl-12">
                        <div class="services__area-title lg-t-center">
                            <span class="subtitle one">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav3_ar'):GeneralSetting::getValueForKey('nav3_en')}}</span>
                            <h2>{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('services_title_ar'):GeneralSetting::getValueForKey('services_title_en')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($services as $index=>$service)
                    <div class="col-md-6 col-lg-4 mb-30">
                        <div class="services__area-item">
                            <span>{{$index+1 < 10 ?'0'.$index+1:$index+1}}</span>
                            <div class="services__area-item-icon">
                                <i class="ar-icons-{{$service->icon}}"></i>
                            </div>
                            <div class="services__area-item-content">
                                <h4>
                                    <a href="{{route('front.services.show',$service->id)}}">{{$service->name_en}}</a>
                                </h4>
                                   <p>
                                       {{$service->description_en}}
                                  </p>
                              </div>
                         </div>
                     </div>
                      @endforeach

                     @foreach($servicesmore as $index=>$service)
                    <div class="col-md-6 col-lg-4 mb-30 services-more">
                        <div class="services__area-item">
                            <span>{{$index+$services->count()+1 < 10 ?'0'.$index+$services->count()+1:$index+$services->count()+1}}</span>
                            <div class="services__area-item-icon">
                                <i class="ar-icons-{{$service->icon}}"></i>
                            </div>
                            <div class="services__area-item-content">
                                <h4><a href="{{route('front.services.show',$service->id)}}">{{$service->name_en}}</a></h4>
                                <p>
                                    {{$service->description_en}}
                                </p>
                            </div>
                        </div>
                    </div>
                     @endforeach
                    <div class="col-md-12 text-center">
                        <button class="theme-btn-1 open-services-more">
                            {{__('home.allservices')}} <i class="fal fa-long-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="team__area">
            <div class="container">
                <div class="row mb-60">
                    <div class="col-xl-12">
                        <div class="team__area-title lg-t-center">
                            <span class="subtitle">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav4_ar'):GeneralSetting::getValueForKey('nav4_en')}}</span>
                            <h2>{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('team_title_ar'):GeneralSetting::getValueForKey('team_title_en')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($teams as $team)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="team__area-item">
                            <div class="team__area-item-image">
                                <img src="{{asset($team->image)}}" alt="">
                                <div class="team__area-item-image-social">
                                    <ul>
                                        <li><a href="{{$team->twitter}}"><i class="fab fa-twitter"></i></a> </li>
                                        <li><a href="{{$team->behance}}"><i class="fab fa-behance"></i></a> </li>
                                        <li><a href="{{$team->website}}"><i class="fal fa-basketball-ball"></i></a> </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team__area-item-content">
                                <h5><a href="{{route('front.team.show',$team->id)}}">{{$team->name}}</a></h5>
                                <span>{{$team->job}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Team Area End -->
        <!-- Sponsors Area Start -->
        <div class="sponsors__area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6"></div>
                    <div class="col-xl-6">
                        <div class="swiper sponsors-slider">
                            <div class="swiper-wrapper">
                                @foreach($groups as $group)
                                    <div class="sponsors__area-brand swiper-slide">
                                        <img src="{{$group->image??asset('frontAssets/images/sponsors/01_sponsor.png')}}" alt="" style="width:102px; height:36px;">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sponsors Area End -->
        <!-- Reviews Area Start -->
        <div class="reviews__area" data-background="{{GeneralSetting::getValueForKey('preview_background3')?asset('frontAssets/images/reviews/'.GeneralSetting::getValueForKey('preview_background3')):asset('frontAssets/images/reviews/01_reviews.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8">
                        <div class="reviews__area-left">
                            <div class="reviews__area-left-title">
                                <h2>{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('review_title_ar'):GeneralSetting::getValueForKey('review_title_en')}}</h2>
                            </div>
                            <div class="swiper reviews">
                                <div class="swiper-wrapper">
                                     @foreach($websiteReviews as $review)
                                    <div class="reviews__area-left-item swiper-slide">
                                        <p>
                                            {{$review->review}}
                                        </p>
                                        <div class="reviews__area-left-item-client">
                                            <div class="reviews__area-left-item-client-avatar">
                                                <img src="{{asset($review->image)}}" alt="">
                                            </div>
                                            <div class="reviews__area-left-item-client-content">
                                                <h5>{{$review->name}}</h5>
                                                <span>{{$review->job}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="reviews__area-left-dots">
                                <div class="reviews-pagination"></div>
                            </div>
                            <div class="reviews__area-left-quote">
                                <img src="{{asset('frontAssets/images/quote.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reviews Area End -->
        <!-- Features Area Start -->
        <div class="features__area pb-100 pt-100">
            <div class="container">
                <div class="row mb-60">
                    <div class="col-lg-12 col-xl-8">
                        <div class="services__area-title lg-t-center">
                            <span class="subtitle one">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav5_ar'):GeneralSetting::getValueForKey('nav5_en')}}</span>
                            <h2>
                                {{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('works_title_ar'):GeneralSetting::getValueForKey('works_title_en')}}.
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                     @foreach($works as $work)
                        <div class="col-lg-6 ">
                            <div class="features__area-item features__area-item-hover">
                                <img src="{{$work->image}}" alt="" style="height: 636px">
                                <div class="features__area-item-content">
                                    <div class="features__area-item-content-icon">
                                        <a href="{{route('front.works.show',$work->id)}}"><i class="fal fa-plus"></i></a>
                                    </div>
                                    <h3><a href="{{route('front.works.show',$work->id)}}">{{$work->title_en}}</a></h3>
                                </div>
                            </div>
                        </div>
                      @endforeach
                </div>
            </div>
        </div>
        <!-- Features Area End -->
        <!-- Video Area Start -->
        <div class="video__area" data-background="{{GeneralSetting::getValueForKey('video_background4')?asset('frontAssets/images/video/'.GeneralSetting::getValueForKey('video_background4')):asset('frontAssets/images/video/01_video.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="video__area-play-icon video-pulse"> <a class="video-popup" href="{{GeneralSetting::getValueForKey('video_link')??'https://www.youtube.com/watch?v=0WC-tD-njcA'}}"><i class="fas fa-play"></i></a> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video Area End -->
        <!-- Portfolio Area Start -->
        <div class="portfolio__area-two pt-100">
            <div class="container">
                <div class="row mb-60">
                    <div class="col-xl-6 col-lg-8">
                        <div class="about__page-title">
                            <span class="subtitle">{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav6_ar'):GeneralSetting::getValueForKey('nav6_en')}}</span>
                            <h2>{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('media_title_ar'):GeneralSetting::getValueForKey('media_title_en')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($mediacenters as $media)
                    <div class="col-xl-4 col-lg-4 col-md-6 portfolio-item mb-30">
                        <a class="portfolio__area-two-item" href="{{asset($media->image)}}">
                            <img class="img__full" src="{{asset($media->image)}}" alt="">
                            <div class="portfolio__area-two-item-content">
                                <h4>{{$media->name}}</h4>
                            </div>
                        </a>
                    </div>
                    @endforeach

                    @foreach($mediamore as  $media)
                    <div class="col-xl-4 col-lg-4 col-md-6 portfolio-item mb-30 media-more">
                        <a class="portfolio__area-two-item" href="{{asset($media->image)}}">
                           <img class="img__full" src="{{asset($media->image)}}" alt="">
                            <div class="portfolio__area-two-item-content">
                                <h4>{{$media->name}}</h4>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    <div class="col-md-12 text-center">
                        <button class="theme-btn-1 open-media-more">
                            {{__('dashboard.All Media')}} <i class="fal fa-long-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Area End -->
        <!-- Contact Area Start -->
        <x-frontend.home.contact-us />
        <!-- Contact Area End -->
</x-frontend.layouts.master>

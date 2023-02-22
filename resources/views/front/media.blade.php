@php use App\Models\GeneralSetting; @endphp

<x-frontend.layouts.master>
    <!-- Portfolio Area Start -->
    <div class="portfolio__area-two page">
        <div class="container">
            <div class="row mb-60">
                  <div class="col-xl-6 col-lg-8">
                       <div class="about__page-title">
                           <span class="subtitle">{{app()->getLocale()=='ar'?GeneralSetting::getValueForKey('nav6_ar'):GeneralSetting::getValueForKey('nav6_en')}}</span>
                           <h2>{{app()->getLocale()=='ar'?GeneralSetting::getValueForKey('media_title_ar'):GeneralSetting::getValueForKey('media_title_en')}}</h2>
                      </div>
                 </div>
             </div>
              <div class="row">
                  @foreach($mediacenters as $media)
                    <div class="col-xl-4 col-lg-4 col-md-6 portfolio-item mb-30">
                        <a class="portfolio__area-two-item" href="{{asset($media->image)}}" title="Medical Scanner 04" data-subtitle="Medical Scanner">
                            <img class="img__full" src="{{asset($media->image)}}" alt="">
                            <div class="portfolio__area-two-item-content">
                                <h4>{{$media->name}}</h4>
                            </div>
                        </a>
                    </div>
                    @endforeach
                   @foreach($mediamore as  $media)
                    <div class="col-xl-4 col-lg-4 col-md-6 portfolio-item mb-30 media-more">
                         <a class="portfolio__area-two-item" href="{{asset($media->image)}}" title="Medical Scanner 04" data-subtitle="Medical Scanner">
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
</x-frontend.layouts.master>

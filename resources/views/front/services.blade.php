@php use App\Models\GeneralSetting; @endphp

<x-frontend.layouts.master >
        <div class="services__area page">
            <div class="container">
                <div class="row mb-60">
                    <div class="col-xl-12">
                        <div class="services__area-title lg-t-center">
                            <span class="subtitle one">{{app()->getLocale()=='ar'?GeneralSetting::getValueForKey('nav3_ar'):GeneralSetting::getValueForKey('nav3_en')}}</span>
                            <h2>{{app()->getLocale()=='ar'?GeneralSetting::getValueForKey('services_title_ar'):GeneralSetting::getValueForKey('services_title_en')}}</h2>
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
                                    <a href="{{route('front.services.show',$service->id)}}">{{$service->name}}</a>
                                </h4>
                                   <p>
                                       {{$service->description}}
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
                                <h4><a href="{{route('front.services.show',$service->id)}}">{{$service->name}}</a></h4>
                                <p>
                                    {{$service->description}}
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
</x-frontend.layouts.master>

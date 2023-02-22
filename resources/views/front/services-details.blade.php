@php use App\Models\GeneralSetting;use App\Models\Service; @endphp
<x-frontend.layouts.master>
    <!-- Services Details Area Start -->
    <div class="services__details page">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="services__details-left">
                        <div class="services__details-left-content mb-40">
                            <h2 class="mb-30">{{$service->name}}</h2>
                            <p>{{$service->description}}</p>
                        </div>
                        <div class="services__details-left-image mb-60">
                            <div class="row mt-30">
                                <div class="col-sm-6 sm-mb-30">
                                    <a class="portfolio__area-two-item" href="{{asset($service->image)}}"
                                       title="Medical Scanner 04" data-subtitle="Medical Scanner">
                                        <img class="img__full" src="{{asset($service->image)}}" alt="">
                                    </a>
                                </div>

                                @if(isset($service->image2))
                                    <div class="col-sm-6 sm-mb-30">
                                        <a class="portfolio__area-two-item" href="{{asset($service->image2)}}"
                                           title="Medical Scanner 04" data-subtitle="Medical Scanner">
                                            <img class="img__full" src="{{asset($service->image2)}}" style="width:416px; height: 416px " alt="">
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="services__details-left-feedback">
                            <div class="row">

                                @foreach($serviceReviews->take(4) as $review)
                                    <div class="col-xl-6 lg-mb-30 mb-2">
                                        <div class="feedback__area-item">
                                            <div class="feedback__area-item-quote">
                                                <img src="{{asset('frontAssets/images/quote.png')}}"  alt="">
                                            </div>
                                            <div class="feedback__area-item-reviews">
                                                <h5>{{$review->reviews >=3?'Good':'Bad'}} :</h5>
                                                <ul>
                                                    @for($i =0; $i <5 ; $i++)
                                                        @if($i < $review->reviews)
                                                            <li><a><i class="fas fa-star"></i></a></li>
                                                        @else
                                                            <li><a><i class="fas fa-star text-secondary"></i></a></li>
                                                        @endif
                                                    @endfor
                                                </ul>
                                            </div>
                                            <div class="feedback__area-item-content">
                                                <p>{{$review->review}}.</p>
                                            </div>
                                            <div class="feedback__area-item-bottom">
                                                <div class="feedback__area-item-bottom-avatar">
                                                    <img src="{{$review->image}}"
                                                         alt="Reviewer Image">
                                                </div>
                                                <div class="feedback__area-item-bottom-title">
                                                    <h5>{{$review->name}}</h5>
                                                    <span>{{$review->job}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="all__sidebar ml-25 xl-ml-0">
                        <div class="all__sidebar-item services">
                            <h4>{{app()->getLocale() == 'ar'?GeneralSetting::getValueForKey('nav3_ar'):GeneralSetting::getValueForKey('nav3_en')}}</h4>
                            <div class="all__sidebar-item-category">
                                <ul>
                                    @foreach(Service::all() as $item)
                                        <li><a href="{{route('front.services.show',$item->id)}}"><i class="far fa-angle-double-right"></i>{{$item->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="all__sidebar-item-help"
                             data-background="{{asset('frontAssets/images/01_details.jpg')}}">
                            <h4>{{__('dashboard.Need Any Help?')}}</h4>
                            <div class="all__sidebar-item-help-contact">
                                <div class="all__sidebar-item-help-contact-icon">
                                    <i class="fal fa-phone-alt"></i>
                                </div>
                                <div class="all__sidebar-item-help-contact-content">
                                    <span>{{__('dashboard.Quick Help')}}</span>
                                    <h6><a href="tel:+{{GeneralSetting::getValueForKey('contact_number')}}">+{{GeneralSetting::getValueForKey('contact_number')}}</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Details Area End -->
</x-frontend.layouts.master>

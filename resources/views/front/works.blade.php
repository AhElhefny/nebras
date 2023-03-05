@php use App\Models\GeneralSetting; @endphp
<x-frontend.layouts.master>
    <!-- Features Area Start -->
    <div class="features__area pb-100 page">
        <div class="container">
            <div class="row mb-60">
                <div class="col-lg-12 col-xl-8">
                    <div class="services__area-title lg-t-center">
                        <span class="subtitle one">{{app()->getLocale()=='ar'?GeneralSetting::getValueForKey('nav5_ar'):GeneralSetting::getValueForKey('nav5_en')}}</span>
                        <h2>
                            {{app()->getLocale()=='ar'?GeneralSetting::getValueForKey('works_title_ar'):GeneralSetting::getValueForKey('works_title_en')}}.
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($works as $work)
                    <div class="col-lg-6 ">
                        <div class="features__area-item features__area-item-hover">
                            <img src="{{$work->image}}" alt="Work Image" style="height: 636px">
                            <div class="features__area-item-content">
                                <div class="features__area-item-content-icon">
                                    <a href="{{route('front.works.show',$work->id)}}"><i class="fal fa-plus"></i></a>
                                </div>
                                <h3><a href="{{route('front.works.show',$work->id)}}">{{$work->title}}</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Features Area End -->
</x-frontend.layouts.master>

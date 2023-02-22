@php use App\Models\GeneralSetting; @endphp
<x-frontend.layouts.master>
    <!-- Client Area Start -->
    <div class="client__area page">
        <div class="container">
            <div class="row mb-60">
                <div class="col-xl-12">
                    <div class="team__area-title lg-t-center">
                        <span class="subtitle">{{app()->getLocale()=='ar'?GeneralSetting::getValueForKey('feature_section2_title_ar'):GeneralSetting::getValueForKey('feature_section2_title_en')}}</span>
                        <h2>{{app()->getLocale()=='ar'?GeneralSetting::getValueForKey('group_title_ar'):GeneralSetting::getValueForKey('group_title_en')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($groups as $group)
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="client__area-item">
                            <img src="{{$group->image??asset('frontAssets/images/sponsors/05_sponsor.png')}}" alt="">
                            <div class="client-info">
                                <span>{{$group->title}}</span>
                                <a href="{{$group->link}}">{{$group->link}}</a>
                                <p>{{$group->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Client Area End -->
</x-frontend.layouts.master>

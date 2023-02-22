@php use App\Models\GeneralSetting; @endphp

<x-frontend.layouts.master>
        <!-- Team Area Start -->
        <div class="team__area page">
            <div class="container">
                <div class="row mb-60">
                    <div class="col-xl-12">
                        <div class="team__area-title lg-t-center">
                            <span class="subtitle">{{app()->getLocale()=='ar'?GeneralSetting::getValueForKey('nav4_ar'):GeneralSetting::getValueForKey('nav4_en')}}</span>
                            <h2>{{app()->getLocale()=='ar'?GeneralSetting::getValueForKey('team_title_ar'):GeneralSetting::getValueForKey('team_title_en')}}</h2>
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
                                          <li><a href="{{$team->behance}}"><i class="fal fa-basketball-ball"></i></a> </li>
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
</x-frontend.layouts.master>

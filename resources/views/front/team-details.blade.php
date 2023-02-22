<x-frontend.layouts.master>
    <!-- Services Details Area Start -->
    <div class="team__details services__details page">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="services__details-left">
                        <div class="services__details-left-content mb-40">
                            <h2 class="mb-30">{{$team->name}}</h2>
                            <p> {{$team->description}}</p>
                        </div>
                        <div class="services__details-left-image mb-60">
                            <div class="row mt-30">
                                <div class="col-sm-12 mb-30">
                                    <a class="portfolio__area-two-item" href="{{asset($team->image)}}" title="David Beckham" data-subtitle="Research for your next design project is done by a team of industry experts. We help with research, data analysis, and visualization. Our expertise covers many different fields including UX Design, Brand Strategy, Content Writing, User Experience Design and more.">
                                        <img class="img__full" src="{{asset($team->image)}}" alt="">
                                    </a>
                                </div>
                                <div class="col-sm-6 mb-30">
                                   <a class="portfolio__area-two-item" href="{{asset($team->image)}}" title="David Beckham" data-subtitle="Research for your next design project is done by a team of industry experts. We help with research, data analysis, and visualization. Our expertise covers many different fields including UX Design, Brand Strategy, Content Writing, User Experience Design and more.">
                                       <img class="img__full" src="{{asset($team->image)}}" alt="">
                                   </a>
                                </div>
                                <div class="col-sm-6 mb-30">
                                    <a class="portfolio__area-two-item" href="{{asset($team->image)}}" title="David Beckham" data-subtitle="Research for your next design project is done by a team of industry experts. We help with research, data analysis, and visualization. Our expertise covers many different fields including UX Design, Brand Strategy, Content Writing, User Experience Design and more.">
                                        <img class="img__full" src="{{asset($team->image)}}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="all__sidebar ml-25 xl-ml-0">
                        <div class="all__sidebar-item services">
                            <h4>{{__('home.Ourteam')}}</h4>
                            <div class="all__sidebar-item-category">
                                 <ul>
                                    @foreach($teams as $team)
                                    <li><a href="{{route('front.team.show',$team->id)}}"><i class="far fa-angle-double-right"></i>{{$team->name}}</a></li>
                                    @endforeach
                                 </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-frontend.layouts.master>

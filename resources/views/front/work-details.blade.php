<x-frontend.layouts.master>
        <!-- Portfolio Column Start -->
        <div class="portfolio__column page">
            <div class="container">
                <div class="row" id="all-works">
                    @foreach($works as $index => $work)
                        @if($index < 2)
                        <div class="col-xl-6 col-md-6 mb-30 portfolio-item">
                            <a class="portfolio__area-two-item" href="{{$work->image}}" title="Medical Scanner 04" data-subtitle="Medical Scanner">
                                <img class="img__full" src="{{$work->image}}" alt="" style="width: 545px;height: 636px">
                                <div class="portfolio__area-two-item-content">
                                    <h4>{{$work->title_en}}</h4>
                                </div>
                            </a>
                        </div>
                        @else
                            <div class="col-xl-4 col-lg-4 col-md-6 portfolio-item mb-30">
                                <a class="portfolio__area-two-item" href="{{$work->image}}" title="Medical Scanner 04" data-subtitle="Medical Scanner">
                                    <img class="img__full" src="{{$work->image}}" alt="" style="height: 416px">
                                    <div class="portfolio__area-two-item-content">
                                        <h4>{{$work->title_en}}</h4>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach

                    <div class="col-xl-12 t-center">
                        <button class="theme-btn-1 open-see-more" id="all-works-btn">
                            {{__('dashboard.All Works')}}<i class="fal fa-long-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Column End -->
    @section('script')
        <script>
            $('#all-works-btn').on('click',function (){
                $.ajax({
                    type:"GET",
                    url:"{{route('front.works.show',$id)}}",
                    data:{
                        all:'all'
                    },
                    success:function (response){
                        if(response){
                            $('#all-works').empty();
                            // alert(response.length)
                                for(let i =0; i < response.length ; i++){
                                    if(i < 2){
                                        $('#all-works').append(`<div class="col-xl-6 col-md-6 mb-30 portfolio-item">
                                        <a class="portfolio__area-two-item" href="${response[i].image}" title="Medical Scanner 04" data-subtitle="Medical Scanner">
                                        <img class="img__full" src="${response[i].image}" alt="" style="width: 545px;height: 636px">
                                        <div class="portfolio__area-two-item-content">
                                        <h4>${response[i].title_en}</h4>
                                        </div>
                                        </a>
                                        </div>`);
                                    }else {
                                        $('#all-works').append(`<div class="col-xl-4 col-lg-4 col-md-6 portfolio-item mb-30">
                                        <a class="portfolio__area-two-item" href="${response[i].image}" title="Medical Scanner 04" data-subtitle="Medical Scanner">
                                        <img class="img__full" src="${response[i].image}" alt="" style="height: 416px">
                                        <div class="portfolio__area-two-item-content">
                                        <h4>${response[i].title_en}</h4>
                                        </div>
                                        </a>
                                        </div>`);
                                    }

                                }
                        }
                    }
                })
            })
        </script>
    @endsection
</x-frontend.layouts.master>

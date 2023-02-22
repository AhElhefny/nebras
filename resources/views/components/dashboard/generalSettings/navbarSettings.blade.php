<?php use App\Models\GeneralSetting?>
<div class="card" id="navbar">
    <div class="card-header">
        <h4 class="card-title">{{__('dashboard.navbar')}}</h4>
    </div>
    <div class="card-content">
        <div class="card-body ">
            <form method="POST" action="{{route('admin.generalSetting.store')}}" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" name="navbar">
                <div class="row">
                    @for($i = 1; $i <= 7 ; $i++)
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type['nav{{$i}}_ar']">{{__('dashboard.element').$i.' '.__('dashboard.in arabic')}}</label>
                                <input type="text" class="form-control" name="type[nav{{$i}}_ar]" value="{{old("type.nav".$i."_ar",GeneralSetting::getValueForKey('nav'.$i.'_ar'))}}"  placeholder="{{__('dashboard.element').$i.' '.__('dashboard.in arabic')}}" required >
                                @error('type.nav'.$i.'_ar')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type['nav{{$i}}_en']">{{__('dashboard.element').$i.' '.__('dashboard.in english')}}</label>
                                <input type="text" class="form-control" name="type[nav{{$i}}_en]" value="{{old("type.nav".$i."_en",GeneralSetting::getValueForKey('nav'.$i.'_en'))}}"  placeholder="{{__('dashboard.element').$i.' '.__('dashboard.in english')}}" required >
                                @error('type.nav'.$i.'_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                    @endfor

                </div>
                <x-dashboard.generalSettings.submitButton />
            </form>
        </div>
    </div>
</div>

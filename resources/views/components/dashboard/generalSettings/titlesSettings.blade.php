<?php use App\Models\GeneralSetting?>
<div class="card" id="titles">
    <div class="card-header">
        <h4 class="card-title">{{__('dashboard.sections titles')}}</h4>
    </div>
    <div class="card-content">
        <div class="card-body ">
            <form method="POST" action="{{route('admin.generalSetting.store')}}" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" name="titles">
                <div class="row">
                    <x-dashboard.generalSettings.titleSettingInput nav="nav3" />
                    <x-dashboard.generalSettings.titleSettingInput nav="nav4" />
                    <x-dashboard.generalSettings.titleSettingInput nav="nav5" />
                    <x-dashboard.generalSettings.titleSettingInput nav="nav6" />
                    <div class="col-6">
                        <div class="form-group">
                            <label for="type['review_title_ar']">{{__('dashboard.review title').' '.__('dashboard.in arabic')}}</label>
                            <input type="text" class="form-control" name="type[review_title_ar]" value="{{old("type[review_title_ar]",GeneralSetting::getValueForKey('review_title_ar'))}}"  placeholder="{{__('dashboard.review title').' '.__('dashboard.in arabic')}}" required >
                            @error('type.review_title_ar')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="type['review_title_en']">{{__('dashboard.review title').' '.__('dashboard.in english')}}</label>
                            <input type="text" class="form-control" name="type[review_title_en]" value="{{old("type[review_title_en]",GeneralSetting::getValueForKey('review_title_en'))}}"  placeholder="{{__('dashboard.review title').' '.__('dashboard.in english')}}" required >
                            @error('type.review_title_en')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="type['group_title_ar']">{{__('dashboard.group title').' '.__('dashboard.in arabic')}}</label>
                            <input type="text" class="form-control" name="type[group_title_ar]" value="{{old("type[group_title_ar]",GeneralSetting::getValueForKey('group_title_ar'))}}"  placeholder="{{__('dashboard.group title').' '.__('dashboard.in arabic')}}" required >
                            @error('type.group_title_ar')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="type['group_title_en']">{{__('dashboard.group title').' '.__('dashboard.in english')}}</label>
                            <input type="text" class="form-control" name="type[group_title_en]" value="{{old("type[group_title_en]",GeneralSetting::getValueForKey('group_title_en'))}}"  placeholder="{{__('dashboard.group title').' '.__('dashboard.in english')}}" required >
                            @error('type.group_title_en')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-dashboard.generalSettings.submitButton />
            </form>
        </div>
    </div>
</div>

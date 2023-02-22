@php use App\Models\GeneralSetting; @endphp
<div id="backgrounds">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{__('dashboard.sections background')}}</h4>
        </div>
        <div class="card-content">
            <div class="card-body ">
                <form method="POST" action="{{route('admin.generalSetting.store')}}" enctype="multipart/form-data" >
                    @csrf
                    <input type="hidden" name="background">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="video_link">Video Link</label>
                                <input type="url" class="form-control" name="video_link" value="{{old("video_link",GeneralSetting::getValueForKey('video_link'))}}"  placeholder="Video Link" required >
                                @error('video_link')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <x-dashboard.generalSettings.uploadImage i="3" name="preview_background" folder="reviews/" />
                        <x-dashboard.generalSettings.uploadImage i="4" name="video_background" folder="video/"/>

                    </div>
                    <x-dashboard.generalSettings.submitButton id="background-save" />
                </form>
            </div>
        </div>
    </div>
</div>



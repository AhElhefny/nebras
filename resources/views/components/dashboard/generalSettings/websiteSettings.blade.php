@php use App\Models\GeneralSetting; @endphp
<div id="general-settings">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{__('dashboard.general settings')}}</h4>
        </div>
        <div class="card-content">
            <div class="card-body ">
                <form method="POST" action="{{route('admin.generalSetting.store')}}" enctype="multipart/form-data" >
                    @csrf
                    <input type="hidden" name="generalSettings">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type['website_name_ar']">{{__('dashboard.website name').' '.__('dashboard.in arabic')}}</label>
                                <input type="text" class="form-control" name="type[website_name_ar]" value="{{old("type.website_name_ar",GeneralSetting::getValueForKey('website_name_ar'))}}"  placeholder="{{__('dashboard.website name').' '.__('dashboard.in arabic')}}"  >
                                @error('type.website_name_ar')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type['website_name_en']">{{__('dashboard.website name').' '.__('dashboard.in english')}}</label>
                                <input type="text" class="form-control" name="type[website_name_en]" value="{{old("type.website_name_en",GeneralSetting::getValueForKey('website_name_en'))}}"  placeholder="{{__('dashboard.website name').' '.__('dashboard.in english')}}" required >
                                @error('type.website_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type['contact_number']">{{__('dashboard.contact number')}}</label>
                                <input type="number" class="form-control" name="type[contact_number]" value="{{old("type.contact_number",GeneralSetting::getValueForKey('contact_number'))}}"  placeholder="{{__('dashboard.contact number')}}" required >
                                @error('type.contact_number')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                            <div class=" col-6">
                             {{--   <label for="type['website_name_en']">{{__('dashboard.copyright')}}</label>
                                <section class="snow-editor">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="snow-wrapper">
                                                <div id="snow-container">
                                                    <div class="quill-toolbar">
                                                        <span class="ql-formats">
                                                            <select class="ql-header">
                                                                <option value="1">Heading</option>
                                                                <option value="2">Subheading</option>
                                                                <option selected>Normal</option>
                                                            </select>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-bold"></button>
                                                            <button class="ql-italic"></button>
                                                            <button class="ql-underline"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-link"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-clean"></button>
                                                        </span>
                                                    </div>
                                                    <div class="editor">
                                                        {!! old('copyright',GeneralSetting::getValueForKey('copyright')) !!}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <textarea name="copyright" class="form-control" hidden id="copyright">
                                                    </textarea>
                                @error('copyright')
                                <span class="text-danger">{{$message}}</span>
                                @enderror--}}
                            </div>

                        <x-dashboard.generalSettings.uploadImage i="1" name="logo" folder="logo/"/>
                        <x-dashboard.generalSettings.uploadImage i="2" name="logo" folder="logo/" />

                    </div>
                    <x-dashboard.generalSettings.submitButton id="general-settings-save" />
                </form>
            </div>
        </div>
    </div>
</div>



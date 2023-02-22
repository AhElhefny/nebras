@php use App\Models\GeneralSetting; @endphp
<x-dashboard.layouts.master title="{{__('dashboard.manage feature')}}">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users list start -->
                <section class="users-list-wrapper">
                    <x-dashboard.layouts.breadcrumb now="{{__('dashboard.manage feature')}}">
                    </x-dashboard.layouts.breadcrumb>
                    <!-- Column selectors with Export Options and print table -->
                    <section id="column-selectors">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{__('dashboard.manage feature')}}</h4>
                                    </div>
                                    @if(\Session::get('success'))
                                        <x-dashboard.layouts.message />
                                    @endif
                                    <div class="card-content">
                                        <div class="card-body ">
                                            <form method="POST" action="{{route('admin.header.feature.store')}}" enctype="multipart/form-data" >
                                                @csrf
                                                <div class="card-header mb-2">
                                                    <h5 class="text-muted ">Section 1</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="type['feature_section1_title_ar']">{{__('dashboard.title').' '.__('dashboard.in arabic')}}</label>
                                                            <input type="text" class="form-control" name="type[feature_section1_title_ar]" value="{{old("type[feature_section1_title_ar]",GeneralSetting::getValueForKey('feature_section1_title_ar'))}}"  placeholder="{{__('dashboard.title').' '.__('dashboard.in arabic')}}" required >
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="type['feature_section1_title_en']">{{__('dashboard.title').' '.__('dashboard.in english')}}</label>
                                                            <input type="text" class="form-control" name="type[feature_section1_title_en]" value="{{old("type[feature_section1_title_en]",GeneralSetting::getValueForKey('feature_section1_title_en'))}}"  placeholder="{{__('dashboard.title').' '.__('dashboard.in english')}}" required >
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="type['feature_section1_desc_ar']">{{__('dashboard.table description').' '.__('dashboard.in arabic')}}</label>
                                                            <textarea class="form-control" rows="5" name="type[feature_section1_desc_ar]">{{GeneralSetting::getValueForKey('feature_section1_desc_ar')??null}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="type['feature_section1_desc_en']">{{__('dashboard.table description').' '.__('dashboard.in english')}}</label>
                                                            <textarea class="form-control" rows="5" name="type[feature_section1_desc_en]">{{GeneralSetting::getValueForKey('feature_section1_desc_en')??null}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-header mb-2">
                                                    <h5 class="text-muted ">Section 2</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="type['feature_section2_title_ar']">{{__('dashboard.title').' '.__('dashboard.in arabic')}}</label>
                                                            <input type="text" class="form-control" name="type[feature_section2_title_ar]" value="{{old("type[feature_section2_title_ar]",GeneralSetting::getValueForKey('feature_section2_title_ar'))}}"  placeholder="{{__('dashboard.title').' '.__('dashboard.in arabic')}}" required >
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="type['feature_section2_title_en']">{{__('dashboard.title').' '.__('dashboard.in english')}}</label>
                                                            <input type="text" class="form-control" name="type[feature_section2_title_en]" value="{{old("type[feature_section2_title_en]",GeneralSetting::getValueForKey('feature_section2_title_en'))}}"  placeholder="{{__('dashboard.title').' '.__('dashboard.in english')}}" required >
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="type['feature_section2_desc_ar']">{{__('dashboard.table description').' '.__('dashboard.in arabic')}}</label>
                                                            <textarea class="form-control" rows="5" name="type[feature_section2_desc_ar]">{{GeneralSetting::getValueForKey('feature_section2_desc_ar')??null}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="type['feature_section2_desc_en']">{{__('dashboard.table description').' '.__('dashboard.in english')}}</label>
                                                            <textarea class="form-control" rows="5" name="type[feature_section2_desc_en]">{{GeneralSetting::getValueForKey('feature_section2_desc_en')??null}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-header mb-2">
                                                    <h5 class="text-muted ">Section 3</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="type['feature_section3_title_ar']">{{__('dashboard.title').' '.__('dashboard.in arabic')}}</label>
                                                            <input type="text" class="form-control" name="type[feature_section3_title_ar]" value="{{old("type[feature_section3_title_ar]",GeneralSetting::getValueForKey('feature_section3_title_ar'))}}"  placeholder="{{__('dashboard.title').' '.__('dashboard.in arabic')}}" required >
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="type['feature_section3_title_en']">{{__('dashboard.title').' '.__('dashboard.in english')}}</label>
                                                            <input type="text" class="form-control" name="type[feature_section3_title_en]" value="{{old("type[feature_section3_title_en]",GeneralSetting::getValueForKey('feature_section3_title_en'))}}"  placeholder="{{__('dashboard.title').' '.__('dashboard.in english')}}" required >
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="type['feature_section3_desc_ar']">{{__('dashboard.table description').' '.__('dashboard.in arabic')}}</label>
                                                            <textarea class="form-control" rows="5" name="type[feature_section3_desc_ar]">{{GeneralSetting::getValueForKey('feature_section3_desc_ar')??null}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="type['feature_section3_desc_en']">{{__('dashboard.table description').' '.__('dashboard.in english')}}</label>
                                                            <textarea class="form-control" rows="5" name="type[feature_section3_desc_en]">{{GeneralSetting::getValueForKey('feature_section3_desc_en')??null}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">{{__('dashboard.submit')}}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Column selectors with Export Options and print table -->
                </section>
                <!-- users list ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
    @section('script')

    @endsection
</x-dashboard.layouts.master>

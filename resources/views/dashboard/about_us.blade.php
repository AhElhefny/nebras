@php use App\Models\GeneralSetting; @endphp
<x-dashboard.layouts.master title="{{__('dashboard.manage about-us')}}">
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
                    <x-dashboard.layouts.breadcrumb now="{{__('dashboard.manage about-us')}}">
                    </x-dashboard.layouts.breadcrumb>
                    <!-- Column selectors with Export Options and print table -->
                    <section id="column-selectors">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{__('dashboard.manage about-us')}}</h4>
                                    </div>
                                    @if(\Session::get('success'))
                                        <x-dashboard.layouts.message />
                                    @endif
                                    <div class="card-content">
                                        <div class="card-body ">
                                            <form method="POST" action="{{route('admin.aboutUs.setting.store')}}" enctype="multipart/form-data" >
                                                @csrf
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="type['about_title_ar']">{{__('dashboard.about us title').' '.__('dashboard.in arabic')}}</label>
                                                            <input type="text" class="form-control" name="type[about_title_ar]" value="{{old("type[about_title_ar]",GeneralSetting::getValueForKey('about_title_ar'))}}"  placeholder="{{__('dashboard.about us title').' '.__('dashboard.in arabic')}}" required >
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="type['about_title_en']">{{__('dashboard.about us title').' '.__('dashboard.in english')}}</label>
                                                            <input type="text" class="form-control" name="type[about_title_en]" value="{{old("type[about_title_en]",GeneralSetting::getValueForKey('about_title_en'))}}"  placeholder="{{__('dashboard.about us title').' '.__('dashboard.in english')}}" required >
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="type['about_exp_desc']">{{__('dashboard.about us exp year desc').' '.__('dashboard.in arabic')}}</label>
                                                            <input type="text" class="form-control" name="type[about_exp_desc_ar]" value="{{old("type[about_exp_desc_ar]",GeneralSetting::getValueForKey('about_exp_desc_ar'))}}"  placeholder="{{__('dashboard.about us exp year desc').' '.__('dashboard.in arabic')}}" required >
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="type['about_exp_desc']">{{__('dashboard.about us exp year desc').' '.__('dashboard.in english')}}</label>
                                                            <input type="text" class="form-control" name="type[about_exp_desc]" value="{{old("type[about_exp_desc]",GeneralSetting::getValueForKey('about_exp_desc'))}}"  placeholder="{{__('dashboard.about us exp year desc').' '.__('dashboard.in english')}}" required >
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="type['about_exp_year']">{{__('dashboard.about us exp year')}}</label>
                                                            <input type="number" class="form-control" name="type[about_exp_year]" value="{{old("type[about_exp_year]",GeneralSetting::getValueForKey('about_exp_year'))}}"  placeholder="{{__('dashboard.about us exp year')}}" required >
                                                        </div>
                                                    </div>

                                                     <div class="col-6">
                                                         <div class="form-group">
                                                               <label for="about_image">{{__('dashboard.table image')}}</label>
                                                                <input class="form-control" type="file"  name="about_image">
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
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
    @section('script')

    @endsection
</x-dashboard.layouts.master>

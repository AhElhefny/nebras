<x-dashboard.layouts.master title="{{__('dashboard.add team')}}">
    <div class="app-content content">
        <div class="content-overlay"></div>
           <div class="header-navbar-shadow"></div>
             <div class="content-wrapper">
               <div class="content-header row">
              </div>
               <x-dashboard.layouts.breadcrumb now="{{__('dashboard.add team')}}">
                  <li class="breadcrumb-item"><a href="{{route('admin.teams.index')}}">{{__('dashboard.team list')}}</a></li>
               </x-dashboard.layouts.breadcrumb>
              <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{__('dashboard.add team')}}</h4>
                        </div>
                        <div class="card-content">
                               <div class="card-body">
                                   <form class="form form-vertical" method="POST" action="{{route('admin.teams.store')}}" enctype="multipart/form-data">
                                      @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email-id-icon">{{__('dashboard.table image')}}</label>
                                                      <div class="position-relative has-icon-left">
                                                          <input type="file" id="email-id-icon" class="form-control" name="image">
                                                            <div class="form-control-position">
                                                                 <i class="feather icon-image"></i>
                                                            </div>
                                                       </div>
                                                        @error('image')
                                                          <span class="text text-danger">{{$message}}</span>
                                                        @enderror
                                                   </div>
                                             </div>

                                             <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-icon">{{__('dashboard.table name').__('dashboard.in arabic')}}</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="first-name-icon" class="form-control" name="name_ar" placeholder="{{__('dashboard.table name').__('dashboard.in arabic')}}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-grid"></i>
                                                        </div>
                                                    </div>
                                                    @error('name_ar')
                                                       <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-icon">{{__('dashboard.table name').__('dashboard.in english')}}</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="first-name-icon" class="form-control" name="name_en" placeholder="{{__('dashboard.table name').__('dashboard.in english')}}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-grid"></i>
                                                        </div>
                                                    </div>
                                                     @error('name_en')
                                                       <span class="text text-danger">{{$message}}</span>
                                                     @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-icon">{{__('dashboard.table job').__('dashboard.in english')}}</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="first-name-icon" class="form-control" name="job_en" placeholder="{{__('dashboard.table job').__('dashboard.in english')}}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-grid"></i>
                                                        </div>
                                                    </div>
                                                     @error('job_en')
                                                       <span class="text text-danger">{{$message}}</span>
                                                     @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-icon">{{__('dashboard.table job').__('dashboard.in arabic')}}</label>
                                                     <div class="position-relative has-icon-left">
                                                          <input type="text" id="first-name-icon" class="form-control" name="job_ar" placeholder="{{__('dashboard.table job').__('dashboard.in arabic')}}">
                                                           <div class="form-control-position">
                                                               <i class="feather icon-grid"></i>
                                                            </div>
                                                     </div>
                                                       @error('job_ar')
                                                          <span class="text text-danger">{{$message}}</span>
                                                        @enderror
                                                   </div>
                                             </div>

                                             <div class="col-12">
                                                 <div class="form-group">
                                                     <label for="contact-info-icon">{{__('dashboard.table description'). __('dashboard.in arabic')}}</label>
                                                      <div class="position-relative has-icon-left">
                                                          <textarea  rows="5" id="contact-info-icon" class="form-control" name="description_ar" placeholder="{{__('dashboard.table description'). __('dashboard.in arabic')}}"></textarea>
                                                           <div class="form-control-position">
                                                               <i class="fa fa-pencil"></i>
                                                            </div>
                                                      </div>
                                                       @error('description_ar')
                                                          <span class="text text-danger">{{$message}}</span>
                                                       @enderror
                                                  </div>
                                            </div>

                                             <div class="col-12">
                                                 <div class="form-group">
                                                    <label for="password-icon">{{__('dashboard.table description'). __('dashboard.in english')}}</label>
                                                    <div class="position-relative has-icon-left">
                                                        <textarea  rows="5" id="password-icon" class="form-control" name="description_en" placeholder="{{__('dashboard.table description'). __('dashboard.in english')}}"></textarea>
                                                          <div class="form-control-position">
                                                               <i class="fa fa-pencil"></i>
                                                          </div>
                                                     </div>
                                                       @error('description_en')
                                                          <span class="text text-danger">{{$message}}</span>
                                                         @enderror
                                                     </div>
                                               </div>

                                                 <div class="col-12">
                                                     <div class="form-group">
                                                         <label for="first-name-icon">{{__('dashboard.twitter link')}}</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="url" id="first-name-icon" class="form-control" name="twitter" placeholder="{{__('dashboard.twitter link')}}">
                                                                 <div class="form-control-position">
                                                                      <i class="feather icon-grid"></i>
                                                                </div>
                                                          </div>
                                                     </div>
                                                </div>

                                                 <div class="col-12">
                                                      <div class="form-group">
                                                           <label for="first-name-icon">{{__('dashboard.website link')}}</label>
                                                             <div class="position-relative has-icon-left">
                                                                <input type="url" id="first-name-icon" class="form-control" name="website" placeholder="{{__('dashboard.website link')}}">
                                                                   <div class="form-control-position">
                                                                        <i class="feather icon-grid"></i>
                                                                  </div>
                                                            </div>
                                                       </div>
                                                </div>

                                                 <div class="col-12">
                                                      <div class="form-group">
                                                           <label for="first-name-icon">{{__('dashboard.behance link')}}</label>
                                                             <div class="position-relative has-icon-left">
                                                                 <input type="url" id="first-name-icon" class="form-control" name="behance" placeholder="{{__('dashboard.behance link')}}">
                                                                  <div class="form-control-position">
                                                                       <i class="feather icon-grid"></i>
                                                                  </div>
                                                            </div>
                                                       </div>
                                                 </div>

                                                 <div class="col-12">
                                                      <button type="submit" class="btn btn-primary mr-1 mb-1">{{__('dashboard.submit')}}</button>
                                                      <button type="reset" class="btn btn-outline-warning mr-1 mb-1">{{__('dashboard.reset')}}</button>
                                                 </div>
                                             </div>
                                        </div>
                                     </form>
                                </div>
                           </div>
                      </div>
                 </div>
           </div>
     </div>

</x-dashboard.layouts.master>

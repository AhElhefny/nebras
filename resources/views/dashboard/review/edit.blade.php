<x-dashboard.layouts.master title="{{__('dashboard.edit review')}}">
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <x-dashboard.layouts.breadcrumb now="{{__('dashboard.edit review')}}">
                <li class="breadcrumb-item"><a href="{{route('admin.review.index')}}">{{__('dashboard.review list')}}</a></li>
            </x-dashboard.layouts.breadcrumb>
            <div class="offset-md-3 col-md-6 col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('dashboard.edit review')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{route('admin.review.update',$review->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
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
                                                 <label class="form-label">{{__('dashboard.services')}}</label>
                                                 <select class="select2 form-control" name="service_id" id="select2-theme">
                                                     <optgroup label="{{__('choose one')}}">
                                                         @foreach(\App\Models\Service::all() as $service)
                                                             <option value="{{$service->id}}" {{$service->id == $review->service_id?'selected':''}}>{{$service->name}}</option>
                                                         @endforeach
                                                     </optgroup>
                                                 </select>
                                             </div>
                                         </div>

                                        <div class="col-12">
                                               <div class="form-group">
                                                   <label for="first-name-icon">{{__('dashboard.table name').__('dashboard.in arabic')}}</label>
                                                      <div class="position-relative has-icon-left">
                                                           <input type="text" id="first-name-icon" value="{{old('name_ar',$review->name_ar)}}" class="form-control" name="name_ar" placeholder="{{__('dashboard.table name').__('dashboard.in arabic')}}">
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
                                                         <input type="text" id="first-name-icon" class="form-control" value="{{old('name_en',$review->name_en)}}" name="name_en" placeholder="{{__('dashboard.table name').__('dashboard.in english')}}">
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
                                                  <label for="contact-info-icon">{{__('dashboard.table review'). __('dashboard.in arabic')}}</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="contact-info-icon" class="form-control" value="{{old('review_ar',$review->review_ar)}}" name="review_ar" placeholder="{{__('dashboard.table review'). __('dashboard.in arabic')}}"/>
                                                         <div class="form-control-position">
                                                             <i class="fa fa-pencil"></i>
                                                        </div>
                                                   </div>
                                                      @error('review_ar')
                                                        <span class="text text-danger">{{$message}}</span>
                                                      @enderror
                                                  </div>
                                           </div>

                                        <div class="col-12">
                                                 <div class="form-group">
                                                    <label for="password-icon">{{__('dashboard.table review'). __('dashboard.in english')}}</label>
                                                          <div class="position-relative has-icon-left">
                                                              <input type="text" id="password-icon" class="form-control" value="{{old('review_en',$review->review_en)}}" name="review_en" placeholder="{{__('dashboard.table description'). __('dashboard.in english')}}">
                                                               <div class="form-control-position">
                                                                  <i class="fa fa-pencil"></i>
                                                              </div>
                                                         </div>
                                                             @error('review_en')
                                                                <span class="text text-danger">{{$message}}</span>
                                                             @enderror
                                                         </div>
                                                   </div>

                                        <div class="col-12">
                                                        <div class="form-group">
                                                           <label for="first-name-icon">{{__('dashboard.table job').__('dashboard.in english')}}</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" id="first-name-icon" class="form-control" name="job_en" value="{{old('job_en',$review->job_en)}}" placeholder="{{__('dashboard.table job').__('dashboard.in english')}}">
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
                                                               <input type="text" id="first-name-icon" class="form-control" name="job_ar" value="{{old('job_ar',$review->job_ar)}}"  placeholder="{{__('dashboard.table job').__('dashboard.in arabic')}}">
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
                                                 <label for="first-name-icon">{{__('dashboard.amount').' '.__('dashboard.table review')}}</label>
                                                 <div class="position-relative has-icon-left">
                                                     <input type="number" id="first-name-icon" value="{{old('reviews',$review->reviews)}}" class="form-control" name="reviews" placeholder="{{__('dashboard.amount').' '.__('dashboard.table review')}}" required min="0" max="5">
                                                     <div class="form-control-position">
                                                         <i class="feather icon-star"></i>
                                                     </div>
                                                 </div>
                                                 @error('reviews')
                                                 <span class="text text-danger">{{$message}}</span>
                                                 @enderror
                                             </div>
                                         </div>

                                                  <div class="col-12">
                                                       <button type="submit" class="btn btn-primary mr-1 mb-1">{{__('dashboard.submit')}}</button>
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

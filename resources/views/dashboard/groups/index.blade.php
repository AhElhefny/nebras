@php use Illuminate\Support\Facades\Route; @endphp
<x-dashboard.layouts.master title="{{__('dashboard.groups')}}">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <x-dashboard.layouts.breadcrumb now="{{__('dashboard.groups')}}">
            </x-dashboard.layouts.breadcrumb>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        @if(Route::is('admin.groups.index'))
                        <h4 class="card-title">{{__('dashboard.add group')}}</h4>
                        @else
                            <h4 class="card-title">{{__('dashboard.edit group')}}</h4>
                        @endif
                    </div>
                    @if(\Session::get('success'))
                        <x-dashboard.layouts.message />
                    @endif
                    <div class="card-content">
                          <div class="card-body">
                              @if(Route::is('admin.groups.index'))
                                  <form class="form form-vertical" method="POST" action="{{route('admin.groups.store')}}" enctype="multipart/form-data">
                              @else
                                  <form class="form form-vertical" method="POST" action="{{route('admin.groups.update',$group->id)}}" enctype="multipart/form-data">
                                   @method('PUT')
                               @endif

                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
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

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-name-icon">{{__('dashboard.link')}}</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="url" id="first-name-icon" value="{{old('link',isset($group)?$group->link:'')}}" class="form-control" name="link" placeholder="{{__('dashboard.link')}}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-grid"></i>
                                                    </div>
                                                </div>
                                                @error('link')
                                                <span class="text text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-name-icon">{{__('dashboard.title').__('dashboard.in arabic')}}</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" id="first-name-icon" class="form-control" value="{{old('title_ar',isset($group)?$group->title_ar:'')}}" name="title_ar" placeholder="{{__('dashboard.title').__('dashboard.in arabic')}}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-grid"></i>
                                                    </div>
                                                </div>
                                                @error('title_ar')
                                                <span class="text text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-name-icon">{{__('dashboard.title').__('dashboard.in english')}}</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" id="first-name-icon" value="{{old('title_en',isset($group)?$group->title_en:'')}}" class="form-control" name="title_en" placeholder="{{__('dashboard.title').__('dashboard.in english')}}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-grid"></i>
                                                    </div>
                                                </div>
                                                @error('title_en')
                                                <span class="text text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="contact-info-icon">{{__('dashboard.table description'). __('dashboard.in arabic')}}</label>
                                                <div class="position-relative has-icon-left">
                                                    <textarea  rows="5" id="contact-info-icon" class="form-control" name="description_ar" placeholder="{{__('dashboard.table description'). __('dashboard.in arabic')}}">{{isset($group)?$group->description_ar:null}}</textarea>
                                                    <div class="form-control-position">
                                                        <i class="fa fa-pencil"></i>
                                                    </div>
                                                </div>
                                                @error('description_ar')
                                                <span class="text text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="password-icon">{{__('dashboard.table description'). __('dashboard.in english')}}</label>
                                                <div class="position-relative has-icon-left">
                                                    <textarea  rows="5" id="password-icon" class="form-control" name="description_en" placeholder="{{__('dashboard.table description'). __('dashboard.in english')}}">{{isset($group)?$group->description_en:null}}</textarea>
                                                    <div class="form-control-position">
                                                        <i class="fa fa-pencil"></i>
                                                    </div>
                                                </div>
                                                @error('description_en')
                                                <span class="text text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label">{{__('dashboard.appearing')}}</label>
                                            <div class="custom-control custom-switch switch-lg custom-switch-primary mr-2" >
                                                <input type="checkbox" class="custom-control-input" name="active" id="customSwitch100" {{isset($group)?($group->active== 1?'checked':''):''}} value="1">
                                                <label class="custom-control-label" for="customSwitch100">
                                                    <span class="switch-text-left">Appear</span>
                                                    <span class="switch-text-right">Disappear</span>
                                                </label>
                                            </div>
                                            <label class="text-muted">{{__('dashboard.appearing at home page')}}</label>
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
                </dev>
            </div>
            @if(Route::is('admin.groups.index'))
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{__('dashboard.manage groups')}}</h4>
                        </div>
                        @if(\Session::get('success'))
                            <x-dashboard.layouts.message />
                        @endif
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive overflow-auto">
                                    <table class="table table-striped " id="groups-table">

                                        <thead>
                                        <tr>
                                            <th>{{__('dashboard.title')}}</th>
                                            <th>{{__('dashboard.table description')}}</th>
                                            <th>{{__('dashboard.table image')}}</th>
                                            <th>{{__('dashboard.link')}}</th>
                                            <th>{{__('dashboard.appearing')}}</th>
                                            <th>{{__('dashboard.table create date')}}</th>
                                            <th>{{__('dashboard.actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody class=" ">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </dev>
                </div>
            @endif
        </div>
    </div>
    <!-- END: Content-->
    @if(Route::is('admin.groups.index'))
        @section('script')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>

                // window.jsPDF = window.jspdf.jsPDF;
                // window.html2canvas = html2canvas;
                $(document).ready(function () {
                    $('#groups-table').DataTable({
                        processing: true,
                        serverSide: true,
                        lengthMenu: [10, 20, 40, 60, 80, 100],
                        pageLength: 10,
                        ajax: {
                            url :"groups",
                            headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                            data: function (d) {
                                d.page = 1;
                            }
                        },
                        "paging": true,
                        order : [[5,'desc']],
                        columns: [
                            {data: 'title', name: 'title'},
                            {data: 'description', name:'description'},
                            {data:'image',render:function(data){
                                    return  `<img width="100" height="80" src="${data}">`
                                }},
                            {data: 'link', name: 'link',render:function (data) {
                                    return `<a href="${data}" target="_blank">${data}</a>`
                                }},
                            {data: 'active', name:'active'},
                            {data: 'created_at', name:'created_at'},
                            {data: 'id',
                                render:function (data,two,three){
                                    let edit ='groups/'+data+'/edit';

                                    return `<div class="btn-group">
                                    <div class="dropdown">
                                        <button class="btn btn-flat-dark dropdown-toggle mr-1 mb-1" type="button" id="dropdownMenuButton700" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{__('dashboard.actions')}}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton700">
                                        <a class="dropdown-item" href="${edit}"><i class="fa fa-edit mr-1"></i>{{__('dashboard.edit')}}</a>
                                        </div>
                                    </div>
                                </div>`;
                                }
                            },
                        ]
                    });
                });
            </script>
        @endsection
    @endif
</x-dashboard.layouts.master>

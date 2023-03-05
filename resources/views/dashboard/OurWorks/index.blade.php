@php use Illuminate\Support\Facades\Route; @endphp
<x-dashboard.layouts.master title="{{__('dashboard.our works')}}">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <x-dashboard.layouts.breadcrumb now="{{isset($work)?__('dashboard.edit work'):__('dashboard.our works')}}">
                @if(isset($work))
                    <li class="breadcrumb-item"><a href="{{route('admin.works.index')}}">{{__('dashboard.our works')}}</a></li>
                @endif
            </x-dashboard.layouts.breadcrumb>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        @if(Route::is('admin.works.index'))
                            <h4 class="card-title">{{__('dashboard.add work')}}</h4>
                        @else
                            <h4 class="card-title">{{__('dashboard.edit work')}}</h4>
                        @endif
                    </div>
                    @if(\Session::get('success'))
                        <x-dashboard.layouts.message />
                    @endif
                    <div class="card-content">
                        <div class="card-body">
                                @if(Route::is('admin.works.index'))
                                <form class="form form-vertical" method="POST" action="{{route('admin.works.store')}}" enctype="multipart/form-data">
                                @else
                                <form class="form form-vertical" method="POST" action="{{route('admin.works.update',$work->id)}}" enctype="multipart/form-data">
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
                                                    <label class="form-label">{{__('dashboard.work type')}}</label>
                                                    <select class="select2 form-control" name="parent" id="select2-theme">
                                                        <option value="">{{__('dashboard.principle work')}}</option>
                                                        <optgroup label="{{__('dashboard.for')}}">
                                                            @foreach($parents as $parent)

                                                                <option value="{{$parent->id}}" {{isset($work)&&$work->parent[1] == $parent->id?'selected':''}}>{{$parent->title}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="title_ar">{{__('dashboard.title'). __('dashboard.in arabic')}}</label>
                                                    <div class="position-relative has-icon-left">
                                                        <textarea  rows="5" id="contact-info-icon" class="form-control" name="title_ar" placeholder="{{__('dashboard.title'). __('dashboard.in arabic')}}">{{isset($work)?$work->title_ar:null}}</textarea>
                                                        <div class="form-control-position">
                                                            <i class="fa fa-pencil"></i>
                                                        </div>
                                                    </div>
                                                    @error('title_ar')
                                                    <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="password-icon">{{__('dashboard.title'). __('dashboard.in english')}}</label>
                                                    <div class="position-relative has-icon-left">
                                                        <textarea  rows="5" id="password-icon" class="form-control" name="title_en" placeholder="{{__('dashboard.title'). __('dashboard.in english')}}">{{isset($work)?$work->title_en:null}}</textarea>
                                                        <div class="form-control-position">
                                                            <i class="fa fa-pencil"></i>
                                                        </div>
                                                    </div>
                                                    @error('title_en')
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
                </dev>
            </div>
            @if(Route::is('admin.works.index'))
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{__('dashboard.our works')}}</h4>
                        </div>
                        @if(\Session::get('success'))
                            <x-dashboard.layouts.message />
                        @endif
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive overflow-auto">
                                    <table class="table table-striped " id="works-table">

                                        <thead>
                                        <tr>
                                            <th>{{__('dashboard.title')}}</th>
                                            <th>{{__('dashboard.table image')}}</th>
                                            <th>{{__('dashboard.type')}}</th>
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
    @if(Route::is('admin.works.index'))
        @section('script')
            <script>
                $(document).ready(function () {
                    $('#works-table').DataTable({
                        processing: true,
                        serverSide: true,
                        lengthMenu: [10, 20, 40, 60, 80, 100],
                        pageLength: 10,
                        ajax: {
                            url :"works",
                            headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                            data: function (d) {
                                d.page = 1;
                            }
                        },
                        "paging": true,
                        order : [[4,'desc']],
                        columns: [
                            {data: 'title', name: 'title'},
                            {data:'image',render:function(data){
                                    return  `<img width="100" height="80" src="${data}">`
                                }},
                            {data: 'parent', render:function (data) {
                                return Array.isArray(data)?data[0]:data
                                }},
                            {data: 'created_at', name:'created_at'},
                            {data: 'id',
                                render:function (data,two,three){
                                    let edit ='works/'+data+'/edit';

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

@php use App\Models\DeliveryMan; @endphp
<x-dashboard.layouts.master title="{{__('dashboard.deliveryMan list')}}">
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
                    <x-dashboard.layouts.breadcrumb now="{{__('dashboard.deliveryMan list')}}">
                    </x-dashboard.layouts.breadcrumb>
                    <!-- Column selectors with Export Options and print table -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{__('dashboard.filter')}}</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                                    <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="users-list-filter">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <label for="users-list-status">{{__('dashboard.table status')}}</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="delivery-men-list-status" name="status">
                                                    <option value="">All</option>
                                                    <option value="{{DeliveryMan::ACTIVE}}">{{DeliveryMan::getStatus(DeliveryMan::ACTIVE)}}</option>
                                                    <option value="{{DeliveryMan::INACTIVE}}">{{DeliveryMan::getStatus(DeliveryMan::INACTIVE)}}</option>
                                                    <option value="{{DeliveryMan::REJECTED}}">{{DeliveryMan::getStatus(DeliveryMan::REJECTED)}}</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <label for="users-list-status">{{__('dashboard.type')}}</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="delivery-men-work-for" name="workFor">
                                                    <option value="">All</option>
                                                    <option value="personal">{{__('dashboard.personal')}}</option>
                                                    <option value="company">{{__('dashboard.company')}}</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <label for="users-list-verified">{{__('dashboard.search')}}</label>
                                            <input type="text" name="filter" id="delivery-men-search-input" class="form-control" placeholder="{{__('dashboard.search for name, phone, email, and address')}}">
                                        </div>
                                    </div>
                                    <div class="row col-6">
                                        <button class="btn btn-primary" id="filter-delivery-men-submit">{{__('dashboard.search')}}</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <section id="column-selectors">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{__('dashboard.deliveryMan list')}}</h4>
                                    </div>
                                    @if(\Session::get('success'))
                                        <x-dashboard.layouts.message />
                                    @endif
                                    <div class="card-content">
                                        <div class="card-body card-dashboard">

                                            <div class="table-responsive overflow-auto">
                                                <table class="table table-striped " id="delivery-men-table">
                                                    <thead >
                                                    <tr class="text text-center">
                                                        <th>{{__('dashboard.table name')}}</th>
                                                        <th>{{__('dashboard.table phone')}}</th>
                                                        <th>{{__('dashboard.identity')}}</th>
                                                        <th>{{__('dashboard.license')}}</th>
                                                        <th>{{__('dashboard.type')}}</th>
                                                        <th>{{__('dashboard.company')}}</th>
                                                        <th>{{__('dashboard.table status')}}</th>
                                                        <th>{{__('dashboard.table create date')}}</th>
                                                        <th>{{__('dashboard.actions')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="text text-center ">
                                                    </tbody>
                                                </table>
                                            </div>
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
        <script>
            $(document).ready(function () {
                let deliveryMenTable = $('#delivery-men-table').DataTable({
                    processing: true,
                    serverSide: true,
                    lengthMenu: [10, 20, 40, 60, 80, 100],
                    pageLength: 10,
                    ajax: {
                        url :"deliveryMen",
                        headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                        data: function (d) {
                            d.page = 1;
                            d.status = $('#delivery-men-list-status').val();
                            d.workFor = $('#delivery-men-work-for').val();
                            d.filter = $('#delivery-men-search-input').val();
                        }
                    },
                    "paging": true,
                    order: [[8,'desc']],
                    columns: [
                        {data: 'user',render:function (data){
                            @if(auth()->user()->can('show delivery-man'))
                                return `<span><a href="deliveryMen/${data.id}/show">${data.name}</a></span>`;
                                @else
                                    return data.name;
                                @endif
                            }},
                        {data: 'user', render:function (data){
                            return data.phone
                            }},
                        {data: 'identity', name:'identity'},
                        {data: 'driving_license', name: 'driving_license',render:function (data) {
                                return `<img src="${data}" width="100" height="80" alt="driving license">`
                            }},
                        {data: 'type', name: 'type'},
                        {data: 'company_name', render:function (data){
                            if (data){
                                return data
                            }else{
                                return '-';
                            }
                            }},
                        {data: 'account_status', render:function (data) {
                                if (data == '1'){
                                    return `<span class="badge badge-success text-white" >ACTIVE</span>`
                                }
                                if (data == '2'){
                                    return `<span class="badge badge-secondary text-white">INACTIVE</span>`
                                }
                                if (data == '3'){
                                    return `<span class="badge badge-danger">REJECTED</span>`
                                }

                            }},
                        {data: 'created_at', name:'created_at'},
                        {data: 'id',
                            render:function (data,two,three){
                            @if(auth()->user()->can('edit delivery-man'))
                                let active ='deliveryMen/'+data+'/edit/{{\App\Models\DeliveryMan::ACTIVE}}';
                                let in_active ='deliveryMen/'+data+'/edit/{{\App\Models\DeliveryMan::INACTIVE}}';
                                let reject ='deliveryMen/'+data+'/edit/{{\App\Models\DeliveryMan::REJECTED}}';
                                let pending ='deliveryMen/'+data+'/edit/{{\App\Models\DeliveryMan::PENDING}}';
                                    return `<div class="btn-group">
                                    <div class="dropdown">
                                    <button class="btn btn-flat-dark dropdown-toggle mr-1 mb-1" type="button" id="dropdownMenuButton700" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{__('dashboard.actions')}}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton700">
                                <a class="dropdown-item" href="${active}"><i class="fa fa-check-circle mr-1"></i>{{__('dashboard.accept')}}</a>
                                <a class="dropdown-item" href="${in_active}"><i class="fa fa-minus-circle mr-1"></i>{{__('dashboard.in-active')}}</a>
                                <a class="dropdown-item" href="${reject}"><i class="fa fa-times-circle mr-1"></i>{{__('dashboard.decline')}}</a>
                                <a class="dropdown-item" href="${pending}"><i class="fa fa-question-circle mr-1"></i>{{__('dashboard.pending')}}</a>
                                </div>
                                </div>
                            </div>`;
                            @else
                                return '';
                            @endif
                            }

                        },
                    ]
                });

                $(document).on('click','#filter-delivery-men-submit',function (){
                    deliveryMenTable.ajax.reload()
                    let status = $('#delivery-men-list-status').val();
                    let search = $('#delivery-men-search-input').val();
                    let workFor = $('#delivery-men-work-for').val();
                    // let oldUrlExport = $('#customers-export').attr('href');
                    // let oldUrlPdf = $('#customers-print').attr('href');
                    // $('#customers-export').attr('href',oldUrlExport+'&status='+status+'&filter='+search);
                    // $('#customers-print').attr('href',oldUrlPdf+'&status='+status+'&filter='+search);

                    $('#delivery-men-list-status').val('');
                    $('#delivery-men-search-input').val('');
                    $('#delivery-men-work-for').val('');
                })
            });


        </script>
    @endsection
</x-dashboard.layouts.master>

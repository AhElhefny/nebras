<x-dashboard.layouts.master title="{{__('dashboard.users list')}}">
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
                    <x-dashboard.layouts.breadcrumb now="{{__('dashboard.users list')}}">
                    </x-dashboard.layouts.breadcrumb>

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
                                                    <select class="form-control" id="customers-list-status" name="status">
                                                        <option value="">All</option>
                                                        <option value="active">Active</option>
                                                        <option value="block">Blocked</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="users-list-verified">{{__('dashboard.search')}}</label>
                                                <input type="text" name="filter" id="customers-search-input" class="form-control" placeholder="{{__('dashboard.search for name, phone, email, and address')}}">
                                            </div>
                                        </div>
                                        <div class="row col-6">
                                            <button class="btn btn-primary" id="filter-customers-submit">{{__('dashboard.search')}}</button>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Column selectors with Export Options and print table -->
                    <section id="column-selectors">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{__('dashboard.users list')}}</h4>
                                    </div>
                                    @if(\Session::get('success'))
                                        <x-dashboard.layouts.message />
                                    @endif
                                    <div class="card-content">
                                        <div class="card-body card-dashboard">
                                            <div class="table-responsive overflow-auto">
                                               <div class="d-flex align-items-center ">
                                                   @can('add user')
                                                       <a href="{{route('admin.customers.create')}}"><button  class="mb-2 btn btn-primary"><i class="mr-1 feather icon-plus"></i>{{__('dashboard.add user')}}</button></a>
                                                   @endcan
                                                   <x-dashboard.exportPrintActions tableSlug="customers"/>
                                               </div>
                                                <table class="table table-striped " id="customers-table">
                                                    <thead >
                                                    <tr class="text text-center">
                                                        <th>{{__('dashboard.table name')}}</th>
                                                        <th>{{__('dashboard.table phone')}}</th>
                                                        <th>{{__('dashboard.table email')}}</th>
                                                        <th>{{__('dashboard.table address')}}</th>
                                                        <th>{{__('dashboard.orders count')}}</th>
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
               let customersTable = $('#customers-table').DataTable({
                    processing: true,
                    serverSide: true,
                    lengthMenu: [10, 20, 40, 60, 80, 100],
                    pageLength: 10,
                    ajax: {
                        url :"customers",
                        headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                        data: function (d) {
                            d.page = 1;
                            d.status = $('#customers-list-status').val();
                            d.filter = $('#customers-search-input').val();
                        }
                    },
                    "paging": true,
                    order: [[7,'desc']],
                    columns: [
                        {data: 'name', name:'name'},
                        {data: 'phone', name: 'phone'},
                        {data: 'email', name:'email'},
                        {data: 'address', name: 'address'},
                        {data: 'number_of_successful_order', name:'number_of_successful_order'},
                        {data: 'block', render:function(data){
                                return `<span class="badge badge-${data==1?'danger':'success'}">${data==1?'Blocked':'Active'}</span>`
                            }},
                        {data: 'created_at', name:'created_at'},
                        {data: 'id',
                            render:function (data,two,three){
                                let changeStatus ='customers/'+data+'/changeStatus';
                                let show ='customers/'+data;

                                @if(auth()->user()->can('edit user')||auth()->user()->can('show user'))
                                    return `<div class="btn-group">
                                    <div class="dropdown">
                                    <button class="btn btn-flat-dark dropdown-toggle mr-1 mb-1" type="button" id="dropdownMenuButton700" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{__('dashboard.actions')}}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton700">
                                @can('edit user')
                                    <a class="dropdown-item" href="${changeStatus}"><i class="fa fa-edit mr-1"></i>{{__('dashboard.change status')}}</a>
                                @endcan
                                @can('show user')
                                    <a class="dropdown-item" href="${show}"><i class="fa fa-eye mr-1"></i>{{__('dashboard.show')}}</a>
                                @endcan
                                </div>
                                </div>
                            </div>`;
                                @endif
                                return ''
                            }
                        },
                    ]
                });
                $(document).on('click','#filter-customers-submit',function (){
                    customersTable.ajax.reload()
                    let status = $('#customers-list-status').val();
                    let search = $('#customers-search-input').val();
                    let oldUrlExport = $('#customers-export').attr('href');
                    let oldUrlPdf = $('#customers-print').attr('href');
                    $('#customers-export').attr('href',oldUrlExport+'&status='+status+'&filter='+search);
                    $('#customers-print').attr('href',oldUrlPdf+'&status='+status+'&filter='+search);

                    $('#customers-list-status').val('');
                    $('#customers-search-input').val('');
                })

            });
        </script>
    @endsection
</x-dashboard.layouts.master>

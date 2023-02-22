<x-dashboard.layouts.master title="{{__('dashboard.review list')}}">
<!-- BEGIN: Content-->
<div class="app-content content">
     <div class="content-overlay"></div>
       <div class="header-navbar-shadow"></div>
         <div class="content-wrapper">
           <div class="content-header row">
           </div>
             <x-dashboard.layouts.breadcrumb now="{{__('dashboard.review list')}}">
            </x-dashboard.layouts.breadcrumb>
            <div class="col-12 mt-3">
                    <div class="card">
                       <div class="card-header">
                           <h4 class="card-title">{{__('dashboard.review list')}}</h4>
                      </div>
                      @if(\Session::get('success'))
                          <x-dashboard.layouts.message />
                      @endif
                     <div class="card-content">
                            <div class="card-body">
                                   <div class="table-responsive overflow-auto">
                                       <table class="table table-striped " id="review-table">
                                            <thead>
                                                 <a href="{{route('admin.review.create')}}"><button  class="mb-2 btn btn-primary"><i class="mr-1 feather icon-plus"></i>{{__('dashboard.add review')}}</button></a>
                                                    <tr>
                                                         <th>{{__('dashboard.table name')}}</th>
                                                         <th>{{__('dashboard.table review')}}</th>
                                                         <th>{{__('dashboard.amount')}}</th>
                                                         <th>{{__('dashboard.table image')}}</th>
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
       </div>
 </div>
<!-- END: Content-->
@section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>

            // window.jsPDF = window.jspdf.jsPDF;
            // window.html2canvas = html2canvas;
            $(document).ready(function () {
                $('#review-table').DataTable({
                    processing: true,
                    serverSide: true,
                    lengthMenu: [10, 20, 40, 60, 80, 100],
                    pageLength: 10,
                    ajax: {
                        url :"review",
                        headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                        data: function (d) {
                            d.page = 1;
                        }
                    },
                    "paging": true,
                    order : [[2,'desc']],
                    columns: [
                        {data: 'name', name: 'name'},
                        {data: 'review', name:'review'},
                        {data: 'reviews', name: 'reviews'},
                        {data:'image',render:function(data){
                          return  `<img width="100" height="80" src="${data}">`
                        }},

                        {data: 'created_at', name:'created_at'},
                        {data: 'id',
                            render:function (data,two,three){
                                let edit ='review/'+data+'/edit';

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
</x-dashboard.layouts.master>

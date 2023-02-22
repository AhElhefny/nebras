@php use App\Models\OrderStatus;use App\Models\PaymentMethod; @endphp
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
                        <label for="users-list-status">{{__('dashboard.payment status')}}</label>
                        <fieldset class="form-group">
                            <select class="form-control" id="orders-list-payment-status" name="paymentStatus">
                                <option value="">All</option>
                                <option value="paid">{{__('dashboard.paid')}}</option>
                                <option value="unpaid">{{__('dashboard.un-paid')}}</option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <label for="users-list-status">{{__('dashboard.payment method')}}</label>
                        <fieldset class="form-group">
                            <select class="form-control" id="orders-list-payment-method" name="paymentMethod">
                                <option value="">All</option>
                                @foreach(PaymentMethod::active()->get() as $method)
                                    <option value="{{$method->id}}">{{$method->method}}</option>
                                @endforeach
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <label for="users-list-status">{{__('dashboard.table status')}}</label>
                        <fieldset class="form-group">
                            <select class="form-control" id="orders-list-status" name="status">
                                <option value="">All</option>
                                @foreach(OrderStatus::active()->get() as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <label for="users-list-verified">{{__('dashboard.table create date')}}</label>
                        <input type="date" name="date" id="orders-filter-date" class="form-control"
                               max="{{date('Y-m-d')}}">
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <label for="users-list-verified">{{__('dashboard.search')}}</label>
                        <input type="search" name="filter" id="orders-filter-input" class="form-control"
                               placeholder="{{__('dashboard.search for order number, and customer')}}">
                    </div>
                </div>
                <div class="row col-6 mt-2">
                    <button class="btn btn-primary" id="filter-orders-submit">{{__('dashboard.search')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>

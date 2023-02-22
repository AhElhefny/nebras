@php use Illuminate\Support\Facades\App; @endphp
<x-dashboard.layouts.master title="{{__('dashboard.dashboard')}}">
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                <section id="dashboard-analytics">
                    <div class="row">
                        <x-dashboard.home.welcome />
                    </div>
                    <div class="row">
                        <x-dashboard.home.countable :count="$services" color="primary" slug="{{__('dashboard.services')}}" />
                        <x-dashboard.home.countable :count="$works" color="danger" slug="{{__('dashboard.our works')}}" />
                        <x-dashboard.home.countable :count="$media" color="success" slug="{{__('dashboard.media')}}" />
                        <x-dashboard.home.countable :count="$groups" color="warning" slug="{{__('dashboard.groups')}}" />
                   </div>
                </section>
            </div>
        </div>
    </div>

</x-dashboard.layouts.master>

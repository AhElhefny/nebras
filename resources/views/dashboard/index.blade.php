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
                        <x-dashboard.home.usersGain :users="$users" />
                   </div>
                </section>
            </div>
        </div>
    </div>

</x-dashboard.layouts.master>

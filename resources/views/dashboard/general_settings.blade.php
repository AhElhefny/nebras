@php use App\Models\GeneralSetting; @endphp
<x-dashboard.layouts.master title="{{__('dashboard.general settings')}}">
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
                    <x-dashboard.layouts.breadcrumb now="{{__('dashboard.manage general settings')}}">
                    </x-dashboard.layouts.breadcrumb>
                    <!-- Column selectors with Export Options and print table -->
                    <section id="column-selectors">
                        @if(\Session::get('success'))
                            <x-dashboard.layouts.message />
                        @endif
                        <div class="row">
                            <div class="col-2">
                                <div class="card position-fixed">
                                    <div class="card-content">
                                        <div class="card-body ">
                                            <div class="main-menu-content h-auto">
                                                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                                                    <li class="mb-2"><a href="#general-settings"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">{{__('dashboard.general settings')}}</span></a>
                                                    </li>
{{--                                                    <li class="mb-2"><a href="#navbar"><i class="feather icon-navigation"></i><span class="menu-title" data-i18n="Dashboard">{{__('dashboard.navbar')}}</span></a>--}}
{{--                                                    </li>--}}
                                                    <li class="mb-2"><a href="#titles"><i class="feather icon-tablet"></i><span class="menu-title" data-i18n="Dashboard">{{__('dashboard.sections titles')}}</span></a>
                                                    </li>
                                                    <li class="mb-2"><a href="#backgrounds"><i class="feather icon-image"></i><span class="menu-title" data-i18n="Dashboard">{{__('dashboard.sections background')}}</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-10" >
                                <x-dashboard.generalSettings.websiteSettings />
{{--                                <x-dashboard.generalSettings.navbarSettings />--}}
                                <x-dashboard.generalSettings.titlesSettings />
                                <x-dashboard.generalSettings.backgroundsSettings />
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

</x-dashboard.layouts.master>

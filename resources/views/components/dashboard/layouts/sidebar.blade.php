@php use App\Models\User; @endphp
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
               <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('admin.home')}}">
                     <div class="">
                          <img style="width: 40px; {{app()->getLocale()=='ar'?'transform: scaleX(-1);':''}}" src="{{asset('dashboardAssets/app-assets/images/logo/N-LOGO.png')}}">
                     </div>
                      <h2 class="brand-text mb-0">{{app()->getLocale()=='ar'?'نبراس':'Nebras'}}</h2>
                 </a></li>
               <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{Route::is('admin.home')? 'active':''}}"><a href="{{route('admin.home')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">{{__('dashboard.dashboard')}}</span></a>
            </li>
            @if(auth()->user()->can('roles'))
            <li class=" navigation-header"><span>{{__('dashboard.main settings')}}</span></li>
            @endif
{{--            @can('admins')--}}
{{--                <li class=" nav-item"><a href="#"><i class="fa fa-male fa-2x"></i>  <span class="menu-title" data-i18n="User">{{__('dashboard.admins')}}</span></a>--}}
{{--                    <ul class="menu-content">--}}
{{--                        <li class=""><a href="{{route('admin.admins.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">{{__('dashboard.admins list')}}</span></a>--}}
{{--                        @can('add admin')--}}
{{--                        <li class=""><a href="{{route('admin.admins.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">{{__('dashboard.add admin')}}</span></a>--}}
{{--                            @endcan--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            @endcan--}}

            {{--@can('roles')
                <li class=" nav-item"><a href="#"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Data List">{{__('dashboard.roles')}}</span></a>
                    <ul class="menu-content">
                        @can('roles')
                        <li class="{{Route::is('admin.roles.index')? 'active':''}}"><a href="{{route('admin.roles.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">{{__('dashboard.roles list')}}</span></a>
                        </li>
                        @endcan
                        @can('add role')
                        <li class="{{Route::is('admin.roles.create')? 'active':''}}"><a href="{{route('admin.roles.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Thumb View">{{__('dashboard.add roles')}}</span></a>
                        </li>
                        @endcan
                    </ul>
                </li>
            @endcan--}}

{{--            @can('users')--}}
{{--                <li class=" nav-item"><a href="#"><i class="feather icon-users"></i><span class="menu-title" data-i18n="User">{{__('dashboard.users')}}</span></a>--}}
{{--                    <ul class="menu-content">--}}
{{--                        <li class="{{Route::is('admin.customers.index')? 'active':''}}"><a href="{{route('admin.customers.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">{{__('dashboard.users list')}}</span></a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            @endcan--}}

            <li class=" nav-item"><a href="#"><i class="feather icon-briefcase"></i><span class="menu-title" data-i18n="Ecommerce">{{__('dashboard.services')}}</span></a>
                <ul class="menu-content">
                     <li class="{{Route::is('admin.services.index')? 'active':''}}"><a href="{{route('admin.services.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Wish List">{{__('dashboard.service list')}}</span></a>
                     </li>
                     <li class="{{Route::is('admin.services.create')? 'active':''}}"><a href="{{route('admin.services.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Wish List">{{__('dashboard.add service')}}</span></a>
                     </li>
                </ul>
            </li>

             <li class=" nav-item"><a href="#"><i class="feather icon-users"></i><span class="menu-title" data-i18n="User">{{__('dashboard.team')}}</span></a>
                 <ul class="menu-content">
                      <li class="{{Route::is('admin.teams.index')? 'active':''}}"><a href="{{route('admin.teams.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">{{__('dashboard.team list')}}</span></a>
                     </li>
                      <li class="{{Route::is('admin.teams.create')? 'active':''}}"><a href="{{route('admin.teams.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Wish List">{{__('dashboard.add team')}}</span></a>
                     </li>
                 </ul>
             </li>

              <li class=" nav-item"><a href="#"><i class="feather icon-briefcase"></i><span class="menu-title" data-i18n="Ecommerce">{{__('dashboard.media')}}</span></a>
                   <ul class="menu-content">
                       <li class="{{Route::is('admin.media.index')? 'active':''}}"><a href="{{route('admin.media.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Wish List">{{__('dashboard.media')}}</span></a>
                       </li>
                       <li class="{{Route::is('admin.media.create')? 'active':''}}"><a href="{{route('admin.media.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Wish List">{{__('dashboard.add media')}}</span></a>
                       </li>
                  </ul>
              </li>


             <li class=" nav-item"><a href="#"><i class="feather icon-filter"></i><span class="menu-title" data-i18n="User">{{__('dashboard.our works')}}</span></a>
                  <ul class="menu-content">
                       <li class="{{Route::is('admin.works.index')? 'active':''}}"><a href="{{route('admin.works.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">{{__('dashboard.our works')}}</span></a>
                       </li>
                  </ul>
             </li>

             <li class=" nav-item"><a href="#"><i class="feather icon-users"></i><span class="menu-title" data-i18n="User">{{__('dashboard.review')}}</span></a>
                 <ul class="menu-content">
                      <li class="{{Route::is('admin.review.index')? 'active':''}}"><a href="{{route('admin.review.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">{{__('dashboard.review')}}</span></a>
                     </li>
                      <li class="{{Route::is('admin.review.create')? 'active':''}}"><a href="{{route('admin.review.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Wish List">{{__('dashboard.add review')}}</span></a>
                     </li>
                 </ul>
             </li>


{{--            <li class=" nav-item"><a href="#"><i class="feather icon-filter"></i><span class="menu-title" data-i18n="User">{{__('dashboard.our works')}}</span></a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li class="{{Route::is('admin.works.index')? 'active':''}}"><a href="{{route('admin.works.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">{{__('dashboard.our works')}}</span></a>--}}
{{--                   </li>--}}
{{--                </ul>--}}
{{--            </li>--}}


            <li class=" navigation-header"><span></span>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-grid"></i><span class="menu-title" data-i18n="Ecommerce">{{__('dashboard.groups')}}</span></a>
                <ul class="menu-content">
                    <li class="{{Route::is('admin.groups.index')? 'active':''}}"><a href="{{route('admin.groups.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Wish List">{{__('dashboard.manage groups')}}</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-briefcase"></i><span class="menu-title" data-i18n="Ecommerce">{{__('dashboard.manage about-us')}}</span></a>
                <ul class="menu-content">
                    <li class="{{Route::is('admin.aboutUs.manage')? 'active':''}}"><a href="{{route('admin.aboutUs.manage')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Wish List">{{__('dashboard.manage about-us')}}</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-image"></i><span class="menu-title" data-i18n="Ecommerce">{{__('dashboard.header')}}</span></a>
                <ul class="menu-content">
                    <li class="{{Route::is('admin.header.manage.slider')? 'active':''}}"><a href="{{route('admin.header.manage.slider')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Wish List">{{__('dashboard.manage slider')}}</span></a>
                    </li>
                    <li class="{{Route::is('admin.header.manage.feature')? 'active':''}}"><a href="{{route('admin.header.manage.feature')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Wish List">{{__('dashboard.manage feature')}}</span></a>
                    </li>

                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Ecommerce">{{__('dashboard.general settings')}}</span></a>
                <ul class="menu-content">
                    <li class="{{Route::is('admin.generalSetting.index')? 'active':''}}"><a href="{{route('admin.generalSetting.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Wish List">{{__('dashboard.manage general settings')}}</span></a>
                    </li>
                </ul>
            </li>
            @if(auth()->user()->type == User::ADMIN)
                <li class=" nav-item"><a href="#"><i class="feather icon-phone"></i><span class="menu-title" data-i18n="Content">   {{__('dashboard.contact-us')}}</span></a>
                    <ul class="menu-content">
                        <li class="{{Route::is('admin.contact.index')? 'active':''}}"><a href="{{route('admin.contact.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Grid">{{__('dashboard.contact-us list')}}</span></a>
                        </li>
                        <li class="{{Route::is('admin.contact.manage')? 'active':''}}"><a href="{{route('admin.contact.manage')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Grid">{{__('dashboard.manage contact-us')}}</span></a>
                        </li>
                    </ul>
                </li>

            @endif
        </ul>
    </div>
</div>

<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/dashboard" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/icon.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ $profileApp->app_logo ? URL::asset('build/images/' . $profileApp->app_logo) : URL::asset('build/images/logolcks.png') }}"
                    alt="" height="30">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="/dashboard" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/icon-blue.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ $profileApp->app_logo ? URL::asset('build/images/' . $profileApp->app_logo) : URL::asset('build/images/logolcks.png') }}"
                    alt="" height="30">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                        <i class="ri-home-wifi-line"></i> <span>@lang('translation.homepage')</span>
                    </a>
                </li>
                @foreach (menus() as $category => $menus)
                    @php
                        $showCategory = true;
                    @endphp
                    @foreach ($menus as $mm)
                        @can('read ' . $mm->url)
                            @if ($showCategory)
                                <li class="menu-title"><span>@lang('translation.' . $category)</span></li>
                                @php
                                    $showCategory = false;
                                @endphp
                            @endif

                            <li class="nav-item">
                                @if (count($mm->subMenus))
                                    <a class="nav-link menu-link {{ Request::is($mm->url . '*') ? 'active open' : '' }}"
                                        href="#sidebar{{ Str::slug($mm->name) }}" data-bs-toggle="collapse" role="button"
                                        aria-expanded="{{ Request::is($mm->url . '*') ? 'true' : 'false' }}"
                                        aria-controls="sidebar{{ Str::slug($mm->name) }}">
                                        <i class="ri-{{ $mm->icon }}-line"></i>
                                        <span>@lang('translation.' . Str::slug($mm->name))</span>
                                    </a>
                                    <div class="collapse menu-dropdown {{ Request::is($mm->url . '*') ? 'show' : '' }}"
                                        id="sidebar{{ Str::slug($mm->name) }}">
                                        <ul class="nav nav-sm flex-column">
                                            @foreach ($mm->subMenus as $sm)
                                                @can('read ' . $sm->url)
                                                    <li class="nav-item">
                                                        @if (count($sm->subMenus))
                                                            <a class="nav-link {{ Request::is($sm->url . '*') ? 'active open' : '' }}"
                                                                href="#sidebar{{ Str::slug($sm->name) }}"
                                                                data-bs-toggle="collapse" role="button"
                                                                aria-expanded="{{ Request::is($sm->url . '*') ? 'true' : 'false' }}"
                                                                aria-controls="sidebar{{ Str::slug($sm->name) }}">
                                                                @lang('translation.' . Str::slug($sm->name))
                                                            </a>
                                                            <div class="collapse menu-dropdown {{ Request::is($sm->url . '*') ? 'show' : '' }}"
                                                                id="sidebar{{ Str::slug($sm->name) }}">
                                                                <ul class="nav nav-sm flex-column">
                                                                    @foreach ($sm->subMenus as $csm)
                                                                        @can('read ' . $csm->url)
                                                                            <li class="nav-item">
                                                                                @if (count($csm->subMenus))
                                                                                    <a class="nav-link {{ Request::is($csm->url . '*') ? 'active open' : '' }}"
                                                                                        href="#sidebar{{ Str::slug($csm->name) }}"
                                                                                        data-bs-toggle="collapse" role="button"
                                                                                        aria-expanded="{{ Request::is($csm->url . '*') ? 'true' : 'false' }}"
                                                                                        aria-controls="sidebar{{ Str::slug($csm->name) }}">
                                                                                        @lang('translation.' . Str::slug($csm->name))
                                                                                    </a>
                                                                                    <div class="collapse menu-dropdown {{ Request::is($csm->url . '*') ? 'show' : '' }}"
                                                                                        id="sidebar{{ Str::slug($csm->name) }}">
                                                                                        <ul class="nav nav-sm flex-column">
                                                                                            @foreach ($csm->subMenus as $ccsm)
                                                                                                @can('read ' . $ccsm->url)
                                                                                                    <li class="nav-item">
                                                                                                        <a href="{{ url($ccsm->url) }}"
                                                                                                            class="nav-link {{ Request::is($ccsm->url . '*') ? 'active' : '' }}">
                                                                                                            @lang('translation.' . Str::slug($ccsm->name))
                                                                                                        </a>
                                                                                                    </li>
                                                                                                @endcan
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </div>
                                                                                @else
                                                                                    <a href="{{ url($csm->url) }}"
                                                                                        class="nav-link {{ Request::is($csm->url . '*') ? 'active' : '' }}">
                                                                                        @lang('translation.' . Str::slug($csm->name))
                                                                                    </a>
                                                                                @endif
                                                                            </li>
                                                                        @endcan
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @else
                                                            <a href="{{ url($sm->url) }}"
                                                                class="nav-link {{ Request::is($sm->url . '*') ? 'active' : '' }}">
                                                                @lang('translation.' . Str::slug($sm->name))
                                                            </a>
                                                        @endif
                                                    </li>
                                                @endcan
                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                    <a class="nav-link menu-link {{ Request::is($mm->url . '*') ? 'active' : '' }}"
                                        href="{{ url($mm->url) }}">
                                        <i class="ri-{{ $mm->icon }}-line"></i>
                                        <span>@lang('translation.' . Str::slug($mm->name))</span>
                                    </a>
                                @endif
                            </li>
                        @endcan
                    @endforeach
                @endforeach
                <li class="menu-title"><span>@lang('translation.about')</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('about*') ? 'active' : '' }}" href="/about">
                        <i class="ri-question-line"></i> <span>@lang('translation.about')</span>
                    </a>
                </li>
                @php
                    $isMainMenuActive = App\Helpers\Fitures::isFiturAktif('main-menu-template');
                @endphp

                @if ($isMainMenuActive)
                    @role('master')
                        @include('layouts.mainmenu.menu')
                        @include('layouts.mainmenu.page')
                        @include('layouts.mainmenu.component')
                    @endrole
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

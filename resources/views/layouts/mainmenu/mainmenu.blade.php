<li class="nav-item">
    <a class="nav-link menu-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
        <i class="ri-home-wifi-line"></i> <span>@lang('translation.homepage')</span>
    </a>
</li>
<li class="menu-title"><span>@lang('translation.menu')</span></li>
<li class="nav-item">
    <a class="nav-link menu-link {{ Request::is('apps_*') ? 'active open' : '' }}" href="#sidebarApps"
        data-bs-toggle="collapse" role="button" aria-expanded="{{ Request::is('apps_*') ? 'true' : 'false' }}"
        aria-controls="sidebarApps">
        <i class="ri-apps-2-line"></i> <span>@lang('translation.apps')</span>
    </a>
    <div class="collapse menu-dropdown {{ Request::is('apps_*') ? 'show' : '' }}" id="sidebarApps">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/apps_calendar"
                    class="nav-link {{ Request::is('apps_calendar') ? 'active' : '' }}">@lang('translation.calendar')</a>
            </li>
            <li class="nav-item">
                <a href="#sidebarEmail" class="nav-link {{ Request::is('apps_email_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('apps_email_*') ? 'true' : 'false' }}" aria-controls="sidebarEmail">
                    @lang('translation.email')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('apps_email_*') ? 'show' : '' }}" id="sidebarEmail">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/apps_email_mailbox"
                                class="nav-link {{ Request::is('apps_email_mailbox') ? 'active' : '' }}">@lang('translation.mailbox')</a>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebaremailTemplates"
                                class="nav-link {{ Request::is('apps_email_template_*') ? 'active open' : '' }}"
                                data-bs-toggle="collapse" role="button"
                                aria-expanded="{{ Request::is('apps_email_template_*') ? 'true' : 'false' }}"
                                aria-controls="sidebaremailTemplates">
                                @lang('translation.email-templates')
                            </a>
                            <div class="collapse menu-dropdown {{ Request::is('apps_email_template_*') ? 'show' : '' }}"
                                id="sidebaremailTemplates">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="/apps_email_template_basic"
                                            class="nav-link {{ Request::is('apps_email_template_basic') ? 'active' : '' }}">
                                            @lang('translation.basic-action') </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/apps_email_template_ecommerce"
                                            class="nav-link {{ Request::is('apps_email_template_ecommerce') ? 'active' : '' }}">
                                            @lang('translation.ecommerce-action') </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#sidebarEcommerce" class="nav-link {{ Request::is('apps_ecommerce_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('apps_ecommerce_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarEcommerce">@lang('translation.ecommerce')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('apps_ecommerce_*') ? 'show' : '' }}"
                    id="sidebarEcommerce">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/apps_ecommerce_products"
                                class="nav-link {{ Request::is('apps_ecommerce_products') ? 'active' : '' }}">@lang('translation.products')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_ecommerce_product_details"
                                class="nav-link {{ Request::is('apps_ecommerce_product_details') ? 'active' : '' }}">@lang('translation.product-Details')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_ecommerce_add_product"
                                class="nav-link {{ Request::is('apps_ecommerce_add_product') ? 'active' : '' }}">@lang('translation.create-product')</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
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
                                                href="#sidebar{{ Str::slug($sm->name) }}" data-bs-toggle="collapse"
                                                role="button"
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
                                                                                            class="nav-link {{ Request::is($ccsm->url) ? 'active' : '' }}">
                                                                                            @lang('translation.' . Str::slug($ccsm->name))
                                                                                        </a>
                                                                                    </li>
                                                                                @endcan
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @else
                                                                    <a href="{{ url($csm->url) }}"
                                                                        class="nav-link {{ Request::is($csm->url) ? 'active' : '' }}">
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
                                                class="nav-link {{ Request::is($sm->url) ? 'active' : '' }}">
                                                @lang('translation.' . Str::slug($sm->name))
                                            </a>
                                        @endif
                                    </li>
                                @endcan
                            @endforeach
                        </ul>
                    </div>
                @else
                    <a class="nav-link menu-link {{ Request::is($mm->url) ? 'active' : '' }}"
                        href="{{ url($mm->url) }}">
                        <i class="ri-{{ $mm->icon }}-line"></i>
                        <span>@lang('translation.' . Str::slug($mm->name))</span>
                    </a>
                @endif
            </li>
        @endcan
    @endforeach
@endforeach




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
                                        <a href="{{ url($sm->url) }}"
                                            class="nav-link {{ Request::is($sm->url) ? 'active' : '' }}">
                                            @lang('translation.' . Str::slug($sm->name))
                                        </a>
                                    </li>
                                @endcan
                            @endforeach
                        </ul>
                    </div>
                @else
                    <a class="nav-link menu-link {{ Request::is($mm->url) ? 'active' : '' }}"
                        href="{{ url($mm->url) }}">
                        <i class="ri-{{ $mm->icon }}-line"></i>
                        <span>@lang('translation.' . Str::slug($mm->name))</span>
                    </a>
                @endif
            </li>
        @endcan
    @endforeach
@endforeach

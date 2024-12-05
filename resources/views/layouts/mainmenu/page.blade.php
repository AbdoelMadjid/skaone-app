<li class="menu-title"><i class="ri-more-fill"></i> <span>@lang('translation.pages')</span></li>

<li class="nav-item">
    <a class="nav-link menu-link {{ Request::is('auth_*') ? 'active open' : '' }}" href="#sidebarAuth"
        data-bs-toggle="collapse" role="button" aria-expanded="{{ Request::is('auth_*') ? 'true' : 'false' }}"
        aria-controls="sidebarAuth">
        <i class="ri-account-circle-line"></i> <span>@lang('translation.authentication')</span>
    </a>
    <div class="collapse menu-dropdown {{ Request::is('auth_*') ? 'show' : '' }}" id="sidebarAuth">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="#sidebarSignIn" class="nav-link {{ Request::is('auth_signin_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('apps_invoices_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarSignIn">@lang('translation.signin')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('auth_signin_*') ? 'show' : '' }}" id="sidebarSignIn">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/auth_signin_basic" target="_blank"
                                class="nav-link {{ Request::is('auth_signin_basic') ? 'active' : '' }}">@lang('translation.basic')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/auth_signin_cover" target="_blank"
                                class="nav-link {{ Request::is('auth_signin_cover') ? 'active' : '' }}">@lang('translation.cover')</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#sidebarSignUp" class="nav-link {{ Request::is('auth_signup_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('auth_signup_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarSignUp">@lang('translation.signup')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('auth_signup_*') ? 'show' : '' }}"
                    id="sidebarSignUp">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/auth_signup_basic" target="_blank"
                                class="nav-link {{ Request::is('auth_signup_basic') ? 'active' : '' }}">@lang('translation.basic')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/auth_signup_cover" target="_blank"
                                class="nav-link {{ Request::is('auth_signup_cover') ? 'active' : '' }}">@lang('translation.cover')</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="#sidebarResetPass"
                    class="nav-link {{ Request::is('auth_pass_reset_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('auth_pass_reset_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarResetPass">@lang('translation.password-reset')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('auth_pass_reset_*') ? 'show' : '' }}"
                    id="sidebarResetPass">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/auth_pass_reset_basic" target="_blank"
                                class="nav-link {{ Request::is('auth_pass_reset_basic') ? 'active' : '' }}">@lang('translation.basic')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/auth_pass_reset_cover" target="_blank"
                                class="nav-link {{ Request::is('auth_pass_reset_cover') ? 'active' : '' }}">@lang('translation.cover')</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="#sidebarchangePass"
                    class="nav-link {{ Request::is('auth_pass_change_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('auth_pass_change_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarchangePass">@lang('translation.password-create')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('auth_pass_change_*') ? 'show' : '' }}"
                    id="sidebarchangePass">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/auth_pass_change_basic" target="_blank"
                                class="nav-link {{ Request::is('auth_pass_change_basic') ? 'active' : '' }}">@lang('translation.basic')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/auth_pass_change_cover" target="_blank"
                                class="nav-link {{ Request::is('auth_pass_change_cover') ? 'active' : '' }}">@lang('translation.cover')</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="#sidebarLockScreen"
                    class="nav-link {{ Request::is('auth_lockscreen_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('auth_lockscreen_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarLockScreen">@lang('translation.lock-screen')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('auth_lockscreen_*') ? 'show' : '' }}"
                    id="sidebarLockScreen">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/auth_lockscreen_basic" target="_blank"
                                class="nav-link {{ Request::is('auth_lockscreen_basic') ? 'active' : '' }}">@lang('translation.basic')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/auth_lockscreen_cover" target="_blank"
                                class="nav-link {{ Request::is('auth_lockscreen_cover') ? 'active' : '' }}">@lang('translation.cover')</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="#sidebarLogout" class="nav-link {{ Request::is('auth_logout_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('auth_logout_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarLogout">@lang('translation.logout')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('auth_logout_*') ? 'show' : '' }}"
                    id="sidebarLogout">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/auth_logout_basic" target="_blank"
                                class="nav-link {{ Request::is('auth_logout_basic') ? 'active' : '' }}">@lang('translation.basic')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/auth_logout_cover" target="_blank"
                                class="nav-link {{ Request::is('auth_logout_cover') ? 'active' : '' }}">@lang('translation.cover')</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="#sidebarSuccessMsg"
                    class="nav-link {{ Request::is('auth_success_msg_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('auth_success_msg_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarSuccessMsg">@lang('translation.success-message')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('auth_success_msg_*') ? 'show' : '' }}"
                    id="sidebarSuccessMsg">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/auth_success_msg_basic" target="_blank"
                                class="nav-link {{ Request::is('auth_success_msg_basic') ? 'active' : '' }}">@lang('translation.basic')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/auth_success_msg_cover" target="_blank"
                                class="nav-link {{ Request::is('auth_success_msg_cover') ? 'active' : '' }}">@lang('translation.cover')</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#sidebarTwoStep" class="nav-link {{ Request::is('auth_twostep_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('auth_twostep_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarTwoStep">@lang('translation.two-step-verification')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('auth_twostep_*') ? 'show' : '' }}"
                    id="sidebarTwoStep">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/auth_twostep_basic" target="_blank"
                                class="nav-link {{ Request::is('auth_twostep_basic') ? 'active' : '' }}">@lang('translation.basic')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/auth_twostep_cover" target="_blank"
                                class="nav-link {{ Request::is('auth_twostep_cover') ? 'active' : '' }}">@lang('translation.cover')</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#sidebarErrors" class="nav-link {{ Request::is('auth_error_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('auth_error_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarErrors">@lang('translation.errors')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('auth_error_*') ? 'show' : '' }}"
                    id="sidebarErrors">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/auth_error_404_basic" target="_blank"
                                class="nav-link {{ Request::is('auth_error_404_basic') ? 'active' : '' }}">@lang('translation.404-basic')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/auth_error_404_cover" target="_blank"
                                class="nav-link {{ Request::is('auth_error_404_cover') ? 'active' : '' }}">@lang('translation.404-cover')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/auth_error_404_alt" target="_blank"
                                class="nav-link {{ Request::is('auth_error_404_alt') ? 'active' : '' }}">@lang('translation.404-alt')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/auth_error_500" target="_blank"
                                class="nav-link {{ Request::is('auth_error_500') ? 'active' : '' }}">@lang('translation.500')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/auth_error_offline" target="_blank"
                                class="nav-link {{ Request::is('auth_error_offline') ? 'active' : '' }}">@lang('translation.offline-page')</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link menu-link {{ Request::is('pages_*') ? 'active open' : '' }}" href="#sidebarPages"
        data-bs-toggle="collapse" role="button" aria-expanded="{{ Request::is('pages_*') ? 'true' : 'false' }}"
        aria-controls="sidebarPages">
        <i class="ri-pages-line"></i> <span>@lang('translation.pages')</span>
    </a>
    <div class="collapse menu-dropdown {{ Request::is('pages_*') ? 'show' : '' }}" id="sidebarPages">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/pages_starter"
                    class="nav-link {{ Request::is('pages_starter') ? 'active' : '' }}">@lang('translation.starter')</a>
            </li>
            <li class="nav-item">
                <a href="#sidebarProfile" class="nav-link {{ Request::is('pages_profile_') ? 'active' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('pages_profile_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarProfile">@lang('translation.profile')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('pages_profile_*') ? 'show' : '' }}"
                    id="sidebarProfile">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/pages_profile_basic"
                                class="nav-link {{ Request::is('pages_profile_basic') ? 'active' : '' }}">@lang('translation.simple-page')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/pages_profile_settings"
                                class="nav-link {{ Request::is('pages_profile_settings') ? 'active' : '' }}">@lang('translation.settings')</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="/pages_team"
                    class="nav-link {{ Request::is('pages_team') ? 'active' : '' }}">@lang('translation.team')</a>
            </li>
            <li class="nav-item">
                <a href="/pages_timeline"
                    class="nav-link {{ Request::is('pages_timeline') ? 'active' : '' }}">@lang('translation.timeline')</a>
            </li>
            <li class="nav-item">
                <a href="/pages_faqs"
                    class="nav-link {{ Request::is('pages_faqs') ? 'active' : '' }}">@lang('translation.faqs')</a>
            </li>
            <li class="nav-item">
                <a href="/pages_pricing"
                    class="nav-link {{ Request::is('pages_pricing') ? 'active' : '' }}">@lang('translation.pricing')</a>
            </li>
            <li class="nav-item">
                <a href="/pages_gallery"
                    class="nav-link {{ Request::is('pages_gallery') ? 'active' : '' }}">@lang('translation.gallery')</a>
            </li>
            <li class="nav-item">
                <a href="/pages_maintenance"
                    class="nav-link {{ Request::is('pages_maintenance') ? 'active' : '' }}">@lang('translation.maintenance')</a>
            </li>
            <li class="nav-item">
                <a href="/pages_coming_soon"
                    class="nav-link {{ Request::is('pages_coming_soon') ? 'active' : '' }}">@lang('translation.coming-soon')</a>
            </li>
            <li class="nav-item">
                <a href="/pages_sitemap"
                    class="nav-link {{ Request::is('pages_sitemap') ? 'active' : '' }}">@lang('translation.sitemap')</a>
            </li>
            <li class="nav-item">
                <a href="/pages_search_results"
                    class="nav-link {{ Request::is('pages_search_results') ? 'active' : '' }}">@lang('translation.search-results')</a>
            </li>
            <li class="nav-item">
                <a href="/pages_privacy_policy"
                    class="nav-link {{ Request::is('pages_privacy_policy') ? 'active' : '' }}">@lang('translation.privacy-policy')</a>
            </li>
            <li class="nav-item">
                <a href="/pages_term_conditions"
                    class="nav-link {{ Request::is('pages_term_conditions') ? 'active' : '' }}">@lang('translation.term-conditions')</a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link menu-link {{ Request::is('landing_*') ? 'active open' : '' }}" href="#sidebarLanding"
        data-bs-toggle="collapse" role="button" aria-expanded="{{ Request::is('landing_*') ? 'true' : 'false' }}"
        aria-controls="sidebarLanding">
        <i class="ri-rocket-line"></i> <span>@lang('translation.landing')</span>

    </a>
    <div class="collapse menu-dropdown {{ Request::is('landing_*') ? 'show' : '' }}" id="sidebarLanding">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/landing_basic" class="nav-link {{ Request::is('landing_basic') ? 'active' : '' }}">
                    @lang('translation.one-page') </a>
            </li>
            <li class="nav-item">
                <a href="/landing_nft" class="nav-link {{ Request::is('landing_nft') ? 'active' : '' }}">
                    @lang('translation.nft-landing') </a>
            </li>
            <li class="nav-item">
                <a href="/landing_job"
                    class="nav-link {{ Request::is('landing_job') ? 'active' : '' }}">@lang('translation.job')</a>
            </li>
        </ul>
    </div>
</li>

<header id="js-header" class="u-header u-header--static u-header--show-hide u-header--change-appearance u-shadow-v19"
    data-header-fix-moment="500" data-header-fix-effect="slide">
    <div class="u-header__section g-bg-white g-transition-0_5 u-shadow-v19" data-header-fix-moment-exclude="g-mt-0"
        data-header-fix-moment-classes="g-mt-minus-70 g-mt-minus-69--md">
        <!-- Topbar -->
        <div class="g-bg-main">
            <div class="container g-py-5">
                @include('layouts.skaonewelcome.welcome-menu-head')
            </div>
        </div>
        <!-- End Topbar -->

        <div class="container">
            <!-- Nav -->
            <nav class="js-mega-menu navbar navbar-expand-lg g-px-0 g-py-5 g-py-0--lg">
                <!-- Logo -->
                <a class="navbar-brand g-max-width-170 g-max-width-200--lg" href="/">
                    <img class="img-fluid g-hidden-lg-down" src="{{ URL::asset('build/assets/img/logo/logo.png') }}"
                        alt="Logo">
                    <img class="img-fluid g-width-80 g-hidden-md-down g-hidden-xl-up"
                        src="{{ URL::asset('build/assets/img/logo/logo-mini.png') }}" alt="Logo">
                    <img class="img-fluid g-hidden-lg-up" src="{{ URL::asset('build/assets/img/logo/logo.png') }}"
                        alt="Logo">
                </a>
                <!-- End Logo -->

                <!-- Responsive Toggle Button -->
                <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0" type="button"
                    aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse"
                    data-target="#navBar">
                    <span class="hamburger hamburger--slider g-px-0">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </span>
                </button>
                <!-- End Responsive Toggle Button -->

                <!-- Navigation -->
                @include('layouts.skaonewelcome.welcome-nav')
                <!-- End Navigation -->
            </nav>
            <!-- End Nav -->
        </div>
    </div>
</header>

@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    PPDB
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    {{--  --}}
    <!-- Promo Block -->
    <section class="clearfix">
        <div class="js-bg-video" data-hs-bgv-type="youtube" data-hs-bgv-id="FxiskmF16gU" data-hs-bgv-loop="1">
            <div class="g-bg-cover g-bg-black-opacity-0_6--after g-pos-rel g-z-index-1">
                <div class="container text-center g-pos-rel g-z-index-1 g-pt-100 g-pb-80">
                    <!-- Promo Block Info -->
                    <div class="g-mb-40">
                        <h1 class="g-color-white g-font-size-60--lg">Become a SMKN 1 Kadipaten Student</h1>
                        <p class="g-color-white-opacity-0_8 g-font-size-22">Search from more than 5 diverse programs. Find
                            your fit at SMKN 1 Kadipaten.</p>
                    </div>
                    <!-- End Promo Block Info -->


                    <!-- Form Group -->
                    <form class="g-max-width-645 mx-auto">
                        <a class="btn btn-block g-color-white g-color-main--hover g-bg-primary g-bg-white--hover g-rounded-30 g-py-13"
                            href="/skaone/program">Program Keahlian</a>
                    </form>
                    <!-- End Form Group -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Promo Block -->

    <!-- Call to Action -->
    @include('skaonewelcome.call-to-acction')
    <!-- End Call to Action -->
@endsection
@section('script')
    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // initialization of header
            $.HSCore.components.HSHeader.init($('#js-header'));
            $.HSCore.helpers.HSHamburgers.init('.hamburger');

            // initialization of HSMegaMenu component
            $('.js-mega-menu').HSMegaMenu({
                event: 'hover',
                pageContainer: $('.container'),
                breakpoint: 991
            });

            // initialization of HSDropdown component
            $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
                afterOpen: function() {
                    $(this).find('input[type="search"]').focus();
                }
            });

            // initialization of custom select
            $.HSCore.components.HSSelect.init('.js-custom-select');

            // initialization of sticky blocks
            setTimeout(function() {
                $.HSCore.components.HSStickyBlock.init('.js-sticky-block');
            }, 300);

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');
        });
    </script>
@endsection

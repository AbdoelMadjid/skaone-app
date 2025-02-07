@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Program
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/chosen/chosen.css') }}">
@endsection
@section('content')
    <!-- Promo Block -->
    <div class="g-bg-img-hero g-pos-rel" style="background-image: url({{ URL::asset('build/assets/img/bg/bg-img1.png') }});">
        <div class="container g-pt-100">
            <div class="row justify-content-lg-between">
                <div class="col-lg-4 g-pt-50--lg">
                    <div class="mb-5">
                        <h1 class="g-font-size-45 mb-4">Program Studi</h1>
                        <p> Kompetensi Keahlian di SMKN 1 Kadipaten </p>
                    </div>
                </div>
                <div class="col-lg-8 align-self-end">
                    <div class="u-shadow-v40 g-brd-around g-brd-7 g-brd-secondary rounded">
                        <img class="img-fluid rounded" src="{{ URL::asset('images/sakola/kkti.jpg') }}"
                            alt="Image Description">
                    </div>
                </div>
            </div>
        </div>

        <!-- SVG Bottom Background Shape -->
        <svg class="g-pos-abs g-bottom-0" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1921 183.5"
            enable-background="new 0 0 1921 183.5" xml:space="preserve">
            <path fill="#FFFFFF" d="M0,183.5v-142c0,0,507,171,1171,58c0,0,497-93,750,84H0z" />
            <path opacity="0.2" fill="#FFFFFF" d="M0,183V0c0,0,507,220.4,1171,74.7c0,0,497-119.9,750,108.3H0z" />
        </svg>
        <!-- End SVG Bottom Background Shape -->
    </div>
    <!-- End Promo Block -->

    @include('skaonewelcome.kk-akuntansi')
    @include('skaonewelcome.kk-bisnisdigital')
    @include('skaonewelcome.kk-manajemenperkantoran')
    @include('skaonewelcome.kk-rpl')
    @include('skaonewelcome.kk-tkj')


    <!-- Call to Action -->
    @include('skaonewelcome.call-to-acction')
    <!-- End Call to Action -->
@endsection
@section('script')
    <!-- JS Implementing Plugins -->
    <script src="{{ URL::asset('build/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/chosen/chosen.jquery.js') }}"></script>

    <!-- JS Unify -->
    <script src="{{ URL::asset('build/assets/js/hs.core.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.header.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/helpers/hs.hamburgers.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.dropdown.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.select.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.sticky-block.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.go-to.js') }}"></script>

    <!-- JS Customization -->
    <script src="{{ URL::asset('build/assets/js/custom.js') }}"></script>

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

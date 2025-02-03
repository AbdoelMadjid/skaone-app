@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Visi Misi
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    <div class="g-bg-img-hero g-pos-rel" style="background-image: url({{ URL::asset('build/assets/img/bg/bg-img1.png') }});">
        <div class="container g-pt-100">
            <div class="row justify-content-lg-between">
                <div class="col-lg-4">
                    <div class="mb-5">
                        <h1 class="g-font-size-35 mb-4">Visi SMKN 1 Kadipaten</h1>
                        <h1 class="g-color-black mb-3 g-font-size-24">Pencetak lulusan yang kompeten dan berintegritas
                            terbaik di Jawa Barat
                            pada tahun
                            2029</h1>
                    </div>
                </div>
                <div class="col-lg-8 align-self-end">
                    <div class="u-shadow-v40 g-brd-around g-brd-7 g-brd-secondary rounded">
                        <img class="img-fluid rounded" src="{{ URL::asset('images/sakola/1-min.jpg') }}"
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

    <!-- Mockup Block -->
    <section class="container g-py-100">
        <div class="text-center g-mb-50">
            <h2 class="h1 g-color-black g-font-weight-600">Misi SMKN 1 Kadipaten</h2>
        </div>

        <div class="row">
            <div class="col-md-3 g-mb-30">
                <span class="u-icon-v3 g-color-cyan g-bg-cyan-opacity-0_1 rounded-circle g-mb-25">
                    <i class="icon-education-089 u-line-icon-pro"></i>
                </span>
                <div
                    class="d-inline-block g-width-70 g-height-2 g-bg-cyan g-pos-rel g-top-5 g-right-minus-25 g-mr-minus-20">
                </div>
                <h2 class="h5 g-color-black mb-3">Pembentukan Karakter dan Integritas:</h2>
                <p>Mengimplementasikan program pendidikan karakter
                    yang menekankan nilai-nilai profil pelajar Pancasila.</p>
                <h2 class="h5 g-color-black mb-3">Meningkatkan Kualitas Pengajaran:</h2>
                <p>Mengembangkan kurikulum yang sesuai dengan
                    kebutuhan industri dan standar nasional serta memberikan pelatihan bagi guru agar
                    selalu up to date dengan perkembangan terbaru dalam pendidikan dan teknologi.</p>
                <h2 class="h5 g-color-black mb-3">Pengembangan Kompetensi Siswa:</h2>
                <p>Menyelenggarakan pelatihan keterampilan teknis dan
                    soft skills yang relevan dengan dunia kerja, seperti komunikasi, kepemimpinan, dan
                    manajemen waktu.</p>
            </div>

            <div class="col-md-6 g-mb-30">
                <img class="img-fluid" src="{{ URL::asset('images/sakola/back.jpg') }}" alt="Image Description">
                <img class="img-fluid" src="{{ URL::asset('images/sakola/back2.jpg') }}" alt="Image Description">
                <img class="img-fluid" src="{{ URL::asset('images/sakola/misisekolah3.jpg') }}" alt="Image Description">
            </div>

            <div class="col-md-3 mt-auto g-mb-30 align-self-center">
                <div class="d-inline-block g-width-70 g-height-2 g-bg-red g-pos-rel g-top-5 g-left-minus-25 g-mr-minus-20">
                </div>
                <span class="u-icon-v3 g-color-red g-bg-red-opacity-0_1 rounded-circle g-mb-25">
                    <i class="icon-education-088 u-line-icon-pro"></i>
                </span>
                <h2 class="h5 g-color-black mb-3">Kerjasama dengan Industri:</h2>
                <p>Membangun kemitraan strategis dengan berbagai perusahaan
                    dan institusi terkait untuk program magang, kunjungan industri, dan penempatan kerja
                    bagi lulusan.</p>
                <h2 class="h5 g-color-black mb-3">Fasilitas dan Infrastruktur:</h2>
                <p>Meningkatkan dan memperbarui fasilitas pendidikan agar
                    sesuai dengan standar industri modern.</p>
                <h2 class="h5 g-color-black mb-3">Dukungan Karir dan Alumni:</h2>
                <p>Menyediakan layanan bimbingan karir dan jaringan alumni
                    yang kuat untuk membantu lulusan mendapatkan pekerjaan.</p>
                <h2 class="h5 g-color-black mb-3">Evaluasi dan Perbaikan Berkelanjutan:</h2>
                <p>Melakukan evaluasi rutin terhadap proses
                    pembelajaran dan hasil lulusan serta mengadopsi perbaikan yang diperlukan
                    berdasarkan feedback dari berbagai pemangku kepentingan.</p>
            </div>
        </div>
    </section>
    <!-- End Mockup Block -->

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

@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Welcome
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/fancybox/jquery.fancybox.css') }}">
@endsection
@section('content')
    <!-- Carousel Slider -->
    <div class="js-carousel u-carousel-v5" data-infinite="true" data-autoplay="true" data-speed="8000"
        data-pagi-classes="u-carousel-indicators-v34 g-absolute-centered--y g-left-auto g-right-30 g-right-100--md"
        data-calc-target="#js-header">

        <!-- Carousel Slides -->
        <div class="js-slide h-100 g-flex-centered g-bg-img-hero g-bg-cover g-bg-black-opacity-0_3--after"
            style="background-image: url({{ URL::asset('images/sakola/misisekolah4.jpg') }});">
            <div class="container">
                <div class="g-max-width-600 g-pos-rel g-z-index-1">
                    <a class="d-block g-text-underline--none--hover" href="#">
                        {{-- <span class="d-block g-color-white g-font-size-20--md mb-2">
                            Making an Impact : <span
                                class="g-brd-bottom--dashed g-brd-2 g-brd-primary g-color-primary g-font-weight-700 g-pb-2">Careers
                                Day</span>
                        </span> --}}
                        <span
                            class="d-block g-color-white g-font-secondary g-font-size-25 g-font-size-45--md g-line-height-1_4">
                            Pencetak lulusan yang kompeten dan berintegritas terbaik di Jawa Barat pada tahun 2029
                        </span>
                    </a>
                </div>

                <!-- Go to Button -->
                <a class="js-go-to d-flex align-items-center g-color-white g-pos-abs g-bottom-0 g-z-index-1 g-text-underline--none--hover g-pb-60"
                    href="#!" data-target="#content">
                    <span class="d-block u-go-to-v4 mr-3"></span>
                    <span class="g-brd-bottom--dashed g-brd-white-opacity-0_5 mr-1">scroll down</span> to find
                    out more
                </a>
                <!-- End Go to Button -->
            </div>
        </div>
        <!-- End Carousel Slides -->

        <!-- Carousel Slides -->
        <div class="js-slide h-100 g-flex-centered g-bg-img-hero g-bg-cover g-bg-black-opacity-0_2--after"
            style="background-image: url({{ URL::asset('images/sakola/misisekolah.jpg') }});">
            <div class="container">
                <div class="g-max-width-600 g-pos-rel g-z-index-1">
                    <a class="d-block g-text-underline--none--hover" href="#">
                        <span class="d-block g-color-white g-font-size-20--md mb-2">
                            Pembentukan Karakter dan Integritas:
                        </span>
                        <span
                            class="d-block g-color-white g-font-secondary g-font-size-25 g-font-size-45--md g-line-height-1_4">
                            Mengimplementasikan program pendidikan karakter yang
                            menekankan nilai-nilai profil pelajar Pancasila.
                        </span>
                    </a>
                </div>

                <!-- Go to Button -->
                <a class="js-go-to d-flex align-items-center g-color-white g-pos-abs g-bottom-0 g-z-index-1 g-text-underline--none--hover g-pb-60"
                    href="#!" data-target="#content">
                    <span class="d-block u-go-to-v4 mr-3"></span>
                    <span class="g-brd-bottom--dashed g-brd-white-opacity-0_5 mr-1">scroll down</span> to find
                    out more
                </a>
                <!-- End Go to Button -->
            </div>
        </div>
        <!-- End Carousel Slides -->

        <!-- Carousel Slides -->
        <div class="js-slide h-100 g-flex-centered g-bg-img-hero g-bg-pos-top-center g-bg-cover g-bg-black-opacity-0_3--after"
            style="background-image: url({{ URL::asset('images/gerbang.jpg') }});">
            <div class="container">
                <div class="g-max-width-600 g-pos-rel g-z-index-1">
                    <a class="d-block g-text-underline--none--hover" href="#">
                        <span class="d-block g-color-white g-font-size-20--md mb-2">
                            Fasilitas dan Infrastruktur :
                        </span>
                        <span
                            class="d-block g-color-white g-font-secondary g-font-size-25 g-font-size-45--md g-line-height-1_4">
                            Meningkatkan dan memperbarui fasilitas pendidikan agar sesuai dengan standar industri modern.
                        </span>
                    </a>
                </div>

                <!-- Go to Button -->
                <a class="js-go-to d-flex align-items-center g-color-white g-pos-abs g-bottom-0 g-z-index-1 g-text-underline--none--hover g-pb-60"
                    href="#!" data-target="#content">
                    <span class="d-block u-go-to-v4 mr-3"></span>
                    <span class="g-brd-bottom--dashed g-brd-white-opacity-0_5 mr-1">scroll down</span> to find
                    out more
                </a>
                <!-- End Go to Button -->
            </div>
        </div>
        <!-- End Carousel Slides -->
    </div>
    <!-- End Carousel Slider -->

    <!-- Find a Course -->
    <div id="content" class="u-shadow-v34 g-bg-main g-pos-rel g-z-index-1 g-pt-40 g-pb-10">
        <div class="container g-mb-60">
            <nav class="text-center " aria-label="Page Navigation">
                <ul class="list-inline">
                    <li class="list-inline-item float-sm-left">
                        <h1 class="h2 g-color-white mb-0">Get Started</h1>
                    </li>
                    <li class="list-inline-item hidden-down">
                        {{--  --}}
                    </li>
                    <li class="list-inline-item float-sm-right">
                        @if (Route::has('login'))
                            <div class="">
                                @auth
                                    <a href="{{ url('/dashboard') }}"
                                        class="btn u-shadow-v32 g-brd-none g-color-white g-color-primary--hover g-bg-primary g-bg-white--hover g-font-size-16 g-rounded-30 g-transition-0_2 g-px-35 g-py-13">Dashboard</a>
                                @else
                                    <a href="{{ route('auth', 'login') }}"
                                        class="btn u-shadow-v32 g-brd-none g-color-white g-color-primary--hover g-bg-primary g-bg-white--hover g-font-size-16 g-rounded-30 g-transition-0_2 g-px-35 g-py-13">Log
                                        in</a>

                                    {{-- @if (Route::has('register'))
                                    <a href="{{ route('auth', 'register') }}" class="btn btn-primary">Register</a>
                                @endif --}}
                                @endauth
                            </div>
                        @endif
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End Find a Course -->

    <!-- Promo Event -->
    <div class="g-bg-img-hero" style="background-image: url({{ URL::asset('build/assets/include/svg/svg-bg1.svg') }});">
        <div class="container g-brd-y g-brd-secondary-light-v2 g-pt-20 g-pb-10">
            <div class="container g-pt-20 g-py-20">
                <div class="row align-self-center">
                    <div class="col-md-4 g-mb-30">
                        <img class="img-fluid u-shadow-v39 g-brd-around g-brd-10 g-brd-white rounded g-max-width-250 align-self-center"
                            src="{{ URL::asset('images/kepsek.jpg') }}" alt="Image Description" data-animation="tada"
                            data-animation-out="zoomOutDown" data-animation-delay="0" data-animation-duration="1000">
                        <div class="g-mt-20">
                            <h2 class="h5 mb-1">H. Damudin, S.Pd., M.Pd.</h2>
                            <p>Kepala Sekolah</p>
                        </div>
                    </div>

                    <div class="col-md-8 g-mb-30">
                        <h2 class="mb-3"><a class="h2 u-link-v5 g-color-main g-color-primary--hover"
                                href="#">Sekolah
                                Legend Berbasis Karakter</a></h2>
                        <p class="g-font-size-17 mb-0">Assalamu'alaikum warahmatullahi wabarakatuh,
                        <p class="g-font-size-17 mb-0">Salam sejahtera untuk kita semua,

                        <p class="g-font-size-17 mb-0">
                            <span class="u-dropcap-bg g-bg-primary g-color-white g-mr-20 g-mb-5">P</span>uji syukur
                            kita panjatkan ke hadirat Allah SWT, Tuhan Yang Maha Esa,
                            atas segala rahmat dan
                            karunia-Nya
                            sehingga kita dapat terus menjalankan peran kita dalam mendidik generasi muda yang berkarakter
                            dan berdaya saing tinggi.
                        <p class="g-font-size-17 mb-0">Selamat datang di website resmi SMKN 1 Kadipaten, sebuah media yang
                            kami hadirkan untuk mendukung transparansi, komunikasi, dan informasi bagi seluruh civitas
                            akademika
                            dan masyarakat.

                        <p class="g-font-size-17 mb-0">SMKN 1 Kadipaten bangga menyebut dirinya sebagai Sekolah Legend
                            Berbasis Karakter. Sebutan ini tidak hanya menjadi identitas, tetapi juga tanggung jawab besar
                            bagi kami untuk terus melahirkan lulusan yang unggul, tidak hanya dari segi kompetensi kejuruan
                            tetapi juga dari segi moral, etika, dan karakter.

                        <p class="g-font-size-17 mb-0">Dalam era digital yang penuh tantangan ini, pendidikan berbasis
                            karakter menjadi kunci utama
                            dalam
                            mencetak generasi yang tidak hanya cerdas secara intelektual tetapi juga memiliki integritas,
                            kejujuran,
                            disiplin, dan rasa tanggung jawab. SMKN 1 Kadipaten berkomitmen untuk menjadi sekolah yang
                            adaptif
                            terhadap perubahan zaman tanpa melupakan nilai-nilai luhur budaya bangsa.
                    </div>

                    <div class="col-md-12 g-mb-30">
                        <p class="g-font-size-17 mb-0">
                            Kami menyadari
                            bahwa keberhasilan ini tidak dapat dicapai tanpa
                            dukungan dari berbagai pihak.
                            Oleh karena itu, kami mengajak seluruh siswa, guru, tenaga kependidikan, orang tua, alumni, dan
                            masyarakat untuk terus bersinergi menciptakan lingkungan pendidikan yang harmonis dan inovatif.

                        <p class="g-font-size-17 mb-0">Melalui website ini, kami berharap dapat memberikan layanan
                            informasi
                            yang cepat, akurat, dan
                            relevan.

                        <p class="g-font-size-17 mb-0">Silakan eksplorasi berbagai fitur yang telah kami sediakan, mulai
                            dari informasi akademik,
                            kegiatan sekolah, hingga prestasi siswa. Kami juga sangat terbuka terhadap masukan dan saran
                            demi kemajuan SMKN 1 Kadipaten.

                        <p class="g-font-size-17 mb-0">Akhir kata, mari bersama-sama kita wujudkan SMKN 1 Kadipaten sebagai
                            sekolah yang tidak hanya
                            menjadi legenda dalam nama, tetapi juga dalam kontribusinya terhadap masyarakat dan bangsa.

                        <p class="g-font-size-17 mb-0">Terima kasih atas perhatian dan dukungan Anda. Semoga Allah SWT
                            senantiasa meridhoi langkah kita
                            semua.

                        <p class="g-font-size-17 mb-0">Wassalamu'alaikum warahmatullahi wabarakatuh.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Promo Event -->

    <!-- Call to Action -->
    {{-- <div class="g-bg-img-hero" style="background-image: url({{ URL::asset('build/assets/include/svg/svg-bg1.svg') }});">
        <div class="container g-pt-60 g-pb-30">
            <!-- Heading -->
            <div class="g-max-width-645 text-center mx-auto g-mb-60">
                <h2 class="h1 mb-3">Pelaksanaan PSAJ</h2>
                <p>Penilaian Sumatif Akhir Jenjang untuk kelas 12 tahun 2024-2025.</p>
            </div>
            <!-- End Heading -->

            <div class="row">
                <!-- Studies -->
                @foreach ($jadwals as $jadwal)
                    <article class="col-md-4 g-mb-30">

                        <div class="g-mb-35">
                            <h3 class="mb-3">{{ $jadwal->mata_pelajaran }}</h3>
                            <p class="g-font-size-15">
                                Kelas: {{ $jadwal->tingkat }} ({{ $jadwal->kelas }})<br>
                                Token: <span class="g-color-red">{{ $jadwal->token }}</span><br>
                                Tanggal: {{ $jadwal->tanggal_mulai }}
                                @if ($jadwal->tanggal_selesai && $jadwal->tanggal_mulai != $jadwal->tanggal_selesai)
                                    s/d {{ $jadwal->tanggal_selesai }}
                                @endif
                                <br>
                                @if ($jadwal->tanggal_mulai == $jadwal->tanggal_selesai)
                                    Jam: {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
                                @endif
                                <br>
                            </p>
                        </div>
                        @if ($jadwal->can_access)
                            <a href="{{ $jadwal->link_soal }}" target="_blank"
                                class="btn u-shadow-v39 g-color-white g-color-white--hover g-bg-main g-bg-primary--hover g-font-size-default g-rounded-30 g-px-35 g-py-8">Mulai
                                Ujian</a>
                        @else
                            <span
                                class="btn u-shadow-v39 g-color-white g-bg-primary g-bg-main--hover g-rounded-30 g-px-35 g-py-8">
                                {{ $jadwal->status_ujian }}</span>
                        @endif

                    </article>
                    <!-- End Studies -->
                @endforeach
                <!-- Studies -->

            </div>
            <hr class="g-brd-gray-light-v4 g-my-60">
        </div>
    </div> --}}
    <!-- End Call to Action -->
    <!-- Team -->
    <div class="container g-py-100">
        <!-- Heading -->
        <div class="g-max-width-550 text-center mx-auto g-mb-100">
            <h2 class="text-uppercase g-color-main-light-v1 g-font-weight-600 g-font-size-13 g-letter-spacing-2 mb-4">Who
                is
                the deputy leader?</h2>
            <h2 class="h3">This is the deputy principal who helps the principal's performance</h2>
        </div>
        <!-- End Heading -->

        <div class="row g-mx-minus-25 g-mb-40">
            @foreach ($tampilWakasek as $wakasek)
                <div class="col-12 col-md-6 g-px-25 g-mb-50">
                    <!-- Team -->
                    <div class="text-center">
                        <img class="img-fluid u-shadow-v39 g-brd-around g-brd-10 g-brd-white rounded g-max-width-250 align-self-center mb-5"
                            src="{{ asset('images/photo-personil/' . $wakasek->photo) }}"
                            alt="{{ $wakasek->namalengkap }}">
                        <h4 class="h5 g-font-weight-600 mb-1">
                            {{ $wakasek->gelardepan }} {{ $wakasek->namalengkap }} {{ $wakasek->gelarbelakang }}
                        </h4>
                        <span class="d-block g-color-primary">{{ $wakasek->jabatan }}</span>
                        <hr class="g-brd-gray-light-v4 g-my-15">
                        <span class="g-color-text g-color-main--hover g-font-size-13">"{{ $wakasek->motto }}"</span>
                    </div>
                    <!-- End Team -->
                </div>
            @endforeach
        </div>
    </div>
    <!-- End Team -->
    <hr class="g-brd-gray-light-v4 g-my-60">
    <!-- Learn First Steps -->
    <div class="container g-pt-100 g-pb-50">

        {{-- <hr class="g-brd-secondary-light-v1 g-my-50"> --}}

        <div class="row">
            <div class="col-lg-5 order-lg-2 g-mb-50">
                <!-- List of Links -->
                <ul class="list-unstyled g-pl-15--lg mb-0">
                    <!-- Links -->
                    <li>
                        <div
                            class="media u-block-hover g-color-main g-text-underline--none--hover g-transition-0_5 g-px-10 g-py-15">
                            <div class="d-flex mr-4">
                                <span
                                    class="u-icon-v3 u-icon-size--lg u-shadow-v35 g-color-blue g-color-white--hover g-bg-secondary-dark-v1 g-bg-main--hover g-font-size-20 rounded-circle">
                                    <i class="icon-finance-067 u-line-icon-pro"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <h3 class="h5 g-color-blue g-color-main--hover g-font-primary mb-1">Future
                                    Students</h3>
                                <p class="g-font-size-16 mb-0">SKA One's unique personality rests on the bedrock
                                    values of academic excellence.</p>
                            </div>
                            <a class="u-link-v2" href="#!"></a>
                        </div>
                    </li>
                    <!-- End Links -->

                    <!-- Links -->
                    <li>
                        <div
                            class="media u-block-hover g-color-main g-text-underline--none--hover g-transition-0_5 g-px-10 g-py-15">
                            <div class="d-flex mr-4">
                                <span
                                    class="u-icon-v3 u-icon-size--lg u-shadow-v35 g-color-purple g-color-white--hover g-bg-secondary-dark-v1 g-bg-main--hover g-font-size-20 rounded-circle">
                                    <i class="icon-education-103 u-line-icon-pro"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <h3 class="h5 g-color-purple g-color-main--hover g-font-primary mb-1">Academic
                                    Programs</h3>
                                <p class="g-font-size-16 mb-0">An SKA One education fosters personal growth and a
                                    commitment to the world beyond oneself.</p>
                            </div>
                            <a class="u-link-v2" href="#!"></a>
                        </div>
                    </li>
                    <!-- End Links -->

                    <!-- Links -->
                    <li>
                        <div
                            class="media u-block-hover g-color-main g-text-underline--none--hover g-transition-0_5 g-px-10 g-py-15">
                            <div class="d-flex mr-4">
                                <span
                                    class="u-icon-v3 u-icon-size--lg u-shadow-v35 g-color-teal g-color-white--hover g-bg-secondary-dark-v1 g-bg-main--hover g-font-size-20 rounded-circle">
                                    <i class="icon-education-124 u-line-icon-pro"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <h3 class="h5 g-color-teal g-color-main--hover g-font-primary mb-1">Key Dates
                                </h3>
                                <p class="g-font-size-16 mb-0">There is no better way to understand SMKN 1 Kadipaten than
                                    by spending time on campus.</p>
                            </div>
                            <a class="u-link-v2" href="#!"></a>
                        </div>
                    </li>
                    <!-- End Links -->

                    <!-- Links -->
                    <li>
                        <div
                            class="media u-block-hover g-color-main g-text-underline--none--hover g-transition-0_5 g-px-10 g-py-15">
                            <div class="d-flex mr-4">
                                <span
                                    class="u-icon-v3 u-icon-size--lg u-shadow-v35 g-color-brown g-color-white--hover g-bg-secondary-dark-v1 g-bg-main--hover g-font-size-20 rounded-circle">
                                    <i class="icon-education-127 u-line-icon-pro"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <h3 class="h5 g-color-brown g-color-main--hover g-font-primary mb-1">Campus
                                    Tours</h3>
                                <p class="g-font-size-16 mb-0">Take a tour, learn about admission and financial
                                    aid, speak with current students.</p>
                            </div>
                            <a class="u-link-v2" href="#!"></a>
                        </div>
                    </li>
                    <!-- End Links -->
                </ul>
                <!-- End List of Links -->
            </div>

            <div class="col-lg-7 order-lg-1 g-pt-10 g-mb-60">
                <!-- Youtube Iframe -->
                <div
                    class="embed-responsive embed-responsive-16by9 u-shadow-v36 g-brd-around g-brd-7 g-brd-white g-rounded-5 mb-4">
                    <iframe src="https://www.youtube.com/embed/KUsoT_EPkhg?si=b5d4-nf9WN7KjQT1"" frameborder="0"
                        allowfullscreen></iframe>
                </div>
                <!-- End Youtube Iframe -->

                <h4 class="h3 mb-0">Explore our SMKN 1 Kadipaten in minutes</h4>
                <a class="g-pl-30" href="#">&#8212; Learn the benefits</a>
            </div>
        </div>
    </div>
    <!-- End Learn First Steps -->

    <!-- Call to Action -->
    @include('skaonewelcome.call-to-acction')
    <!-- End Call to Action -->
@endsection
@section('script')
    <!-- JS Implementing Plugins -->
    <script src="{{ URL::asset('build/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/slick-carousel/slick/slick.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/fancybox/jquery.fancybox.min.js') }}"></script>

    <!-- JS Unify -->
    <script src="{{ URL::asset('build/assets/js/hs.core.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.header.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/helpers/hs.hamburgers.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.dropdown.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/helpers/hs.height-calc.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.carousel.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.popup.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.go-to.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/appear.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.onscroll-animation.js') }}"></script>

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

            // initialization of carousel
            $.HSCore.components.HSCarousel.init('[class*="js-carousel"]');

            // initialization of header's height equal offset
            $.HSCore.helpers.HSHeightCalc.init();

            // initialization of popups
            $.HSCore.components.HSPopup.init('.js-fancybox');

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');

            $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');
        });
    </script>
@endsection

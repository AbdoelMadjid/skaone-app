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
                        <span class="d-block g-color-white g-font-size-20--md mb-2">
                            Making an Impact : <span
                                class="g-brd-bottom--dashed g-brd-2 g-brd-primary g-color-primary g-font-weight-700 g-pb-2">Careers
                                Day</span>
                        </span>
                        <span
                            class="d-block g-color-white g-font-secondary g-font-size-25 g-font-size-45--md g-line-height-1_4">
                            Explore career options October 12 at the Unify Arena.
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
                            Discover Unify's Faculty of <span
                                class="g-brd-bottom--dashed g-brd-2 g-brd-primary g-color-primary g-font-weight-700 g-pb-2">Chemistry</span>
                        </span>
                        <span
                            class="d-block g-color-white g-font-secondary g-font-size-25 g-font-size-45--md g-line-height-1_4">
                            Student work, Success stories, Faculty profiles, 360&#176; tours &amp; more
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
            style="background-image: url({{ URL::asset('images/sakola/1-min.jpg') }});">
            <div class="container">
                <div class="g-max-width-600 g-pos-rel g-z-index-1">
                    <a class="d-block g-text-underline--none--hover" href="#">
                        <span class="d-block g-color-white g-font-size-20--md mb-2">
                            Fall <span
                                class="g-brd-bottom--dashed g-brd-2 g-brd-primary g-color-primary g-font-weight-700 g-pb-2">Webinar
                                Series</span>
                        </span>
                        <span
                            class="d-block g-color-white g-font-secondary g-font-size-25 g-font-size-45--md g-line-height-1_4">
                            See our full schedule and register now
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
        <div class="container">
            <form class="row align-items-md-center">
                <div class="col-md-4 g-mb-30">
                    <h1 class="h2 g-color-white mb-0">Find a course</h1>
                </div>

                <div class="col-md-6 g-mb-30">
                    <input
                        class="form-control u-shadow-v19 g-brd-none g-bg-white g-font-size-16 g-rounded-30 g-px-25 g-py-13"
                        type="text" placeholder="Search for courses">
                </div>

                <div class="col-md-2 g-mb-30">
                    <button
                        class="btn u-shadow-v32 input-group-addon d-flex align-items-center g-brd-none g-color-white g-color-primary--hover g-bg-primary g-bg-white--hover g-font-size-16 g-rounded-30 g-transition-0_2 g-px-30 g-py-13"
                        type="button">
                        Search
                        <i class="ml-3 fa fa-search"></i>
                    </button>
                </div>
            </form>
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

                        <p class="g-font-size-17 mb-0">Melalui website ini, kami berharap dapat memberikan layanan informasi
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
                    <iframe src="https://www.youtube.com/embed/toqQDEONYK0?si=JwEjK0vPmPoClPfF"" frameborder="0"
                        allowfullscreen></iframe>
                </div>
                <!-- End Youtube Iframe -->

                <h4 class="h3 mb-0">Explore our SMKN 1 Kadipaten in minutes</h4>
                <a class="g-pl-30" href="#">&#8212; Learn the benefits</a>
            </div>
        </div>
    </div>
    <!-- End Learn First Steps -->

    <!-- Testimonials -->
    <div class="g-bg-main-light-v2">
        <div class="container g-pt-70 g-pb-20">
            <div class="js-carousel" data-pagi-classes="u-carousel-indicators-v35--white g-pos-rel text-center">
                <!-- Testimonials -->
                <div class="js-slide">
                    <div class="row justify-content-lg-center g-mb-20">
                        <div class="col-md-3 col-lg-2 g-mb-20">
                            <img class="img-fluid u-shadow-v36 rounded-circle mx-auto"
                                src="{{ URL::asset('build/assets/img-temp/200x200/img3.jpg') }}" alt="Image Description">
                        </div>

                        <div class="col-md-9 col-lg-8 g-mb-20">
                            <!-- Testimonials - Content -->
                            <div class="media mb-3">
                                <div class="d-flex mr-3">
                                    <span
                                        class="g-color-white-opacity-0_8 g-font-secondary g-font-size-40 g-opacity-0_3 g-pos-rel g-top-minus-10">&#8220;</span>
                                </div>
                                <div class="media-body">
                                    <blockquote
                                        class="g-brd-left-none g-color-white g-font-style-italic g-font-size-20 g-pl-0">
                                        The program offers both a strong theoretical and practical component
                                        providing the solid foundation needed for student teachers to venture
                                        out into the realm of teaching.
                                        <span
                                            class="align-self-end g-color-white-opacity-0_8 g-font-secondary g-font-size-40 g-opacity-0_3 g-line-height-0 align-bottom g-pos-rel g-top-minus-10">&#8221;</span>
                                    </blockquote>
                                </div>
                            </div>

                            <div class="g-pl-30">
                                <h3 class="h4 g-color-white-opacity-0_9 mb-0">Karolina Wellyan</h3>
                                <span class="d-block g-font-size-18 g-color-white-opacity-0_5 g-pl-20">&#8212;
                                    Bachelor Student</span>
                            </div>
                            <!-- End Testimonials - Content -->
                        </div>
                    </div>
                </div>
                <!-- End Testimonials -->

                <!-- Testimonials -->
                <div class="js-slide">
                    <div class="row justify-content-lg-center g-mb-20">
                        <div class="col-md-3 col-lg-2 g-mb-20">
                            <img class="img-fluid u-shadow-v36 rounded-circle mx-auto"
                                src="{{ URL::asset('build/assets/img-temp/200x200/img1.jpg') }}" alt="Image Description">
                        </div>

                        <div class="col-md-9 col-lg-8 g-mb-20">
                            <!-- Testimonials - Content -->
                            <div class="media mb-3">
                                <div class="d-flex mr-3">
                                    <span
                                        class="g-color-white-opacity-0_8 g-font-secondary g-font-size-40 g-opacity-0_3 g-pos-rel g-top-minus-10">&#8220;</span>
                                </div>
                                <div class="media-body">
                                    <blockquote
                                        class="g-brd-left-none g-color-white g-font-style-italic g-font-size-20 g-pl-0">
                                        Unify's TESL program was a personally enriching and professionally
                                        beneficial experience that opened the door to a rewarding second career
                                        in ESL.
                                        <span
                                            class="align-self-end g-color-white-opacity-0_8 g-font-secondary g-font-size-40 g-opacity-0_3 g-line-height-0 align-bottom g-pos-rel g-top-minus-10">&#8221;</span>
                                    </blockquote>
                                </div>
                            </div>

                            <div class="g-pl-30">
                                <h3 class="h4 g-color-white-opacity-0_9 mb-0">Alex Watson</h3>
                                <span class="d-block g-font-size-18 g-color-white-opacity-0_5 g-pl-20">&#8212;
                                    2015 Grad</span>
                            </div>
                            <!-- End Testimonials - Content -->
                        </div>
                    </div>
                </div>
                <!-- End Testimonials -->

                <!-- Testimonials -->
                <div class="js-slide">
                    <div class="row justify-content-lg-center g-mb-20">
                        <div class="col-md-3 col-lg-2 g-mb-20">
                            <img class="img-fluid u-shadow-v36 rounded-circle mx-auto"
                                src="{{ URL::asset('build/assets/img-temp/200x200/img2.jpg') }}" alt="Image Description">
                        </div>

                        <div class="col-md-9 col-lg-8 g-mb-20">
                            <!-- Testimonials - Content -->
                            <div class="media mb-3">
                                <div class="d-flex mr-3">
                                    <span
                                        class="g-color-white-opacity-0_8 g-font-secondary g-font-size-40 g-opacity-0_3 g-pos-rel g-top-minus-10">&#8220;</span>
                                </div>
                                <div class="media-body">
                                    <blockquote
                                        class="g-brd-left-none g-color-white g-font-style-italic g-font-size-20 g-pl-0">
                                        I would highly recommend the Unify TESL program – it gave me the
                                        training, tools and network to get ESL teaching opportunities in
                                        Toronto. Unify's program provided a good balance of both the practical
                                        and theoretical knowledge.
                                        <span
                                            class="align-self-end g-color-white-opacity-0_8 g-font-secondary g-font-size-40 g-opacity-0_3 g-line-height-0 align-bottom g-pos-rel g-top-minus-10">&#8221;</span>
                                    </blockquote>
                                </div>
                            </div>

                            <div class="g-pl-30">
                                <h3 class="h4 g-color-white-opacity-0_9 mb-0">Maria Olsson</h3>
                                <span class="d-block g-font-size-18 g-color-white-opacity-0_5 g-pl-20">&#8212;
                                    2017 Grad</span>
                            </div>
                            <!-- End Testimonials - Content -->
                        </div>
                    </div>
                </div>
                <!-- End Testimonials -->

                <!-- Testimonials -->
                <div class="js-slide">
                    <div class="row justify-content-lg-center g-mb-20">
                        <div class="col-md-3 col-lg-2 g-mb-20">
                            <img class="img-fluid u-shadow-v36 rounded-circle mx-auto"
                                src="{{ URL::asset('build/assets/img-temp/200x200/img4.jpg') }}" alt="Image Description">
                        </div>

                        <div class="col-md-9 col-lg-8 g-mb-20">
                            <!-- Testimonials - Content -->
                            <div class="media mb-3">
                                <div class="d-flex mr-3">
                                    <span
                                        class="g-color-white-opacity-0_8 g-font-secondary g-font-size-40 g-opacity-0_3 g-pos-rel g-top-minus-10">&#8220;</span>
                                </div>
                                <div class="media-body">
                                    <blockquote
                                        class="g-brd-left-none g-color-white g-font-style-italic g-font-size-20 g-pl-0">
                                        The TESL training at Unify includes an extremely useful practicum
                                        portion where students get the chance to hone their skills at the front
                                        of the class and receive feedback from mentors.
                                        <span
                                            class="align-self-end g-color-white-opacity-0_8 g-font-secondary g-font-size-40 g-opacity-0_3 g-line-height-0 align-bottom g-pos-rel g-top-minus-10">&#8221;</span>
                                    </blockquote>
                                </div>
                            </div>

                            <div class="g-pl-30">
                                <h3 class="h4 g-color-white-opacity-0_9 mb-0">Brown Draxler</h3>
                                <span class="d-block g-font-size-18 g-color-white-opacity-0_5 g-pl-20">&#8212;
                                    Jeff Brown, M.A., Ph.D.</span>
                            </div>
                            <!-- End Testimonials - Content -->
                        </div>
                    </div>
                </div>
                <!-- End Testimonials -->
            </div>
        </div>
    </div>
    <!-- End Testimonials -->

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

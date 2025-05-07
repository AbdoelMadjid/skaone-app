@extends('layouts.master')
@section('title')
    @lang('translation.transkrip-peserta-didik')
@endsection
@section('css')
    <style>
        .cetak-rapor {
            border-collapse: collapse;
            /* Menggabungkan garis border */
            width: 100%;
            /* Agar tabel mengambil seluruh lebar */
            text-decoration-color: black
        }

        .cetak-rapor td {
            border: 1px solid black;
            /* Memberikan garis hitam pada semua th dan td */
            padding: 1px;
            /* Memberikan jarak dalam sel */
            text-align: left;
            /* Mengatur teks rata kiri */
        }

        .cetak-rapor th {
            border: 1px solid black;
            /* Memberikan garis hitam pada semua th dan td */
            background-color: #f2f2f2;
            /* Memberikan warna latar untuk header tabel */
            font-weight: bold;
            /* Mempertegas teks header */
            text-align: center;
            /* Mengatur teks rata kiri */
        }

        @media print {
            .cetak-rapor tr {
                page-break-inside: avoid;
                /* Hindari potongan di tengah baris */
            }

            .page-break {
                page-break-before: always;
                /* Paksa halaman baru */
            }
        }

        .no-border {
            border: 0 !important;
            border-collapse: collapse !important;
        }

        .cetak-rapor .no-border,
        .cetak-rapor .no-border th,
        .cetak-rapor .no-border td {
            border: none !important;
            /* Hapus border secara eksplisit */
        }

        .text-center {
            text-align: center;
        }

        .note {
            font-size: 11px;
            margin-top: 10px;
        }
    </style>
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.pesertadidik')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <h5 class="mb-3">Vertical Nav Tabs</h5>
            <div class="card">
                <div class="card-body">
                    <p class="text-muted">Use <code>flex-column</code> class to create Vertical nav tabs.</p>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill"
                                    href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                    aria-selected="true">Home</a>
                                <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                    aria-selected="false">Profile</a>
                                <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill"
                                    href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                    aria-selected="false">Messages</a>
                                <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings"
                                    role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                            </div>
                        </div><!-- end col -->
                        <div class="col-md-9">
                            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    @include('pages.pesertadidik.transkrip-skl')

                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <div class="d-flex mb-2">
                                        <div class="flex-shrink-0">
                                            <img src="http://public_html.test:7777/build/images/small/img-5.jpg"
                                                alt="" width="150" class="rounded">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="mb-0"> I also decreased the transparency in the text so that the
                                                mountains come through the text, bringing the quote truly to life. Make sure
                                                that the placement of your text is pleasing to look at, and you try to
                                                achieve symmetry for this effect.</p>
                                        </div>
                                    </div>
                                    <p class="mb-0">
                                        You've probably heard that opposites attract. The same is true for fonts. Don't be
                                        afraid to combine font styles that are different but complementary. You can always
                                        play around with the text that is overlaid on an image.
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab">
                                    <div class="d-flex mb-2">
                                        <div class="flex-shrink-0">
                                            <img src="http://public_html.test:7777/build/images/small/img-6.jpg"
                                                alt="" width="150" class="rounded">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="mb-0">In this image, you can see that the line height has been
                                                reduced significantly, and the size was brought up exponentially. Experiment
                                                and play around with the fonts that you already have in the software you’re
                                                working with reputable font websites.</p>
                                        </div>
                                    </div>
                                    <p class="mb-0">
                                        They highly encourage that you use different fonts in one design, but do not
                                        over-exaggerate and go overboard This may be the most commonly encountered tip I
                                        received from the designers I spoke with.
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <div class="d-flex mb-2">
                                        <div class="flex-shrink-0">
                                            <img src="http://public_html.test:7777/build/images/small/img-7.jpg"
                                                alt="" width="150" class="rounded">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="mb-0">When designing, the goal is to draw someone’s attention and
                                                portray to them what you’re trying to say. You can make a big statement by
                                                using little tricks, like this one. Use contrasting fonts. you can use a
                                                bold sanserif font with a cursive.</p>
                                        </div>
                                    </div>
                                    <p class="mb-0">
                                        If you’re using multiple elements, make sure that your principal object is larger
                                        than the others, as the eye of your viewer will automatically be drawn to the larger
                                        of the two objects.
                                    </p>
                                </div>
                            </div>
                        </div><!--  end col -->
                    </div><!--end row-->
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    {{-- --}}
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

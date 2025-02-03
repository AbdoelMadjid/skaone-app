@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Struktur Organisasi
@endsection
@section('css')
    {{--  --}}
    <link rel="stylesheet" href="{{ URL::asset('build/css/jquery.orgchart.min.css') }}">
    <style type="text/css">
        #chart-container {
            position: relative;
            height: 820px;
            border: 1px solid #aaa;
            margin: 0.5rem;
            overflow: auto;
            text-align: center;
        }

        .orgchart {
            background: white;
        }

        .orgchart .kepsek .title {
            background-color: #013a57;
        }

        .orgchart .kepsek .content {
            border-color: #013a57;
        }

        .orgchart .middle-level .title {
            background-color: #006699;
        }

        .orgchart .middle-level .content {
            border-color: #006699;
        }

        .orgchart .product-dept .title {
            background-color: #009933;
        }

        .orgchart .product-dept .content {
            border-color: #009933;
        }

        .orgchart .rd-dept .title {
            background-color: #2c2ad8;
        }

        .orgchart .rd-dept .content {
            border-color: #2c2ad8;
        }

        .orgchart .pipeline1 .title {
            background-color: #d37b23;
        }

        .orgchart .pipeline1 .content {
            border-color: #d37b23;
        }

        .orgchart .frontend1 .title {
            background-color: #cc0066;
        }

        .orgchart .frontend1 .content {
            border-color: #cc0066;
        }

        .orgchart .node .content {
            height: unset;
            width: auto;
            padding: 0 6px;
            text-align: left;
        }

        .orgchart .node .title {
            height: unset;
            text-align: left;
            width: auto;
            padding: 0 10px;
        }
    </style>
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/slick-carousel/slick/slick.css') }}">
@endsection
@section('content')
    <div class="g-bg-img-hero g-pos-rel" style="background-image: url({{ URL::asset('build/assets/img/bg/bg-img1.png') }});">
        <div class="container g-pt-100">
            <div class="row justify-content-lg-between">
                <div class="col-lg-4">
                    <div class="mb-5">
                        <h1 class="g-font-size-35 mb-4">Struktur Organisasi</h1>
                        <h1 class="g-color-black mb-3 g-font-size-24">SMKN 1 Kadipaten</h1>
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
            <h2 class="h1 g-color-black g-font-weight-600">Struktur Organisasi SMKN 1 Kadipaten</h2>
        </div>
        <div id="chart-container"></div>
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
    <script src="{{ URL::asset('build/js/jquery.orgchart.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            var datascource = {
                'id': '1',
                'name': 'H. Damudin, S.Pd., M.Pd.',
                'title': 'Kepala Sekolah',
                'className': 'kepsek',
                'children': [{
                        'id': '2',
                        'name': 'Abdul Madjid, S.Pd., M.Pd.',
                        'title': 'Wakasek Bid. Kurikulum',
                        'className': 'middle-level',
                        'hybrid': true,
                        'children': [{
                                'id': '7',
                                'name': 'Putri Febrina R.S, S.Pd.',
                                'title': 'Staf Kurikulum',
                                'className': 'product-dept',
                                'children': [{
                                    'name': 'Wali Kelas',
                                    'title': 'Tingkat 10, 11 dan 12',
                                    'className': 'frontend1'
                                }, ]
                            },
                            {
                                'id': '8',
                                'name': 'Tabiin, ST',
                                'title': 'Staf Kurikulum',
                                'className': 'product-dept',
                                'children': [{
                                    'name': 'Guru Mata Pelajaran',
                                    'title': 'Tingkat 10, 11 dan 12',
                                    'className': 'frontend1'
                                }, ]
                            },
                            {
                                'id': '9',
                                'name': 'Ketua',
                                'title': 'Kompetensi Keahlian',
                                'className': 'rd-dept',
                                'children': [{
                                        'name': 'Endik Casdi, S.T',
                                        'title': 'Rekayasa Perangkat Lunak',
                                        'className': 'pipeline1'
                                    },
                                    {
                                        'name': 'Otong Sunahdi, S.T',
                                        'title': 'Teknik Komputer dan Jaringan',
                                        'className': 'pipeline1'
                                    },
                                    {
                                        'name': 'Euis Kokom Komariah, SE',
                                        'title': 'Bisnis Digital',
                                        'className': 'pipeline1'
                                    },
                                    {
                                        'name': 'Ratno Admamin, S.Pd',
                                        'title': 'Manajemen Perkantoran',
                                        'className': 'pipeline1'
                                    },
                                    {
                                        'name': 'Ade Lina Inayatul B., SE., M.Pd',
                                        'title': 'Akuntansi',
                                        'className': 'pipeline1'
                                    },
                                ]
                            }
                        ]
                    },
                    {
                        'id': '3',
                        'name': 'Dana Idang Hadiana, S.Pd., M.Pd.',
                        'title': 'Wakasek Bid. Kesiswaan',
                        'className': 'middle-level',
                        'hybrid': true,
                        'children': [{
                                'name': 'A. Hasan Nasruloh, S.Pd',
                                'title': 'Staf Kesiswaan',
                                'className': 'product-dept',
                                'children': [{
                                    'name': 'Team PPDB',
                                    'title': 'Panitia PPDB',
                                    'className': 'frontend1'
                                }, {
                                    'name': 'Wali Kelas',
                                    'title': 'Tingkat 10, 11 dan 12',
                                    'className': 'frontend1'
                                }, ]
                            },
                            {
                                'name': 'Tini Agustini, S.Pd.,M.Pd.',
                                'title': 'Pembina OSIS',
                                'className': 'product-dept',
                                'children': [{
                                    'name': 'Pembantu Pembina OSIS',
                                    'title': 'Pembina Ekstrakurikuler',
                                    'className': 'frontend1'
                                }]
                            },
                            {
                                'name': 'Guru Bimbingan Konseling',
                                'title': 'Tingkat 10, 11 dan 12',
                                'className': 'rd-dept',
                                'children': [{
                                        'name': 'Enok Sugiharti, S.Pd, M.Pd.I',
                                        'title': 'Guru BP/BK',
                                        'className': 'pipeline1'
                                    },
                                    {
                                        'name': 'Junaedi, S.Pd., M.Pd.I',
                                        'title': 'Guru BP/BK',
                                        'className': 'pipeline1'
                                    },
                                    {
                                        'name': 'Irfan Firmansyah, S.Pd.',
                                        'title': 'Guru BP/BK',
                                        'className': 'pipeline1'
                                    },
                                    {
                                        'name': 'Eri Nurmalasari, S.Pd',
                                        'title': 'Guru BP/BK',
                                        'className': 'pipeline1'
                                    }
                                ]
                            }
                        ]
                    },
                    {
                        'id': '4',
                        'name': 'Dra. Ebah Habibah, MM',
                        'title': 'Wakasek Bid. Humas',
                        'className': 'middle-level',
                        'hybrid': true,
                        'children': [{
                                'name': 'Apid Isthochori, S.Pd., M.Pd',
                                'title': 'Staf Humas',
                                'className': 'product-dept',
                                'children': [{
                                    'name': 'Team PKL',
                                    'title': 'Pembantu Panitia PKL',
                                    'className': 'frontend1'
                                }, {
                                    'name': 'Ketua Kompetensi Keahlian',
                                    'title': 'Koordinasi PKL',
                                    'className': 'frontend1'
                                }, ]
                            },
                            {
                                'name': 'Febby Muchamad Darmadi, S.T.',
                                'title': 'Staf Humas',
                                'className': 'product-dept',
                                'children': [{
                                    'name': 'Wali Kelas',
                                    'title': 'Tingkat 10, 11 dan 12',
                                    'className': 'frontend1'
                                }, ]
                            },
                        ]
                    },
                    {
                        'id': '5',
                        'name': 'Aryono, ST',
                        'title': 'Wakasek Bid. Sarana Prasarana',
                        'className': 'middle-level',
                        'hybrid': true,
                        'children': [{
                                'name': 'Asep Tatang S., S.Kom',
                                'title': 'Staf Sarana Prasarana',
                                'className': 'product-dept',
                                'children': [{
                                    'name': 'Kepala Laboratorium',
                                    'title': 'Setiap Kompetensi Keahlian',
                                    'className': 'frontend1'
                                }, {
                                    'name': 'Wali Kelas',
                                    'title': 'Tingkat 10, 11 dan 12',
                                    'className': 'frontend1'
                                }]
                            },
                            {
                                'name': 'Team Sarana Prasarana',
                                'title': 'Pemeliharaan dan Perbaikan',
                                'className': 'rd-dept',
                            }
                        ]
                    },
                    {
                        'id': '6',
                        'name': 'M. Zaenal Iskandar S., S.Kom.',
                        'title': 'Sub Bag Tata Usaha',
                        'className': 'middle-level',
                        'hybrid': true,
                        'children': [{
                                'name': 'Hj. Lilis Herdiyani, S.Pd, S.Kom., M.M',
                                'title': 'Keuangan',
                                'className': 'rd-dept',
                                'children': [{
                                        'name': 'Ade Kurniawati, S.Pd.',
                                        'title': 'Staf Keuangan',
                                        'className': 'pipeline1'
                                    },
                                    {
                                        'name': 'Enok Eros Rostika, S. Pd.',
                                        'title': 'Staf Keuangan',
                                        'className': 'pipeline1'
                                    }
                                ]
                            },
                            {
                                'name': 'Aam Siti Aminah, SE',
                                'title': 'Persuratan',
                                'className': 'rd-dept',
                            },
                            {
                                'name': 'Tatik Nurhayati, SM',
                                'title': 'Pengelola Gaji',
                                'className': 'rd-dept',
                            },
                            {
                                'name': 'Siti Tika Atikah, S.Pd.',
                                'title': 'Kepegawaian',
                                'className': 'rd-dept',
                                'children': [{
                                    'name': 'Dadang Sukendar',
                                    'title': 'Staf Kepegawaian',
                                    'className': 'pipeline1'
                                }, ]
                            },
                            {
                                'name': 'Sri Kartini',
                                'title': 'Kesiswaan',
                                'className': 'rd-dept',
                            },
                            {
                                'name': 'Iah Rohaniah, S.Ak.',
                                'title': 'Kesiswaan',
                                'className': 'rd-dept',
                            },
                            {
                                'name': 'Ineu Apriyani, SE',
                                'title': 'Sarana Prasarana',
                                'className': 'rd-dept',
                            },
                            {
                                'name': 'Staf Lainnya',
                                'title': 'Satpam dan Petugas Kebersihan',
                                'className': 'rd-dept',
                            },
                        ]
                    }
                ]
            };

            var oc = $('#chart-container').orgchart({
                'data': datascource,
                'nodeContent': 'title',
                'nodeID': 'id',
            });

            $(window).resize(function() {
                var width = $(window).width();
                if (width > 576) {
                    oc.init({
                        'verticalLevel': undefined
                    });
                } else {
                    oc.init({
                        'verticalLevel': 2
                    });
                }
            });

        });
    </script>
@endsection

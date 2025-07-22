@extends('layouts.master')
@section('title')
    @lang('translation.modul-ajar-pdf')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.gurumapel')
        @endslot
        @slot('li_2')
            @lang('translation.administrasi-guru')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body checkout-tab">


                    <div class="step-arrow-nav mt-n3 mx-n3 mb-3">
                        <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-primary mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" id="info-tab" href="#info" role="tab"
                                    aria-selected="false">
                                    <i class="ri-briefcase-line align-middle me-1"></i> Info
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" id="kerangka-tujuan-tab" href="#kerangka-tujuan"
                                    role="tab" aria-selected="false">
                                    <i class="ri-stack-line me-1 align-middle"></i> Kerangka dan Tujuan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" id="komponen-tab" href="#komponen" role="tab"
                                    aria-selected="false">
                                    <i class="ri-git-repository-line align-middle me-1"></i>Komponen
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" id="lampiran-tab" href="#lampiran" role="tab"
                                    aria-selected="false">
                                    <i class="ri-file-copy-line align-middle me-1"></i>Lampiran
                                </a>
                            </li>
                        </ul>
                    </div>
                    <form action="#">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel"
                                aria-labelledby="info-tab">
                                @include('pages.gurumapel.bikinmodul.modul-ajar-form-a')

                                <div class="d-flex align-items-start gap-3 mt-4 mb-2 border border-dashed">
                                    {{-- <button type="button" class="btn btn-light btn-label previestab"
                                        data-previous="pills-bill-address-tab"><i
                                            class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Info</button> --}}
                                    <button type="button" class="btn btn-light btn-label right ms-auto nexttab"
                                        data-nexttab="kerangka-tujuan"><i
                                            class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Kerangka &
                                        Tujuan</button>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="kerangka-tujuan" role="tabpanel"
                                aria-labelledby="kerangka-tujuan-tab">
                                @include('pages.gurumapel.bikinmodul.modul-ajar-form-b')
                                <div class="d-flex align-items-start gap-3 mt-4 mb-2 border border-dashed">
                                    <button type="button" class="btn btn-light btn-label previestab"
                                        data-previous="info"><i
                                            class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Info</button>
                                    <button type="button" class="btn btn-light btn-label right ms-auto nexttab"
                                        data-nexttab="komponen"><i
                                            class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Komponen</button>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="komponen" role="tabpanel" aria-labelledby="komponen-tab">
                                @include('pages.gurumapel.bikinmodul.modul-ajar-form-c')
                                <div class="d-flex align-items-start gap-3 mt-4 mb-2 border border-dashed">
                                    <button type="button" class="btn btn-light btn-label previestab"
                                        data-previous="kerangka-tujuan"><i
                                            class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Kerangka dan
                                        Tujuan</button>
                                    <button type="button" class="btn btn-light btn-label right ms-auto nexttab"
                                        data-nexttab="lampiran"><i
                                            class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Lampiran</button>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="lampiran" role="tabpanel" aria-labelledby="lampiran-tab">
                                @include('pages.gurumapel.bikinmodul.modul-ajar-form-d')
                                <div class="d-flex align-items-start gap-3 mt-4 mb-2 border border-dashed">
                                    <button type="button" class="btn btn-light btn-label previestab"
                                        data-previous="komponen"><i
                                            class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Komponen</button>
                                    {{-- <button id="btn-cetak-modul-ajar" class="btn btn-primary">Cetak </button> --}}
                                    <button type="button" class="btn btn-light btn-label right ms-auto" id="btn-simpan"><i
                                            class="ri-save-line label-icon align-middle fs-16 ms-2"></i>Simpan Modul
                                        Ajar</button>
                                </div>
                            </div>
                            <!-- end tab pane -->
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Tampil Modul Ajar</h5>
                        </div>
                        <div>
                            <button type="button" class="btn btn-sm btn-soft-info btn-label right ms-auto"
                                id="btn-cetak-modul-ajar"><i
                                    class="ri-printer-line label-icon align-middle fs-16 ms-2"></i>Cetak</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    @include('pages.gurumapel.bikinmodul.modul-ajar-tampil')
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <script src="{{ URL::asset('build/js/ngeprint.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        $(document).ready(function() {
            var personalId = "{{ $personal_id }}";

            // Fungsi update nilai input
            function updateIdModulAjar() {
                var tahunAjaran = $('#tahunajaran').val();
                var semester = $('#semester').val();
                var kodeMapel = $('#mata_pelajaran').val();

                var result = personalId;

                if (tahunAjaran !== "") {
                    result += '-' + tahunAjaran;
                }

                if (semester !== "") {
                    result += '-' + semester;
                }

                if (kodeMapel !== "") {
                    result += '-' + kodeMapel;
                }

                $('#id-modulajar').val(result);
            }

            // Inisialisasi saat halaman dimuat
            updateIdModulAjar();

            // Trigger update saat terjadi perubahan
            $('#tahunajaran, #semester, #mata_pelajaran').on('change', function() {
                updateIdModulAjar();
            });
        });
    </script>

    <script>
        setupPrintHandler({
            printButtonId: 'btn-cetak-modul-ajar',
            tableContentId: 'cetak-modul-ajar',
            title: 'Cetak Modul Ajar',
            customStyle: `
                body { font-family: 'Times New Roman', serif; font-size: 12px; }
                table { width: 100%; border-collapse: collapse; }
                table, th, td { border: 1px solid black; }
                td { padding: 6px 10px; vertical-align: top;}
                ol, ul { padding-left: -20px; margin: 0;}

                /* Khusus untuk cetak-modulajar agar tidak ada border */
                table.cetak-modulajar,
                table.cetak-modulajar tr,
                table.cetak-modulajar td {
                    border: none !important;
                }

                /* Hindari pemisahan TR di tengah halaman saat print */
                tr {
                    page-break-inside: avoid;
                    break-inside: avoid;
                }

                /* Khusus juga jika ada tabel dalam div */
                .cetak-modulajar tr {
                    page-break-inside: avoid;
                    break-inside: avoid;
                }

                #namaKepsek.hurufbold {font-weight: bold;}
            `
        });
    </script>
    <script>
        const bulanIndo = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        const today = new Date();
        const tanggal = today.getDate();
        const bulan = bulanIndo[today.getMonth()];
        const tahun = today.getFullYear();

        const hasilTanggal = `Majalengka, ${tanggal} ${bulan} ${tahun}`;
        document.getElementById("tanggalHariIni").innerText = hasilTanggal;
    </script>
    {{-- TOMBOL DI BAWAH UNTUK NEXT AND PREVIOUS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tombol NEXT
            document.querySelectorAll('.nexttab').forEach(function(button) {
                button.addEventListener('click', function() {
                    const nextTabId = this.getAttribute('data-nexttab');
                    const nextTab = document.querySelector(`a[href="#${nextTabId}"]`);
                    if (nextTab) {
                        new bootstrap.Tab(nextTab).show();
                    }
                });
            });

            // Tombol PREVIOUS
            document.querySelectorAll('.previestab').forEach(function(button) {
                button.addEventListener('click', function() {
                    const prevTabId = this.getAttribute('data-previous');
                    const prevTab = document.querySelector(`a[href="#${prevTabId}"]`);
                    if (prevTab) {
                        new bootstrap.Tab(prevTab).show();
                    }
                });
            });
        });
    </script>

    {{-- REALTIME FORMULIR BAGIAN TAG A --}}
    <script>
        $(document).ready(function() {
            const faseSelect = $('#fase');
            const kelasSelect = $('#kelas');
            const mapelSelect = $('#mata_pelajaran');
            const modulFase = $('#modulFase');

            function updateJudulFase() {
                const fase = faseSelect.val();
                const mapelText = mapelSelect.find('option:selected').text();

                if (fase) {
                    if (mapelSelect.val() && mapelText !== 'Pilih Mata Pelajaran...') {
                        modulFase.text(`FASE ${fase} - ${mapelText.toUpperCase()}`);
                    } else {
                        modulFase.text(`FASE ${fase}`);
                    }
                } else {
                    modulFase.text(`FASE`);
                }
            }

            // Kelas
            $('#kelas').on('change', function() {
                const val = $(this).val();
                $('#previewKelas').text(val);
            });

            // Saat fase diubah
            faseSelect.on('change', function() {
                mapelSelect.val('').trigger('change');
                kelasSelect.val('').trigger('change'); // reset kelas
                $('#previewKelas').text(''); // reset preview
                updateJudulFase();
            });

            // Saat kelas diubah
            kelasSelect.on('change', function() {
                mapelSelect.val('').trigger('change');
                updateJudulFase();
            });

            // Saat mapel diubah
            mapelSelect.on('change', function() {
                updateJudulFase();
            });

            // Bidang Keahlian
            $('#bidang_keahlian').on('change', function() {
                const text = $(this).find('option:selected').text();
                $('#previewBidang').text(text);

                // Reset Program & Konsentrasi saat bidang diganti
                $('#previewProgram').text('');
                $('#previewKonsentrasi').text('');
            });

            // Program Keahlian
            $('#program_keahlian').on('change', function() {
                const text = $(this).find('option:selected').text();
                $('#previewProgram').text(text);

                // Reset Konsentrasi saat program diganti
                $('#previewKonsentrasi').text('');
            });

            // Konsentrasi Keahlian
            $('#konsentrasi_keahlian').on('change', function() {
                const text = $(this).find('option:selected').text();
                $('#previewKonsentrasi').text(text);
            });

            // Jenjang (optional kalau ingin pakai)
            $('#jenjang').on('change', function() {
                const val = $(this).val();
                // Kalau mau ditampilkan juga, tinggal tambahkan span/element target-nya
            });

            const initialVal = $('#topik-modul').val().trim();
            $('#modulTopik').text(initialVal ? `(${initialVal})` : '');

            // Saat input diketik, ubah modulTopik realtime
            $('#topik-modul').on('keyup', function() {
                const val = $(this).val().trim();
                $('#modulTopik').text(val ? `( ${val} )` : '');
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            function updateIdModulAjar() {
                const val = $('#id-modulajar').val().trim();
                $('#preview-IdModul').text(val ? val : '');
            }

            // Jalankan saat halaman pertama kali dimuat
            updateIdModulAjar();

            // Jalankan saat isi input berubah (lebih cocok pakai 'input' daripada 'keyup')
            $('#id-modulajar').on('input', updateIdModulAjar);

            // Tambahkan juga ketika tahun ajaran atau semester berubah
            $('#tahunajaran, #semester, #mata_pelajaran').on('change', updateIdModulAjar);
        });
    </script>

    <!--  TAMPILKAN BAGIAN B  -->
    <!--  TAMPILKAN ELEMEN  -->
    <script>
        $(document).ready(function() {

            // Fungsi untuk menampilkan ulang seluruh isi elemen[] ke dalam UL
            function updatePreviewElemen() {
                const list = $('#preview-elemen');
                list.empty(); // kosongkan dulu

                $('textarea[name="elemen[]"]').each(function() {
                    const value = $(this).val().trim();
                    if (value !== '') {
                        list.append(`<li>${value}</li>`);
                    }
                });
            }

            // 1. Tampilkan saat halaman pertama kali dibuka
            updatePreviewElemen();

            // 2. Tampilkan ulang setiap kali textarea diubah
            $(document).on('input', 'textarea[name="elemen[]"]', function() {
                updatePreviewElemen();
            });

            // 3. Tampilkan ulang setiap kali elemen ditambah
            $('#btn-tambah-elemen').on('click', function() {
                setTimeout(updatePreviewElemen, 100); // kasih delay kecil agar DOM terpasang dulu
            });

            // 4. Tampilkan ulang setiap kali elemen dihapus
            $(document).on('click', '.btn-remove-elemen', function() {
                setTimeout(updatePreviewElemen, 100); // delay juga
            });

        });
    </script>

    <!--  TAMPILKAN CAPAIAN PEMBELAJARAN  -->
    <script>
        $(document).ready(function() {

            function updatePreviewCapaian() {
                const $preview = $('#preview-capaianpembelajaran');
                $preview.empty();
                $('textarea[name="capaian[]"]').each(function() {
                    const val = $(this).val().trim();
                    if (val !== '') {
                        $preview.append('<li>' + val + '</li>');
                    }
                });
            }

            // Jalankan saat halaman pertama kali dimuat
            updatePreviewCapaian();

            // Jalankan saat textarea capaian diubah
            $(document).on('input', 'textarea[name="capaian[]"]', function() {
                updatePreviewCapaian();
            });

            // Jalankan saat menambah capaian baru
            $('#btn-tambah-capaian').on('click', function() {
                setTimeout(updatePreviewCapaian, 100);
            });

            // Jalankan saat menghapus capaian
            $(document).on('click', '.btn-remove-capaian', function() {
                setTimeout(updatePreviewCapaian, 100);
            });

        });
    </script>

    <!--  TAMPILKAN TUJUAN PEMBELAJARAN  -->
    <script>
        $(document).ready(function() {
            function updatePreviewTujuanPembelajaran() {
                // Preview Tujuan Pembelajaran
                const $previewTujuan = $('#preview-tujuanpembelajaran');
                $previewTujuan.empty();

                $('textarea[name="tujuan[]"]').each(function() {
                    const val = $(this).val().trim();
                    if (val !== '') {
                        $previewTujuan.append('<li>' + val + '</li>');
                    }
                });

                // Preview KKTP
                const $kkptWrapper = $('#preview-kkpt-wrapper');
                $kkptWrapper.empty();

                $('.tujuan-item').each(function(i) {
                    const kkptList = $(this).find('.kkpt-container textarea');
                    let html =
                        `<div><strong>Untuk TP ${i + 1}:</strong><ul style="margin-left:-15px;">`;

                    kkptList.each(function() {
                        const val = $(this).val().trim();
                        if (val !== '') {
                            html += `<li>${val}</li>`;
                        }
                    });

                    html += '</ul></div>';
                    $kkptWrapper.append(html);
                });
            }

            // Update saat halaman selesai dimuat
            updatePreviewTujuanPembelajaran();

            // Update saat ada perubahan di textarea
            $('#tujuan-wrapper').on('input', 'textarea', function() {
                updatePreviewTujuanPembelajaran();
            });

            // Pantau perubahan pada #tujuan-wrapper
            const observer = new MutationObserver(function(mutationsList, observer) {
                updatePreviewTujuanPembelajaran();
            });

            observer.observe(document.getElementById('tujuan-wrapper'), {
                childList: true, // Deteksi penambahan/penghapusan elemen langsung
                subtree: false // Tidak perlu memantau anak-anak lebih dalam
            });
        });
    </script>

    <!--  TAMPILKAN KOMPETENSI AWAL  -->
    <script>
        $(document).ready(function() {
            function updateKompetensiAwalPreview() {
                const val = $('#kompetensi-awal').val().trim();
                $('#preview-kompetensiawal').text(val ? `${val}` : '');
            }

            // Jalankan saat pertama kali halaman dimuat
            updateKompetensiAwalPreview();

            // Jalankan saat user mengetik
            $('#kompetensi-awal').on('keyup', updateKompetensiAwalPreview);
        });
    </script>

    <!--  TAMPILKAN TARGET PESERTA DIDIK  -->
    <script>
        $(document).ready(function() {
            function updateTargetPesertaDidikPreview() {
                const val = $('#target-peserta-didik').val().trim();
                $('#preview-targetpesertadidik').text(val ? `${val}` : '');
            }

            // Jalankan saat pertama kali halaman dimuat
            updateTargetPesertaDidikPreview();

            // Jalankan saat user mengetik
            $('#target-peserta-didik').on('keyup', updateTargetPesertaDidikPreview);
        });
    </script>

    <!--  TAMPILKAN PROFIL KELULUSAN -->
    <script>
        $(document).ready(function() {
            function updatePreviewProfil() {
                let preview = '';

                $('input[name="profil[]"]:checked').each(function() {
                    const index = $('input[name="profil[]"]').index(this);
                    const profilName = $(this).val();
                    const desc = $(`#profil-desc-${index}`).val().trim();

                    preview += `<strong>${profilName}</strong><br>${desc}<br>`;
                });

                $('#preview-profilkelulusan').html(preview);
            }

            // Toggle tampil/tidaknya textarea + update preview saat centang berubah
            $('input[name="profil[]"]').on('change', function() {
                const index = $('input[name="profil[]"]').index(this);
                const descField = $(`#profil-desc-${index}`);

                if (this.checked) {
                    descField.show();
                } else {
                    descField.hide();
                }

                updatePreviewProfil();
            });

            // Update preview saat user mengetik di textarea
            $('textarea[id^="profil-desc-"]').on('input', function() {
                updatePreviewProfil();
            });

            // Jalankan sekali saat awal load
            updatePreviewProfil();
        });
    </script>

    <!--  TAMPILKAN KERANGKA PEMBELAJARAN -->
    <script>
        $(document).ready(function() {
            function updatePreviewKerangka() {
                let preview = '';

                $('input[name="kerangka[]"]:checked').each(function() {
                    const index = $('input[name="kerangka[]"]').index(this);
                    const kerangkaName = $(this).val();
                    const desc = $(`#kerangka-desc-${index}`).val().trim();

                    preview +=
                        `<strong>${kerangkaName.replaceAll('_', ' ').replace(/\b\w/g, c => c.toUpperCase())}</strong><br>${desc}<br>`;
                });

                $('#preview-kerangka').html(preview);
            }

            // Toggle textarea + update preview saat centang berubah
            $('input[name="kerangka[]"]').on('change', function() {
                const index = $('input[name="kerangka[]"]').index(this);
                const descField = $(`#kerangka-desc-${index}`);

                if (this.checked) {
                    descField.show();
                } else {
                    descField.hide();
                }

                updatePreviewKerangka();
            });

            // Update preview saat user mengetik
            $('textarea[id^="kerangka-desc-"]').on('input', function() {
                updatePreviewKerangka();
            });

            // Inisialisasi saat awal load
            updatePreviewKerangka();
        });
    </script>

    <!--  TAMPILKAN ALOKASI WAKTU  -->
    <script>
        $(document).ready(function() {
            function updateAlokasiWaktu() {
                const val = $('#alokasi-waktu').val().trim();
                $('#preview-alokasiwaktu').text(val ? `${val}` : '');
            }

            // Jalankan saat pertama kali halaman dimuat
            updateAlokasiWaktu();

            // Jalankan saat user mengetik
            $('#alokasi-waktu').on('keyup', updateAlokasiWaktu);
        });
    </script>

    <!--  TAMPILKAN BAGIAN C  -->
    <!--  TAMPILKAN PEMAHAMAN BERMAKNA  -->
    <script>
        $(document).ready(function() {
            function updatePreviewPemahaman() {
                const isi = $('#pemahaman-bermakna').val().trim();
                $('#preview-pemahamanbermakna').html(isi);
            }

            // Jalankan saat halaman dimuat
            updatePreviewPemahaman();

            // Jalankan setiap kali textarea diubah
            $('#pemahaman-bermakna').on('input', function() {
                updatePreviewPemahaman();
            });
        });
    </script>

    <!--  TAMPILKAN PERTANYAAN PEMANTIK  -->
    <script>
        $(document).ready(function() {
            function updatePreviewPertanyaan() {
                const preview = $('#preview-pertanyaanpemantik');
                preview.empty();

                $('#pertanyaan-container input[name="pertanyaan[]"]').each(function() {
                    const val = $(this).val().trim();
                    if (val !== '') {
                        preview.append(`<li>${val}</li>`);
                    }
                });
            }

            // Perubahan isi input langsung update preview
            $(document).on('input', 'input[name="pertanyaan[]"]', updatePreviewPertanyaan);

            // Tambah/hapus pertanyaan juga panggil updatePreviewPertanyaan
            const observer = new MutationObserver(updatePreviewPertanyaan);
            observer.observe(document.getElementById('pertanyaan-container'), {
                childList: true,
                subtree: true
            });

            // Inisialisasi pertama kali
            updatePreviewPertanyaan();
        });
    </script>

    <!--  TAMPILKAN KEGIATAN PEMBELAJARAN  -->
    <script>
        $(document).ready(function() {
            function updatePreviewKegiatan() {
                let previewHTML = '';

                $('#kegiatan-pembelajaran-container .kegiatan-pembelajaran').each(function(i) {
                    const index = i + 1;
                    const judul = $(this).find('input[name$="[judul]"]').val() || `Pertemuan ${index}`;

                    // Ambil tahapan
                    const tahapan = [];
                    $(this).find('input[name$="[tahapan][]"]:checked').each(function() {
                        tahapan.push($(this).val());
                    });

                    // Format tahapan
                    let tahapanText = '';
                    if (tahapan.length === 1) {
                        tahapanText = ` (${tahapan[0]})`;
                    } else if (tahapan.length === 2) {
                        tahapanText = ` (${tahapan[0]} & ${tahapan[1]})`;
                    } else if (tahapan.length > 2) {
                        const last = tahapan.pop();
                        tahapanText = ` (${tahapan.join(', ')} & ${last})`;
                    }

                    let content =
                        `<div class="mb-3"><strong>${judul.toUpperCase()}${tahapanText}</strong><br>`;

                    // Urutan kegiatan
                    const kegiatanList = [{
                            key: 'pembukaan',
                            label: 'A. Pembukaan'
                        },
                        {
                            key: 'asesmen',
                            label: 'B. Asesmen Awal'
                        },
                        {
                            key: 'inti',
                            label: 'C. Kegiatan Inti'
                        },
                        {
                            key: 'penutup',
                            label: 'D. Penutup'
                        },
                    ];

                    kegiatanList.forEach(({
                        key,
                        label
                    }) => {
                        const isChecked = $(this).find(
                            `.form-check-input[data-target="${key}-${i}"]`).prop('checked');

                        if (!isChecked) return; // jangan tampilkan jika checkbox tidak dicentang

                        const deskripsi = $(this).find(`[name$="[${key}][deskripsi]"]`).val() || '';
                        const durasi = $(this).find(`[name$="[${key}][durasi]"]`).val() || '';

                        content +=
                            `<p><strong>${label} (${durasi} menit)</strong><br>${deskripsi}</p>`;
                    });

                    content += '</div>';
                    previewHTML += content;
                });

                $('#preview-kegiatanpembelajaran').html(previewHTML);
            }

            function reindexCheckboxTarget() {
                $('#kegiatan-pembelajaran-container .kegiatan-pembelajaran').each(function(i) {
                    const kegiatanKeys = ['pembukaan', 'asesmen', 'inti', 'penutup'];
                    kegiatanKeys.forEach(key => {
                        $(this).find(`.form-check-input[data-target^="${key}-"]`).attr(
                            'data-target', `${key}-${i}`);
                    });
                });
            }

            // Listener utama
            $(document).on('input change',
                '#kegiatan-pembelajaran-container input, #kegiatan-pembelajaran-container textarea',
                function() {
                    updatePreviewKegiatan();
                });

            // Tambah pertemuan
            $('#btn-tambah-pertemuan').on('click', function() {
                setTimeout(() => {
                    reindexCheckboxTarget();
                    updatePreviewKegiatan();
                }, 50);
            });

            // Hapus pertemuan
            $(document).on('click', '.btn-hapus-kegiatan', function() {
                setTimeout(() => {
                    reindexCheckboxTarget();
                    updatePreviewKegiatan();
                }, 50);
            });

            // Jalankan saat pertama kali
            reindexCheckboxTarget();
            updatePreviewKegiatan();
        });
    </script>

    <!--  TAMPILKAN ASESMEN FORMATIF DAN SUMATIF  -->
    <script>
        $(document).ready(function() {
            function updatePreviewAsesmen() {
                const preview = $('#assesment');
                preview.empty(); // kosongkan isi sebelumnya

                // FORMATIF
                if ($('#asesmen_formatif_cb').is(':checked')) {
                    const formatifList = $('#formatif-container input[name="formatif[]"]')
                        .map(function() {
                            const val = $(this).val().trim();
                            return val ? `<li>${val}</li>` : '';
                        }).get().join('');

                    if (formatifList) {
                        preview.append(
                            `<strong>Asesmen Formatif :</strong><br><ol style="margin-left:-20px;">${formatifList}</ol>`
                        );
                    }
                }

                // SUMATIF
                if ($('#asesmen_sumatif_cb').is(':checked')) {
                    const sumatifList = $('#sumatif-container input[name="sumatif[]"]')
                        .map(function() {
                            const val = $(this).val().trim();
                            return val ? `<li>${val}</li>` : '';
                        }).get().join('');

                    if (sumatifList) {
                        preview.append(
                            `<strong>Asesmen Sumatif :</strong><br><ol style="margin-left:-20px;">${sumatifList}</ol>`
                        );
                    }
                }
            }

            // Input langsung update
            $('#formatif-container, #sumatif-container').on('input',
                'input[name="formatif[]"], input[name="sumatif[]"]', updatePreviewAsesmen);

            // Checkbox form/sumatif
            $('#asesmen_formatif_cb, #asesmen_sumatif_cb').on('change', updatePreviewAsesmen);

            // Observer: deteksi tambah/hapus baris asesmen
            const observerAsesmen = new MutationObserver(updatePreviewAsesmen);
            observerAsesmen.observe(document.getElementById('formatif-container'), {
                childList: true,
                subtree: true
            });
            observerAsesmen.observe(document.getElementById('sumatif-container'), {
                childList: true,
                subtree: true
            });

            // Init
            updatePreviewAsesmen();
        });
    </script>

    <!--  TAMPILKAN REFLEKSI PENDIDIK DAN PESERTA DIDIK -->
    <script>
        $(document).ready(function() {
            function updatePreviewRefleksi() {
                const preview = $('#refleksi-preview');
                preview.empty();

                // REFLEKSI PENDIDIK
                if ($('#refleksi_pendidik_cb').is(':checked')) {
                    const pendidikList = $('#refleksi-pendidik-container input[name="refleksi-pendidik[]"]')
                        .map(function() {
                            const val = $(this).val().trim();
                            return val ? `<li>${val}</li>` : '';
                        }).get().join('');

                    if (pendidikList) {
                        preview.append(
                            `<strong>Refleksi Pendidik :</strong><br><ol style="margin-left:-20px;">${pendidikList}</ol>`
                        );
                    }
                }

                // REFLEKSI PESERTA DIDIK
                if ($('#refleksi_peserta_cb').is(':checked')) {
                    const pesertaList = $('#refleksi-pesertadidik-container input[name="refleksi-pesertadidik[]"]')
                        .map(function() {
                            const val = $(this).val().trim();
                            return val ? `<li>${val}</li>` : '';
                        }).get().join('');

                    if (pesertaList) {
                        preview.append(
                            `<strong>Refleksi Peserta Didik :</strong><br><ol style="margin-left:-20px;">${pesertaList}</ol>`
                        );
                    }
                }
            }

            // Input langsung update preview
            $('#refleksi-pendidik-container, #refleksi-pesertadidik-container').on(
                'input',
                'input[name="refleksi-pendidik[]"], input[name="refleksi-pesertadidik[]"]',
                updatePreviewRefleksi
            );

            // Checkbox toggle
            $('#refleksi_pendidik_cb, #refleksi_peserta_cb').on('change', updatePreviewRefleksi);

            // ✅ Observer: deteksi perubahan baris (tambah/hapus)
            const observerRefleksi = new MutationObserver(updatePreviewRefleksi);
            observerRefleksi.observe(document.getElementById('refleksi-pendidik-container'), {
                childList: true,
                subtree: true
            });
            observerRefleksi.observe(document.getElementById('refleksi-pesertadidik-container'), {
                childList: true,
                subtree: true
            });

            // Initial trigger
            updatePreviewRefleksi();
        });
    </script>

    <!--  TAMPILKAN KEPALA SEKOLAH DAN GURU MAPEL  -->
    <script>
        $(document).ready(function() {
            function updateKepsek() {
                const val = $('#kepsek').val().trim();
                $('#namaKepsek').text(val ? `${val}` : '');
            }

            function updateNipKepsek() {
                const val = $('#nip-kepsek').val().trim();
                $('#nipKepsek').text(val ? `NIP. ${val}` : '');
            }

            function updateGuruMapel() {
                const val = $('#guru-mapel').val().trim();
                $('#namaGuruMapel').text(val ? `${val}` : '');
            }

            function updatenipGuruMapel() {
                const val = $('#nip-gurumapel').val().trim();
                $('#nipGuruMapel').text(val ? `NIP. ${val}` : '');
            }

            // Jalankan saat pertama kali halaman dimuat
            updateKepsek();
            updateNipKepsek();
            updateGuruMapel();
            updatenipGuruMapel();

            // Jalankan saat user mengetik
            $('#kepsek').on('keyup', updateKepsek);
            $('#nip-kepsek').on('keyup', updateNipKepsek);
            $('#guru-mapel').on('keyup', updateGuruMapel);
            $('#nip-gurumapel').on('keyup', updatenipGuruMapel);
        });
    </script>


    <!--  TAMPILKAN LAMPIRAN  -->
    <script>
        $(document).ready(function() {
            function updatePreviewLampiran() {
                const preview = $('#preview-lampiran');
                preview.empty();

                $('#lampiran-container input[name="lampiran[]"]').each(function() {
                    const val = $(this).val().trim();
                    if (val !== '') {
                        preview.append(`<li>${val}</li>`);
                    }
                });
            }

            // Perubahan isi input langsung update preview
            $(document).on('input', 'input[name="lampiran[]"]', updatePreviewLampiran);

            // Tambah/hapus pertanyaan juga panggil updatePreviewPertanyaan
            const observer = new MutationObserver(updatePreviewLampiran);
            observer.observe(document.getElementById('lampiran-container'), {
                childList: true,
                subtree: true
            });

            // Inisialisasi pertama kali
            updatePreviewLampiran();
        });
    </script>

    <!--  TAMPILKAN GLOSARIUM  -->
    <script>
        $(document).ready(function() {
            function updatePreviewGlosarium() {
                const previewList = $('#preview-glosarium');
                previewList.empty();

                $('.glosarium-row').each(function() {
                    const judul = $(this).find('input[name="glosarium-judul[]"]').val();
                    const desk = $(this).find('input[name="glosarium-desk[]"]').val();

                    if (judul || desk) {
                        const listItem = `
                        <li><strong>${judul}</strong><br>
                            <span style="font-weight: normal;">${desk}</span>
                        </li>`;
                        previewList.append(listItem);
                    }
                });
            }

            // Event listener input realtime
            $(document).on('input', 'input[name="glosarium-judul[]"]', updatePreviewGlosarium);
            $(document).on('input', 'input[name="glosarium-desk[]"]', updatePreviewGlosarium);

            // Observer ketika ada elemen glosarium ditambah atau dihapus
            const observer = new MutationObserver(updatePreviewGlosarium);
            observer.observe(document.getElementById('glosarium-container'), {
                childList: true,
                subtree: true
            });

            // Jalankan saat awal halaman dimuat
            updatePreviewGlosarium();
        });
    </script>

    <!--  TAMPILKAN DAFTAR PUSTAKA  -->
    <script>
        $(document).ready(function() {
            function updatePreviewDaftarPustaka() {
                const preview = $('#preview-daftarpustaka');
                preview.empty();

                $('#daftarpustaka-container input[name="daftarpustaka[]"]').each(function() {
                    const val = $(this).val().trim();
                    if (val !== '') {
                        preview.append(`<li>${val}</li>`);
                    }
                });
            }

            // Perubahan isi input langsung update preview
            $(document).on('input', 'input[name="daftarpustaka[]"]', updatePreviewDaftarPustaka);

            // Tambah/hapus pertanyaan juga panggil updatePreviewPertanyaan
            const observer = new MutationObserver(updatePreviewDaftarPustaka);
            observer.observe(document.getElementById('daftarpustaka-container'), {
                childList: true,
                subtree: true
            });

            // Inisialisasi pertama kali
            updatePreviewDaftarPustaka();
        });
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

@extends('layouts.master')
@section('title')
    @lang('translation.formatif')
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
            @lang('translation.penilaian')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1">Edit Nilai @yield('title') - {{ $fullName }}</h5>
            <div>
                <button id="hapusdata" class="btn btn-soft-danger btn-sm" data-kode-rombel="{{ $data->kode_rombel }}"
                    data-kel-mapel="{{ $data->kel_mapel }}" data-id-personil="{{ $data->id_personil }}"
                    data-tahunajaran="{{ $data->tahunajaran }}" data-ganjilgenap="{{ $data->ganjilgenap }}">
                    <i class="ri-delete-bin-2-line"></i>
                </button>
                <x-btn-kembali href="{{ route('gurumapel.penilaian.formatif.index') }}" />
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @include('pages.gurumapel.ident-kbm')
                <div class="col-xl-6 col-md-6">
                    <!-- Rounded Ribbon -->
                    <div class="card ribbon-box border shadow-none mb-lg-3">
                        <div class="card-body">
                            <div class="ribbon ribbon-primary round-shape">Tujuan Pembelajaran</div>
                            <h5 class="fs-14 text-end"></h5>
                            <div class="ribbon-content mt-5 text-muted">
                                <table>
                                    @foreach ($tujuanPembelajaran as $index => $tp)
                                        <tr>
                                            <td valign="top" width='25px'>{{ $index + 1 }}.</td>
                                            <td>{{ $tp->tp_isi }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->

            <form action="{{ route('gurumapel.penilaian.formatif.update', $data->id) }}" method="post">
                @csrf
                @method('PUT') <!-- Tambahkan method PUT untuk update -->
                <input type="hidden" name="kode_mapel_rombel" value="{{ $data->kode_mapel_rombel }}">
                <input type="hidden" name="tahunajaran" value="{{ $data->tahunajaran }}">
                <input type="hidden" name="kode_kk" value="{{ $data->kode_kk }}">
                <input type="hidden" name="tingkat" value="{{ $data->tingkat }}">
                <input type="hidden" name="ganjilgenap" value="{{ $data->ganjilgenap }}">
                <input type="hidden" name="semester" value="{{ $data->semester }}">
                <input type="hidden" name="kode_rombel" value="{{ $data->kode_rombel }}">
                <input type="hidden" name="rombel" value="{{ $data->rombel }}">
                <input type="hidden" name="kel_mapel" value="{{ $data->kel_mapel }}">
                <input type="hidden" name="kode_mapel" value="{{ $data->kode_mapel }}">
                <input type="hidden" name="mata_pelajaran" value="{{ $data->mata_pelajaran }}">
                <input type="hidden" name="kkm" id="kkm" value="{{ $data->kkm }}">
                <input type="hidden" name="id_personil" value="{{ $data->id_personil }}">
                <input type="hidden" name="jml_tp" id="jml_tp" value="{{ $jumlahTP }}">


                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            @for ($i = 1; $i <= $jumlahTP; $i++)
                                <th>TP {{ $i }}</th>
                            @endfor
                            <th>Rata-rata</th>
                        </tr>
                    </thead>
                    <tbody id="selected_siswa_tbody">
                        @foreach ($pesertaDidik as $index => $siswa)
                            <tr>
                                <td class="bg-primary-subtle text-center">{{ $index + 1 }}</td>
                                <td>{{ $siswa->nis }}</td>
                                <td>{{ $siswa->nama_lengkap }}</td>
                                @for ($i = 1; $i <= $jumlahTP; $i++)
                                    <td class="text-center">
                                        <input type="text" class="tp-input"
                                            name="tp_nilai[{{ $siswa->nis }}][tp_{{ $i }}]"
                                            id="tp_nilai_{{ $siswa->nis }}_{{ $i }}"
                                            value="{{ $siswa->{'tp_nilai_' . $i} }}"
                                            style="width: 65px; text-align: center;" />

                                        <textarea name="tp_isi_{{ $siswa->nis }}_{{ $i }}" id="tp_isi_{{ $siswa->nis }}_{{ $i }}"
                                            class="d-none">{{ $tujuanPembelajaran[$i - 1]->tp_isi ?? '' }}</textarea>
                                    </td>
                                @endfor
                                <td class="bg-primary-subtle text-center">
                                    <input type="text" class="rerata_formatif"
                                        name="rerata_formatif_{{ $siswa->nis }}"
                                        id="rerata_formatif_{{ $siswa->nis }}" value="{{ $siswa->rerata_formatif }}"
                                        readonly style="width: 75px; text-align: center;" />
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="col-lg-12">
                    <div class="gap-2 hstack justify-content-end">
                        <x-btn-action size="btn-md" type="submit" label="Update" icon="ri-save-2-fill" class="w-100" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.addEventListener('input', function(e) {
            if (e.target.classList.contains('tp-input')) {
                const siswaNis = e.target.getAttribute('name').match(/\[(.*?)\]/)[1]; // Ambil NIS siswa
                const jumlahTP = parseInt(document.getElementById('jml_tp').value); // Ambil jumlah TP
                const kkm = parseFloat(document.getElementById('kkm')
                    .value); // Ambil KKM dari input dengan ID 'kkm'
                let totalNilai = 0;

                // Iterasi semua nilai TP untuk siswa
                for (let i = 1; i <= jumlahTP; i++) {
                    const nilaiInput = document.getElementById(`tp_nilai_${siswaNis}_${i}`);
                    const nilai = parseFloat(nilaiInput.value);

                    if (!isNaN(nilai)) {
                        totalNilai += nilai;

                        // Validasi nilai input, jika kurang dari KKM atau lebih dari 100
                        if (nilai < kkm || nilai > 100) {
                            nilaiInput.style.backgroundColor = 'red'; // Ubah warna latar belakang menjadi merah
                            nilaiInput.style.color = 'white'; // Ubah warna teks menjadi putih
                        } else {
                            nilaiInput.style.backgroundColor = ''; // Reset warna latar belakang
                            nilaiInput.style.color = ''; // Reset warna teks
                        }
                    }
                }

                // Hitung rata-rata dengan membagi total nilai dengan jumlah TP
                const rerataInput = document.getElementById(`rerata_formatif_${siswaNis}`);
                const rerataValue = (totalNilai / jumlahTP).toFixed(0);
                rerataInput.value = rerataValue;

                // Validasi rerata_formatif jika kurang dari KKM
                if (rerataValue < kkm || rerataValue > 100) {
                    rerataInput.style.backgroundColor = 'red'; // Ubah warna latar belakang menjadi merah
                    rerataInput.style.color = 'white'; // Ubah warna teks menjadi putih
                } else {
                    rerataInput.style.backgroundColor = ''; // Reset warna latar belakang
                    rerataInput.style.color = ''; // Reset warna teks
                }
            }
        });
        // Fungsi untuk memvalidasi nilai input
        function validateInputs() {
            const jumlahTP = parseInt(document.getElementById('jml_tp').value); // Ambil jumlah TP
            const kkm = parseFloat(document.getElementById('kkm').value); // Ambil KKM dari input dengan ID 'kkm'

            // Ambil semua input dengan class 'tp-input'
            const inputs = document.querySelectorAll('.tp-input');

            inputs.forEach(input => {
                const siswaNis = input.getAttribute('name').match(/\[(.*?)\]/)[1]; // Ambil NIS siswa
                const nilai = parseFloat(input.value);

                // Validasi nilai
                if (input.value.trim() === "" || isNaN(nilai)) {
                    // Jika nilai kosong atau tidak valid
                    input.style.backgroundColor = 'yellow'; // Ubah warna latar belakang menjadi kuning
                    input.style.color = 'black'; // Ubah warna teks menjadi hitam
                } else if (nilai < kkm || nilai > 100) {
                    // Jika nilai kurang dari KKM atau lebih dari 100
                    input.style.backgroundColor = 'red'; // Ubah warna latar belakang menjadi merah
                    input.style.color = 'white'; // Ubah warna teks menjadi putih
                } else {
                    // Jika nilai valid
                    input.style.backgroundColor = ''; // Reset warna latar belakang
                    input.style.color = ''; // Reset warna teks
                }

                // Ambil nilai rerata_formatif langsung
                const rerataInput = document.getElementById(`rerata_formatif_${siswaNis}`);
                const rerataValue = parseFloat(rerataInput.value);

                // Validasi rerata_formatif jika kurang dari KKM atau lebih dari 100
                if (isNaN(rerataValue) || rerataValue < kkm || rerataValue > 100) {
                    rerataInput.style.backgroundColor = 'red'; // Ubah warna latar belakang menjadi merah
                    rerataInput.style.color = 'white'; // Ubah warna teks menjadi putih
                } else {
                    rerataInput.style.backgroundColor = ''; // Reset warna latar belakang
                    rerataInput.style.color = ''; // Reset warna teks
                }
            });
        }


        // Jalankan validasi saat halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', validateInputs);
    </script>
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script>
        @if (session('toast_success'))
            showToast('success', '{{ session('toast_success') }}');
        @endif

        $(document).ready(function() {
            $('#hapusdata').on('click', function() {
                // Ambil data dari atribut data-* pada tombol
                var kodeRombel = $(this).data('kode-rombel');
                var kelMapel = $(this).data('kel-mapel');
                var idPersonil = $(this).data('id-personil');
                var thnAjaran = $(this).data('tahunajaran');
                var ganjilGenap = $(this).data('ganjilgenap');

                Swal.fire({
                    title: 'Apa Anda yakin?',
                    text: "Data ini akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('gurumapel.penilaian.hapusnilaiformatif') }}", // Ganti dengan route sesuai
                            type: 'POST', // Atau gunakan DELETE jika sesuai
                            data: {
                                _token: '{{ csrf_token() }}',
                                kode_rombel: kodeRombel,
                                kel_mapel: kelMapel,
                                id_personil: idPersonil,
                                tahunajaran: thnAjaran,
                                ganjilgenap: ganjilGenap
                            },
                            success: function(response) {
                                showToast('success', 'Data berhasil dihapus!');
                                // Reload tabel atau halaman jika perlu
                                window.location.href =
                                    "{{ route('gurumapel.penilaian.formatif.index') }}";
                            },
                            error: function(xhr) {
                                showToast('error',
                                    'Terjadi kesalahan saat menghapus data!');
                            }
                        });
                    }
                });
            });
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

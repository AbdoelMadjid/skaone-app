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
    <div class="row">
        <div class="col-lg-12">
            <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Tambah Nilai @yield('title') - {{ $fullName }}</h5>
                    <div>
                        {{-- <div class="btn-group dropstart">
                            <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"
                                class="btn btn-soft-info btn-icon fs-14"><i class="ri-more-2-fill"></i></button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <li><a href="{{ route('gurumapel.penilaian.exportformatif', ['kode_rombel' => $data->kode_rombel, 'kel_mapel' => $data->kel_mapel, 'id_personil' => $data->id_personil]) }}"
                                        class="dropdown-item btn btn-soft-primary" tittle="Download Format Nilai Formatif">
                                        <i class="bx bx-download"></i> Download</a></li>
                                <li><button class="dropdown-item btn btn-soft-success" data-bs-toggle="modal"
                                        data-bs-target="#modalUploadFormatif" tittle="Upload Nilai Formatif">
                                        <i class="bx bx-upload"></i> Upload</button></li>
                            </ul>
                        </div> --}}
                        <a class="btn btn-soft-primary"
                            href="{{ route('kurikulum.dokumenguru.arsip-gurumapel.index') }}">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @include('pages.kurikulum.dokumenguru.ident-kbm')
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

                    <form action="{{ route('kurikulum.dokumenguru.formatif.storenilaiFormatif') }}" method="post">
                        @csrf
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
                                                    id="tp_nilai_{{ $siswa->nis }}_{{ $i }}" value=""
                                                    style="width: 65px; text-align: center;" />
                                                <!-- Textarea untuk tujuan pembelajaran -->
                                                @if (isset($tujuanPembelajaran[$i - 1]))
                                                    <textarea name="tp_isi_{{ $siswa->nis }}_{{ $i }}" id="tp_isi_{{ $siswa->nis }}_{{ $i }}"
                                                        rows="5" class="d-none">{{ $tujuanPembelajaran[$i - 1]->tp_isi }}</textarea>
                                                @else
                                                    <textarea name="tp_isi_{{ $siswa->nis }}_{{ $i }}" id="tp_isi_{{ $siswa->nis }}_{{ $i }}"
                                                        rows="5" class="d-none"></textarea>
                                                @endif
                                            </td>
                                        @endfor
                                        <td class="bg-primary-subtle text-center">
                                            <input type="text" class="rerata_formatif"
                                                name="rerata_formatif_{{ $siswa->nis }}"
                                                id="rerata_formatif_{{ $siswa->nis }}" readonly
                                                style="width: 75px; text-align: center;" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-lg-12">
                            <div class="gap-2 hstack justify-content-end">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div id="session-message" data-message="{{ session('success') }}"></div>
    @endif
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
    </script>
@endsection
@section('script-bottom')
    {{--  --}}
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

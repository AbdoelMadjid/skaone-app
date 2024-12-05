<x-form.modal size="xl" title="Formatif - {{ $fullName }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        @include('pages.gurumapel.ident-kbm')
        <div class="col-xl-6 col-md-6">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex bg-info-subtle">
                    <h4 class="card-title mb-0 flex-grow-1">Data Tujuan Pembelajaran</h4>
                </div>
                <div class="card-body">
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
    </div><!--end row-->

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
                        <input type="text" class="rerata_formatif" name="rerata_formatif_{{ $siswa->nis }}"
                            id="rerata_formatif_{{ $siswa->nis }}" readonly
                            style="width: 75px; text-align: center;" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-form.modal>
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
            const rerataValue = (totalNilai / jumlahTP).toFixed(2);
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

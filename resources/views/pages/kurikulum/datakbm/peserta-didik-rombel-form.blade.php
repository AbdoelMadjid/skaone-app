<x-form.modal size="lg" title="{{ __('translation.peserta-didik-rombel') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-4">
            <x-form.select name="tahun_ajaran" label="Tahun Ajaran" :options="$tahunAjaranOptions" value="{{ $data->tahun_ajaran }}"
                id="tahun_ajaran" />
        </div>
        <div class="col-md-4">
            <x-form.select name="kode_kk" label="Kompetensi Keahlian" :options="$kompetensiKeahlianOptions" value="{{ $data->kode_kk }}"
                id="kode_kk" />
        </div>
        <div class="col-md-4">
            <x-form.select name="rombel_tingkat" :options="['10' => '10', '11' => '11', '12' => '12']" value="{{ old('tingkat', $data->rombel_tingkat) }}"
                label="Tingkat" id="tingkat" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="kode_rombel">Rombel</label>
            <select class="form-control mb-3" name="rombel_kode" id="kode_rombel" required>
                <option value="" selected>Pilih Rombel</option>
                @foreach ($rombonganBelajar as $kode => $rombel)
                    <option value="{{ $kode }}"
                        {{ (string) $kode === (string) $selectedRombel ? 'selected' : '' }}>
                        {{ $rombel }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <x-form.input name="rombel_nama" value="{{ $data->rombel }}" label="Rombel" id="rombel_input" />
        </div>
        <div class="col-md-4">
            <x-form.select name="nis" label="Peserta Didik" :options="$pesertaDidikOptions" value="{{ $data->nis }}"
                id="nis" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {{-- <select multiple="multiple" name="daftarsiswa[]" id="multiselect-optiongroup">
                @foreach ($peserta_didiks as $idkk => $pesertas)
                    <optgroup label="{{ $idkk }} - {{ $pesertas->first()->nama_kk }}">
                        @foreach ($pesertas as $peserta)
                            <option value="{{ $peserta->nis }}">{{ $peserta->nis }} -
                                {{ $peserta->nama_lengkap }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select> --}}
            <select multiple="multiple" name="daftarsiswa[]" id="multiselect-optiongroup">
                <option value="" disabled>Pilih Siswa</option>
            </select>
        </div>
    </div>
</x-form.modal>
<script>
    var multiSelectOptGroup = document.getElementById("multiselect-optiongroup");
    if (multiSelectOptGroup) {
        multi(multiSelectOptGroup, {
            enable_search: true
        });
    }

    document.getElementById('nis').addEventListener('change', function() {
        document.getElementById('multiselect-optiongroup').disabled = this.value ? true : false;
    });

    document.getElementById('multiselect-optiongroup').addEventListener('change', function() {
        document.getElementById('nis').disabled = this.value.length >
            0; // Disable 'nis' if any option is selected
    });

    function updateRombel() {
        var tahunajaran = $('#tahun_ajaran').val();
        var kode_kk = $('#kode_kk').val();
        var tingkat = $('#tingkat').val();

        // Hanya melakukan request jika tahun ajaran, kode_kk, dan tingkat terpilih
        if (tahunajaran && kode_kk && tingkat) {
            $.ajax({
                url: "{{ route('kurikulum.datakbm.get-rombonganbelajar') }}",
                type: "GET",
                data: {
                    tahun_ajaran: tahunajaran,
                    kode_kk: kode_kk,
                    tingkat: tingkat
                },
                success: function(data) {
                    $('#kode_rombel').empty();
                    $('#kode_rombel').append('<option value="" selected>Pilih Rombel</option>');

                    // Cek apakah data tidak kosong
                    if (data && Object.keys(data).length > 0) {
                        $.each(data, function(index, item) {
                            $('#kode_rombel').append('<option value="' + index + '">' + item +
                                '</option>');
                        });
                        $('#rombel_input').val(''); // Bersihkan input Rombel jika ada data
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error:', xhr.responseText);
                }
            });
        } else {
            $('#kode_rombel').empty();
            $('#kode_rombel').append('<option value="" selected>Pilih Rombel</option>');
            $('#rombel_input').val('');
        }
    }

    // Inisialisasi DataTable
    $(document).ready(function() {
        // Event listener untuk select elements
        $('#tahun_ajaran, #kode_kk, #tingkat').on('change', updateRombel);

        $('#modal_action').on('shown.bs.modal', function() {
            updateRombel();
        });

        // Saat opsi Rombel dipilih, tampilkan nama Rombel di input text
        $('#kode_rombel').on('change', function() {
            var selectedRombel = $(this).find('option:selected').text();
            $('#rombel_input').val(selectedRombel); // Set nama rombel ke input text
        });

        $('#kode_kk').change(function() {
            var kode_kk = $(this).val();
            var tahun_ajaran = $('#tahun_ajaran').val(); // Pastikan tahun ajaran diambil dengan benar

            if (kode_kk && tahun_ajaran) {
                $.ajax({
                    url: '/kurikulum/datakbm/get-peserta-didik/' + kode_kk,
                    type: 'GET',
                    data: {
                        tahun_ajaran: tahun_ajaran // Pastikan tahun ajaran dikirim sebagai parameter
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#multiselect-optiongroup').empty(); // Kosongkan opsi sebelumnya

                        if (data && data.length > 0) {
                            var groupedData = {};
                            $.each(data, function(index, peserta) {
                                var groupKey = peserta
                                    .kode_kk; // Atau gunakan field yang sesuai untuk pengelompokan
                                if (!groupedData[groupKey]) {
                                    groupedData[groupKey] = [];
                                }
                                groupedData[groupKey].push(peserta);
                            });

                            $.each(groupedData, function(key, pesertas) {
                                var optgroup = $('<optgroup>').attr('label', key);
                                $.each(pesertas, function(i, peserta) {
                                    optgroup.append(
                                        $('<option>').val(peserta.nis)
                                        .text(peserta.nis + ' - ' +
                                            peserta.nama_lengkap)
                                    );
                                });
                                $('#multiselect-optiongroup').append(optgroup);
                            });
                        } else {
                            $('#multiselect-optiongroup').append(
                                '<option value="" disabled>Tidak ada siswa ditemukan</option>'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', xhr.responseText);
                    }
                });
            } else {
                $('#multiselect-optiongroup').empty();
                $('#multiselect-optiongroup').append('<option value="" disabled>Pilih Siswa</option>');
            }
        });
    });
</script>

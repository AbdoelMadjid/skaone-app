<x-form.modal size="lg" title="{{ __('translation.jadwal-mingguan') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-3">
            <x-form.select name="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaranOptions" value="{{ $data->tahunajaran }}"
                id="tahunajaran" />
        </div>
        <div class="col-md-3">
            <x-form.select name="semester" label="Semester" :options="['Ganjil' => 'Ganjil', 'Genap' => 'Genap']"
                value="{{ old('semester', $data->semester) }}" id="semester" />
        </div>
        <div class="col-md-6">
            <x-form.select name="kode_kk" label="Kompetensi Keahlian" :options="$kompetensiKeahlianOptions" value="{{ $data->kode_kk }}"
                id="kode_kk" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <x-form.select name="tingkat" :options="['10' => '10', '11' => '11', '12' => '12']" value="{{ old('tingkat', $data->tingkat) }}" label="Tingkat"
                id="tingkat" />
        </div>
        <div class="col-md-3">
            <x-form.select name="kode_rombel" label="Rombongan Belajar" :options="$rombonganBelajar"
                value="{{ old('kode_rombel', $data->kode_rombel) }}" id="rombel" disabled />
        </div>
        <div class="col-md-6">
            <x-form.select name="id_personil" label="Personil Sekolah" :options="[]" id="id_personil" disabled />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <x-form.select name="mata_pelajaran" label="Mata Pelajaran" :options="[]" id="mata_pelajaran"
                disabled />
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <x-form.select name="hari" label="Hari" :options="[
                'Senin' => 'Senin',
                'Selasa' => 'Selasa',
                'Rabu' => 'Rabu',
                'Kamis' => 'Kamis',
                'Jumat' => 'Jumat',
            ]" value="{{ $data->hari }}" id="hari" />
        </div>
        <div class="col-md-9">
            <label class="form-label">Jam Ke</label>
            <div class="row">
                @for ($row = 0; $row < 3; $row++)
                    <div class="row mb-4">
                        @for ($col = 0; $col < 5; $col++)
                            @php
                                $i = $row * 5 + $col + 1;
                                $staticDisabled = in_array($i, [6, 10]); // permanent disable
                            @endphp
                            <div class="col-2">
                                @if ($i <= 13)
                                    <div class="form-check">
                                        <input class="form-check-input jam-ke-checkbox" type="checkbox" name="jam_ke[]"
                                            id="jam_ke_{{ $i }}" value="{{ $i }}"
                                            {{ in_array($i, old('jam_ke', [$data->jam_ke])) ? 'checked' : '' }}
                                            {{ $staticDisabled ? 'disabled' : '' }}>
                                        <label
                                            class="form-check-label {{ $staticDisabled ? 'text-decoration-line-through' : '' }}"
                                            for="jam_ke_{{ $i }}" id="label_jam_ke_{{ $i }}">
                                            {{ $i }}
                                        </label>
                                    </div>
                                @endif
                            </div>
                        @endfor
                    </div>
                @endfor
            </div>
        </div>
    </div>
</x-form.modal>
<script>
    function loadRombels() {
        const tahunajaran = $('#tahunajaran').val();
        const kodeKK = $('#kode_kk').val();
        const tingkat = $('#tingkat').val();

        if (tahunajaran && kodeKK && tingkat) {
            $.ajax({
                url: "{{ route('kurikulum.datakbm.getrombeljadwals') }}",
                type: 'GET',
                data: {
                    tahunajaran: tahunajaran,
                    kode_kk: kodeKK,
                    tingkat: tingkat
                },
                success: function(data) {
                    let rombelSelect = $('#rombel');
                    rombelSelect.empty().append('<option value="">Pilih Rombel</option>');
                    $.each(data, function(kode, nama) {
                        rombelSelect.append(`<option value="${kode}">${nama}</option>`);
                    });

                    // Aktifkan select setelah data dimuat
                    rombelSelect.prop('disabled', false);
                },
                error: function() {
                    alert('Gagal mengambil data rombel.');
                }
            });
        }
    }

    function loadPersonil() {
        const tahunajaran = $('#tahunajaran').val();
        const kode_kk = $('#kode_kk').val();
        const tingkat = $('#tingkat').val();
        const semester = $('#semester').val();
        const kode_rombel = $('#rombel').val();

        if (tahunajaran && kode_kk && tingkat && semester && kode_rombel) {
            $.ajax({
                url: '/kurikulum/datakbm/get-personil-jadwal',
                method: 'GET',
                data: {
                    tahunajaran,
                    kode_kk,
                    tingkat,
                    semester,
                    kode_rombel
                },
                success: function(data) {
                    let $personil = $('#id_personil');
                    $personil.prop('disabled', false).empty().append(
                        '<option value="">Pilih Personil</option>');
                    $.each(data, function(id, nama) {
                        $personil.append(`<option value="${id}">${nama}</option>`);
                    });
                }
            });
        } else {
            $('#id_personil').prop('disabled', true).empty().append('<option value="">Pilih Personil</option>');
        }
    }

    function loadMataPelajaran() {
        const tahunajaran = $('#tahunajaran').val();
        const kode_kk = $('#kode_kk').val();
        const tingkat = $('#tingkat').val();
        const semester = $('#semester').val();
        const kode_rombel = $('#rombel').val();
        const id_personil = $('#id_personil').val();

        if (tahunajaran && kode_kk && tingkat && semester && kode_rombel && id_personil) {
            $.ajax({
                url: '/kurikulum/datakbm/get-mapel-by-personil',
                method: 'GET',
                data: {
                    tahunajaran,
                    kode_kk,
                    tingkat,
                    semester,
                    kode_rombel,
                    id_personil
                },
                success: function(data) {
                    let $mapel = $('#mata_pelajaran');
                    $mapel.prop('disabled', false).empty().append(
                        '<option value="">Pilih Mata Pelajaran</option>');
                    $.each(data, function(index, item) {
                        $mapel.append(
                            `<option value="${item.kode_mapel_rombel}">${item.mata_pelajaran}</option>`
                        );
                    });
                }
            });
        } else {
            $('#mata_pelajaran').prop('disabled', true).empty().append(
                '<option value="">Pilih Mata Pelajaran</option>');
        }
    }

    function updateDisabledJamKe1() {
        const selectedHari = $('#hari').val();
        const jamKe1Checkbox = $('#jam_ke_1');

        if (selectedHari === 'Senin' || selectedHari === 'Jumat') {
            jamKe1Checkbox.prop('checked', false);
            jamKe1Checkbox.prop('disabled', true);
            $('label[for="jam_ke_1"]').addClass('text-decoration-line-through text-muted');
        } else {
            jamKe1Checkbox.prop('disabled', false);
            $('label[for="jam_ke_1"]').removeClass('text-decoration-line-through text-muted');
        }
    }

    function cekJadwalTerisi() {
        const tahunajaran = $('#tahunajaran').val();
        const semester = $('#semester').val();
        const kode_kk = $('#kode_kk').val();
        const tingkat = $('#tingkat').val();
        const kode_rombel = $('#rombel').val();
        const hari = $('#hari').val();

        if (tahunajaran && semester && kode_kk && tingkat && kode_rombel && hari) {
            $.ajax({
                url: '/kurikulum/datakbm/cek-jam-ke',
                method: 'GET',
                data: {
                    tahunajaran,
                    semester,
                    kode_kk,
                    tingkat,
                    kode_rombel,
                    hari
                },
                success: function(jamKeTerisi) {
                    $('.jam-ke-checkbox').each(function() {
                        const jam = parseInt($(this).val());
                        const label = $('#label_jam_ke_' + jam);

                        const isStaticDisabled = [6, 10].includes(
                            jam); // jam ke 6 dan 10 tidak pernah aktif
                        const isTerisi = jamKeTerisi.includes(jam);
                        const hari = $('#hari').val();

                        // Cek hari khusus
                        const isHariKhusus = (hari === 'Senin' || hari === 'Jumat') && jam === 1;

                        if (isStaticDisabled || isTerisi || isHariKhusus) {
                            $(this).prop('checked', false).prop('disabled', true);
                            label.addClass('text-muted text-decoration-line-through');
                        } else {
                            $(this).prop('disabled', false);
                            label.removeClass('text-muted text-decoration-line-through');
                        }
                    });

                    //updateDisabledJamKe1(); // tetap panggil untuk cek Senin/Jumat
                }
            });
        }
    }


    $(document).ready(function() {

        // Jalankan saat pertama kali halaman dimuat
        updateDisabledJamKe1();

        // Jalankan ulang setiap kali select hari berubah
        $('#hari').on('change', function() {
            updateDisabledJamKe1();
        });

        $('#tingkat').on('change', function() {
            const tingkat = $(this).val();

            if (tingkat) {
                $('#rombel').prop('disabled', false);
            } else {
                $('#rombel').prop('disabled', true).empty().append(
                    '<option value="">Pilih Rombel</option>');
            }

            loadRombels(); // jika mau langsung load rombel juga
        });

        $('#tahunajaran, #kode_kk, #tingkat, #semester, #rombel').on('change', function() {
            loadPersonil();
        });

        // Trigger saat salah satu filter berubah
        $('#tahunajaran, #kode_kk, #tingkat').on('change', function() {
            loadRombels();
        });

        // Trigger ketika personil dipilih
        $('#id_personil').on('change', function() {
            loadMataPelajaran();
        });

        $('#tahunajaran, #semester, #kode_kk, #tingkat, #rombel, #hari').on('change', function() {
            cekJadwalTerisi();
        });

        // Panggil awal jika data sudah ada (edit)
        cekJadwalTerisi();


        @if ($data->id)
            // Set nilai filter yang sudah tersimpan
            $('#tahunajaran').val('{{ $data->tahunajaran }}');
            $('#kode_kk').val('{{ $data->kode_kk }}');
            $('#tingkat').val('{{ $data->tingkat }}');

            // Panggil loadRombels agar dropdown rombel terisi sesuai filter
            loadRombels();

            // Tunggu isi rombel selesai, lalu set value rombel-nya
            setTimeout(function() {
                $('#rombel').val('{{ $data->kode_rombel }}');
                loadPersonil();

                setTimeout(function() {
                    $('#id_personil').val('{{ $data->id_personil }}');
                    loadMataPelajaran();

                    setTimeout(function() {
                        $('#mata_pelajaran').val('{{ $data->mata_pelajaran }}');
                    }, 400);
                }, 400);
            }, 400);
        @endif
    });
</script>

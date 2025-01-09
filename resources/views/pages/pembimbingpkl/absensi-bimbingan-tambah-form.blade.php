<form action="{{ route('pembimbingpkl.absensi-bimbingan.simpanabsensi') }}" method="post">
    @csrf
    <div class="card">
        <div class="card-header">Tambah Absensi</div>
        <div class="card-body">
            <input type="hidden" name="nis" value="{{ $siswa->nis }}">
            <div class="row mt-3">
                <div class="col-md-4">
                    <x-form.input type="date" name="tanggal" label="Tanggal Kehadiran" value=""
                        id="tanggal" />
                </div>
                <div class="col-md-8">
                    <x-form.select name="status" :options="[
                        'HADIR' => 'HADIR',
                        'SAKIT' => 'SAKIT',
                        'IZIN' => 'IZIN',
                        'ALFA' => 'ALFA',
                        'LIBUR' => 'LIBUR',
                    ]" value="" label="Status Kehadiran" />
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="gap-2 hstack justify-content-end">
                <button type="submit" class="btn btn-soft-info">Simpan</button>
            </div>
        </div><!-- end card body -->
    </div>
</form>

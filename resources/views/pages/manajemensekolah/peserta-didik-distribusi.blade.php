<div class="modal fade" id="distribusiSiswa" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('manajemensekolah.simpandistribusi') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Distribusi Peserta Didik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="selected_siswa_ids" id="selected_siswa_ids" value="">



                    <div class="row">
                        <div class="col-md-4">
                            <label for="tahunajaran">Tahun Ajaran</label>
                            <select class="form-control mb-3" name="tahun_ajaran" id="tahunajaran" required>
                                <option value="" selected>Pilih TA</option>
                                @foreach ($tahunAjaran as $tahunajaran => $thajar)
                                    <option value="{{ $tahunajaran }}">{{ $thajar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="aa">Kompetensi Keahlian</label>
                            <select class="form-control mb-3" name="kode_kk" id="aa" required>
                                <option value="" selected>Pilih Kompetensi Keahlian</option>
                                @foreach ($kompetensiKeahlian as $idkk => $nama_kk)
                                    <option value="{{ $idkk }}">{{ $nama_kk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="tingkat">Tingkat</label>
                            <select class="form-control mb-3" name="tingkat" id="tingkat" required>
                                <option value="" selected>Pilih Tingkat</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="kode_rombel">Rombel</label>
                            <select class="form-control mb-3" name="kode_rombel" id="kode_rombel" required>
                                <option value="" selected>Pilih Rombel</option>
                                <!-- Rombel akan diisi dengan data dari AJAX -->
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="rombel_input">Nama Rombel</label>
                            <input type="text" class="form-control" name="rombel" id="rombel_input" required>
                        </div>
                    </div>

                    <div id="selected_siswa_list">
                        <!-- Tabel ini akan diisi dengan data peserta didik yang dipilih -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NIS</th>
                                    <th>Nama Lengkap</th>
                                    <th>Kode KK</th>
                                    <th>Kompetensi Keahlian</th> <!-- Tambahkan kolom Nama KK -->
                                    <th>Pilih</th> <!-- kolom baru -->
                                </tr>
                            </thead>
                            <tbody id="selected_siswa_tbody">
                                <!-- Baris data siswa yang dipilih akan muncul di sini -->
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <x-form.modal-footer-button label="Distribusikan" icon="ri-database-2-fill" />
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Saat form distribusi dikirim
        const form = document.querySelector('#distribusiSiswa form');

        form.addEventListener('submit', function(e) {
            // Ambil semua siswa yang diceklis dalam modal
            let finalSelectedIds = [];

            document.querySelectorAll('.chk-modal:checked').forEach(function(checkbox) {
                finalSelectedIds.push(checkbox.dataset.id);
            });

            // Update input hidden dengan ID siswa yang benar-benar diceklis
            document.getElementById('selected_siswa_ids').value = finalSelectedIds.join(',');
        });
    });
</script>

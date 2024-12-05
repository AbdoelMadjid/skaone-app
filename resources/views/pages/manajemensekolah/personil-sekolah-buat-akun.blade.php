<div class="modal fade" id="simpanakunPersonil" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="generate-akun" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Buat Akun Personil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="selected_personil_ids" id="selected_personil_ids" value="">
                    <div id="selected_personil_list">
                        <!-- Tabel ini akan diisi dengan data peserta didik yang dipilih -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID Personil</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Personil</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="selected_personil_tbody">
                                <!-- Baris data siswa yang dipilih akan muncul di sini -->
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Buat Akun Personil</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="simpanakunPersonil" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="generate-akun" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Buat Akun Personil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"
                    style="max-height: calc(100vh - 200px); overflow-y: auto; margin-top:25px; margin-botom:15px;">
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
                    <x-form.modal-footer-button label="Buat Akun Personil" icon="ri-user-fill" />
                </div>
            </form>
        </div>
    </div>
</div>

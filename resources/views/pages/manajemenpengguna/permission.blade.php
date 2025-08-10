@extends('layouts.master')
@section('title')
    @lang('translation.permissions')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.manajemen-pengguna')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header d-flex align-items-center">
            <x-heading-title>@yield('title')</x-heading-title>
            <div class="flex-shrink-0">
                <x-btn-tambah dinamisBtn="true" can="create manajemenpengguna/permissions"
                    route="manajemenpengguna.permissions.create" />
                <x-btn-action dinamisBtn="true" title="Tambah permission untuk role" label="Permission Role"
                    icon="ri-user-add-fill" data-bs-toggle="modal" data-bs-target="#permissionModal" />
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="permissionModal" tabindex="-1" aria-labelledby="permissionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="permissionForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="permissionModalLabel">Tambah Permission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="role" class="form-label">Pilih Role</label>
                            <select class="form-select" id="role" name="role">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="route" class="form-label">Route (tanpa method)</label>
                            <input type="text" class="form-control" id="route" name="route"
                                placeholder="contoh: panitiaprakerin/administrasi/negosiator" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <x-form.modal-footer-button id="" label="Tambahkan" icon="ri-add-fill" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        document.getElementById('permissionForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch("{{ route('manajemenpengguna.generatepermission') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    showToast('success', data.message);
                    const modal = bootstrap.Modal.getInstance(document.getElementById('permissionModal'));
                    modal.hide();
                })
                .catch(err => {
                    showToast('error', 'Terjadi kesalahan saat menambahkan permission');
                    console.error(err);
                });
        });
    </script>

    <script>
        const datatable = 'permission-table';

        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

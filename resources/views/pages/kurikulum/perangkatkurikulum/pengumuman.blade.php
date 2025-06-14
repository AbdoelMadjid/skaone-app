@extends('layouts.master')
@section('title')
    @lang('translation.pengumuman')
@endsection
@section('css')
    {{-- --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.perangkat-kurikulum')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Daftar Judul Pengumuman</h4>
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#createModal">+ Tambah</button>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if ($data->count())
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Judul</th>
                                        <th>Status</th>
                                        <th>Jumlah Grup</th>
                                        <th>Jumlah Poin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $judul)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $judul->judul }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $judul->status == 'Y' ? 'success' : 'secondary' }}">
                                                    {{ $judul->status == 'Y' ? 'Tampil' : 'Sembunyi' }}
                                                </span>
                                            </td>
                                            <td class="text-center">{{ $judul->pengumumanTerkiniAktif->count() }}</td>
                                            <td class="text-center">
                                                {{ $judul->pengumumanTerkiniAktif->sum(fn($item) => $item->poin->count()) }}
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editModal-{{ $judul->id }}">
                                                    Edit
                                                </a>
                                                <form method="POST"
                                                    action="{{ route('kurikulum.perangkatkurikulum.pengumuman.destroy', $judul->id) }}"
                                                    class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">Belum ada data pengumuman.</div>
                    @endif
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    @include('pages.kurikulum.perangkatkurikulum._create_modal') {{-- Modal form create --}}
    @include('pages.kurikulum.perangkatkurikulum._edit_modal') {{-- Modal form create --}}
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-edit').forEach(btn => {
                btn.addEventListener('click', function() {
                    const url = this.dataset.url;
                    const form = document.getElementById('formEdit');

                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            // Set action form update
                            form.action = `/kurikulum/perangkatkurikulum/pengumuman/${data.id}`;

                            document.getElementById('edit_judul').value = data.judul;
                            document.getElementById('edit_status').value = data.status;

                            const wrapper = document.getElementById('editPengumumanWrapper');
                            wrapper.innerHTML = '';
                            let index = 0;

                            data.pengumuman.forEach(item => {
                                wrapper.insertAdjacentHTML('beforeend',
                                    renderPengumumanGroupEdit(index, item));
                                index++;
                            });

                            // Tampilkan modal
                            new bootstrap.Modal(document.getElementById('editModal')).show();
                        })
                        .catch(err => alert("Gagal memuat data."));
                });
            });
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

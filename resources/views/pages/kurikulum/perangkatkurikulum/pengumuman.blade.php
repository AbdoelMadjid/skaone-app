@extends('layouts.master')
@section('title')
    @lang('translation.pengumuman')
@endsection
@section('css')
    {{--  --}}
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
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-0">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    <x-btn-action dinamisBtn="true" data-bs-toggle="modal" data-bs-target="#createModal" Label="Tambah"
                        icon="ri-menu-add-fill" />
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            @if ($data->count())
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
                                    <span class="badge bg-{{ $judul->status == 'Y' ? 'primary' : 'danger' }}">
                                        {{ $judul->status == 'Y' ? 'Tampil' : 'Sembunyi' }}
                                    </span>
                                </td>
                                <td class="text-center">{{ $judul->pengumumanTerkiniAktif->count() }}</td>
                                <td class="text-center">
                                    {{ $judul->pengumumanTerkiniAktif->sum(fn($item) => $item->poin->count()) }}
                                </td>
                                <td class="text-center">
                                    <ul class="list-inline hstack gap-2 mb-0">
                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                            data-bs-placement="top" title="View">
                                            <a href="#" class="btn btn-sm btn-info"
                                                onclick="lihatDetail({{ $judul->id }})"><i
                                                    class="ri-eye-fill
                                                fs-14"></i></a>
                                        </li>
                                        <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                            data-bs-placement="top" title="Edit">
                                            <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editModal-{{ $judul->id }}">
                                                <i class="ri-pencil-fill fs-14"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                            data-bs-placement="top" title="Remove">
                                            <form method="POST"
                                                action="{{ route('kurikulum.perangkatkurikulum.pengumuman.destroy', $judul->id) }}"
                                                class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm btn-danger"><i
                                                        class="ri-delete-bin-5-fill fs-14"></i></button>
                                            </form>

                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info">Belum ada data pengumuman.</div>
            @endif
        </div>
    </div>
    <div class="p-2" id="tampil-detail-pengumuman"></div>
    @include('pages.kurikulum.perangkatkurikulum._create_modal') {{-- Modal form create --}}
    @include('pages.kurikulum.perangkatkurikulum._edit_modal') {{-- Modal form create --}}
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script>
        @if (session('toast_success'))
            showToast('success', '{{ session('toast_success') }}');
        @endif
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
    <script>
        function lihatDetail(id) {
            fetch(`/kurikulum/perangkatkurikulum/pengumuman/${id}`)
                .then(response => {
                    if (!response.ok) throw new Error("Gagal mengambil data.");
                    return response.text();
                })
                .then(html => {
                    document.getElementById("tampil-detail-pengumuman").innerHTML = html;
                    document.getElementById("tampil-detail-pengumuman").scrollIntoView({
                        behavior: 'smooth'
                    });
                })
                .catch(error => {
                    alert("Gagal menampilkan detail pengumuman.");
                    console.error(error);
                });
        }
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

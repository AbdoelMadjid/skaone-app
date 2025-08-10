@extends('layouts.master')
@section('title')
    @lang('translation.backup-db')
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.app-support')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>Backup Database</x-heading-title>
            </div>
        </div>
        <div class="card-body">
            <p>Backup database adalah proses untuk menyimpan data yang ada di database ke dalam file.</p>
            <form action="{{ route('appsupport.backup-db.process') }}" method="POST">
                @csrf
                <table class="table table-bordered" id="tables-list">
                    <thead>
                        <tr>
                            <th>Pilih</th>
                            <th>Nama Tabel</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tables as $table)
                            <tr>
                                <td class="text-center">
                                    <div class="form-check form-switch form-switch-md text-center" dir="ltr">
                                        <input type="checkbox" class="form-check-input" name="tables[]"
                                            value="{{ $table }}" id="customSwitch{{ $loop->index }}">
                                    </div>
                                </td>
                                <td>
                                    <span class="table-name" data-target="#customSwitch{{ $loop->index }}">
                                        {{ ucwords(str_replace('_', ' ', $table)) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-lg-12 mt-3">
                    <div class="gap-2 hstack justify-content-end">
                        <button type="submit" class="btn btn-soft-primary btn-sm">Backup Tabel yang Dipilih</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title">Download hasil Backup Database</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama File</th>
                        <th>Ukuran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($backupFiles as $index => $file)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $file }}</td>
                            <td>{{ number_format(Storage::size('backups/' . now()->format('Y-m-d') . '/' . $file) / 1024, 2) }}
                                KB</td>
                            <td>
                                <a href="{{ Storage::url('backups/' . now()->format('Y-m-d') . '/' . $file) }}"
                                    class="btn btn-info btn-sm" download>Download</a>
                                <form action="{{ route('appsupport.backup-db.delete', $file) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
@endsection
@section('script-bottom')
    <script>
        $(document).ready(function() {
            var table = $('#tables-list').DataTable({
                dom: 'Bfrtip',
                pageLength: 25,
            });

            $('#tables-list').on('click', '.table-name', function() {
                var targetCheckbox = $($(this).data('target'));
                if (targetCheckbox.length) {
                    targetCheckbox.prop('checked', !targetCheckbox.prop('checked'));
                }
            });
        });
    </script>
@endsection

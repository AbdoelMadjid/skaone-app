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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title">Backup Database</h5>
                </div>
                <div class="card-body">
                    <p>Backup database adalah proses untuk menyimpan data yang ada di database ke dalam file. File tersebut
                        dapat digunakan untuk mengembalikan data ke database jika terjadi kegagalan sistem atau kehilangan
                        data.</p>
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
                                            {{-- <input type="checkbox" name="tables[]" value="{{ current((array) $table) }}"> --}}
                                            <div class="form-check form-switch form-switch-md text-center" dir="ltr">
                                                <input type="checkbox" class="form-check-input" name="tables[]"
                                                    value="{{ current((array) $table) }}"
                                                    id="customSwitch{{ $loop->index }}">
                                                {{--  <label class="form-check-label"
                                                    for="customSwitch{{ $loop->index }}">{{ current((array) $table) }}</label> --}}
                                            </div>
                                        </td>
                                        <td>
                                            <span class="table-name" data-target="#customSwitch{{ $loop->index }}">
                                                {{ ucwords(str_replace('_', ' ', current((array) $table))) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-lg-12 mt-3">
                            <div class="gap-2 hstack justify-content-end">
                                <button type="submit" class="btn btn-primary">Backup Tabel yang Dipilih</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--end col-->
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
@endsection
@section('script-bottom')
    <script>
        @if (session('toast_success'))
            showToast('success', '{{ session('toast_success') }}');
        @endif

        $(document).ready(function() {
            /* $('#tables-list').DataTable({
                dom: 'Bfrtip',
                pageLength: 25
            }); */

            // Inisialisasi DataTable
            var table = $('#tables-list').DataTable({
                dom: 'Bfrtip',
                pageLength: 25
                // Pengaturan lainnya...
            });
            // Ketika nama tabel diklik, toggle checkbox yang sesuai
            $('#tables-list').on('click', '.table-name', function() {
                var targetCheckbox = $($(this).data('target')); // Ambil ID checkbox terkait
                targetCheckbox.prop('checked', !targetCheckbox.prop('checked')); // Toggle checked
            });
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

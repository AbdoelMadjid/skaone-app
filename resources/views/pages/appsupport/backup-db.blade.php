@extends('layouts.master')
@section('title')
    @lang('translation.backup-db')
@endsection
@section('css')
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
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
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
                                    <td>
                                        <input type="checkbox" name="tables[]" value="{{ current((array) $table) }}">
                                    </td>
                                    <td>{{ current((array) $table) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Backup Tabel yang Dipilih</button>
                </form>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        $(document).ready(function() {
            $('#tables-list').DataTable();
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

@extends('layouts.master')
@section('title')
    @lang('translation.data-login')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.app-support')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    <form action="{{ route('appsupport.data-login.index') }}" method="GET">
                        <div class="input-group">
                            <input type="date" name="date" id="date" value="{{ $date }}"
                                class="form-control form-control-sm" aria-label="Recipient's username"
                                aria-describedby="button-addon3">
                            <button class="btn btn-primary btn-sm" type="submit" id="button-addon3">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="px-4 mx-n4 mt-n2 mb-0" data-simplebar style="height: calc(100vh - 284px);">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Waktu Login Terakhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($loginRecords as $index => $record)
                            <tr>
                                <td class='text-center'>{{ $index + 1 }}.</td>
                                <td>{{ $record->user->name }}</td>
                                <td>{{ $record->user->email }}</td>
                                <td>{{ $record->user->getRoleNames()->join(', ') }}</td>
                                <td>{{ $record->login_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" align="center">No users logged in on this date.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

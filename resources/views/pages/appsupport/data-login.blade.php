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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @lang('translation.data-login') - {{ $date }}</h5>
                    <div>
                        <form action="{{ route('appsupport.data-login.index') }}" method="GET">
                            <div class="input-group">
                                <input type="date" name="date" id="date" value="{{ $date }}"
                                    class="form-control" aria-label="Recipient's username" aria-describedby="button-addon3">
                                <button class="btn btn-outline-success" type="submit" id="button-addon3">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Waktu Login Terakhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($loginRecords as $record)
                                <tr>
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
        <!--end col-->
    </div>
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

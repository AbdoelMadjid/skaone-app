@extends('layouts.master')
@section('title')
    @lang('translation.pesan-pengguna')
@endsection
@section('css')
    @livewireStyles <!-- Tambahkan ini -->
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.profil-pengguna')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @livewire('chat')
            </div>

        </div>
    </div>
@endsection
@section('script')
    @livewireScripts <!-- Tambahkan ini -->
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

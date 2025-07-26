@extends('layouts.master')
@section('title')
    @lang('translation.ujian-sumatif')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.gurumapel')
        @endslot
        @slot('li_2')
            @lang('translation.administrasi-guru')
        @endslot
    @endcomponent
    {{--  --}}
    @include('error.belum-kelar-ngoding')
    {{--  --}}
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

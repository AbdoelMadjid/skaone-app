@extends('layouts.master')
@section('title')
    @lang('translation.about')
@endsection
@section('css')
    {{-- a --}}
@endsection
@section('content')
    @switch($section)
        @case('edit_about')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            Edit About
                        </div>
                        <div class="card-body">
                            ini adalah halaman edit about
                        </div>
                    </div>
                </div>
            </div>
        @break

        @case('pengembang')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            Pengembang
                        </div>
                        <div class="card-body">
                            ini adalah halaman pengembang
                        </div>
                    </div>
                </div>
            </div>
        @break

        @case('faqs')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            Faqs
                        </div>
                        <div class="card-body">
                            ini adalah halaman faqs
                        </div>
                    </div>
                </div>
            </div>
        @break

        @case('photoslide')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            Faqs
                        </div>
                        <div class="card-body">
                            ini adalah halaman faqs
                        </div>
                    </div>
                </div>
            </div>
        @break

        @default
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            About
                        </div>
                        <div class="card-body">
                            ini adalah halaman utama about
                        </div>
                    </div>
                </div>
            </div>
    @endswitch
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

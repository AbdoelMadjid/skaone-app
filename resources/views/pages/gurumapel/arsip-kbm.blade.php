@extends('layouts.master')
@section('title')
    @lang('translation.arsip-kbm')
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
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data KBM : <span class="text-success">{{ $fullName }}</span></h4>
            </div>
            <div class="card-body">
                @forelse ($data as $tahun => $ganjilGenapGroup)
                    <div class="text-center mt-lg-2 pt-3">
                        <h1 class="display-6 fw-semibold mb-3 lh-base">
                            Tahun Ajaran
                            <span class="text-success">
                                {{ $tahun }}
                            </span>
                        </h1>
                    </div>

                    <div class="row">
                        <!-- Semester Ganjil -->
                        <div class="col-sm-6">
                            <h4>Semester: <span class="text-success">Ganjil</span></h4>

                            @isset($ganjilGenapGroup['ganjil'])
                                @foreach ($ganjilGenapGroup['ganjil'] as $tingkat => $items)
                                    <h5>Tingkat: <span class="text-success">{{ $tingkat }}</span>
                                        ({{ terbilang($tingkat) }})
                                    </h5>
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Mapel</th>
                                                <th>Mata Pelajaran</th>
                                                <th>KKM</th>
                                                <th>Rombel</th>
                                                <th>Semester</th>
                                                <!-- Tambah kolom jika perlu -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $i => $item)
                                                <tr>
                                                    <td width="50" class="text-center">{{ $i + 1 }}</td>
                                                    <td width="150">{{ $item->kode_mapel_rombel }}</td>
                                                    <td>[{{ $item->kode_mapel }}] <br>{{ $item->mata_pelajaran }}</td>
                                                    <td width="75" class="text-center">{{ $item->kkm }}</td>
                                                    <td width="75" class="text-center">{{ $item->rombel }}</td>
                                                    <td width="75" class="text-center">{{ $item->semester }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endforeach
                            @else
                                <p>Tidak ada data semester ganjil.</p>
                            @endisset
                        </div>

                        <!-- Semester Genap -->
                        <div class="col-sm-6">
                            <h4>Semester: <span class="text-success">Genap</span></h4>

                            @isset($ganjilGenapGroup['genap'])
                                @foreach ($ganjilGenapGroup['genap'] as $tingkat => $items)
                                    <h5>Tingkat: <span class="text-success">{{ $tingkat }}</span>
                                        ({{ terbilang($tingkat) }})
                                    </h5>
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Mapel</th>
                                                <th>Mata Pelajaran</th>
                                                <th>KKM</th>
                                                <th>Rombel</th>
                                                <th>Semester</th>
                                                <!-- Tambah kolom jika perlu -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $i => $item)
                                                <tr>
                                                    <td width="50" class="text-center">{{ $i + 1 }}</td>
                                                    <td width="150">{{ $item->kode_mapel_rombel }}</td>
                                                    <td>[{{ $item->kode_mapel }}] <br> {{ $item->mata_pelajaran }}</td>
                                                    <td width="75" class="text-center">{{ $item->kkm }}</td>
                                                    <td width="75" class="text-center">{{ $item->rombel }}</td>
                                                    <td width="75" class="text-center">{{ $item->semester }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endforeach
                            @else
                                <p>Tidak ada data semester genap.</p>
                            @endisset
                        </div>
                    </div>
                @empty
                    <p>Tidak ada data KBM untuk Anda.</p>
                @endforelse


                {{-- @forelse ($data as $tahun => $ganjilGenapGroup)
                        <h2>Tahun Ajaran: {{ $tahun }}</h2>
                        @foreach ($ganjilGenapGroup as $ganjilGenap => $tingkatGroup)
                            <h3>Semester: {{ ucfirst($ganjilGenap) }}</h3>
                            @foreach ($tingkatGroup as $tingkat => $items)
                                <h4>Tingkat: {{ $tingkat }}</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Mapel</th>
                                            <th>Mata Pelajaran</th>
                                            <th>KKM</th>
                                            <th>Rombel</th>
                                            <th>Semester</th>
                                            <!-- Tambah kolom jika perlu -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $i => $item)
                                            <tr>
                                                <td class="text-center">{{ $i + 1 }}</td>
                                                <td width="250">{{ $item->kode_mapel_rombel }}</td>
                                                <td>[{{ $item->kode_mapel }}] {{ $item->mata_pelajaran }}</td>
                                                <td width="100" class="text-center">{{ $item->kkm }}</td>
                                                <td width="100" class="text-center">{{ $item->rombel }}</td>
                                                <td width="100" class="text-center">{{ $item->semester }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                            @endforeach
                        @endforeach
                    @empty
                        <p>Tidak ada data KBM untuk Anda.</p>
                    @endforelse --}}
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

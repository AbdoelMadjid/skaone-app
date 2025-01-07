@php
    $riwayat_absensi = DB::table('absensi_siswa_pkls')
        ->select('id', 'nis', 'tanggal', 'status')
        ->where('nis', $siswa->nis)
        ->orderBy('tanggal', 'asc')
        ->get();
@endphp
<div class="col-md-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fs-14 text-primary mb-0"><i class="ri-calendar-fill align-middle me-2"></i>
            Riwayat Absen</h5>
        <span class="badge bg-danger rounded-pill">{{ $siswa->jumlah_hadir }}</span>
    </div>
    <div class="px-4 mx-n4" data-simplebar style="height: calc(100vh - 256px);">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($riwayat_absensi as $absensi)
                    <tr>
                        <td>
                            @php
                                $dayOfWeek = \Carbon\Carbon::parse($absensi->tanggal)->dayOfWeek;
                                $formattedDate = \Carbon\Carbon::parse($absensi->tanggal)->translatedFormat('l, d-m-Y');
                            @endphp

                            <span class="{{ $dayOfWeek == 0 ? 'text-danger' : ($dayOfWeek == 6 ? 'text-info' : '') }}">
                                {{ $formattedDate }}
                            </span>
                        </td>
                        <td>{{ ucfirst(strtolower($absensi->status)) }}
                        </td>
                        <td class='text-center'>
                            <button class="btn btn-soft-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editModal" data-id="{{ $absensi->id }}"
                                data-status="{{ $absensi->status }}">
                                <i class='ri-edit-2-line'></i>
                            </button>
                            <!-- Tombol delete -->
                            <form action="{{ route('pembimbingpkl.absensi-bimbingan.deleteabsensi', $absensi->id) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-soft-danger btn-sm delete-btn">
                                    <i class='ri-delete-bin-2-line'></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">
                            Tidak ada
                            riwayat absensi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

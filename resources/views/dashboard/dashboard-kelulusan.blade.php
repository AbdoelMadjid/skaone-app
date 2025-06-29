<div class="alert alert-success alert-dismissible alert-additional fade show mb-2" role="alert">
    <div class="alert-body">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div class="d-flex">
            <div class="flex-shrink-0 me-3">
                <i class="ri-alert-line display-6 align-middle"></i>
            </div>
            @php
                use Carbon\Carbon;

                $now = Carbon::now('Asia/Jakarta'); // set zona waktu
                $showButton = false;

                // Tentukan waktu target berdasarkan kode_kk
                if (in_array($dataRombel->kode_kk, [411, 421, 811])) {
                    $targetTime = Carbon::create(2025, 5, 5, 18, 0, 0, 'Asia/Jakarta'); // 05 Mei 2025 pukul 18.00
                    $waktudi_buka = '18.00';
                } elseif (in_array($dataRombel->kode_kk, [821, 833])) {
                    $targetTime = Carbon::create(2025, 5, 5, 17, 0, 0, 'Asia/Jakarta'); // 05 Mei 2025 pukul 17.00
                    $waktudi_buka = '17.00';
                } else {
                    $targetTime = null;
                }

                if ($targetTime && $now->greaterThanOrEqualTo($targetTime)) {
                    $showButton = true;
                }
            @endphp
            <div class="flex-grow-1">
                <h5 class="alert-heading">Informasi Kelulusan </h5>
                <p class="mb-0">Untuk mendapatkan kelulusan silakan di akses setelah pukul {{ $waktudi_buka }} WIB
                    tanggal
                    05 Mei
                    2025.</p>
                {{--  <p>Rombel: {{ $dataRombel->rombel_nama }}</p>
                <p>Tingkat: {{ $dataRombel->rombel_tingkat }}</p>
                <p>Tingkat: {{ $dataRombel->kode_kk }}</p> --}}


                @if ($showButton)
                    <a href="{{ route('pesertadidik.kelulusan-peserta-didik.index') }}" class="btn btn-danger mt-3">
                        Lihat Pengumuman Kelulusan
                    </a>
                    <a href="{{ route('pesertadidik.transkrip-peserta-didik.index') }}" class="btn btn-warning mt-3">
                        Transkrip Nilai
                    </a>
                @else
                    @if ($targetTime)
                        <div class="mt-3">
                            <p>Waktu tersisa:</p>
                            <h4 id="countdown"></h4>
                        </div>
                        <script>
                            const targetTime = new Date("{{ $targetTime->format('Y-m-d H:i:s') }}").getTime();

                            const countdownEl = document.getElementById("countdown");

                            const timer = setInterval(function() {
                                const now = new Date().getTime();
                                const distance = targetTime - now;

                                if (distance <= 0) {
                                    clearInterval(timer);
                                    location.reload(); // Reload halaman jika waktunya tiba
                                } else {
                                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                    countdownEl.innerHTML = `${hours} jam ${minutes} menit ${seconds} detik`;
                                }
                            }, 1000);
                        </script>
                    @endif
                @endif
            </div>
        </div>
    </div>
    <div class="alert-content">
        <p class="mb-0">Scripting & Desing by. Abdul Madjid, S.Pd., M.Pd.</p>
    </div>
</div>

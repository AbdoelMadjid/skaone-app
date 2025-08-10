<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\DataTables\Kurikulum\DataKBM\PesertaDidikRombelDataTable;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kurikulum\DataKBM\PesertaDidikRombelRequest;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PesertaDidik;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\User;
use App\Models\WaliKelas\PesertaDidikNaik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PesertaDidikRombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PesertaDidikRombelDataTable $pesertaDidikRombelDataTable)
    {
        // Ambil tahun ajaran yang aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')
            ->with(['semesters' => function ($query) {
                $query->where('status', 'Aktif');
            }])
            ->first();

        // Pastikan tahun ajaran aktif ada sebelum melanjutkan
        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        $angkaSemester = [];
        for ($i = 1; $i <= 6; $i++) {
            $angkaSemester[$i] = (string) $i;
        }

        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();

        return $pesertaDidikRombelDataTable->render('pages.kurikulum.datakbm.peserta-didik-rombel', [
            'tahunAjaranAktif' => $tahunAjaranAktif->tahunajaran,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'angkaSemester' => $angkaSemester,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(PesertaDidikRombel $pesertaDidikRombel)
    {
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::where('tahunajaran', $pesertaDidikRombel->tahun_ajaran)
            ->where('id_kk', $pesertaDidikRombel->kode_kk)
            ->where('tingkat', $pesertaDidikRombel->tingkat)
            ->pluck('rombel', 'kode_rombel')->toArray();
        $pesertaDidikOptions = PesertaDidik::pluck('nama_lengkap', 'nis')->toArray();

        $peserta_didiks = PesertaDidik::join('kompetensi_keahlians', 'peserta_didiks.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->select('peserta_didiks.*', 'kompetensi_keahlians.nama_kk', 'kompetensi_keahlians.idkk')
            ->get()
            ->groupBy('idkk'); // Mengelompokkan berdasarkan idkk

        return view('pages.kurikulum.datakbm.peserta-didik-rombel-form', [
            'data' => new PesertaDidikRombel(),
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'pesertaDidikOptions' => $pesertaDidikOptions,
            'peserta_didiks' => $peserta_didiks,
            'action' => route('kurikulum.datakbm.peserta-didik-rombel.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PesertaDidikRombelRequest $request)
    {
        // Validasi data umum
        $validatedData = $request->validated();

        // Periksa apakah input 'nis' tunggal diisi
        $nisSingle = $request->input('nis');
        // Periksa apakah input multiple 'daftarsiswa' diisi sebagai array
        $daftarSiswa = $request->input('daftarsiswa'); // Ini harus berupa array

        // Jika 'nis' tunggal diisi, simpan hanya satu siswa
        if ($nisSingle && !$daftarSiswa) {
            PesertaDidikRombel::create(array_merge($validatedData, ['nis' => $nisSingle]));
        }
        // Jika 'daftarsiswa' multiple diisi dan berbentuk array, simpan semua siswa
        elseif (!$nisSingle && is_array($daftarSiswa)) {
            foreach ($daftarSiswa as $nis) {
                PesertaDidikRombel::create(array_merge($validatedData, ['nis' => $nis]));
            }
        }
        // Jika keduanya tidak diisi, kembalikan pesan error atau abaikan
        else {
            return response()->json(['error' => 'Harap pilih salah satu peserta didik atau beberapa siswa dari daftar.'], 400);
        }

        // Mengembalikan respons sukses setelah penyimpanan
        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(PesertaDidikRombel $pesertaDidikRombel)
    {
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::where('tahunajaran', $pesertaDidikRombel->tahun_ajaran)
            ->where('id_kk', $pesertaDidikRombel->kode_kk)
            ->where('tingkat', $pesertaDidikRombel->rombel_tingkat)
            ->pluck('rombel', 'kode_rombel')->toArray();

        $selectedRombel = $pesertaDidikRombel->rombel_kode;

        $pesertaDidikOptions = PesertaDidik::pluck('nama_lengkap', 'nis')->toArray();

        $peserta_didiks = PesertaDidik::join('kompetensi_keahlians', 'peserta_didiks.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->select('peserta_didiks.*', 'kompetensi_keahlians.nama_kk', 'kompetensi_keahlians.idkk')
            ->get()
            ->groupBy('idkk'); // Mengelompokkan berdasarkan idkk

        return view('pages.kurikulum.datakbm.peserta-didik-rombel-form', [
            'data' => $pesertaDidikRombel,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'pesertaDidikOptions' => $pesertaDidikOptions,
            'peserta_didiks' => $peserta_didiks,
            'selectedRombel' => $selectedRombel,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PesertaDidikRombel $pesertaDidikRombel)
    {
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::where('tahunajaran', $pesertaDidikRombel->tahun_ajaran)
            ->where('id_kk', $pesertaDidikRombel->kode_kk)
            ->where('tingkat', $pesertaDidikRombel->tingkat)
            ->pluck('rombel', 'kode_rombel')->toArray();

        $selectedRombel = $pesertaDidikRombel->rombel_kode;

        $pesertaDidikOptions = PesertaDidik::pluck('nama_lengkap', 'nis')->toArray();

        $peserta_didiks = PesertaDidik::join('kompetensi_keahlians', 'peserta_didiks.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->select('peserta_didiks.*', 'kompetensi_keahlians.nama_kk', 'kompetensi_keahlians.idkk')
            ->get()
            ->groupBy('idkk'); // Mengelompokkan berdasarkan idkk

        return view('pages.kurikulum.datakbm.peserta-didik-rombel-form', [
            'data' => $pesertaDidikRombel,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'pesertaDidikOptions' => $pesertaDidikOptions,
            'peserta_didiks' => $peserta_didiks,
            'selectedRombel' => $selectedRombel,
            'action' => route('kurikulum.datakbm.peserta-didik-rombel.update', $pesertaDidikRombel->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PesertaDidikRombelRequest $request, PesertaDidikRombel $pesertaDidikRombel)
    {
        $pesertaDidikRombel->fill($request->validated());
        $pesertaDidikRombel->save();

        return responseSuccess();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PesertaDidikRombel $pesertaDidikRombel)
    {
        $pesertaDidikRombel->delete();

        return responseSuccessDelete();
    }

    public function getRombonganBelajar(Request $request)
    {
        $rombonganBelajar = RombonganBelajar::where('tahunajaran', $request->tahun_ajaran)
            ->where('id_kk', $request->kode_kk)
            ->where('tingkat', $request->tingkat)
            ->pluck('rombel', 'kode_rombel');

        return response()->json($rombonganBelajar);
    }

    public function getSiswa(Request $request)
    {
        $kode_kk = $request->input('kode_kk');

        // Ambil data siswa berdasarkan kode_kk
        $siswa = PesertaDidik::where('kode_kk', $kode_kk)->get();

        // Kembalikan dalam format JSON
        return response()->json($siswa);
    }

    // KurikulumController.php

    public function getRombel(Request $request)
    {
        $tahunAjaran = $request->get('tahun_ajaran');
        $kodeKK = $request->get('kode_kk');
        $tingKat = $request->get('tingkat');

        // Mengambil data rombongan belajar sesuai tahun ajaran dan kompetensi keahlian
        $rombonganBelajar = RombonganBelajar::where('tahunajaran', $tahunAjaran)
            ->where('id_kk', $kodeKK)
            ->where('tingkat', $tingKat)
            ->pluck('rombel', 'kode_rombel'); // Mengambil kolom rombel dan kode_rombel

        return response()->json($rombonganBelajar); // Mengembalikan data sebagai JSON
    }

    public function getRombels(Request $request)
    {

        // Mengambil data rombel berdasarkan tahunajaran, kode_kk, dan tingkat yang dipilih
        $rombels = RombonganBelajar::where('tahunajaran', $request->tahunajaran)
            ->where('id_kk', $request->kode_kk)
            ->where('tingkat', $request->tingkat)
            ->get();

        // Mengambil jumlah siswa per rombel berdasarkan rombel_kode
        $jumlahSiswa = PesertaDidikRombel::selectRaw('rombel_kode, COUNT(nis) as jumlah_siswa')
            ->where('tahun_ajaran', $request->tahunajaran)
            ->where('kode_kk', $request->kode_kk)
            ->where('rombel_tingkat', $request->tingkat)
            ->groupBy('rombel_kode')
            ->get()
            ->keyBy('rombel_kode'); // Memetakan rombel_kode sebagai key

        // Gabungkan data rombel dan jumlah siswa per rombel tanpa mengubah format response
        $rombels->each(function ($rombel) use ($jumlahSiswa) {
            // Menambahkan informasi jumlah_siswa ke setiap item rombel
            $rombel->jumlah_siswa = $jumlahSiswa[$rombel->kode_rombel]->jumlah_siswa ?? 0;
        });



        return response()->json($rombels);
    }


    public function getStudentData(Request $request)
    {
        $rombels = $request->input('rombels');

        $students = DB::table('rombongan_belajars')
            ->join('peserta_didik_rombels', 'rombongan_belajars.kode_rombel', '=', 'peserta_didik_rombels.rombel_kode')
            ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
            ->leftJoin('users', 'peserta_didiks.nis', '=', 'users.nis') // Tambahkan left join ke tabel users
            ->select(
                'rombongan_belajars.kode_rombel as kode_rombel',
                'rombongan_belajars.rombel as rombel',
                'peserta_didiks.nama_lengkap as nama_siswa',
                'peserta_didiks.nis as nis',
                'peserta_didiks.foto as foto',
                'peserta_didiks.kontak_email as email'
            )
            ->whereIn('rombongan_belajars.kode_rombel', $rombels)
            ->whereNull('users.nis') // Hanya ambil siswa yang NIS-nya tidak ada di tabel users
            ->get();

        return response()->json($students);
    }

    public function formGenerateAkun(Request $request)
    {
        $rombels = $request->input('selected_rombel_ids');  // Mendapatkan rombel yang dipilih
        $rombels = explode(',', $rombels);  // Mengubah string ID rombel menjadi array

        // Ambil data siswa berdasarkan rombel yang dipilih
        $students = DB::table('rombongan_belajars')
            ->join('peserta_didik_rombels', 'rombongan_belajars.kode_rombel', '=', 'peserta_didik_rombels.rombel_kode')
            ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
            ->select(
                'peserta_didiks.nama_lengkap',
                'peserta_didiks.nis',
                'peserta_didiks.kontak_email as email',
                'rombongan_belajars.tingkat'
            )
            ->whereIn('rombongan_belajars.kode_rombel', $rombels)
            ->get();

        // Menyimpan data siswa ke dalam tabel users
        foreach ($students as $student) {
            // Cek apakah akun sudah ada berdasarkan nis
            $existingUser = User::where('nis', $student->nis)->exists();

            if ($existingUser) {
                // Jika sudah ada, abaikan dan lanjutkan ke siswa berikutnya
                continue;
            }

            // Generate email unik jika email sudah ada
            $email = $student->email;
            while (User::where('email', $email)->exists()) {
                $randomNumber = rand(100, 999); // 3 angka acak
                $emailParts = explode('@', $student->email);
                $email = $emailParts[0] . $randomNumber . '@' . $emailParts[1];
            }

            // Jika akun belum ada, buatkan akun baru
            $user = User::create([
                'name' => $student->nama_lengkap,
                'email' => $email,
                'nis' => $student->nis,
                'password' => bcrypt('Siliwangi30'),  // Password default
            ]);

            $user->assignRole('siswa');  // Menetapkan role 'siswa' jika bukan tingkat 12
        }

        return redirect()->back()->with('success', 'Akun berhasil dibuat!');
    }


    public function getRombelNaikKelas(Request $request)
    {
        $tahunajaran = $request->tahunajaran;
        $id_kk = $request->kode_kk;
        $tingkat = $request->tingkat;

        $rombels = RombonganBelajar::where('tahunajaran', $tahunajaran)
            ->where('id_kk', $id_kk)
            ->where('tingkat', $tingkat)
            ->orderBy('rombel')
            ->get(['kode_rombel', 'rombel']);

        return response()->json($rombels);
    }

    /* public function getSiswaNaikKelas(Request $request)
    {
        $tahunajaran = $request->tahunajaran; // dari rombelNK1
        $kode_kk = $request->kode_kk;
        $tingkat = $request->tingkat;
        $kode_rombel = $request->kode_rombel;
        $tahunajaranBaru = $request->tahunajaran_baru; // dari rombelNK2 (opsional)

        // Ambil seluruh siswa dari rombel tahun ajaran sebelumnya (NK1)
        $pesertaRombel = PesertaDidikRombel::where('tahun_ajaran', $tahunajaran)
            ->where('kode_kk', $kode_kk)
            ->where('rombel_tingkat', $tingkat)
            ->where('rombel_kode', $kode_rombel)
            ->get();

        // Ambil daftar NIS yang sudah masuk ke tahunajaran baru (NK2)
        $nisSudahNaik = [];
        if ($tahunajaranBaru) {
            $nisSudahNaik = PesertaDidikRombel::where('tahun_ajaran', $tahunajaranBaru)
                ->pluck('nis')
                ->toArray();
        }

        // Filter siswa yang belum naik dan tampilkan status dari PesertaDidikNaik (sebagai informasi)
        $result = $pesertaRombel->filter(function ($item) use ($nisSudahNaik) {
            return !in_array($item->nis, $nisSudahNaik); // hanya yang belum naik
        })->values()->map(function ($item, $index) use ($kode_rombel, $tahunajaran) {
            $siswa = PesertaDidik::where('nis', $item->nis)->first();

            // Ambil status naik dari model PesertaDidikNaik (untuk ditampilkan)
            $statusNaik = PesertaDidikNaik::where('kode_rombel', $kode_rombel)
                ->where('tahunajaran', $tahunajaran)
                ->where('nis', $item->nis)
                ->value('status');

            return [
                'no' => $index + 1,
                'nis' => $item->nis,
                'nama' => $siswa->nama_lengkap ?? '-',
                'jk' => $siswa->jenis_kelamin ?? '-',
                'status' => $statusNaik ?? '-', // tampilkan tetap walau tidak digunakan untuk filter
            ];
        });

        return response()->json($result);
    } */

    public function getSiswaNaikKelas(Request $request)
    {
        $tahunajaran = $request->tahunajaran;
        $kode_kk = $request->kode_kk;
        $tingkat = $request->tingkat;
        $kode_rombel = $request->kode_rombel;
        $tahunajaranBaru = $request->tahunajaran_baru;
        $mode = $request->mode; // 'naik_kelas' atau 'kelulusan'

        $pesertaRombel = PesertaDidikRombel::where('tahun_ajaran', $tahunajaran)
            ->where('kode_kk', $kode_kk)
            ->where('rombel_tingkat', $tingkat)
            ->where('rombel_kode', $kode_rombel)
            ->get();

        $nisSudahNaik = [];
        if ($tahunajaranBaru && $mode !== 'kelulusan') {
            $nisSudahNaik = PesertaDidikRombel::where('tahun_ajaran', $tahunajaranBaru)
                ->pluck('nis')
                ->toArray();
        }

        $result = $pesertaRombel->filter(function ($item) use ($nisSudahNaik, $mode) {
            // Saring: kalau mode kelulusan → cek status != 'Lulus'
            if ($mode === 'kelulusan') {
                $peserta = PesertaDidik::where('nis', $item->nis)->first();
                return $peserta && $peserta->status !== 'Lulus';
            } else {
                return !in_array($item->nis, $nisSudahNaik);
            }
        })->values()->map(function ($item, $index) use ($kode_rombel, $tahunajaran) {
            $siswa = PesertaDidik::where('nis', $item->nis)->first();
            $statusNaik = PesertaDidikNaik::where('kode_rombel', $kode_rombel)
                ->where('tahunajaran', $tahunajaran)
                ->where('nis', $item->nis)
                ->value('status');

            return [
                'no' => $index + 1,
                'nis' => $item->nis,
                'nama' => $siswa->nama_lengkap ?? '-',
                'jk' => $siswa->jenis_kelamin ?? '-',
                'status' => $statusNaik ?? '-',
            ];
        });

        return response()->json($result);
    }


    public function formGenerateNaikKelas(Request $request)
    {
        $request->validate([
            'tahunajaran' => 'required',
            'kode_kk' => 'required',
            'tingkat' => 'required',
            'rombel' => 'required',
            'rombel_nama' => 'required',
            'selected_siswa' => 'required|array|min:1',
        ]);

        $tahunajaran = $request->input('tahunajaran');
        $kode_kk = $request->input('kode_kk');
        $tingkat = $request->input('tingkat');
        $rombelKode = $request->input('rombel');
        $rombelNama = $request->input('rombel_nama');
        $nisList = $request->input('selected_siswa');

        DB::beginTransaction();
        try {
            foreach ($nisList as $nis) {
                // Hindari duplikasi
                $exists = PesertaDidikRombel::where('tahun_ajaran', $tahunajaran)
                    ->where('kode_kk', $kode_kk)
                    ->where('rombel_tingkat', $tingkat)
                    ->where('rombel_kode', $rombelKode)
                    ->where('nis', $nis)
                    ->exists();

                if (!$exists) {
                    PesertaDidikRombel::create([
                        'tahun_ajaran' => $tahunajaran,
                        'kode_kk' => $kode_kk,
                        'rombel_tingkat' => $tingkat,
                        'rombel_kode' => $rombelKode,
                        'rombel_nama' => $rombelNama,
                        'nis' => $nis,
                    ]);
                }
            }

            DB::commit();
            return back()->with('success', 'Data kenaikan kelas berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }


    //// gak tahu ini buat apa, mungkin di hapus
    // In your Controller
    public function getPesertaDidik($kode_kk, Request $request)
    {
        // Ambil data tahun ajaran dari request
        $tahun_ajaran = $request->input('tahun_ajaran');

        // Ambil NIS siswa yang sudah terdaftar di rombel untuk tahun ajaran yang dipilih
        $siswaTerdaftar = PesertaDidikRombel::where('tahun_ajaran', $tahun_ajaran)
            ->pluck('nis')
            ->toArray();

        // Filter siswa yang belum terdaftar pada tahun ajaran tertentu dan urutkan berdasarkan ID
        $siswaBelumTerdaftar = PesertaDidik::where('kode_kk', $kode_kk)
            ->where('status', 'Aktif')
            ->where('thnajaran_masuk', $tahun_ajaran)
            ->whereNotIn('nis', $siswaTerdaftar)
            ->orderBy('id') // ← Ini yang mengurutkan berdasarkan kolom `id`
            ->get();

        return response()->json($siswaBelumTerdaftar);
    }

    // kelulusan
    public function formGenerateKelulusan(Request $request)
    {
        $request->validate([
            'selected_siswa' => 'required|array|min:1',
        ]);

        $nisList = $request->input('selected_siswa');

        DB::beginTransaction();
        $successCount = 0;

        try {
            foreach ($nisList as $nis) {
                // Update status peserta didik ke Lulus jika statusnya Aktif
                $peserta = PesertaDidik::where('nis', $nis)->first();
                if ($peserta && $peserta->status === 'Aktif') {
                    $peserta->status = 'Lulus';
                    $peserta->save();
                }

                // Update user role: hapus siswa, tambahkan alumni
                $user = User::where('nis', $nis)->first();
                if ($user) {
                    if ($user->hasRole('siswa')) {
                        $user->removeRole('siswa');
                    }

                    if ($user->hasRole('pesertapkl')) {
                        $user->removeRole('pesertapkl');
                    }

                    if (!$user->hasRole('alumni')) {
                        $user->assignRole('alumni');
                    }
                }

                $successCount++;
            }

            DB::commit();

            return back()->with('success', "Kelulusan berhasil diproses untuk {$successCount} siswa.");
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memproses kelulusan: ' . $e->getMessage());
        }
    }
}

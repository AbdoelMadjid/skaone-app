<?php

namespace App\Http\Controllers\GuruMapel;

use App\DataTables\GuruMapel\PenilaianDataTable;
use App\Http\Controllers\Controller;
use App\Models\GuruMapel\NilaiFormatif;
use App\Models\GuruMapel\TujuanPembelajaran;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(PenilaianDataTable $penilaianDataTable)
    {
        $user = Auth::user();
        $personal_id = $user->personal_id;

        // Retrieve the active academic year
        $tahunAjaran = TahunAjaran::where('status', 'Aktif')->first();

        // Check if an active academic year is found
        if (!$tahunAjaran) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        // Retrieve the active semester related to the active academic year
        $semester = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaran->id)
            ->first();

        // Check if an active semester is found
        if (!$semester) {
            return redirect()->back()->with('error', 'Tidak ada semester aktif.');
        }

        // Get the namalengkap of the logged-in user from personil_sekolahs table
        $personil = PersonilSekolah::where('id_personil', $personal_id)->first();
        // Concatenate gelardepan, namalengkap, and gelarbelakang
        $fullName = $personil
            ? trim(($personil->gelardepan ? $personil->gelardepan . ' ' : '') . $personil->namalengkap . ($personil->gelarbelakang ? ', ' . $personil->gelarbelakang : ''))
            : 'Unknown';

        // Retrieve a single KBM record for the current user, academic year, and semester
        $kbmPerRombel = KbmPerRombel::where('id_personil', $personal_id)
            ->where('tahunajaran', $tahunAjaran->tahunajaran)
            ->where('ganjilgenap', $semester->semester)
            ->first();

        if (!$kbmPerRombel) {
            return redirect()->route('dashboard')->with('errorSwal', 'Maaf, Anda belum memiliki <b>Jam Mengajar</b> <br>pada <b>tahun ajaran</b> dan <b>semester</b> saat ini.<br> Silakan hubungi bagian Kurikulum.');
        }

        return $penilaianDataTable->render(
            'pages.gurumapel.penilaian',
            compact(
                'kbmPerRombel',
                'personal_id',
                'tahunAjaran',
                'semester',
                'fullName',
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $personal_id = $user->personal_id;

        // Retrieve the active academic year
        $tahunAjaran = TahunAjaran::where('status', 'Aktif')->first();

        // Check if an active academic year is found
        if (!$tahunAjaran) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        // Retrieve the active semester related to the active academic year
        $semester = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaran->id)
            ->first();

        // Check if an active semester is found
        if (!$semester) {
            return redirect()->back()->with('error', 'Tidak ada semester aktif.');
        }

        // Get the namalengkap of the logged-in user from personil_sekolahs table
        $personil = PersonilSekolah::where('id_personil', $personal_id)->first();
        // Concatenate gelardepan, namalengkap, and gelarbelakang
        $fullName = $personil
            ? trim(($personil->gelardepan ? $personil->gelardepan . ' ' : '') . $personil->namalengkap . ($personil->gelarbelakang ? ', ' . $personil->gelarbelakang : ''))
            : 'Unknown';

        $kode_rombel = $request->input('kode_rombel');
        $kel_mapel = $request->input('kel_mapel');
        $id_personil = $request->input('id_personil');

        // Retrieve a single KBM record for the current user, academic year, and semester
        $kbmPerRombel = KbmPerRombel::where('id_personil', $personal_id)
            ->where('tahunajaran', $tahunAjaran->tahunajaran)
            ->where('ganjilgenap', $semester->semester)
            ->where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->first();


        if (!$kbmPerRombel) {
            return redirect()->back()->with('error', 'Tidak ada data KBM ditemukan.');
        }

        $jumlahTP = DB::table('tujuan_pembelajarans')
            ->where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->count();

        // Query untuk mengambil data siswa dan rombel
        $pesertaDidik = DB::table('kbm_per_rombels')
            ->join('peserta_didik_rombels', 'peserta_didik_rombels.rombel_kode', '=', 'kbm_per_rombels.kode_rombel')
            ->join('peserta_didiks', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
            ->select(
                'kbm_per_rombels.kode_rombel',
                'kbm_per_rombels.rombel',
                'peserta_didik_rombels.nis',
                'peserta_didiks.nama_lengkap'
            )
            ->where('kbm_per_rombels.id_personil', $id_personil)
            ->where('kbm_per_rombels.kode_rombel', $kode_rombel)
            ->get();

        $tujuanPembelajaran = TujuanPembelajaran::where('id_personil', $id_personil)
            ->where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->orderBy('tp_kode')
            ->get();

        /* return view('pages.gurumapel.penilaian-tambah', [
            'kbmPerRombel' => $kbmPerRombel,
            'personal_id' => $personal_id,
            'tahunAjaran' => $tahunAjaran,
            'semester' => $semester,
            'fullName' => $fullName,
            'jumlahTP' => $jumlahTP,
            'pesertaDidik' => $pesertaDidik,
            'tujuanPembelajaran' => $tujuanPembelajaran,
            'action' => route('kaprodipkl.modul-ajar.store')
        ]); */

        return view(
            'pages.gurumapel.penilaian-tambah',
            compact(
                'kbmPerRombel',
                'personal_id',
                'tahunAjaran',
                'semester',
                'fullName',
                'jumlahTP',
                'pesertaDidik',
                'tujuanPembelajaran',
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function isiFormatif(Request $request)
    {

        $user = Auth::user();
        $personal_id = $user->personal_id;

        // Retrieve the active academic year
        $tahunAjaran = TahunAjaran::where('status', 'Aktif')->first();

        // Check if an active academic year is found
        if (!$tahunAjaran) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        // Retrieve the active semester related to the active academic year
        $semester = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaran->id)
            ->first();

        // Check if an active semester is found
        if (!$semester) {
            return redirect()->back()->with('error', 'Tidak ada semester aktif.');
        }

        // Get the namalengkap of the logged-in user from personil_sekolahs table
        $personil = PersonilSekolah::where('id_personil', $personal_id)->first();
        // Concatenate gelardepan, namalengkap, and gelarbelakang
        $fullName = $personil
            ? trim(($personil->gelardepan ? $personil->gelardepan . ' ' : '') . $personil->namalengkap . ($personil->gelarbelakang ? ', ' . $personil->gelarbelakang : ''))
            : 'Unknown';

        $kode_rombel = $request->input('kode_rombel');
        $kel_mapel = $request->input('kel_mapel');
        $id_personil = $request->input('id_personil');

        // Retrieve a single KBM record for the current user, academic year, and semester
        $kbmPerRombel = KbmPerRombel::where('id_personil', $personal_id)
            ->where('tahunajaran', $tahunAjaran->tahunajaran)
            ->where('ganjilgenap', $semester->semester)
            ->where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->first();


        if (!$kbmPerRombel) {
            return redirect()->back()->with('error', 'Tidak ada data KBM ditemukan.');
        }

        $jumlahTP = DB::table('tujuan_pembelajarans')
            ->where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->count();

        // Query untuk mengambil data siswa dan rombel
        $pesertaDidik = DB::table('kbm_per_rombels')
            ->join('peserta_didik_rombels', 'peserta_didik_rombels.rombel_kode', '=', 'kbm_per_rombels.kode_rombel')
            ->join('peserta_didiks', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
            ->select(
                'kbm_per_rombels.kode_rombel',
                'kbm_per_rombels.rombel',
                'peserta_didik_rombels.nis',
                'peserta_didiks.nama_lengkap'
            )
            ->where('kbm_per_rombels.id_personil', $id_personil)
            ->where('kbm_per_rombels.kode_rombel', $kode_rombel)
            ->get();

        $tujuanPembelajaran = TujuanPembelajaran::where('id_personil', $id_personil)
            ->where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->orderBy('tp_kode')
            ->get();

        /* return view('pages.gurumapel.penilaian-tambah', [
            'kbmPerRombel' => $kbmPerRombel,
            'personal_id' => $personal_id,
            'tahunAjaran' => $tahunAjaran,
            'semester' => $semester,
            'fullName' => $fullName,
            'jumlahTP' => $jumlahTP,
            'pesertaDidik' => $pesertaDidik,
            'tujuanPembelajaran' => $tujuanPembelajaran,
            'action' => route('kaprodipkl.modul-ajar.store')
        ]); */

        return view(
            'pages.gurumapel.penilaian-tambah',
            compact(
                'kbmPerRombel',
                'personal_id',
                'tahunAjaran',
                'semester',
                'fullName',
                'jumlahTP',
                'pesertaDidik',
                'tujuanPembelajaran',
            )
        );
    }

    public function getSiswaList(Request $request)
    {
        $kodeRombel = $request->query('kode_rombel');
        $idPersonil = $request->query('id_personil');

        $siswa = DB::table('kbm_per_rombels')
            ->join('peserta_didik_rombels', 'peserta_didik_rombels.rombel_kode', '=', 'kbm_per_rombels.kode_rombel')
            ->join('peserta_didiks', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
            ->where('kbm_per_rombels.id_personil', $idPersonil)
            ->where('kbm_per_rombels.kode_rombel', $kodeRombel)
            ->select('peserta_didiks.nis', 'peserta_didiks.nama_lengkap')
            ->get();

        return response()->json($siswa);
    }

    public function getTujuanPembelajaran(Request $request)
    {
        // Validasi input request
        $validated = $request->validate([
            'id_personil' => 'required|string',
            'kode_rombel' => 'required|string',
            'kel_mapel' => 'required|string',
        ]);

        // Ambil data tujuan pembelajaran berdasarkan parameter
        $tujuanPembelajaran = TujuanPembelajaran::where('id_personil', $validated['id_personil'])
            ->where('kode_rombel', $validated['kode_rombel'])
            ->where('kel_mapel', $validated['kel_mapel'])
            ->orderBy('kode_cp')
            ->get(['tp_isi']); // Ambil hanya kolom tp_isi

        // Cek apakah data ditemukan dan kembalikan sebagai response
        if ($tujuanPembelajaran->isEmpty()) {
            return response()->json([], 404); // Tidak ditemukan
        }

        return response()->json($tujuanPembelajaran);
    }

    public function simpanFormatif(Request $request)
    {
        try {
            $tahunajaran = $request->input('tahunajaran');
            $ganjilgenap = $request->input('ganjilgenap');
            $semester = $request->input('semester');
            $tingkat = $request->input('tingkat');
            $kode_rombel = $request->input('kode_rombel');
            $kel_mapel = $request->input('kel_mapel');
            $id_personil = $request->input('personal_id');
            $jumlahTP = intval($request->input('jml_tp'));

            // Data siswa yang dikirim dari form
            $siswaData = $request->except(['_token', 'tahunajaran', 'ganjilgenap', 'semester', 'tingkat', 'kode_rombel', 'kel_mapel', 'personal_id', 'jml_tp', 'kkm']);

            $dataToInsert = [];

            foreach ($siswaData as $key => $value) {
                if (preg_match('/tp_nilai_(\d+)_(\d+)/', $key, $matches)) {
                    $nis = $matches[1];
                    $tpIndex = $matches[2];

                    if (!isset($dataToInsert[$nis])) {
                        $dataToInsert[$nis] = [
                            'tahunajaran' => $tahunajaran,
                            'ganjilgenap' => $ganjilgenap,
                            'semester' => $semester,
                            'tingkat' => $tingkat,
                            'kode_rombel' => $kode_rombel,
                            'kel_mapel' => $kel_mapel,
                            'id_personil' => $id_personil,
                            'nis' => $nis,
                            'rerata_formatif' => $request->input("rerata_formatif_{$nis}", 0),
                        ];
                    }

                    // Masukkan nilai TP
                    $dataToInsert[$nis]["tp_nilai_{$tpIndex}"] = $value;
                    $dataToInsert[$nis]["tp_isi_{$tpIndex}"] = $request->input("tp_isi_{$nis}_{$tpIndex}", '');
                }
            }

            // Simpan ke database
            foreach ($dataToInsert as $row) {
                NilaiFormatif::updateOrCreate(
                    [
                        'tahunajaran' => $row['tahunajaran'],
                        'ganjilgenap' => $row['ganjilgenap'],
                        'semester' => $row['semester'],
                        'tingkat' => $row['tingkat'],
                        'kode_rombel' => $row['kode_rombel'],
                        'kel_mapel' => $row['kel_mapel'],
                        'id_personil' => $row['id_personil'],
                        'nis' => $row['nis'],
                    ],
                    $row
                );
            }

            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function getNilaiFormatif(Request $request)
    {
        $kodeRombel = $request->input('kode_rombel');
        $kelMapel = $request->input('kel_mapel');
        $idPersonil = $request->input('id_personil');

        $siswa = DB::table('peserta_didik_rombels')
            ->where('kode_rombel', $kodeRombel)
            ->get();

        $nilai = DB::table('nilai_formatif')
            ->where('kode_rombel', $kodeRombel)
            ->where('kel_mapel', $kelMapel)
            ->where('id_personil', $idPersonil)
            ->get()
            ->keyBy('nis');

        return response()->json([
            'siswa' => $siswa,
            'nilai' => $nilai
        ]);
    }


    public function simpanNilaiFormatif(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            if (preg_match('/^tp_nilai_(\d+)_(\d+)$/', $key, $matches)) {
                $nis = $matches[1];
                $tpIndex = $matches[2];
                $tpIsiKey = "tp_isi_{$nis}_{$tpIndex}";

                DB::table('nilai_formatif')->updateOrInsert(
                    [
                        'nis' => $nis,
                        'kode_rombel' => $data['kode_rombel'],
                        'kel_mapel' => $data['kel_mapel']
                    ],
                    [
                        "tp_nilai_{$tpIndex}" => $value,
                        "tp_isi_{$tpIndex}" => $data[$tpIsiKey] ?? '',
                        'rerata_formatif' => $data["rerata_formatif_{$nis}"] ?? 0,
                    ]
                );
            }
        }

        return response()->json(['success' => true, 'message' => 'Nilai berhasil disimpan.']);
    }
}

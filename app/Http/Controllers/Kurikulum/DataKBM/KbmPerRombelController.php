<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\DataTables\Kurikulum\DataKBM\KbmPerRombelDataTable;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kurikulum\DataKBM\KbmPerRombelRequest;
use App\Models\Kurikulum\DataKBM\JamMengajar;
use App\Models\Kurikulum\DataKBM\MataPelajaranPerJurusan;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KbmPerRombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KbmPerRombelDataTable $kbmPerRombelDataTable)
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

        // Retrieve the active semester related to the active academic year
        $semesterAktif = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
            ->first();

        // Check if an active semester is found
        if (!$semesterAktif) {
            return redirect()->back()->with('error', 'Tidak ada semester aktif.');
        }

        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();
        return $kbmPerRombelDataTable->render('pages.kurikulum.datakbm.kbm-per-rombel', [
            'tahunAjaranAktif' => $tahunAjaranAktif->tahunajaran,
            'semesterAktif' => $semesterAktif->semester,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(KbmPerRombel $kbmPerRombel)
    {
        $angkaSemester = [];
        for ($i = 1; $i <= 6; $i++) {
            $angkaSemester[$i] = (string) $i;
        }
        $angkaKKM = [];
        for ($i = 60; $i <= 95; $i++) {
            $angkaKKM[$i] = (string) $i;
        }
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::where('tahunajaran', $kbmPerRombel->tahun_ajaran)
            ->where('id_kk', $kbmPerRombel->kode_kk)
            ->where('tingkat', $kbmPerRombel->tingkat)
            ->pluck('rombel', 'kode_rombel')->toArray();

        return view('pages.kurikulum.datakbm.kbm-per-rombel-form', [
            'data' => new KbmPerRombel(),
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'angkaSemester' => $angkaSemester,
            'angkaKKM' => $angkaKKM,
            'rombonganBelajar' => $rombonganBelajar,
            'action' => route('kurikulum.datakbm.kbm-per-rombel.store'),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(KbmPerRombelRequest $request)
    {
        $kbmPerRombel = new KbmPerRombel($request->validated());
        $kbmPerRombel->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(KbmPerRombel $kbmPerRombel)
    {
        $angkaSemester = [];
        for ($i = 1; $i <= 6; $i++) {
            $angkaSemester[$i] = (string) $i;
        }
        $angkaKKM = [];
        for ($i = 60; $i <= 95; $i++) {
            $angkaKKM[$i] = (string) $i;
        }
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();
        $idPersonil = PersonilSekolah::pluck('namalengkap', 'id_personil')->toArray();

        return view('pages.kurikulum.datakbm.kbm-per-rombel-form', [
            'data' => $kbmPerRombel,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'angkaSemester' => $angkaSemester,
            'angkaKKM' => $angkaKKM,
            'rombonganBelajar' => $rombonganBelajar,
            'idPersonil' => $idPersonil,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KbmPerRombel $kbmPerRombel)
    {
        $angkaSemester = [];
        for ($i = 1; $i <= 6; $i++) {
            $angkaSemester[$i] = (string) $i;
        }
        $angkaKKM = [];
        for ($i = 60; $i <= 95; $i++) {
            $angkaKKM[$i] = (string) $i;
        }
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();
        $idPersonil = PersonilSekolah::pluck('namalengkap', 'id_personil')->toArray();

        return view('pages.kurikulum.datakbm.kbm-per-rombel-form', [
            'data' => $kbmPerRombel,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'angkaSemester' => $angkaSemester,
            'angkaKKM' => $angkaKKM,
            'rombonganBelajar' => $rombonganBelajar,
            'idPersonil' => $idPersonil,
            'action' => route('kurikulum.datakbm.kbm-per-rombel.update', $kbmPerRombel->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KbmPerRombelRequest $request, KbmPerRombel $kbmPerRombel)
    {
        $kbmPerRombel->fill($request->validated());
        $kbmPerRombel->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KbmPerRombel $kbmPerRombel)
    {
        $kbmPerRombel->delete();

        return responseSuccessDelete();
    }


    /*     public function getKBMRombel(Request $request)
    {
        $rombonganBelajar = RombonganBelajar::where('tahunajaran', $request->tahun_ajaran)
            ->where('ganjilgenap', $request->semester)
            ->where('id_kk', $request->kode_kk)
            ->where('tingkat', $request->tingkat)
            ->groupBy('kode_rombel', 'rombel')
            ->pluck('rombel', 'kode_rombel');

        return response()->json($rombonganBelajar);
    } */

    public function getKBMRombel(Request $request)
    {
        $tahunAjaran = $request->get('tahun_ajaran');
        $seMester = $request->get('semester');
        $kodeKK = $request->get('kode_kk');
        $tingKat = $request->get('tingkat');

        // Mengambil data rombongan belajar sesuai tahun ajaran dan kompetensi keahlian
        $rombonganBelajar = RombonganBelajar::where('tahunajaran', $tahunAjaran)
            ->where('id_kk', $kodeKK)
            ->where('semester', $seMester)
            ->where('tingkat', $tingKat)
            ->pluck('rombel', 'kode_rombel'); // Mengambil kolom rombel dan kode_rombel

        return response()->json($rombonganBelajar); // Mengembalikan data sebagai JSON
    }

    public function getMataPelajaranByKK(Request $request)
    {
        $kode_kk = $request->kode_kk;

        // Fetch mata pelajaran per jurusan where kode_kk matches the selected kode_kk
        $mataPelajaran = MataPelajaranPerJurusan::where('kode_kk', $kode_kk)
            ->with('mataPelajaran') // Assuming there's a relationship defined
            ->get();

        // Return data as JSON
        return response()->json($mataPelajaran);
    }

    public function filterMataPelajaran(Request $request)
    {
        $kodeKK = $request->input('kode_kk');  // Ambil kode_kk dari request
        $semester = $request->input('semester');  // Ambil semester dari request

        // Tentukan field semester berdasarkan pilihan
        $semesterField = 'semester_' . $semester;

        // Query untuk mendapatkan mata pelajaran yang sesuai dengan kode_kk dan semester yang memiliki nilai 1
        $mataPelajaranPerJurusan = MataPelajaranPerJurusan::with('mataPelajaran')
            ->where('kode_kk', $kodeKK)  // Filter berdasarkan kode_kk
            ->where($semesterField, 1)   // Filter mata pelajaran yang ada di semester terpilih
            ->get();

        return response()->json($mataPelajaranPerJurusan);
    }

    public function getPersonilSekolah(Request $request)
    {
        // Ambil personil sekolah yang berperan sebagai 'Guru' (jenispersonil adalah 'Guru')
        $personilSekolah = PersonilSekolah::where('jenispersonil', 'Guru')
            ->get(['id_personil', 'namalengkap']); // Ambil hanya id_personil dan namalengkap

        // Mengembalikan data dalam bentuk JSON
        return response()->json($personilSekolah);
    }

    public function updatePersonil(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:kbm_per_rombels,id',
            'id_personil' => 'required|exists:personil_sekolahs,id_personil',
        ]);

        $kbm = KbmPerRombel::find($request->id);
        $kbm->id_personil = $request->id_personil;
        $kbm->save();

        //return response()->json(['message' => 'Data berhasil diperbarui']);
        return responseSuccess(true);
    }

    public function updateJumlahJam(Request $request)
    {
        $validated = $request->validate([
            'kbm_per_rombel_id' => 'required|exists:kbm_per_rombels,id',
            'jumlah_jam' => 'required|integer|min:1|max:40',
        ]);

        $jam = JamMengajar::updateOrCreate(
            ['kbm_per_rombel_id' => $validated['kbm_per_rombel_id']],
            ['jumlah_jam' => $validated['jumlah_jam']]
        );

        return response()->json([
            'success' => true,
            'message' => 'Jumlah jam mengajar berhasil diperbaharui',
            'data' => $jam
        ]);
    }
}

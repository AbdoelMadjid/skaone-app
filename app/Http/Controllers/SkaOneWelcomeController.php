<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\ManajemenSekolah\KetuaProgramStudi;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\WebSite\PhotoPersonil;
use App\Models\WelcomeDataPersonil;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkaOneWelcomeController extends Controller
{
    public function artikel_guru_hebat()
    {
        return view('skaonewelcome.artikel-guru-hebat');
    }

    public function program()
    {
        /* // Ambil tahun ajaran yang aktif
        $tahunAjaran = TahunAjaran::where('status', 'Aktif')->first();

        // Periksa jika tidak ada tahun ajaran aktif
        if (!$tahunAjaran) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        // Ambil semester yang aktif berdasarkan tahun ajaran
        $semester = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaran->id)
            ->first();

        // Periksa jika tidak ada semester aktif
        if (!$semester) {
            return redirect()->back()->with('error', 'Tidak ada semester aktif.');
        }
        // Menghitung jumlah siswa per kode_kk dan per tingkat (rombel_tingkat)
        $dataSiswa = PesertaDidikRombel::where('tahun_ajaran', $tahunAjaran->tahunajaran)
            ->select('kode_kk', 'rombel_tingkat', DB::raw('count(*) as jumlah_siswa'))
            ->groupBy('kode_kk', 'rombel_tingkat')
            ->orderBy('kode_kk')
            ->get();

        // Buat variabel untuk menyimpan data berdasarkan kode_kk
        $jumlahSiswaPerKK = [
            '411' => [],
            '421' => [],
            '811' => [],
            '821' => [],
            '833' => [],
        ];

        // Mengisi data berdasarkan kode_kk
        foreach ($dataSiswa as $data) {
            if (array_key_exists($data->kode_kk, $jumlahSiswaPerKK)) {
                $jumlahSiswaPerKK[$data->kode_kk][] = $data;
            }
        }

        // Menghitung total siswa per kode_kk
        $totalSiswaPerKK = [];
        foreach ($jumlahSiswaPerKK as $kodeKK => $data) {
            $totalSiswaPerKK[$kodeKK] = array_sum(array_column($data, 'jumlah_siswa'));
        }
 */

        // Cari tahun ajaran aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();

        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        // Ambil 3 tahun ajaran terakhir (aktif + 2 sebelumnya)
        $tahunAjarans = TahunAjaran::where('tahunajaran', '<=', $tahunAjaranAktif->tahunajaran)
            ->orderBy('tahunajaran', 'desc')
            ->take(2)
            ->get();

        $dataPerTahunAjaran = [];

        foreach ($tahunAjarans as $ta) {
            $dataSiswa = PesertaDidikRombel::where('tahun_ajaran', $ta->tahunajaran)
                ->select(
                    'kode_kk',
                    'rombel_tingkat',
                    DB::raw('count(*) as jumlah_siswa'),
                    DB::raw('count(distinct rombel_nama) as jumlah_rombel') // ✅ hitung rombel unik
                )
                ->groupBy('kode_kk', 'rombel_tingkat')
                ->orderBy('kode_kk')
                ->get();

            $jumlahSiswaPerKK = [
                '411' => [],
                '421' => [],
                '811' => [],
                '821' => [],
                '833' => [],
            ];

            foreach ($dataSiswa as $data) {
                if (array_key_exists($data->kode_kk, $jumlahSiswaPerKK)) {
                    $jumlahSiswaPerKK[$data->kode_kk][] = $data;
                }
            }

            $totalSiswaPerKK = [];
            $totalRombelPerKK = [];
            foreach ($jumlahSiswaPerKK as $kodeKK => $data) {
                $totalSiswaPerKK[$kodeKK] = array_sum(array_column($data, 'jumlah_siswa'));
                $totalRombelPerKK[$kodeKK] = array_sum(array_column($data, 'jumlah_rombel')); // ✅ total rombel
            }

            $dataPerTahunAjaran[$ta->tahunajaran] = [
                'jumlahSiswaPerKK' => $jumlahSiswaPerKK,
                'totalSiswaPerKK'  => $totalSiswaPerKK,
                'totalRombelPerKK' => $totalRombelPerKK,
            ];
        }


        $personilData = PhotoPersonil::select(
            'photo_personils.id',
            'photo_personils.no_group',
            'photo_personils.nama_group',
            'photo_personils.no_personil',
            'photo_personils.id_personil',
            'photo_personils.photo',
            'personil_sekolahs.gelardepan',
            'personil_sekolahs.namalengkap',
            'personil_sekolahs.gelarbelakang'
        )
            ->join('personil_sekolahs', 'personil_sekolahs.id_personil', '=', 'photo_personils.id_personil')
            ->whereIn('photo_personils.nama_group', ['Akuntansi', 'Bisnis Digital', 'Manajemen Perkantoran', 'Rekayasa Perangkat Lunak', 'Teknik Komputer dan Jaringan'])
            ->orderByRaw('CAST(photo_personils.no_personil AS UNSIGNED)')
            ->get();

        $groupedData = $personilData->groupBy('nama_group');

        $personilAkuntansi = $groupedData->get('Akuntansi', collect());
        $personilBisnisDigital = $groupedData->get('Bisnis Digital', collect());
        $personilMPerkantoran = $groupedData->get('Manajemen Perkantoran', collect());
        $personilRPL = $groupedData->get('Rekayasa Perangkat Lunak', collect());
        $personilTKJ = $groupedData->get('Teknik Komputer dan Jaringan', collect());

        //tampilkan kaprodi masing-masing konsentrasi keahlian
        $tampilKaprodi = KetuaProgramStudi::select(
            'ketua_program_studis.id',
            'ketua_program_studis.jabatan',
            'ketua_program_studis.id_kk',
            'ketua_program_studis.id_personil',
            'photo_personils.photo',
            'kompetensi_keahlians.nama_kk',
            'personil_sekolahs.gelardepan',
            'personil_sekolahs.namalengkap',
            'personil_sekolahs.gelarbelakang'
        )
            ->join('personil_sekolahs', 'personil_sekolahs.id_personil', '=', 'ketua_program_studis.id_personil')
            ->join('photo_personils', 'photo_personils.id_personil', '=', 'ketua_program_studis.id_personil')
            ->join('kompetensi_keahlians', 'kompetensi_keahlians.idkk', '=', 'ketua_program_studis.id_kk')
            ->get()
            ->keyBy('id_kk'); // jadikan array dengan key kode prodi

        $dataProfil = DB::table('profil_lulusan_prospeks')
            ->select('id_kk', 'tipe', 'deskripsi')
            ->get()
            ->groupBy('id_kk') // grouped per prodi
            ->map(function ($items) {
                return $items->groupBy('tipe'); // di dalamnya dibagi lagi per tipe
            });

        return view(
            'skaonewelcome.program',
            [
                /* 'tahunAjaran' => $tahunAjaran,
                'semester' => $semester, */

                'tahunAjarans' => $tahunAjarans,
                'dataPerTahunAjaran' => $dataPerTahunAjaran,
                'tahunAjaranAktif' => $tahunAjaranAktif,

                'jumlahSiswaPerKK' => $jumlahSiswaPerKK,
                'totalSiswaPerKK' => $totalSiswaPerKK,
                'personilAkuntansi' => $personilAkuntansi,
                'personilBisnisDigital' => $personilBisnisDigital,
                'personilMPerkantoran' => $personilMPerkantoran,
                'personilRPL' => $personilRPL,
                'personilTKJ' => $personilTKJ,
                'tampilKaprodi' => $tampilKaprodi,
                'dataProfil' => $dataProfil,
            ]
        );
    }

    public function future_students()
    {
        return view('skaonewelcome.future-students');
    }

    public function current_students()
    {
        return view('skaonewelcome.current-students');
    }

    public function faculty_and_staff()
    {
        $groupsPersonil = PhotoPersonil::select('no_group', 'nama_group')
            ->groupBy('no_group', 'nama_group')
            ->orderByRaw('CAST(no_group AS UNSIGNED)')
            ->get();

        $personilData = PhotoPersonil::select(
            'photo_personils.id',
            'photo_personils.no_group',
            'photo_personils.nama_group',
            'photo_personils.no_personil',
            'photo_personils.id_personil',
            'photo_personils.photo',
            'personil_sekolahs.gelardepan',
            'personil_sekolahs.namalengkap',
            'personil_sekolahs.gelarbelakang'
        )
            ->join('personil_sekolahs', 'personil_sekolahs.id_personil', '=', 'photo_personils.id_personil')
            ->orderByRaw('CAST(photo_personils.no_personil AS UNSIGNED)')
            ->get();



        //MENGHITUNG JENIS PERSONIL BERDASARKAN JENIS KELAMIN ===================================?
        // Contoh: Mengambil data dari database
        $dataPersonil = PersonilSekolah::select('jenispersonil', DB::raw('count(*) as total'))
            ->groupBy('jenispersonil')
            ->pluck('total', 'jenispersonil');


        $totalGuruLakiLaki = PersonilSekolah::where('jenispersonil', 'Guru')
            ->where('jeniskelamin', 'Laki-laki')
            ->count();

        $totalGuruPerempuan = PersonilSekolah::where('jenispersonil', 'Guru')
            ->where('jeniskelamin', 'Perempuan')
            ->count();

        $totalTataUsahaLakiLaki = PersonilSekolah::where('jenispersonil', 'Tata Usaha')
            ->where('jeniskelamin', 'Laki-laki')
            ->count();

        $totalTataUsahaPerempuan = PersonilSekolah::where('jenispersonil', 'Tata Usaha')
            ->where('jeniskelamin', 'Perempuan')
            ->count();

        // HITUNG UMUR PERSONIL ==============================================>
        // Mengambil semua data personil
        $personil = PersonilSekolah::all();

        // Menghitung umur setiap personil dan mengelompokkan berdasarkan rentang usia
        $dataUsia = [
            '<25' => 0,
            '25-35' => 0,
            '35-45' => 0,
            '45-55' => 0,
            '55+' => 0
        ];

        foreach ($personil as $p) {
            $umur = Carbon::parse($p->tanggallahir)->age;

            // Mengelompokkan berdasarkan rentang usia
            if ($umur < 25) {
                $dataUsia['<25']++;
            } elseif ($umur >= 25 && $umur <= 35) {
                $dataUsia['25-35']++;
            } elseif ($umur > 35 && $umur <= 45) {
                $dataUsia['35-45']++;
            } elseif ($umur > 45 && $umur <= 55) {
                $dataUsia['45-55']++;
            } else {
                $dataUsia['55+']++;
            }
        }

        // Kalkulasi total personil untuk total di radial bar
        $totalPersonil = array_sum($dataUsia);


        //return view('skaonewelcome.faculty-and-staff', compact('groupsPersonil', 'personilData'));
        return view(
            'skaonewelcome.faculty-and-staff',
            [
                'groupsPersonil' => $groupsPersonil,
                'personilData' => $personilData,
                'dataPersonil' => $dataPersonil,
                'totalGuruLakiLaki' => $totalGuruLakiLaki,
                'totalGuruPerempuan' => $totalGuruPerempuan,
                'totalTataUsahaLakiLaki' => $totalTataUsahaLakiLaki,
                'totalTataUsahaPerempuan' => $totalTataUsahaPerempuan,
                'dataUsia' => $dataUsia,
                'totalPersonil' => $totalPersonil,
            ]
        );
    }

    public function events()
    {
        return view('skaonewelcome.events');
    }

    public function alumni()
    {
        return view('skaonewelcome.alumni');
    }

    public function visimisi()
    {
        return view('skaonewelcome.visimisi');
    }

    public function struktur_organisasi()
    {
        return view('skaonewelcome.struktur-organisasi');
    }

    public function ppdb()
    {
        return view('skaonewelcome.ppdb');
    }
}

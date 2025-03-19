<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
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
        // Ambil tahun ajaran yang aktif
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

        $personilData = WelcomeDataPersonil::select(
            'welcome_data_personil.id',
            'welcome_data_personil.id_personil',
            'welcome_data_personil.jenis_group',
            'welcome_data_personil.group_name',
            'welcome_data_personil.image',
            'personil_sekolahs.gelardepan',
            'personil_sekolahs.namalengkap',
            'personil_sekolahs.gelarbelakang'
        )
            ->join('personil_sekolahs', 'personil_sekolahs.id_personil', '=', 'welcome_data_personil.id_personil')
            ->whereIn('welcome_data_personil.jenis_group', ['akuntansi', 'bisnisdigital', 'mperkantoran', 'rpl', 'tkj'])
            ->orderBy('welcome_data_personil.id_personil')
            ->get();

        $groupedData = $personilData->groupBy('jenis_group');

        $personilAkuntansi = $groupedData->get('akuntansi', collect());
        $personilBisnisDigital = $groupedData->get('bisnisdigital', collect());
        $personilMPerkantoran = $groupedData->get('mperkantoran', collect());
        $personilRPL = $groupedData->get('rpl', collect());
        $personilTKJ = $groupedData->get('tkj', collect());


        return view(
            'skaonewelcome.program',
            [
                'tahunAjaran' => $tahunAjaran,
                'semester' => $semester,
                'jumlahSiswaPerKK' => $jumlahSiswaPerKK,
                'totalSiswaPerKK' => $totalSiswaPerKK,
                'personilAkuntansi' => $personilAkuntansi,
                'personilBisnisDigital' => $personilBisnisDigital,
                'personilMPerkantoran' => $personilMPerkantoran,
                'personilRPL' => $personilRPL,
                'personilTKJ' => $personilTKJ,
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
        $groupsPersonil = WelcomeDataPersonil::select('jenis_group', 'group_name')
            ->groupBy('jenis_group', 'group_name')
            ->orderBy('jenis_group')
            ->get();

        $personilData = WelcomeDataPersonil::select(
            'welcome_data_personil.id',
            'welcome_data_personil.id_personil',
            'welcome_data_personil.jenis_group',
            'welcome_data_personil.group_name',
            'welcome_data_personil.image',
            'personil_sekolahs.gelardepan',
            'personil_sekolahs.namalengkap',
            'personil_sekolahs.gelarbelakang'
        )
            ->join('personil_sekolahs', 'personil_sekolahs.id_personil', '=', 'welcome_data_personil.id_personil')
            ->orderBy('welcome_data_personil.id_personil')
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

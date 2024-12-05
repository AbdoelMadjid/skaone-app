<?php

namespace App\Http\Controllers\WaliKelas;

use App\DataTables\WaliKelas\WaliKelasDtSiswaDataTable;
use App\Models\ManajemenSekolah\PesertaDidik;
use App\Http\Controllers\Controller;
use App\Models\AppSupport\Referensi;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class IdentitasSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WaliKelasDtSiswaDataTable $waliKelasDtSiswaDataTable)
    {
        // Ambil user yang sedang login
        $user = auth()->user();

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

        // Ambil wali kelas berdasarkan personal_id dari user yang sedang login dan tahun ajaran aktif
        $waliKelas = DB::table('rombongan_belajars')
            ->where('wali_kelas', $user->personal_id)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->first();

        // Jika wali kelas ditemukan, ambil data personil dan hitung semester angka
        $personil = null;
        $semesterAngka = null;

        if ($waliKelas) {
            // Ambil data personil
            $personil = DB::table('personil_sekolahs')
                ->where('id_personil', $waliKelas->wali_kelas)
                ->first();

            // Menentukan angka semester berdasarkan semester aktif dan tingkat
            $semesterAktif = $tahunAjaranAktif->semesters->first()->semester ?? null;

            if ($semesterAktif) {
                if ($semesterAktif === 'Ganjil') {
                    if ($waliKelas->tingkat == 10) {
                        $semesterAngka = 1;
                    } elseif ($waliKelas->tingkat == 11) {
                        $semesterAngka = 3;
                    } elseif ($waliKelas->tingkat == 12) {
                        $semesterAngka = 5;
                    }
                } elseif ($semesterAktif === 'Genap') {
                    if ($waliKelas->tingkat == 10) {
                        $semesterAngka = 2;
                    } elseif ($waliKelas->tingkat == 11) {
                        $semesterAngka = 4;
                    } elseif ($waliKelas->tingkat == 12) {
                        $semesterAngka = 6;
                    }
                }
            }
            // Ambil data dari tabel kbm_per_rombels berdasarkan kode_rombel
            $kbmData = DB::table('kbm_per_rombels')
                ->where('kode_rombel', $waliKelas->kode_rombel)
                ->get();

            // Ambil data siswa berdasarkan tahun ajaran, kode rombel, dan tingkat
            $siswaData = DB::table('peserta_didik_rombels')
                ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
                ->where('peserta_didik_rombels.tahun_ajaran', $tahunAjaranAktif->tahunajaran)
                ->where('peserta_didik_rombels.rombel_kode', $waliKelas->kode_rombel)
                ->where('peserta_didik_rombels.rombel_tingkat', $waliKelas->tingkat)
                ->select('peserta_didik_rombels.nis', 'peserta_didiks.nama_lengkap')
                ->get();
        } else {
            $kbmData = collect(); // Jika wali kelas tidak ditemukan, kirim koleksi kosong
            $siswaData = collect(); // Jika wali kelas tidak ditemukan, kirim koleksi kosong
        }

        return $waliKelasDtSiswaDataTable->render(
            'pages.walikelas.identitas-siswa',
            compact(
                'tahunAjaranAktif',
                'waliKelas',
                'personil',
                'semesterAngka',
                'kbmData',
                'siswaData'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(PesertaDidik $identitasSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PesertaDidik $identitasSiswa)
    {
        $agamaOptions = Referensi::where('jenis', 'Agama')->pluck('data', 'data')->toArray();
        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        return view('pages.walikelas.identitas-siswa-form', [
            'data' => $identitasSiswa,
            'tahunAjaran' => $tahunAjaran,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'agamaOptions' => $agamaOptions,
            'action' => route('walikelas.identitas-siswa.update', $identitasSiswa->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PesertaDidik $identitasSiswa)
    {
        // Validasi gambar jika diunggah
        $this->validate($request, [
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:256000',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus gambar dan thumbnail lama jika ada
            if ($identitasSiswa->foto) {
                $oldImagePath = base_path('images/peserta_didik/' . $identitasSiswa->foto);
                $oldThumbnailPath = base_path('images/thumbnail/' . $identitasSiswa->foto);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                if (file_exists($oldThumbnailPath)) {
                    unlink($oldThumbnailPath);
                }
            }

            // Upload gambar baru dan buat thumbnail
            $imageFile = $request->file('foto');
            $imageName = 'pd_' . time() . '.' . $imageFile->extension();

            // Buat dan simpan thumbnail di `public/images/thumbnail`
            $destinationPathThumbnail = base_path('images/thumbnail');
            $img = Image::make($imageFile->path());

            // Tentukan persentase ukuran (misalnya 50% dari ukuran asli)
            $percentage = 50; // 50% dari ukuran asli

            // Hitung dimensi baru berdasarkan persentase
            $newWidth = $img->width() * ($percentage / 100);
            $newHeight = $img->height() * ($percentage / 100);

            // Resize dengan persentase
            $img->resize($newWidth, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathThumbnail . '/' . $imageName);

            // Simpan gambar asli di `public/images/galery`
            $destinationPath = base_path('images/peserta_didik');
            $imageFile->move($destinationPath, $imageName);

            // Perbarui nama file gambar di database
            $identitasSiswa->foto = $imageName;
        }

        // Cek perubahan pada nama_lengkap dan kontak_email
        $isNameChanged = $identitasSiswa->nama_lengkap !== $request->input('nama_lengkap');
        $isEmailChanged = $identitasSiswa->kontak_email !== $request->input('kontak_email');

        // Isi atribut lain dari request kecuali 'foto'
        $identitasSiswa->fill($request->except('foto'));
        $identitasSiswa->save();

        // Update data di tabel users jika nama_lengkap atau kontak_email berubah
        if ($isNameChanged || $isEmailChanged) {
            $user = User::where('nis', $identitasSiswa->nis)->first();

            if ($user) {
                $user->update([
                    'name' => $request->input('nama_lengkap'),
                    'email' => $request->input('kontak_email'),
                ]);
            }
        }

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PesertaDidik $identitasSiswa)
    {
        //
    }
}

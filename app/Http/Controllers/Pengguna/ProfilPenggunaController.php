<?php

namespace App\Http\Controllers\Pengguna;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenSekolah\PersonilSekolahRequest;
use App\Http\Requests\ManajemenSekolah\PesertaDidikRequest;
use App\Models\AppSupport\Referensi;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\PesertaDidik;
use App\Models\ManajemenSekolah\PesertaDidikOrtu;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\PesertaDidik\IdentitasPesertaDidik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilPenggunaController extends Controller
{
    /* public function index()
    {
        $user = Auth::user(); // Get the logged-in user
        $personil = PersonilSekolah::where('id_personil', $user->personal_id)->first();
        $pesertaDidik = PesertaDidik::where('nis', $user->nis)->first();
        $agamaOptions = Referensi::where('jenis', 'Agama')->pluck('data', 'data')->toArray();
        return view(
            'pages.pengguna.pages-profile-settings',
            compact(
                'user',
                'personil',
                'pesertaDidik',
                'agamaOptions'
            )
        );
    }
 */

    public function index()
    {
        $user = Auth::user(); // Get the logged-in user
        $agamaOptions = Referensi::where('jenis', 'Agama')->pluck('data', 'data')->toArray();
        $pekerjaanOptions = Referensi::where('jenis', 'Pekerjaan')->pluck('data', 'data')->toArray();
        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $statusOrtuOptions = Referensi::where('jenis', 'StatusOrtu')->pluck('data', 'data')->toArray();
        // Inisialisasi variabel $personil dan $pesertaDidik
        $personil = null;
        $pesertaDidik = null;

        if ($user->personal_id) {
            // Jika user memiliki personal_id, maka dianggap sebagai personil
            $personil = PersonilSekolah::where('id_personil', $user->personal_id)->first();

            // Arahkan ke view untuk personil
            return view('pages.pengguna.pages-profile-settings', compact('user', 'personil', 'pesertaDidik', 'agamaOptions'));
        } elseif ($user->nis) {
            // Jika user memiliki nis, maka dianggap sebagai peserta didik
            $pesertaDidik = PesertaDidik::where('nis', $user->nis)->first();
            $ortu = PesertaDidikOrtu::where('nis', $user->nis)->first();

            // Arahkan ke view untuk peserta didik
            return view('pages.pengguna.pages-profile-settings-siswa', compact('user', 'pesertaDidik', 'agamaOptions', 'tahunAjaran', 'kompetensiKeahlian', 'ortu', 'pekerjaanOptions', '$statusOrtuOptions'));
        }

        // Jika user tidak memiliki personal_id atau nis, arahkan ke halaman error atau dashboard
        return redirect()->route('dashboard')->with('error', 'Pengguna tidak valid.');
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id); // Get the logged-in user

        if ($user->personal_id) {
            // Jika user memiliki personal_id, maka simpan ke PersonilSekolah
            $personil = PersonilSekolah::where('id_personil', $user->personal_id)->first();

            if ($personil) {
                $personil->update($request->only([
                    'nip',
                    'gelardepan',
                    'namalengkap',
                    'gelarbelakang',
                    'jeniskelamin',
                    'jenispersonil',
                    'tempatlahir',
                    'tanggallahir',
                    'agama',
                    'kontak_email',
                    'kontak_hp',
                    'aktif',
                    'alamat_blok',
                    'alamat_nomor',
                    'alamat_rt',
                    'alamat_rw',
                    'alamat_desa',
                    'alamat_kec',
                    'alamat_kab',
                    'alamat_prov',
                    'alamat_kodepos',
                    'motto_hidup',
                ]));
            }

            $user->update([
                'name' => $request->input('namalengkap'),
                'email' => $request->input('kontak_email'),
            ]);

            return redirect()->route('profilpengguna.profil-pengguna.index')
                ->with('success', 'Profil personil berhasil diperbarui.');
        } elseif ($user->nis) {
            // Jika user memiliki nis, maka simpan ke PesertaDidik
            $pesertaDidik = IdentitasPesertaDidik::where('nis', $user->nis)->first();

            if ($pesertaDidik) {
                $pesertaDidik->update($request->only([
                    'nis',
                    'nisn',
                    'thnajaran_masuk',
                    'kode_kk',
                    'nama_lengkap',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'jenis_kelamin',
                    'agama',
                    'status_dalam_kel',
                    'anak_ke',
                    'sekolah_asal',
                    'diterima_kelas',
                    'diterima_tanggal',
                    'asalsiswa',
                    'keterangan_pindah',
                    'alamat_blok',
                    'alamat_norumah',
                    'alamat_rt',
                    'alamat_rw',
                    'alamat_kodepos',
                    'alamat_desa',
                    'alamat_kec',
                    'alamat_kab',
                    'kontak_telepon',
                    'kontak_email',
                    'status',
                    'alasan_status',
                ]));
            }

            // Tambahan untuk peserta_didik_ortu
            $ortu = PesertaDidikOrtu::where('nis', $user->nis)->first();

            $dataOrtu = $request->only([
                'nis',
                'status_ortu',
                'nm_ayah',
                'nm_ibu',
                'pekerjaan_ayah',
                'pekerjaan_ibu',
                'ortu_alamat_blok',
                'ortu_alamat_norumah',
                'ortu_alamat_rt',
                'ortu_alamat_rw',
                'ortu_alamat_desa',
                'ortu_alamat_kec',
                'ortu_alamat_kab',
                'ortu_alamat_kodepos',
                'ortu_kontak_telepon',
                'ortu_kontak_email',
            ]);

            $dataOrtu['nis'] = $user->nis;

            if ($ortu) {
                $ortu->update($dataOrtu);
            } else {
                PesertaDidikOrtu::create($dataOrtu);
            }


            $user->update([
                'name' => $request->input('nama_lengkap'),
            ]);

            return redirect()->route('profilpengguna.profil-pengguna.index')
                ->with('success', 'Profil peserta didik berhasil diperbarui.');
        }

        // Jika user tidak memiliki personal_id atau nis
        return redirect()->route('dashboard')->with('error', 'Pengguna tidak valid.');
    }

    public function updateProfilePicture(Request $request)
    {
        // Validasi input gambar
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $personil = PersonilSekolah::where('id_personil', $user->personal_id)->first();

        // Cek jika personil tidak ada, buat baru
        if (!$personil) {
            $personil = new PersonilSekolah($request->except(['profile_image']));
        }

        if ($request->hasFile('profile_image')) {
            $imageFile = $request->file('profile_image');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('profile_image'),
                directory: 'images/personil',
                oldFileName: $personil->photo ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'Pgw_'
            );

            $personil->photo = $imageName;
        }

        // Simpan data ke database
        $personil->save();

        if ($user instanceof User) { // Ensure $user is an instance of User model
            $user->avatar = $imageName;
            $user->save(); // Save user changes
        }

        return response()->json(['success' => 'Profile picture updated successfully.']);
    }

    public function updateBackground(Request $request)
    {
        // Validasi input gambar
        $request->validate([
            'bg_profil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $personil = PersonilSekolah::where('id_personil', $user->personal_id)->first();

        // Cek jika personil tidak ada, buat baru
        if (!$personil) {
            $personil = new PersonilSekolah($request->except(['bg_profil']));
        }


        if ($request->hasFile('bg_profil')) {
            $imageFile = $request->file('bg_profil');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('bg_profil'),
                directory: 'images/bgprofil',
                oldFileName: $personil->bg_profil ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'Bgp_'
            );

            $personil->bg_profil = $imageName;
        }

        $personil->save();

        return response()->json(['success' => 'Profile picture updated successfully.']);
    }

    /* public function updateProfilePictureSiswa(Request $request)
    {
        // Validasi input gambar
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $pesertadidik = PesertaDidik::where('nis', $user->nis)->first();

        // Cek jika pesertadidik tidak ada, buat baru
        if (!$pesertadidik) {
            $pesertadidik = new PesertaDidik($request->except(['profile_image']));
        }

        // Check if a new image is uploaded
        if ($request->hasFile('profile_image')) {
            // Hapus gambar dan thumbnail lama jika ada
            if ($pesertadidik->foto) {
                $oldImagePath = base_path('images/peserta_didik/' . $pesertadidik->foto);
                $oldThumbnailPath = base_path('images/thumbnail/' . $pesertadidik->foto);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                if (file_exists($oldThumbnailPath)) {
                    unlink($oldThumbnailPath);
                }
            }

            // Upload gambar baru dan buat thumbnail
            $pesertadidikFile = $request->file('profile_image');
            $pesertadidikName = 'pd_' . time() . '.' . $pesertadidikFile->extension();

            // Buat dan simpan thumbnail di `public/images/thumbnail`
            $destinationPathThumbnail = base_path('images/thumbnail');
            $img = Image::make($pesertadidikFile->path());

            // Tentukan persentase ukuran (misalnya 50% dari ukuran asli)
            $percentage = 50; // 50% dari ukuran asli

            // Hitung dimensi baru berdasarkan persentase
            $newWidth = $img->width() * ($percentage / 100);
            $newHeight = $img->height() * ($percentage / 100);

            // Resize dengan persentase
            $img->resize($newWidth, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathThumbnail . '/' . $pesertadidikName);

            // Simpan gambar asli di `public/images/pesertadidik`
            $destinationPath = base_path('images/peserta_didik');
            $pesertadidikFile->move($destinationPath, $pesertadidikName);

            // Perbarui nama file gambar di database
            $pesertadidik->foto = $pesertadidikName;
        }

        // Simpan data ke database
        $pesertadidik->save();

        if ($user instanceof User) { // Ensure $user is an instance of User model
            $user->avatar = $pesertadidikName;
            $user->save(); // Save user changes
        }

        return response()->json(['success' => 'Profile picture updated successfully.']);
    } */

    public function updateOrtuSiswa(Request $request)
    {
        // Ambil NIS dari user yang sedang login
        $nis = auth()->user()->nis;

        // Validasi input
        $validatedData = $request->validate([
            'status' => 'required|string|max:255',
            'nm_ayah' => 'nullable|string|max:255',
            'nm_ibu' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'ortu_alamat_blok' => 'nullable|string|max:255',
            'ortu_alamat_norumah' => 'nullable|string|max:10',
            'ortu_alamat_rt' => 'nullable|string|max:10',
            'ortu_alamat_rw' => 'nullable|string|max:10',
            'ortu_alamat_desa' => 'nullable|string|max:255',
            'ortu_alamat_kec' => 'nullable|string|max:255',
            'ortu_alamat_kab' => 'nullable|string|max:255',
            'ortu_alamat_kodepos' => 'nullable|string|max:10',
            'ortu_kontak_telepon' => 'nullable|string|max:15',
            'ortu_kontak_email' => 'nullable|email|max:255',
        ]);

        // Cek apakah data sudah ada berdasarkan NIS
        $ortu = PesertaDidikOrtu::where('nis', $nis)->first();

        if ($ortu) {
            // Jika data sudah ada, update
            $ortu->update($validatedData);
        } else {
            // Jika data belum ada, buat baru
            PesertaDidikOrtu::create(array_merge($validatedData, ['nis' => $nis]));
        }

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data orang tua berhasil disimpan.');
    }
}

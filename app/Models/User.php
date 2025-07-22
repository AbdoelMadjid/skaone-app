<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\ManajemenPengguna\LoginRecord;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\PesertaDidik;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @method bool hasRole(string|array $roles)
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'avatar',
        'email',
        'password',
        'personal_id',
        'nis',
        'last_login_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /* public function getAvatarUrlAttribute()
    {
        $avatarPath = base_path('images/personil/' . $this->avatar);

        // Cek apakah file avatar ada di folder public/images/personil/
        if ($this->avatar && file_exists($avatarPath)) {
            return asset('images/personil/' . $this->avatar); // Tampilkan avatar yang ada
        }

        // Jika avatar tidak ada, tampilkan gambar berdasarkan jenis kelamin
        if ($this->personilSekolah && $this->personilSekolah->jeniskelamin === 'Laki-laki') {
            return asset('images/gurulaki.png');
        } elseif ($this->personilSekolah && $this->personilSekolah->jeniskelamin === 'Perempuan') {
            return asset('images/gurucewek.png');
        }

        // Fallback jika data tidak lengkap
        return asset('build/images/users/user-dummy-img.jpg');
    } */

    public function getAvatarUrlAttribute()
    {
        // Path avatar berdasarkan personal_id (untuk PersonilSekolah)
        if ($this->personal_id) {
            $personil = PersonilSekolah::where('id_personil', $this->personal_id)->first();

            if ($personil && $personil->photo) {
                $avatarPath = base_path('images/personil/' . $personil->photo);

                // Cek apakah file avatar ada di folder public/images/personil/
                if (file_exists($avatarPath)) {
                    return asset('images/personil/' . $personil->photo);
                }

                // Jika avatar tidak ada, tampilkan gambar berdasarkan jenis kelamin
                if ($personil->jeniskelamin === 'Laki-laki') {
                    return asset('images/gurulaki.png');
                } elseif ($personil->jeniskelamin === 'Perempuan') {
                    return asset('images/gurucewek.png');
                }
            }
        }

        // Path avatar berdasarkan nis (untuk PesertaDidik)
        if ($this->nis) {
            $pesertaDidik = PesertaDidik::where('nis', $this->nis)->first();

            if ($pesertaDidik && $pesertaDidik->foto) {
                $avatarPath = base_path('images/peserta_didik/' . $pesertaDidik->foto);

                // Cek apakah file avatar ada di folder public/images/pesertadidik/
                if (file_exists($avatarPath)) {
                    return asset('images/peserta_didik/' . $pesertaDidik->foto);
                }

                // Jika avatar tidak ada, tampilkan gambar berdasarkan jenis kelamin
                if ($pesertaDidik->jenis_kelamin === 'Laki-laki') {
                    return asset('images/siswacowok.png');
                } elseif ($pesertaDidik->jenis_kelamin === 'Perempuan') {
                    return asset('images/siswacewek.png');
                }
            }
        }

        // Fallback jika data tidak lengkap atau avatar tidak ditemukan
        return asset('build/images/users/user-dummy-img.jpg');
    }

    public function getRoleLabelsAttribute()
    {
        $roleMap = [
            'master' => 'Master',
            'admin' => 'Administrator',
            'kepsek' => 'Kepala Sekolah',
            'guru' => 'Tenaga Pendidik',
            'tatausaha' => 'Tenaga Kependidikan',
            'wakasek' => 'Wakil Kepala Sekolah',
            'kaprog' => 'Ketua Program Studi',
            'gmapel' => 'Guru Mata Pelajaran',
            'walas' => 'Wali Kelas',
            'siswa' => 'Peserta Didik',
            'tamu' => 'Pengunjung',
            'pembpkl' => 'Pembimbing PKL',
            'adminpkl' => 'Administrator PKL',
            'pesertapkl' => 'Peserta PKL',
            'kaprodiak' => 'Kaprodi AK',
            'kaprodibd' => 'Kaprodi BD',
            'kaprodimp' => 'Kaprodi MP',
            'kaprodirpl' => 'Kaprodi RPL',
            'kaproditkj' => 'Kaprodi TKJ',
            'bpbk' => 'Bimbingan Konseling',
            'alumni' => 'Alumni',
            'panitiapkl' => 'Panitia PKL',
        ];

        // Mendapatkan semua nama role pengguna
        $userRoles = $this->roles->pluck('name')->toArray();
        $displayRoles = [];

        foreach ($userRoles as $role) {
            if (array_key_exists($role, $roleMap)) {
                $displayRoles[] = $roleMap[$role]; // Menambahkan label role ke array display
            }
        }

        return implode(', ', $displayRoles); // Mengembalikan semua role yang sudah dipetakan
    }

    public function loginRecords()
    {
        return $this->hasMany(LoginRecord::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'user_id');
    }

    public function messages()
    {
        return $this->hasMany(Chat::class, 'user_id');
    }

    // Relasi dengan channel yang user buat
    public function createdChannels()
    {
        return $this->hasMany(Channel::class, 'creator_id');
    }

    // Relasi dengan channel di mana user adalah anggota
    public function joinedChannels()
    {
        return $this->belongsToMany(Channel::class, 'channel_user');
    }
}

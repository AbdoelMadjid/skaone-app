<?php

namespace Database\Factories\ManajemenSekolah;

use App\Models\AppSupport\Referensi;
use App\Models\ManajemenSekolah\PesertaDidik;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ManajemenSekolah\PesertaDidik>
 */
class PesertaDidikFactory extends Factory
{
    protected $model = PesertaDidik::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Ambil referensi agama dari tabel referensis
        $agamaOptions = Referensi::where('jenis', 'Agama')->pluck('data', 'data')->toArray();

        // Tentukan data random yang akan digunakan
        $jenis_kelamin = $this->faker->randomElement(['Laki-laki', 'Perempuan']);
        $kode_kk = $this->faker->randomElement([411, 421, 811, 821, 833]);
        $foto = $jenis_kelamin == 'Laki-laki' ? 'siswacowok.png' : 'siswacewek.png';

        // Generate 2-3 kata untuk nama lengkap
        $nama_lengkap = ucwords($this->faker->words($this->faker->numberBetween(2, 3), true));

        // Kota dengan proporsi probabilitas
        $tempat_lahir = $this->faker->randomElement([
            'Cirebon',
            'Cirebon', // 2% probability
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Majalengka',
            'Sumedang',
            'Sumedang',
            'Sumedang',
            'Sumedang',
            'Sumedang',
            'Sumedang',
            'Sumedang',
            'Sumedang',
            'Sumedang',
            'Sumedang', // 10%
            'Indramayu',
            'Indramayu',
            'Indramayu' // 3%
        ]);

        return [
            'nis' => $this->faker->unique()->numerify('##########'),  // NIS tidak boleh sama
            'nisn' => $this->faker->unique()->numerify('##########'), // NISN tidak boleh sama
            'thnajaran_masuk' => '2024-2025',
            'kode_kk' => $kode_kk,
            'nama_lengkap' => $nama_lengkap,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $this->faker->date('Y-m-d', '2014-12-31', '2011-01-01'),
            'jenis_kelamin' => $jenis_kelamin,
            'agama' => $this->faker->randomElement($agamaOptions),
            'status_dalam_kel' => $this->faker->randomElement(['Anak Kandung', 'Anak Angkat', 'Anak Tiri']),
            'anak_ke' => $this->faker->numberBetween(1, 5),
            'sekolah_asal' => $this->faker->company,
            'diterima_kelas' => $this->faker->randomElement(['10', '11', '12']),
            'diterima_tanggal' => $this->faker->date('2024-07-13'),
            'asalsiswa' => 'Siswa Baru',  // Semua siswa baru
            'keterangan_pindah' => '',
            'alamat_blok' => $this->faker->streetAddress,
            'alamat_norumah' => $this->faker->numerify('###'),
            'alamat_rt' => $this->faker->numerify('###'),
            'alamat_rw' => $this->faker->numerify('###'),
            'alamat_desa' => $this->faker->citySuffix,
            'alamat_kec' => $this->faker->state,
            'alamat_kab' => $this->faker->randomElement(['Majalengka', 'Cirebon', 'Indramayu']),
            'alamat_kodepos' => $this->faker->numerify('#####'),
            'kontak_telepon' => $this->faker->unique()->numerify('08############'),
            'kontak_email' => $this->faker->unique()->safeEmail,
            'foto' => $foto,  // Tentukan foto berdasarkan jenis kelamin
            'status' => 'Aktif',  // Semua siswa berstatus Aktif
            'alasan_status' => '',
        ];
    }
}

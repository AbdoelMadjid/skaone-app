<?php

namespace Database\Factories\ManajemenSekolah;

use App\Models\AppSupport\Referensi;
use App\Models\ManajemenSekolah\PersonilSekolah;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ManajemenSekolah\PersonilSekolah>
 */
class PersonilSekolahFactory extends Factory
{
    protected $model = PersonilSekolah::class;

    // Counter untuk ID berurutan
    private static $counter = 1;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Ambil referensi agama dari tabel referensis
        $agamaOptions = Referensi::where('jenis', 'Agama')->pluck('data', 'data')->toArray();

        // Ambil tanggal lahir
        $tanggallahir = $this->faker->date('Y-m-d', '2000-01-01');
        $year = date('Y', strtotime($tanggallahir));
        $month = date('m', strtotime($tanggallahir));
        $day = date('d', strtotime($tanggallahir));

        // Tentukan jenis kelamin
        $jeniskelamin = $this->faker->randomElement(['Laki-laki', 'Perempuan']);
        $genderCode = $jeniskelamin === 'Laki-laki' ? '1' : '2';

        // Generate random year and month for the NIP
        $randomYear = $this->faker->year('now');
        $randomMonth = str_pad($this->faker->numberBetween(1, 12), 2, '0', STR_PAD_LEFT);

        // Generate random sequence
        $randomSequence = $this->faker->numerify('###');

        // Format NIP
        $nip = $year . $month . $day . " " . $randomYear . $randomMonth . " " . $genderCode . " " . $randomSequence;

        // Generate ID with leading zeros
        $id = 'Pgw_' . str_pad(self::$counter++, 4, '0', STR_PAD_LEFT);

        return [
            'id_personil' => $id,
            'nip' => $nip,
            'gelardepan' => $this->faker->optional()->randomElement(['Drs.', 'Dra', 'Prof.', 'Ir.']),
            'namalengkap' => $this->faker->name(),
            'gelarbelakang' => $this->faker->optional()->randomElement(['S.Pd.', 'M.Pd.', 'S.T.', 'S.Kom.', 'M.Kom.', 'MM']),
            'jeniskelamin' => $jeniskelamin,
            'jenispersonil' => $this->faker->randomElement(['Kepala Sekolah', 'Guru', 'Tata Usaha']),
            'tempatlahir' => $this->faker->city(),
            'tanggallahir' => $tanggallahir,
            'agama' => $this->faker->randomElement($agamaOptions),
            'kontak_email' => $this->faker->safeEmail(),
            'kontak_hp' => $this->faker->numerify('08##########'),
            'photo' => $jeniskelamin === 'Perempuan' ? 'gurucewek.png' : 'gurulaki.png',
            'aktif' => $this->faker->randomElement(['Aktif', 'Tidak Aktif', 'Pensiun', 'Pindah', 'Keluar']),
        ];
    }

    public function kepalaSekolah()
    {
        return $this->state([
            'jenispersonil' => 'Kepala Sekolah',
            'aktif' => 'Aktif'
        ]);
    }

    public function guruAtauTataUsaha()
    {
        return $this->state(function (array $attributes) {
            return [
                'jenispersonil' => $this->faker->randomElement(['Guru', 'Tata Usaha']),
            ];
        });
    }
}

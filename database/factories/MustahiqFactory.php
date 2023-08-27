<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mustahiq>
 */
class MustahiqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim' => fake()->numberBetween(1000000000, 9999999999),
            'jenis' => fake()->randomElement(['perorangan', 'kelompok']),
            'jumlah_anggota' => fake()->randomNumber(2, true),
            'pemilik_rekening' => fake()->name(),
            'bank' => fake()->randomElement(['BCA', 'MANDIRI', 'BRI', 'BSI']),
            'no_rek' => fake()->numberBetween(1000000000000000, 9999999999999999),
            'asnaf' => fake()->randomElement(['fakir', 'miskin', 'amil', 'muallaf', 'riqob', 'gharim', 'fisabilillah', 'ibnu sabil']),
            'pekerjaan' => fake()->randomElement(['wirausaha', 'mahasiswa', 'buruh', 'karyawan']),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date(),
        ];
    }
}

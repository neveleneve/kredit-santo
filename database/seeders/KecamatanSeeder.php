<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kecamatan::create([
            'nama' => 'Bukit Bestari',
        ]);
        Kecamatan::create([
            'nama' => 'Tanjungpinang Barat',
        ]);
        Kecamatan::create([
            'nama' => 'Tanjungpinang Kota',
        ]);
        Kecamatan::create([
            'nama' => 'Tanjungpinang Timur',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\KriteriaBobot;
use Illuminate\Database\Seeder;

class KriteriaBobotSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // mfep
        KriteriaBobot::create([
            'nama' => 'Domisili Warga',
            'bobot' => 10,
            'tipe' => 'mfep',
        ]);
        KriteriaBobot::create([
            'nama' => 'Status Pekerjaan',
            'bobot' => 30,
            'tipe' => 'mfep',
        ]);
        KriteriaBobot::create([
            'nama' => 'Besar Penghasilan',
            'bobot' => 20,
            'tipe' => 'mfep',
        ]);
        KriteriaBobot::create([
            'nama' => 'Kepemilikan Rumah',
            'bobot' => 20,
            'tipe' => 'mfep',
        ]);
        KriteriaBobot::create([
            'nama' => 'Kepemilikan Kendaraan',
            'bobot' => 10,
            'tipe' => 'mfep',
        ]);
        KriteriaBobot::create([
            'nama' => 'Status Pernikahan',
            'bobot' => 10,
            'tipe' => 'mfep',
        ]);
    }
}

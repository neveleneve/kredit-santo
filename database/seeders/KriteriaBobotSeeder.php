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
            'nama' => 'Karakter',
            'bobot' => 35,
            'tipe' => 'mfep',
        ]);
        KriteriaBobot::create([
            'nama' => 'Kapasitas',
            'bobot' => 25,
            'tipe' => 'mfep',
        ]);
        KriteriaBobot::create([
            'nama' => 'Pendapatan',
            'bobot' => 25,
            'tipe' => 'mfep',
        ]);
        KriteriaBobot::create([
            'nama' => 'Kondisi',
            'bobot' => 15,
            'tipe' => 'mfep',
        ]);
        // wp
        KriteriaBobot::create([
            'nama' => 'Karakter',
            'bobot' => 35,
            'tipe' => 'wp',
        ]);
        KriteriaBobot::create([
            'nama' => 'Kapital (Uang Muka)',
            'bobot' => 15,
            'tipe' => 'wp',
        ]);
        KriteriaBobot::create([
            'nama' => 'Kapasitas (Kemampuan)',
            'bobot' => 20,
            'tipe' => 'wp',
        ]);
        KriteriaBobot::create([
            'nama' => 'Kolateral (Jaminan)',
            'bobot' => 20,
            'tipe' => 'wp',
        ]);
        KriteriaBobot::create([
            'nama' => 'Kondisi (Tanggungan)',
            'bobot' => 10,
            'tipe' => 'wp',
        ]);
    }
}

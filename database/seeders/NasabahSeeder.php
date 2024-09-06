<?php

namespace Database\Seeders;

use App\Models\DetailNasabah;
use App\Models\Istri;
use App\Models\Nasabah;
use App\Models\Penjamin;
use Illuminate\Database\Seeder;

class NasabahSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $nasabah = Nasabah::create([
            'nama' => 'Anto',
            'alamat' => 'Jalan Kemana',
            'village_id' => 2172010002,
        ]);
        DetailNasabah::create([
            'nasabah_id' => $nasabah->id,
            'nik' => '5735520418812113',
            'no_kk' => '4011865637932043',
            'tempat_lahir' => 'Tanjungpinang',
            'tanggal_lahir' => date('Y-m-d', strtotime('27-05-1980')),
            'kontak' => '715141230701',
            'jenis_kelamin' => 'laki-laki',
            'status_pernikahan' => '2',
            'pekerjaan' => '2',
            'gaji' => '3',
            'aset_rumah' => '4',
            'aset_kendaraan' => '2',
        ]);
    }

    public function randNumber($length = 10, $charstate = 'number') {
        if ($charstate == 'number') {
            $characters = '0123456789';
        } else  if ($charstate == 'alpha') {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWRSTUVWXYZ';
        } else  if ($charstate == 'alpha_numeric') {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWRSTUVWXYZ';
        } else {
            $characters = '0123456789';
        }
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $code;
    }
}

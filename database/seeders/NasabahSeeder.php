<?php

namespace Database\Seeders;

use App\Models\DetailNasabah;
use App\Models\Istri;
use App\Models\Nasabah;
use App\Models\Penjamin;
use Illuminate\Database\Seeder;

class NasabahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nasabah = Nasabah::create([
            'nama' => 'Anto',
            'alamat' => 'Jalan Kemana',
            'kelurahan_id' => rand(1, 18),
        ]);
        DetailNasabah::create([
            'nasabah_id' => $nasabah->id,
            'nik' => '5735520418812113',
            'no_kk' => '4011865637932043',
            'tempat_lahir' => 'Tanjungpinang',
            'tanggal_lahir' => date('Y-m-d', strtotime('27-05-1980')),
            'kontak' => '715141230701',
            'jenis_kelamin' => 'laki-laki',
            'status_pernikahan' => 'kawin',
            'pekerjaan' => '1',
            'gaji' => '5',
            'tanggungan' => '4',
        ]);
        Istri::create([
            'nasabah_id' => $nasabah->id,
            'nama' => 'Cantika',
            'kontak' => '899300347740',
            'nik' => '3551261775192991',
            'pekerjaan' => 'IRT',
        ]);
        Penjamin::create([
            'nasabah_id' => $nasabah->id,
        ]);
    }

    public function randNumber($length = 10, $charstate = 'number')
    {
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

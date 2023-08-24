<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use Illuminate\Database\Seeder;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelurahan::insert([
            [
                'kecamatan_id' => 1,
                'nama' => 'Dompak',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kecamatan_id' => 1,
                'nama' => 'Sei Jang',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kecamatan_id' => 1,
                'nama' => 'Tanjung Ayun Sakti',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kecamatan_id' => 1,
                'nama' => 'Tanjungpinang Timur',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kecamatan_id' => 1,
                'nama' => 'Tanjung Unggat',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kecamatan_id' => 2,
                'nama' => 'Bukit Cermin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kecamatan_id' => 2,
                'nama' => 'Kampung Baru',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kecamatan_id' => 2,
                'nama' => 'Kemboja',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kecamatan_id' => 2,
                'nama' => 'Tanjungpinang Barat',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kecamatan_id' => 3,
                'nama' => 'Kampung Bugis',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kecamatan_id' => 3,
                'nama' => 'Penyengat',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kecamatan_id' => 3,
                'nama' => 'Senggarang',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kecamatan_id' => 3,
                'nama' => 'Tanjungpinang Kota',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kecamatan_id' => 4,
                'nama' => 'Air Raja',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kecamatan_id' => 4,
                'nama' => 'Batu IX',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kecamatan_id' => 4,
                'nama' => 'Kampung Bulang',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kecamatan_id' => 4,
                'nama' => 'Melayu Kota Piring',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kecamatan_id' => 4,
                'nama' => 'Pinang Kencana',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}

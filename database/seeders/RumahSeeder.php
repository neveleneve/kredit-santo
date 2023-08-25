<?php

namespace Database\Seeders;

use App\Models\Rumah;
use Illuminate\Database\Seeder;

class RumahSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            Rumah::create([
                'nama' => 'Perum. Anjani Blok A No. ' . $i + 1,
                'rumah_code' => $this->checkrumahNumber(),
                'tipe_rumah' => '36/100',
                'harga' => '175000000',
                'detail' => 'Rumah tipe 36 pada Perum. Anjani Blok A No. ' . $i + 1,
            ]);
        }
    }

    public function rumahNumber($length = 10)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $code;
    }

    public function checkrumahNumber()
    {
        $code = $this->rumahNumber();
        $data = Rumah::where('rumah_code', $code)->count();
        $verifiedcode = null;

        do {
            if ($data == 0) {
                $verifiedcode = $code;
                break; // Exit the loop if a unique code is found
            }

            $code = $this->rumahNumber(); // Generate a new code
            $data = Rumah::where('rumah_code', $code)->count();
        } while (true);

        return $verifiedcode;
    }
}

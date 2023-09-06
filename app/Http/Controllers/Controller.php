<?php

namespace App\Http\Controllers;

use App\Models\KriteriaBobot;
use App\Models\Nasabah;
use App\Models\Rumah;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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

    public function checkRumahCode()
    {
        $code = $this->randNumber(10, 'alpha_numeric');
        $data = Rumah::where('rumah_code', $code)
            ->count();
        $verifiedcode = null;
        do {
            if ($data == 0) {
                $verifiedcode = $code;
                break;
            }

            $code = $this->randNumber(10, 'alpha_numeric');
            $data = Rumah::where('rumah_code', $code)
                ->count();
        } while (true);

        return $verifiedcode;
    }
    // wp
    public function vectorS($c, $w)
    {
        $s = 0;
        for ($i = 0; $i < count($c); $i++) {
            $s += number_format(pow($c[$i], $w[$i]), 3, '.', ',');
        }
        return number_format($s, 3, '.', ',');
    }

    public function hitungWP($data)
    {
        $bobot = KriteriaBobot::where('tipe', 'wp')
            ->orderBy('id')
            ->get('bobot');
        $totalbobot = KriteriaBobot::where('tipe', 'wp')
            ->sum('bobot');

        for ($i = 0; $i < count($bobot); $i++) {
            $w[$i] = number_format($bobot[$i]->bobot / $totalbobot, 3, '.', ',');
        }

        $nilai = $this->vectorS($data, $w);
        return $nilai;
    }

    // mfep
    public function hitungMFEP($data)
    {
        // $weight =
        $bobot = KriteriaBobot::where('tipe', 'mfep')
            ->orderBy('id')
            ->get('bobot');
        $nilaimfep = 0;

        for ($i = 0; $i < count($bobot); $i++) {
            $nilaimfep += number_format($data[$i] * ($bobot[$i]->bobot / 100), 2, '.', ',');
        }

        return $nilaimfep;
    }
}

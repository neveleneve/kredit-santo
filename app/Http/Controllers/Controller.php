<?php

namespace App\Http\Controllers;

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
}

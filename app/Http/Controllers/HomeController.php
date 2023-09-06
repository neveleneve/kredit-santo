<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $allNasabah = Nasabah::count();
        $verified = Penilaian::where('status', '1')->count();

        $nasabah = [
            'total' => $allNasabah,
            'verified' => $verified,
        ];
        return view('home', [
            'nasabah' => $nasabah
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $allNasabah = Nasabah::count();

        $nasabah = [
            'total' => $allNasabah,
            // 'verified' => $allNasabah,
        ];
        return view('home', [
            'nasabah' => $nasabah
        ]);
    }
}

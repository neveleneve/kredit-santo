<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $penilaian = Penilaian::all();
        return view('admin.penilaian.index', [
            'penilaian' => $penilaian,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Penilaian $penilaian)
    {
        //
    }

    public function edit(Penilaian $penilaian)
    {
        //
    }

    public function update(Request $request, Penilaian $penilaian)
    {
        //
    }

    public function destroy(Penilaian $penilaian)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public function index()
    {
        $nasabah = Nasabah::get();
        return view('admin.nasabah.index', [
            'nasabah' => $nasabah
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


    public function show(Nasabah $nasabah)
    {
        return view('admin.nasabah.show', [
            'nasabah' => $nasabah
        ]);
    }


    public function edit(Nasabah $nasabah)
    {
        return view('admin.nasabah.edit', [
            'nasabah' => $nasabah
        ]);
    }


    public function update(Request $request, Nasabah $nasabah)
    {
        //
    }


    public function destroy(Nasabah $nasabah)
    {
        //
    }
}

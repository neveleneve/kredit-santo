<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $nasabah = Nasabah::get();
        return view('admin.nasabah.index', [
            'nasabah' => $nasabah
        ]);
    }

    public function create()
    {
        return view('admin.nasabah.create');
    }


    public function store(Request $request)
    {
        dd($request->all());
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

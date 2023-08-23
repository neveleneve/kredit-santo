<?php

namespace App\Http\Controllers;

use App\Models\KriteriaBobot;
use Illuminate\Http\Request;

class KriteriaBobotController extends Controller
{
    public function index()
    {
        $kriteriaBobot = KriteriaBobot::get();
        return view('admin.kriteria.index', [
            'kriteriaBobot' => $kriteriaBobot
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

    public function show(KriteriaBobot $kriteriaBobot)
    {
        return view('admin.kriteria.show', [
            'kriteria' => $kriteriaBobot
        ]);
    }

    public function edit(KriteriaBobot $kriteriaBobot)
    {
        return view('admin.kriteria.edit', [
            'kriteria' => $kriteriaBobot
        ]);
    }


    public function update(Request $request, KriteriaBobot $kriteriaBobot)
    {
        //
    }

    public function destroy(KriteriaBobot $kriteriaBobot)
    {
        //
    }
}

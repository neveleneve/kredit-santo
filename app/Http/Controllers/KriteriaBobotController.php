<?php

namespace App\Http\Controllers;

use App\Models\KriteriaBobot;
use Illuminate\Http\Request;

class KriteriaBobotController extends Controller
{
    public function index()
    {
        $kriteriaBobot = KriteriaBobot::orderBy('tipe')->get();
        return view('admin.kriteria.index', [
            'kriteria' => $kriteriaBobot
        ]);
    }

    public function edit(KriteriaBobot $kriteriaBobot)
    {
        $sumbobot = KriteriaBobot::where('tipe', $kriteriaBobot->tipe)->sum('bobot');
        return view('admin.kriteria.edit', [
            'kriteria' => $kriteriaBobot,
            'total' => 100 - $sumbobot,
        ]);
    }

    public function update(Request $request, KriteriaBobot $kriteriaBobot)
    {
        // dd([$request->all(), $kriteriaBobot]);
        $kriteriaBobot->update([
            'bobot' => $request->bobot
        ]);
        return redirect(route('kriteria-bobot.index'))->with([
            'color' => 'success',
            'message' => 'Berhasil mengubah data kriteria!',
        ]);
    }
}

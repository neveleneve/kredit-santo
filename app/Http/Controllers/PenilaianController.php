<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Penilaian;
use App\Models\Rumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenilaianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $penilaian = Penilaian::all();
        return view('admin.penilaian.index', [
            'penilaian' => $penilaian,
        ]);
    }

    public function create()
    {
        $nasabah = Nasabah::get();
        $rumah = Rumah::where('status', '2')->get();
        return view('admin.penilaian.create', [
            'rumah' => $rumah,
            'nasabah' => $nasabah,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validasi = Validator::make($request->all(), [
            'rumah' => ['required', 'numeric'],
            'nasabah' => ['required', 'numeric'],
            'dp' => ['required', 'numeric', 'lte:100', 'gte:20'],
            'tenor' => ['required', 'numeric', 'lte:20', 'gte:10'],
            'bi' => ['required', 'numeric', 'lte:100', 'gte:20'],
        ], [
            'rumah.required' => 'Data rumah harus dipilih!',
            'rumah.numeric' => 'Data rumah harus dipilih dengan angka!',
            'nasabah.required' => 'Data nasabah harus dipilih!',
            'nasabah.numeric' => 'Data nasabah harus dipilih dengan angka!',
            'dp.required' => 'Data uang muka harus dipilih!',
            'dp.numeric' => 'Data uang muka harus dipilih dengan angka!',
            'dp.gte' => 'Data uang muka harus lebih dari 20!',
            'dp.lte' => 'Data uang muka harus kurang dari 100!',
            'tenor.required' => 'Data tenor pembayaran harus dipilih!',
            'tenor.numeric' => 'Data tenor pembayaran harus dipilih dengan angka!',
            'tenor.gte' => 'Data tenor pembayaran harus lebih dari 10!',
            'tenor.lte' => 'Data tenor pembayaran harus kurang dari 20!',
            'bi.required' => 'Data BI-checking harus dipilih!',
            'bi.numeric' => 'Data BI-checking harus dipilih dengan angka!',
            'bi.gte' => 'Data BI-checking harus lebih dari 20!',
            'bi.lte' => 'Data BI-checking harus kurang dari 100!',
        ]);

        if ($validasi->fails()) {
            return redirect(route('penilaian.create'))
                ->withErrors($validasi)
                ->withInput();
        } else {
            $nasabah = Nasabah::with('detailNasabah')->find($request->nasabah);
            // dd($nasabah);
            $datawp = [
                0 => $request->bi, // bi checking (karakter)
                1 => $request->dp, // uang dp (kapital)
                2 => $nasabah->detailNasabah->gaji, // gaji (kapasitas)
                3 => $nasabah->detailNasabah->pekerjaan, // pekerjaan (jaminan)
                4 => $nasabah->detailNasabah->tanggungan, // tanggungan (kondisi)
            ];
            $datamfep = [
                0 => $request->bi, // bi checking (karakter)
                1 => $nasabah->detailNasabah->pekerjaan, // pekerjaan (kapasitas)
                2 => $nasabah->detailNasabah->gaji, // gaji (pendapatan)
                3 => $nasabah->detailNasabah->tanggungan, // tanggungan (kondisi)
            ];
            // dd($datawp);
            $nilaiwp = $this->hitungWP($datawp);
            $nilaimfep = $this->hitungMFEP($datamfep);
            $kombinasi   = 0.6 * $nilaiwp + 0.4 * $nilaimfep;

            // dd([$nilaiwp, $nilaimfep, $kombinasi]);
            // ubah sesuai dengan kebutuhan di dokumen 
            $status = 0;
            if ($kombinasi > 25) {
                Rumah::find($request->rumah)->update([
                    'status' => '0'
                ]);
                $status = '1';
            }

            $penilaian = Penilaian::create([
                'nasabah_id' => $request->nasabah,
                'rumah_id' => $request->rumah,
                'dp' => $request->dp,
                'tenor' => $request->tenor,
                'nilai_wp' => $nilaiwp,
                'nilai_mfep' => $nilaimfep,
                'status' => $status,
            ]);


            if ($penilaian) {
                return redirect(route('penilaian.index'))->with([
                    'message' => 'Berhasil menambah data penilaian!',
                    'color' => 'success',
                ]);
            } else {
                return redirect(route('penilaian.create'))
                    ->with([
                        'message' => 'Gagal menambah data penilaian!',
                        'color' => 'danger',
                    ]);
            }
        }
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

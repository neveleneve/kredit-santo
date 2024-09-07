<?php

namespace App\Http\Controllers;

use App\Models\KriteriaBobot;
use App\Models\Nasabah;
use App\Models\Penilaian;
use App\Models\Rumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PenilaianController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $penilaian = Penilaian::all();
        return view('admin.penilaian.index', [
            'penilaian' => $penilaian,
        ]);
    }

    public function create() {
        $nasabah = Nasabah::get();
        $rumah = Rumah::where('status', '2')->get();
        return view('admin.penilaian.create', [
            'rumah' => $rumah,
            'nasabah' => $nasabah,
        ]);
    }

    public function store(Request $request) {
        $rumah = Rumah::with(
            'village',
            'village.district',
            'village.district.regency',
            'village.district.regency.province'
        )->find($request->rumah);

        $validasi = Validator::make($request->all(), [
            'rumah' => ['required', 'numeric'],
            'nasabah' => ['required', 'numeric'],
        ], [
            'rumah.required' => 'Data rumah harus dipilih!',
            'rumah.numeric' => 'Data rumah harus dipilih dengan angka!',
            'nasabah.required' => 'Data nasabah harus dipilih!',
            'nasabah.numeric' => 'Data nasabah harus dipilih dengan angka!',
        ]);

        if ($validasi->fails()) {
            return redirect(route('penilaian.create'))
                ->withErrors($validasi)
                ->withInput();
        } else {
            $nasabah = Nasabah::with(
                'detailNasabah',
                'village',
                'village.district',
                'village.district.regency',
                'village.district.regency.province'
            )->find($request->nasabah);
            // dd($nasabah);
            $lokasi = 0;
            if ($nasabah->village_id == $rumah->village_id) {
                $lokasi = 5;
            } elseif ($nasabah->village->district_id == $rumah->village->district_id) {
                $lokasi = 4;
            } elseif ($nasabah->village->district->regency_id == $rumah->village->district->regency_id) {
                $lokasi = 3;
            } elseif ($nasabah->village->district->regency->province == $rumah->village->district->regency->province) {
                $lokasi = 2;
            } else {
                $lokasi = 1;
            }
            // dd([$rumah, $nasabah, $lokasi]);
            $datamfep = [
                0 => $lokasi,
                1 => $nasabah->detailNasabah->pekerjaan,
                2 => $nasabah->detailNasabah->gaji,
                3 => $nasabah->detailNasabah->aset_rumah,
                4 => $nasabah->detailNasabah->aset_kendaraan,
                5 => $nasabah->detailNasabah->status_pernikahan,
            ];
            $nilaimfep = $this->hitungMFEP($datamfep);

            $status = '0';
            if ($nilaimfep >= 2) {
                $rumah->update([
                    'status' => '0'
                ]);
                $status = '1';
            }
            $penilaian = Penilaian::create([
                'nasabah_id' => $request->nasabah,
                'rumah_id' => $request->rumah,
                'dp' => $request->dp,
                'tenor' => $request->tenor,
                'bi_checking' => $request->bi,
                'nilai' => $nilaimfep,
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

    public function show(Penilaian $penilaian) {
        $lokasi = 0;
        if ($penilaian->nasabah->village_id == $penilaian->rumah->village_id) {
            $lokasi = 5;
        } elseif ($penilaian->nasabah->village->district_id == $penilaian->rumah->village->district_id) {
            $lokasi = 4;
        } elseif ($penilaian->nasabah->village->district->regency_id == $penilaian->rumah->village->district->regency_id) {
            $lokasi = 3;
        } elseif ($penilaian->nasabah->village->district->regency->province == $penilaian->rumah->village->district->regency->province) {
            $lokasi = 2;
        } else {
            $lokasi = 1;
        }
        $datapoin = [
            0 => $lokasi,
            1 => $penilaian->nasabah->detailNasabah->pekerjaan,
            2 => $penilaian->nasabah->detailNasabah->gaji,
            3 => $penilaian->nasabah->detailNasabah->aset_rumah,
            4 => $penilaian->nasabah->detailNasabah->aset_kendaraan,
            5 => $penilaian->nasabah->detailNasabah->status_pernikahan,
        ];
        $bobotkriteria = KriteriaBobot::get();
        return view('admin.penilaian.show', [
            'penilaian' => $penilaian,
            'bobot' => $bobotkriteria,
            'datapoin' => $datapoin,
        ]);
    }

    public function edit(Penilaian $penilaian) {
        //
    }

    public function update(Request $request, Penilaian $penilaian) {
        //
    }

    public function destroy(Penilaian $penilaian) {
        //
    }

    public function cetak(Penilaian $id) {
        $bobot = KriteriaBobot::get();
        $lokasi = 0;
        if ($id->nasabah->village_id == $id->rumah->village_id) {
            $lokasi = 5;
        } elseif ($id->nasabah->village->district_id == $id->rumah->village->district_id) {
            $lokasi = 4;
        } elseif ($id->nasabah->village->district->regency_id == $id->rumah->village->district->regency_id) {
            $lokasi = 3;
        } elseif ($id->nasabah->village->district->regency->province == $id->rumah->village->district->regency->province) {
            $lokasi = 2;
        } else {
            $lokasi = 1;
        }
        $datapoin = [
            0 => $lokasi,
            1 => $id->nasabah->detailNasabah->pekerjaan,
            2 => $id->nasabah->detailNasabah->gaji,
            3 => $id->nasabah->detailNasabah->aset_rumah,
            4 => $id->nasabah->detailNasabah->aset_kendaraan,
            5 => $id->nasabah->detailNasabah->status_pernikahan,
        ];
        $data = [
            'title' => 'Penilaian Nasabah - PT Sinar Bahagia Group',
            'penilaian' => $id,
            'bobot' => $bobot,
            'datapoin' => $datapoin,
        ];
        $pdf = PDF::loadView('admin.penilaian.cetak-ketentuan', $data);
        return $pdf->stream($data['title'] . '.pdf');
    }

    public function cetakDate(Request $request) {
        $validasi = Validator::make($request->all(), [
            'dari' => ['required', 'date', 'before_or_equal:sampai'],
            'sampai' => ['required', 'after_or_equal:dari'],
        ]);

        if ($validasi->fails()) {
            return redirect(route('penilaian.index'))->with([
                'message' => 'Kesalahan dalam input tanggal! Silakan ulangi!',
                'color' => 'danger',
            ]);
        } else {
            $from = date('Y-m-d', strtotime($request->dari));
            $to = date('Y-m-d', strtotime($request->sampai));
            $data = Penilaian::with('nasabah', 'rumah')->whereBetween('created_at', [$from, $to])->get();
        }

        $pdf = PDF::loadView('admin.penilaian.cetak-table', [
            'data' => $data,
            'title' => 'Laporan Penilaian Nasabah',
            'dari' => $request->dari,
            'sampai' => $request->sampai,
        ]);
        return $pdf->stream('Penilaian Nasabah.pdf');
    }
}

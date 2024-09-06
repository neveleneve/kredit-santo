<?php

namespace App\Http\Controllers;

use App\Models\KriteriaBobot;
use App\Models\Nasabah;
use App\Models\Penilaian;
use App\Models\Rumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;

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
            // $datawp = [
            //     0 => $request->bi, // bi checking (karakter)
            //     1 => $request->dp, // uang dp (kapital)
            //     2 => $nasabah->detailNasabah->gaji, // gaji (kapasitas)
            //     3 => $nasabah->detailNasabah->pekerjaan, // pekerjaan (jaminan)
            //     4 => $nasabah->detailNasabah->tanggungan, // tanggungan (kondisi)
            // ];
            $datamfep = [
                0 => $request->bi, // bi checking (karakter)
                1 => $nasabah->detailNasabah->pekerjaan, // pekerjaan (kapasitas)
                2 => $nasabah->detailNasabah->gaji, // gaji (pendapatan)
                3 => $nasabah->detailNasabah->tanggungan, // tanggungan (kondisi)
            ];
            // dd($datawp);
            // $nilaiwp = $this->hitungWP($datawp);
            $nilaimfep = $this->hitungMFEP($datamfep);
            $kombinasi  =  $nilaimfep;

            // dd([$nilaiwp, $nilaimfep, $kombinasi]);
            // ubah sesuai dengan kebutuhan di dokumen 
            $status = '0';
            if ($kombinasi > 36) {
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
                'bi_checking' => $request->bi,
                // 'nilai_wp' => $nilaiwp,
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

    public function show(Penilaian $penilaian) {
        $datapoin = [
            0 => $penilaian->bi_checking, // bi checking (karakter)
            1 => $penilaian->nasabah->detailNasabah->pekerjaan, // pekerjaan (kapasitas)
            2 => $penilaian->nasabah->detailNasabah->gaji, // gaji (pendapatan)
            3 => $penilaian->nasabah->detailNasabah->tanggungan, // tanggungan (kondisi)
            4 => $penilaian->bi_checking, // bi checking (karakter)
            5 => $penilaian->dp, // uang dp (kapital)
            6 => $penilaian->nasabah->detailNasabah->gaji, // gaji (kapasitas)
            7 => $penilaian->nasabah->detailNasabah->pekerjaan, // pekerjaan (jaminan)
            8 => $penilaian->nasabah->detailNasabah->tanggungan,
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
        $datapoin = [
            // mfep
            0 => $id->bi_checking, // bi checking (karakter)
            1 => $id->nasabah->detailNasabah->pekerjaan, // pekerjaan (kapasitas)
            2 => $id->nasabah->detailNasabah->gaji, // gaji (pendapatan)
            3 => $id->nasabah->detailNasabah->tanggungan, // tanggungan (kondisi)
            // wp
            4 => $id->bi_checking, // bi checking (karakter)
            5 => $id->dp, // uang dp (kapital)
            6 => $id->nasabah->detailNasabah->gaji, // gaji (kapasitas)
            7 => $id->nasabah->detailNasabah->pekerjaan, // pekerjaan (jaminan)
            8 => $id->nasabah->detailNasabah->tanggungan, // kondisi (tanggungan)
        ];
        $data = [
            'title' => 'Penilaian Nasabah - CV Halifa Berkah Utama',
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

<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RumahController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $rumah = Rumah::paginate(10);
        return view('admin.rumah.index', [
            'rumah' => $rumah
        ]);
    }


    public function create() {
        return view('admin.rumah.create');
    }


    public function store(Request $request) {
        // dd($request->all());
        $validasi = Validator::make($request->all(), [
            'nama' => ['required'],
            'tipe' => ['required', 'numeric'],
            'tanah' => ['required', 'numeric'],
            'harga' => ['required', 'numeric'],
            'detail' => ['required'],
            'kelurahan' => ['required'],
        ], [
            'nama.required' => 'Nama atau lokasi rumah harus diisi!',
            'tipe.required' => 'Tipe rumah harus diisi!',
            'tipe.numeric' => 'Tipe rumah harus diisi dengan angka!',
            'tanah.required' => 'Luas tanah rumah harus diisi!',
            'tanah.numeric' => 'Luas tanah rumah harus diisi dengan angka!',
            'harga.required' => 'Harga rumah harus diisi!',
            'harga.numeric' => 'Harga rumah harus diisi dengan angka!',
            'detail.required' => 'Detail rumah harus diisi!',
            'kelurahan.required' => 'Lokasi kelurahan rumah harus diisi!',
        ]);

        if ($validasi->fails()) {
            return redirect(route('rumah.create'))
                ->withErrors($validasi)
                ->withInput();
        } else {
            $rumah = Rumah::create([
                'nama' => $request->nama,
                'rumah_code' => $this->checkRumahCode(),
                'tipe_rumah' => $request->tipe . '/' . $request->tanah,
                'harga' => $request->harga,
                'detail' => $request->detail,
                'village_id' => $request->kelurahan,
            ]);
            if ($rumah) {
                return redirect(route('rumah.index'))->with([
                    'color' => 'success',
                    'message' => 'Data rumah berhasil ditambahkan!',
                ]);
            } else {
                return redirect(route('rumah.index'))->with([
                    'color' => 'danger',
                    'message' => 'Data rumah gagal ditambahkan! Silakan memeriksa kembali koneksi internet anda!',
                ]);
            }
        }
    }

    public function edit(Rumah $rumah) {
        return view('admin.rumah.edit', [
            'rumah' => $rumah
        ]);
    }

    public function update(Request $request, Rumah $rumah) {
        $validasi = Validator::make($request->all(), [
            'nama' => ['required'],
            'tipe' => ['required', 'numeric'],
            'tanah' => ['required', 'numeric'],
            'harga' => ['required', 'numeric'],
            'detail' => ['required'],
        ], [
            'nama.required' => 'Nama atau lokasi rumah harus diisi!',
            'tipe.required' => 'Tipe rumah harus diisi!',
            'tipe.numeric' => 'Tipe rumah harus diisi dengan angka!',
            'tanah.required' => 'Luas tanah rumah harus diisi!',
            'tanah.numeric' => 'Luas tanah rumah harus diisi dengan angka!',
            'harga.required' => 'Harga rumah harus diisi!',
            'harga.numeric' => 'Harga rumah harus diisi dengan angka!',
            'detail.required' => 'Detail rumah harus diisi!',
        ]);

        if ($validasi->fails()) {
            return redirect(route('rumah.create'))
                ->withErrors($validasi)
                ->withInput();
        } else {
            $rumah->update([
                'nama' => $request->nama,
                'tipe_rumah' => $request->tipe . '/' . $request->tanah,
                'harga' => $request->harga,
                'detail' => $request->detail,
            ]);
            if ($rumah) {
                return redirect(route('rumah.index'))->with([
                    'color' => 'success',
                    'message' => 'Data rumah berhasil diperbarui!',
                ]);
            } else {
                return redirect(route('rumah.index'))->with([
                    'color' => 'danger',
                    'message' => 'Data rumah gagal diperbarui! Silakan memeriksa kembali koneksi internet anda!',
                ]);
            }
        }
    }

    public function destroy(Rumah $rumah) {
        $rumah->delete();
        if ($rumah) {
            return redirect(route('rumah.index'))->with([
                'color' => 'success',
                'message' => 'Data rumah berhasil dihapus!',
            ]);
        } else {
            return redirect(route('rumah.index'))->with([
                'color' => 'danger',
                'message' => 'Data rumah gagal dihapus! Silakan memeriksa kembali koneksi internet anda!',
            ]);
        }
    }
}

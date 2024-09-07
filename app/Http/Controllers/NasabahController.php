<?php

namespace App\Http\Controllers;

use App\Models\DetailNasabah;
use App\Models\Istri;
use App\Models\Nasabah;
use App\Models\Penjamin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class NasabahController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $nasabah = Nasabah::get();
        return view('admin.nasabah.index', [
            'nasabah' => $nasabah
        ]);
    }

    public function create() {
        return view('admin.nasabah.create');
    }

    public function store(Request $request) {
        // dd($request->all());
        $validasi = Validator::make($request->all(), [
            'nama' => ['required'],
            'kelamin' => ['required'],
            'kawin' => ['required'],
            'nik' => ['required', 'digits:16', 'unique:detail_nasabahs,nik'],
            'no_kk' => ['required', 'digits:16'],
            'ktp' => ['required', 'image', 'max:1024', 'mimes:png'],
            'kk' => ['required', 'image', 'max:1024', 'mimes:png'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required', 'date'],
            'usia' => ['required', 'gte:21'],
            'kontak' => ['required', 'numeric'],
            'alamat' => ['required'],
            'provinsi' => ['required', 'numeric'],
            'kotakab' => ['required', 'numeric'],
            'kecamatan' => ['required', 'numeric'],
            'kelurahan' => ['required', 'numeric'],
            'pekerjaan' => ['required', 'numeric'],
            'gaji' => ['required', 'numeric'],
            'rumah' => ['required', 'numeric'],
            'kendaraan' => ['required', 'numeric'],

        ], [
            'nama.required' => 'Nama nasabah harus diisi!',
            'kelamin.required' => 'Jenis kelamin nasabah harus dipilih!',
            'kawin.required' => 'Status kawin nasabah harus dipilih!',
            'nik.required' => 'NIK nasabah harus diisi!',
            'nik.digits' => 'Jumlah angka NIK nasabah harus 16 digit!',
            'nik.unique' => 'NIK nasabah sudah terdaftar!',
            'no_kk.required' => 'Nomor KK nasabah harus diisi!',
            'no_kk.digits' => 'Jumlah angka Nomor KK nasabah harus 16 digit!',
            'ktp.required' => 'File foto KTP wajib dipilih!',
            'ktp.image' => 'File yang dipilih harus berupa gambar!',
            'ktp.size' => 'File yang dipilih harus berukuran kurang dari 1 Mb!',
            'ktp.mimes' => 'File yang dipilih harus berupa gambar dengan format ".png"!',
            'kk.required' => 'File foto KK wajib dipilih!',
            'kk.image' => 'File yang dipilih harus berupa gambar!',
            'kk.size' => 'File yang dipilih harus berukuran kurang dari 1 Mb!',
            'kk.mimes' => 'File yang dipilih harus berupa gambar dengan format ".png"!',
            'tempat_lahir.required' => 'Tempat lahir nasabah harus diisi!',
            'tanggal_lahir.required' => 'Tanggal lahir nasabah harus diisi!',
            'tanggal_lahir.date' => 'Tanggal lahir nasabah harus diisi dengan format penanggalan!',
            'usia.required' => 'Usia nasabah harus diisi dengan memilih tanggal lahir nasabah!',
            'usia.gte' => 'Usia nasabah harus lebih atau sama dengan 21 tahun!',
            'kontak.required' => 'Kontak nasabah harus diisi!',
            'kontak.numeric' => 'Kontak nasabah harus diisi dengan angka!',
            'alamat.required' => 'Alamat nasabah harus diisi!',
            'provinsi.required' => 'Provinsi harus dipilih!',
            'provinsi.numeric' => 'Provinsi harus diisi dengan angka!',
            'kotakab.required' => 'Kota/Kabupaten harus dipilih!',
            'kotakab.numeric' => 'Kota/Kabupaten harus diisi dengan angka!',
            'kecamatan.required' => 'Kecamatan harus dipilih!',
            'kecamatan.numeric' => 'Kecamatan harus diisi dengan angka!',
            'kelurahan.required' => 'Kelurahan harus dipilih!',
            'kelurahan.numeric' => 'Kelurahan harus diisi dengan angka!',
            'pekerjaan.required' => 'Pekerjaan nasabah harus dipilih!',
            'pekerjaan.numeric' => 'Pekerjaan nasabah harus diisi dengan angka!',
            'gaji.required' => 'Rentang gaji nasabah harus dipilih!',
            'gaji.numeric' => 'Rentang gaji nasabah harus diisi dengan angka!',
            'rumah.required' => 'Aset rumah nasabah harus dipilih!',
            'rumah.numeric' => 'Aset rumah nasabah harus diisi dengan angka!',
            'kendaraan.required' => 'Aset kendaraan nasabah harus dipilih!',
            'kendaraan.numeric' => 'Aset kendaraan nasabah harus diisi dengan angka!',
        ]);


        if ($validasi->fails()) {
            return redirect(route('nasabah.create'))
                ->withErrors($validasi)
                ->withInput();
        } else {
            $nasabah = Nasabah::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'village_id' => $request->kelurahan,
            ]);
            DetailNasabah::create([
                'nasabah_id' => $nasabah->id,
                'nik' => $request->nik,
                'no_kk' => $request->no_kk,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => date('Y-m-d', strtotime($request->tanggal_lahir)),
                'kontak' => $request->kontak,
                'jenis_kelamin' => $request->kelamin,
                'status_pernikahan' => $request->kawin,
                'pekerjaan' => $request->pekerjaan,
                'gaji' => $request->gaji,
                'aset_rumah' => $request->rumah,
                'aset_kendaraan' => $request->kendaraan,
            ]);

            $kk = $request->file('kk');
            $ktp = $request->file('ktp');
            $kkfilename = $nasabah->id . '_KK_' . $request->no_kk . '.' . $kk->getClientOriginalExtension();
            $ktpfilename = $nasabah->id . '_KTP_' . $request->nik . '.' . $ktp->getClientOriginalExtension();
            $kk->storeAs('public/images/kk', $kkfilename);
            $ktp->storeAs('public/images/ktp', $ktpfilename);

            return redirect(route('nasabah.index'))->with([
                'color' => 'success',
                'message' => 'Berhasil menambah data nasabah!',
            ]);
        }
    }

    public function edit(Nasabah $nasabah) {
        return view('admin.nasabah.edit', [
            'nasabah' => $nasabah
        ]);
    }


    public function update(Request $request, Nasabah $nasabah) {
        $validasi = Validator::make($request->all(), [
            'nama' => ['required'],
            'kelamin' => ['required'],
            'kawin' => ['required'],
            'nik' => ['required', 'digits:16'],
            'no_kk' => ['required', 'digits:16'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required', 'date'],
            'usia' => ['required', 'gte:21'],
            'kontak' => ['required', 'numeric'],
            'alamat' => ['required'],
            'kecamatan' => ['required', 'numeric'],
            'provinsi' => ['required', 'numeric'],
            'kotakab' => ['required', 'numeric'],
            'kelurahan' => ['required', 'numeric'],
            'pekerjaan' => ['required', 'numeric'],
            'gaji' => ['required', 'numeric'],
            'rumah' => ['required', 'numeric'],
            'kendaraan' => ['required', 'numeric'],

        ], [
            'nama.required' => 'Nama nasabah harus diisi!',
            'kelamin.required' => 'Jenis kelamin nasabah harus dipilih!',
            'kawin.required' => 'Status kawin nasabah harus dipilih!',
            'nik.required' => 'NIK nasabah harus diisi!',
            'nik.digits' => 'Jumlah angka NIK nasabah harus 16 digit!',
            'no_kk.required' => 'Nomor KK nasabah harus diisi!',
            'no_kk.digits' => 'Jumlah angka Nomor KK nasabah harus 16 digit!',
            'tempat_lahir.required' => 'Tempat lahir nasabah harus diisi!',
            'tanggal_lahir.required' => 'Tanggal lahir nasabah harus diisi!',
            'tanggal_lahir.date' => 'Tanggal lahir nasabah harus diisi dengan format penanggalan!',
            'usia.required' => 'Usia nasabah harus diisi dengan memilih tanggal lahir nasabah!',
            'usia.gte' => 'Usia nasabah harus lebih atau sama dengan 21 tahun!',
            'kontak.required' => 'Kontak nasabah harus diisi!',
            'kontak.numeric' => 'Kontak nasabah harus diisi dengan angka!',
            'alamat.required' => 'Alamat nasabah harus diisi!',
            'provinsi.required' => 'Provinsi harus dipilih!',
            'provinsi.numeric' => 'Provinsi harus diisi dengan angka!',
            'kotakab.required' => 'Kota/Kabupaten harus dipilih!',
            'kotakab.numeric' => 'Kota/Kabupaten harus diisi dengan angka!',
            'kecamatan.required' => 'Kecamatan harus dipilih!',
            'kecamatan.numeric' => 'Kecamatan harus diisi dengan angka!',
            'kelurahan.required' => 'Kelurahan harus dipilih!',
            'kelurahan.numeric' => 'Kelurahan harus diisi dengan angka!',
            'pekerjaan.required' => 'Pekerjaan nasabah harus dipilih!',
            'pekerjaan.numeric' => 'Pekerjaan nasabah harus diisi dengan angka!',
            'gaji.required' => 'Rentang gaji nasabah harus dipilih!',
            'gaji.numeric' => 'Rentang gaji nasabah harus diisi dengan angka!',
            'rumah.required' => 'Aset rumah nasabah harus dipilih!',
            'rumah.numeric' => 'Aset rumah nasabah harus diisi dengan angka!',
            'kendaraan.required' => 'Aset kendaraan nasabah harus dipilih!',
            'kendaraan.numeric' => 'Aset kendaraan nasabah harus diisi dengan angka!',

        ]);

        if ($validasi->fails()) {
            return redirect(route('nasabah.edit', ['nasabah' => $nasabah->id]))
                ->withErrors($validasi)
                ->withInput();
        } else {
            $nasabah->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'village_id' => $request->kelurahan,
            ]);
            DetailNasabah::where('nasabah_id', $nasabah->id)->update([
                'nik' => $request->nik,
                'no_kk' => $request->no_kk,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => date('Y-m-d', strtotime($request->tanggal_lahir)),
                'kontak' => $request->kontak,
                'jenis_kelamin' => $request->kelamin,
                'status_pernikahan' => $request->kawin,
                'pekerjaan' => $request->pekerjaan,
                'gaji' => $request->gaji,
                'aset_rumah' => $request->rumah,
                'aset_kendaraan' => $request->kendaraan,
            ]);

            return redirect(route('nasabah.index'))->with([
                'color' => 'success',
                'message' => 'Berhasil memperbarui data nasabah!',
            ]);
        }
    }


    public function destroy(Nasabah $nasabah) {
        $nasabah->delete();
        return redirect(route('nasabah.index'))->with([
            'color' => 'success',
            'message' => 'Berhasil menghapus data nasabah!',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validasi = null;
        if ($request->kawin == 'kawin') {
            $validasi = Validator::make($request->all(), [
                'nama' => ['required'],
                'kelamin' => ['required'],
                'kawin' => ['required'],
                'nik' => ['required', 'digits:16'],
                'ktp' => ['required', 'image', 'max:1024', 'mimes:jpeg,png,jpg'],
                'kk' => ['required', 'image', 'max:1024', 'mimes:jpeg,png,jpg'],
                'tempat_lahir' => ['required'],
                'tanggal_lahir' => ['required', 'date'],
                'usia' => ['required', 'gte:21'],
                'kontak' => ['required', 'numeric'],
                'alamat' => ['required'],
                'kecamatan' => ['required', 'numeric'],
                'kelurahan' => ['required', 'numeric'],
                'pekerjaan' => ['required', 'numeric'],
                'gaji' => ['required', 'numeric'],
                'tanggungan' => ['required', 'numeric'],
                // =================================================================================================
                'nama_pasangan' => ['required'],
                'nik_pasangan' => ['required', 'digits:16'],
                'pekerjaan_pasangan' => ['required'],
                'kontak_pasangan' => ['required', 'numeric'],
            ], [
                'nama.required' => 'Nama nasabah harus diisi!',
                'kelamin.required' => 'Jenis kelamin nasabah harus dipilih!',
                'kawin.required' => 'Status kawin nasabah harus dipilih!',
                'nik.required' => 'NIK nasabah harus diisi!',
                'nik.digits' => 'Jumlah angka NIK nasabah harus 16 digit!',
                'ktp.required' => 'File foto KTP wajib dipilih!',
                'ktp.image' => 'File yang dipilih harus berupa gambar!',
                'ktp.size' => 'File yang dipilih harus berukuran kurang dari 1 Mb!',
                'ktp.mimes' => 'File yang dipilih harus berupa gambar dengan format ".jpeg", ".jpg", atau ".png"!',
                'kk.required' => 'File foto KK wajib dipilih!',
                'kk.image' => 'File yang dipilih harus berupa gambar!',
                'kk.size' => 'File yang dipilih harus berukuran kurang dari 1 Mb!',
                'kk.mimes' => 'File yang dipilih harus berupa gambar dengan format ".jpeg", ".jpg", atau ".png"!',
                'tempat_lahir.required' => 'Tempat lahir nasabah harus diisi!',
                'tanggal_lahir.required' => 'Tanggal lahir nasabah harus diisi!',
                'tanggal_lahir.date' => 'Tanggal lahir nasabah harus diisi dengan format penanggalan!',
                'usia.required' => 'Usia nasabah harus diisi dengan memilih tanggal lahir nasabah!',
                'usia.min' => 'Usia nasabah harus lebih atau sama dengan 21 tahun!',
                'kontak.required' => 'Kontak nasabah harus diisi!',
                'kontak.numeric' => 'Kontak nasabah harus diisi dengan angka!',
                'alamat.required' => 'Alamat nasabah harus diisi!',
                'kecamatan.required' => 'Kecamatan harus dipilih!',
                'kecamatan.numeric' => 'Kecamatan harus diisi dengan angka!',
                'kelurahan.required' => 'Kelurahan harus dipilih!',
                'kelurahan.numeric' => 'Kelurahan harus diisi dengan angka!',
                'pekerjaan.required' => 'Pekerjaan nasabah harus dipilih!',
                'pekerjaan.numeric' => 'Pekerjaan nasabah harus diisi dengan angka!',
                'gaji.required' => 'Rentang gaji nasabah harus dipilih!',
                'gaji.numeric' => 'Rentang gaji nasabah harus diisi dengan angka!',
                'tanggungan.required' => 'Jumlah tanggungan nasabah harus dipilih!',
                'tanggungan.numeric' => 'Jumlah tanggungan nasabah harus diisi dengan angka!',
                // =================================================================================================
                'nama_pasangan.required' => 'Nama pasangan nasabah harus diisi!',
                'nik_pasangan.required' => 'NIK pasangan nasabah harus diisi!',
                'nik_pasangan.digits' => 'Jumlah angka NIK pasangan nasabah harus 16 digit!',
                'pekerjaan_pasangan.required' => 'Pekerjaan pasangan nasabah harus diisi!',
                'kontak_pasangan.required' => 'Kontak pasangan nasabah harus diisi!',
                'kontak_pasangan.numeric' => 'Kontak pasangan nasabah harus diisi dengan angka!',
            ]);
        } else {
            $validasi = Validator::make($request->all(), [
                'nama' => ['required'],
                'kelamin' => ['required'],
                'kawin' => ['required'],
                'nik' => ['required', 'digits:16'],
                'ktp' => ['required', 'image', 'max:1024', 'mimes:jpeg,png,jpg'],
                'kk' => ['required', 'image', 'max:1024', 'mimes:jpeg,png,jpg'],
                'tempat_lahir' => ['required'],
                'tanggal_lahir' => ['required', 'date'],
                'usia' => ['required', 'gte:21'],
                'kontak' => ['required', 'numeric'],
                'alamat' => ['required'],
                'kecamatan' => ['required', 'numeric'],
                'kelurahan' => ['required', 'numeric'],
                'pekerjaan' => ['required', 'numeric'],
                'gaji' => ['required', 'numeric'],
                'tanggungan' => ['required', 'numeric'],
                // =================================================================================================
                'nama_penjamin' => ['required'],
                'kontak_penjamin' => ['required', 'numeric'],
                'alamat_penjamin' => ['required'],
            ], [
                'nama.required' => 'Nama nasabah harus diisi!',
                'kelamin.required' => 'Jenis kelamin nasabah harus dipilih!',
                'kawin.required' => 'Status kawin nasabah harus dipilih!',
                'nik.required' => 'NIK nasabah harus diisi!',
                'nik.digits' => 'Jumlah angka NIK nasabah harus 16 digit!',
                'ktp.required' => 'File foto KTP wajib dipilih!',
                'ktp.image' => 'File yang dipilih harus berupa gambar!',
                'ktp.size' => 'File yang dipilih harus berukuran kurang dari 1 Mb!',
                'ktp.mimes' => 'File yang dipilih harus berupa gambar dengan format ".jpeg", ".jpg", atau ".png"!',
                'kk.required' => 'File foto KK wajib dipilih!',
                'kk.image' => 'File yang dipilih harus berupa gambar!',
                'kk.size' => 'File yang dipilih harus berukuran kurang dari 1 Mb!',
                'kk.mimes' => 'File yang dipilih harus berupa gambar dengan format ".jpeg", ".jpg", atau ".png"!',
                'tempat_lahir.required' => 'Tempat lahir nasabah harus diisi!',
                'tanggal_lahir.required' => 'Tanggal lahir nasabah harus diisi!',
                'tanggal_lahir.date' => 'Tanggal lahir nasabah harus diisi dengan format penanggalan!',
                'usia.required' => 'Usia nasabah harus diisi dengan memilih tanggal lahir nasabah!',
                'usia.min' => 'Usia nasabah harus lebih atau sama dengan 21 tahun!',
                'kontak.required' => 'Kontak nasabah harus diisi!',
                'kontak.numeric' => 'Kontak nasabah harus diisi dengan angka!',
                'alamat.required' => 'Alamat nasabah harus diisi!',
                'kecamatan.required' => 'Kecamatan harus dipilih!',
                'kecamatan.numeric' => 'Kecamatan harus diisi dengan angka!',
                'kelurahan.required' => 'Kelurahan harus dipilih!',
                'kelurahan.numeric' => 'Kelurahan harus diisi dengan angka!',
                'pekerjaan.required' => 'Pekerjaan nasabah harus dipilih!',
                'pekerjaan.numeric' => 'Pekerjaan nasabah harus diisi dengan angka!',
                'gaji.required' => 'Rentang gaji nasabah harus dipilih!',
                'gaji.numeric' => 'Rentang gaji nasabah harus diisi dengan angka!',
                'tanggungan.required' => 'Jumlah tanggungan nasabah harus dipilih!',
                'tanggungan.numeric' => 'Jumlah tanggungan nasabah harus diisi dengan angka!',
                // =================================================================================================
                'nama_penjamin.required' => 'Nama penjamin nasabah harus diisi!',
                'kontak_penjamin.required' => 'Kontak penjamin nasabah harus diisi!',
                'kontak_penjamin.numeric' => 'Kontak penjamin nasabah harus diisi dengan angka!',
                'alamat_penjamin.required' => 'Alamat penjamin nasabah harus diisi!',
            ]);
        }

        if ($validasi->fails()) {
            return redirect(route('nasabah.create'))
                ->withErrors($validasi)
                ->withInput();
        } else {
            dd($request->all());
        }
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

<?php

namespace App\Http\Livewire;

use App\Models\District;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use DateTime;
use Livewire\Component;

class AddNasabah extends Component {
    public $dataprovinsi;
    public $provinsi;
    public $datakotakab;
    public $kotakab;
    public $datakecamatan;
    public $kecamatan;
    public $datakelurahan;
    public $kelurahan;

    public $tanggallahir;
    public $usia;

    public function render() {
        if ($this->provinsi != '' || $this->provinsi != null) {
            $this->datakotakab = Regency::where('province_id', $this->provinsi)->get();
            if ($this->kotakab != '' || $this->kotakab != null) {
                $this->datakecamatan = District::where('regency_id', $this->kotakab)->get();
                if ($this->kecamatan != '' || $this->kecamatan != null) {
                    $this->datakelurahan = Village::where('district_id', $this->kecamatan)->get();
                } else {
                    $this->kelurahan = '';
                    $this->datakelurahan = [];
                }
            } else {
                $this->kecamatan = '';
                $this->datakecamatan = [];
            }
        } else {
            $this->kotakab = '';
            $this->datakotakab = [];
        }
        return view('livewire.add-nasabah');
    }

    public function mount() {
        $this->dataprovinsi = Province::get();
        $this->datakotakab = [];
        $this->datakecamatan = [];
        $this->datakelurahan = [];

        $this->provinsi = old('provinsi');
        $this->kotakab = old('kotakab');
        $this->kecamatan = old('kecamatan');
        $this->kelurahan = old('kelurahan');
        $this->tanggallahir = old('tanggal_lahir');
        $this->usia = old('usia');
    }

    public function usiaCount() {
        $tanggal_lahir = new DateTime($this->tanggallahir);
        $sekarang = new DateTime();
        $perbedaan = $sekarang->diff($tanggal_lahir);
        $this->usia = $perbedaan->y;
    }
}

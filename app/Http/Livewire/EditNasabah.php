<?php

namespace App\Http\Livewire;

use App\Models\District;
use App\Models\Nasabah;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use DateTime;
use Livewire\Component;

class EditNasabah extends Component {
    public $nasabah_id;
    public $datanasabah;

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
        return view('livewire.edit-nasabah');
    }

    public function mount() {
        $datanasabah = Nasabah::with(
            'detailNasabah',
            'village',
            'village.district',
            'village.district.regency',
            'village.district.regency.province'
        )
            ->find($this->nasabah_id);

        $this->datanasabah = $datanasabah;
        $this->dataprovinsi = Province::get();
        $this->datakotakab = Regency::where('province_id', $datanasabah->village->district->regency->province->id)->get();
        $this->datakecamatan = District::where('regency_id', $datanasabah->village->district->regency->id)->get();
        $this->datakelurahan = Village::where('district_id', $datanasabah->village->district->id)->get();


        $this->provinsi = $datanasabah->village->district->regency->province_id;
        $this->kotakab = $datanasabah->village->district->regency_id;
        $this->kecamatan = $datanasabah->village->district_id;
        $this->kelurahan = $datanasabah->village_id;

        $this->tanggallahir = $datanasabah->detailNasabah->tanggal_lahir;
        $this->usiaCount();
    }

    public function usiaCount() {
        $tanggal_lahir = new DateTime($this->tanggallahir);
        $sekarang = new DateTime();
        $perbedaan = $sekarang->diff($tanggal_lahir);
        $this->usia = $perbedaan->y;
    }

    public function updatedProvinsi($value) {
        $this->kotakab = '';
        $this->datakotakab = Regency::where('province_id', $value)->get();
        $this->kecamatan = '';
        $this->datakecamatan = [];
        $this->kelurahan = '';
        $this->datakelurahan = [];
    }

    public function updatedKotakab($value) {
        $this->kecamatan = '';
        $this->datakecamatan = District::where('regency_id', $value)->get();
        $this->kelurahan = '';
        $this->datakelurahan = [];
    }

    public function updatedKecamatan($value) {
        $this->kelurahan = '';
        $this->datakelurahan = Village::where('district_id', $value)->get();
    }
}

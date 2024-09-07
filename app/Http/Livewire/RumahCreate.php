<?php

namespace App\Http\Livewire;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Livewire\Component;

class RumahCreate extends Component {
    public $dataprovinsi;
    public $provinsi;
    public $datakotakab;
    public $kotakab;
    public $datakecamatan;
    public $kecamatan;
    public $datakelurahan;
    public $kelurahan;

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
        return view('livewire.rumah-create');
    }

    public function  mount() {
        $this->dataprovinsi = Province::get();
        $this->datakotakab = [];
        $this->datakecamatan = [];
        $this->datakelurahan = [];

        $this->provinsi = old('provinsi');
        $this->kotakab = old('kotakab');
        $this->kecamatan = old('kecamatan');
        $this->kelurahan = old('kelurahan');
    }
}

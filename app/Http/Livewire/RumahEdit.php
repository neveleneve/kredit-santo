<?php

namespace App\Http\Livewire;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Rumah;
use App\Models\Village;
use Livewire\Component;

class RumahEdit extends Component {
    public $rumah_id;
    public $datarumah;
    public $dataprovinsi;
    public $provinsi;
    public $datakotakab;
    public $kotakab;
    public $datakecamatan;
    public $kecamatan;
    public $datakelurahan;
    public $kelurahan;

    public function render() {
        return view('livewire.rumah-edit');
    }

    public function mount() {
        $datarumah = Rumah::with(
            'village',
            'village.district',
            'village.district.regency',
            'village.district.regency.province'
        )
            ->find($this->rumah_id);

        $this->datarumah = $datarumah;
        $this->dataprovinsi = Province::get();
        $this->datakotakab = Regency::where('province_id', $datarumah->village->district->regency->province->id)->get();
        $this->datakecamatan = District::where('regency_id', $datarumah->village->district->regency->id)->get();
        $this->datakelurahan = Village::where('district_id', $datarumah->village->district->id)->get();


        $this->provinsi = $datarumah->village->district->regency->province_id;
        $this->kotakab = $datarumah->village->district->regency_id;
        $this->kecamatan = $datarumah->village->district_id;
        $this->kelurahan = $datarumah->village_id;
    }
}

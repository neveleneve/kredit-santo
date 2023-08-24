<?php

namespace App\Http\Livewire;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Livewire\Component;

class AddNasabah extends Component
{
    public $datakecamatan;
    public $kecamatan;
    public $datakelurahan;
    public $kelurahan;
    public $statusnikah = false;

    public function render()
    {
        if ($this->kecamatan == '' || $this->datakecamatan == null) {
            $this->kelurahan = '';
            $this->datakelurahan = Kelurahan::get();
        } else {
            $this->datakelurahan = Kelurahan::where('kecamatan_id', $this->kecamatan)->get();
        }
        return view('livewire.add-nasabah');
    }

    public function mount()
    {
        $this->datakecamatan = Kecamatan::get();
    }
}

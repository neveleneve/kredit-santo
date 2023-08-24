<?php

namespace App\Http\Livewire;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use DateTime;
use Livewire\Component;

class AddNasabah extends Component
{
    public $datakecamatan;
    public $kecamatan;
    public $datakelurahan;
    public $kelurahan;
    public $statusnikah;
    public $tanggallahir;
    public $usia;

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
        $this->statusnikah = old('kawin');
        $this->kecamatan = old('kecamatan');
        $this->kelurahan = old('kelurahan');
        $this->tanggallahir = old('tanggal_lahir');
        $this->usia = old('usia');
    }

    public function usiaCount()
    {
        $tanggal_lahir = new DateTime($this->tanggallahir);
        $sekarang = new DateTime();
        $perbedaan = $sekarang->diff($tanggal_lahir);
        $this->usia = $perbedaan->y;
        // return ;
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Nasabah;
use DateTime;
use Livewire\Component;

class EditNasabah extends Component
{
    public $nasabah_id;
    public $datanasabah;

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
        return view('livewire.edit-nasabah');
    }

    public function mount()
    {
        $this->datanasabah = Nasabah::with('detailNasabah', 'istri', 'penjamin')->find($this->nasabah_id);

        $this->datakelurahan = Kelurahan::get();
        $this->datakecamatan = Kecamatan::get();

        $this->kelurahan = $this->datanasabah->kelurahan_id;
        $selectedkelurahan = Kelurahan::find($this->kelurahan);
        $this->kecamatan = $selectedkelurahan->kecamatan_id;

        $this->tanggallahir = $this->datanasabah->detailNasabah->tanggal_lahir;
        $this->statusnikah = $this->datanasabah->detailNasabah->status_pernikahan;
        $this->usiaCount();
    }

    public function usiaCount()
    {
        $tanggal_lahir = new DateTime($this->tanggallahir);
        $sekarang = new DateTime();
        $perbedaan = $sekarang->diff($tanggal_lahir);
        $this->usia = $perbedaan->y;
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Penilaian as ModelsPenilaian;
use Livewire\Component;
use Livewire\WithPagination;

class Penilaian extends Component
{
    use WithPagination;

    public $search;
    public $currentPage;

    public function render()
    {
        if ($this->search == '' || $this->search == null) {
            $penilaian = ModelsPenilaian::with('nasabah', 'rumah')->paginate(10);
        } else {
            $penilaian = ModelsPenilaian::with('nasabah', 'rumah')->where('nama', 'LIKE', '%' . $this->search . '%')
                ->orWhereHas('nasabah', function ($query) {
                    $query
                        ->where('nama', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('rumah', function ($query) {
                    $query
                        ->where('rumah_code', 'like', '%' . $this->search . '%');
                })
                ->paginate(10);
        }
        return view('livewire.penilaian', [
            'penilaian' => $penilaian
        ]);
    }
}

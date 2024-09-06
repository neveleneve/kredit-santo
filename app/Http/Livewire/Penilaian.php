<?php

namespace App\Http\Livewire;

use App\Models\Penilaian as ModelsPenilaian;
use Illuminate\Pagination\Paginator;
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
            $penilaian = ModelsPenilaian::with('nasabah', 'rumah')
                ->paginate(5);
        } else {
            $penilaian = ModelsPenilaian::with('nasabah', 'rumah')
                ->whereHas('nasabah', function ($query) {
                    $query
                        ->where('nama', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('rumah', function ($query) {
                    $query
                        ->where('rumah_code', 'like', '%' . $this->search . '%');
                })
                ->paginate(5);
        }
        return view('livewire.penilaian', [
            'penilaian' => $penilaian
        ]);
    }

    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function () {
            return $this->currentPage;
        });
    }
}

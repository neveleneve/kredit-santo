<?php

namespace App\Http\Livewire;

use App\Models\Nasabah as ModelsNasabah;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class Nasabah extends Component
{
    use WithPagination;

    public $search;
    public $currentPage;

    public function render()
    {
        if ($this->search == '' || $this->search == null) {
            $nasabah = ModelsNasabah::with('detailNasabah')->paginate(10);
        } else {
            $nasabah = ModelsNasabah::with('detailNasabah')->where('nama', 'LIKE', '%' . $this->search . '%')
                ->orWhereHas('detailNasabah', function ($query) {
                    $query
                        ->where('nik', 'like', '%' . $this->search . '%')
                        ->orWhere('no_kk', 'like', '%' . $this->search . '%');
                })
                ->paginate(10);
        }
        return view('livewire.nasabah', [
            'nasabah' => $nasabah
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

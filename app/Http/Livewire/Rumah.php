<?php

namespace App\Http\Livewire;

use App\Models\Rumah as ModelsRumah;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class Rumah extends Component
{
    use WithPagination;

    public $search;
    public $currentPage;

    public function render()
    {
        if ($this->search == '' || $this->search == null) {
            $rumah = ModelsRumah::paginate(10);
        } else {
            $rumah = ModelsRumah::where('nama', 'LIKE', '%' . $this->search . '%')
                ->orWhere('rumah_code', 'LIKE', '%' . $this->search . '%')
                ->paginate(10);
        }
        return view('livewire.rumah', [
            'rumah' => $rumah
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

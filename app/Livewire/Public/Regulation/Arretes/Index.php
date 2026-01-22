<?php

namespace App\Livewire\Public\Regulation\Arretes;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Arrete;

class Index extends Component
{
    use WithPagination;
    public $search;
    public $perPage = 6;

    public function render()
    {
        $arretes = $this->search ?
                Arrete::where('reference', 'like', '%'. $this->search .'%')
                        ->orWhere('description', 'like', '%'. $this->search .'%')->paginate($this->perPage)
                : Arrete::paginate($this->perPage);

        return view('livewire.public.regulation.arretes.index', [
            "arretes" => $arretes
        ])->extends("livewire.layouts.user");
    }
}

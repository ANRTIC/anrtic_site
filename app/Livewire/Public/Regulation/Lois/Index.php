<?php

namespace App\Livewire\Public\Regulation\Lois;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Loi;

class Index extends Component
{
    use WithPagination;
    public $search;
    public $perPage = 6;

    public function render()
    {
        $lois = $this->search ?
                Loi::where('reference', 'like', '%'. $this->search .'%')
                        ->orWhere('description', 'like', '%'. $this->search .'%')->paginate($this->perPage)
                : Loi::paginate($this->perPage);

        return view('livewire.public.regulation.lois.index', [
            "lois" => $lois
        ])->extends("livewire.layouts.user");
    }
}

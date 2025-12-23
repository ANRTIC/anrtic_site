<?php

namespace App\Livewire\Public\Regulation\Decrets;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Decret;

class Index extends Component
{
    use WithPagination;
    public $search;
    public $perPage = 6;

    public function render()
    {
        $decrets = $this->search ?
                Decret::where('reference', 'like', '%'. $this->search .'%')
                        ->orWhere('description', 'like', '%'. $this->search .'%')->paginate($this->perPage)
                : Decret::paginate($this->perPage);

        return view('livewire.public.regulation.decrets.index', [
            "decrets" => $decrets
        ])->extends("livewire.layouts.user");
    }
}

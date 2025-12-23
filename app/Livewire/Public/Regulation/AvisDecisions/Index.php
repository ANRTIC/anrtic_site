<?php

namespace App\Livewire\Public\Regulation\AvisDecisions;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AvisDecision;

class Index extends Component
{
    use WithPagination;
    public $search;
    public $perPage = 6;

    public function render()
    {
        $avisdecisions = $this->search ?
                AvisDecision::where('reference', 'like', '%'. $this->search .'%')
                        ->orWhere('description', 'like', '%'. $this->search .'%')->paginate($this->perPage)
                : AvisDecision::paginate($this->perPage);

        return view('livewire.public.regulation.avis-decisions.index', [
            "avisdecisions" => $avisdecisions
        ])->extends("livewire.layouts.user");
    }
}

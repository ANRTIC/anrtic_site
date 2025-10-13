<?php

namespace App\Livewire\Backoffice\Textes\Avisdecisions;

use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\AvisDecision;

#[Layout('livewire.layouts.backoffice')]
class Index extends Component
{
    use WithPagination;
    public $search;
    public $perPage = 8;
    public $selected;

    public function selectAvisDecision()
    {

    }

    public function deleteAvisDecision()
    {

    }

    public function render()
    {
        $avisdecisions = $this->search ?
                AvisDecision::where('reference', 'like', '%'. $this->search .'%')
                        ->orWhere('description', 'like', '%'. $this->search .'%')->paginate($this->perPage)
                : AvisDecision::paginate($this->perPage);

        return view('livewire.backoffice.textes.avisdecisions.index', [
            "avisdecisions" => $avisdecisions
        ]);
    }
}

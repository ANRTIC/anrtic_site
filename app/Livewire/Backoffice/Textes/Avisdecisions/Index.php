<?php

namespace App\Livewire\Backoffice\Textes\Avisdecisions;

use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\AvisDecision;

class Index extends Component
{
    use WithPagination;
    public $search;
    public $perPage = 8;
    public $selected;

    public function selectAvisDecision(AvisDecision $avisdecision)
    {
        $this->selected = $avisdecision;
    }

    public function deleteAvisDecision()
    {
        if ($this->selected) {
            Storage::delete($this->selected->document);
            $this->selected->delete();

            return $this->redirect(route("backoffice.avis-decisions"), navigate: true);
        }

        return;
    }

    public function render()
    {
        $avisdecisions = $this->search ?
                AvisDecision::where('reference', 'like', '%'. $this->search .'%')
                        ->orWhere('description', 'like', '%'. $this->search .'%')->paginate($this->perPage)
                : AvisDecision::paginate($this->perPage);

        return view('livewire.backoffice.textes.avisdecisions.index', [
            "avisdecisions" => $avisdecisions
        ])->extends("livewire.layouts.backoffice");
    }
}

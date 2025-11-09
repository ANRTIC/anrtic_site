<?php

namespace App\Livewire\Backoffice\Homologation\Equipements;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Equipement;

class Index extends Component
{
    use WithPagination;
    public $search = "";
    public $perPage;
    public $selected;

    public function selectEquipement(Equipement $equipement)
    {
        $this->selected = $equipement;
    }

    public function deleteEquipement()
    {

    }

    public $statut_choices = [
        "Homologué",
        "Non homologué",
        "En cours d'homologation"
    ];

    public function render()
    {
        $equipements = $this->search ?
            Equipement::where('designation', 'like', '%'. $this->search .'%')
                    ->orWhere('modele', 'like', '%'. $this->search .'%')->paginate($this->perPage)
            : Equipement::paginate($this->perPage);
        return view('livewire.backoffice.homologation.equipements.index', [
            "equipements" => $equipements
        ])->extends("livewire.layouts.backoffice");
    }
}

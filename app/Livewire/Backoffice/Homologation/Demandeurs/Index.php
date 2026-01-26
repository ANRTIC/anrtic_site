<?php

namespace App\Livewire\Backoffice\Homologation\Demandeurs;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Demandeur;

class Index extends Component
{
    use WithPagination;
    public $search = "";
    public $perPage;
    public $selected;

    public function selectDemandeur(Demandeur $demandeur)
    {
        $this->selected = $demandeur;
    }

    public function render()
    {
        $demandeurs = $this->search ?
            Demandeur::where('nom_complet', 'like', '%'. $this->search .'%')
                ->orWhere('adresse', 'like', '%'. $this->search .'%')
                ->orWhere('email', 'like', '%'. $this->search .'%')
                ->orWhere('telephone', 'like', '%'. $this->search .'%')->paginate($this->perPage)
            : Demandeur::paginate($this->perPage);

        return view('livewire.backoffice.homologation.demandeurs.index', [
            "demandeurs" => $demandeurs
        ])->extends("livewire.layouts.backoffice");;
    }
}

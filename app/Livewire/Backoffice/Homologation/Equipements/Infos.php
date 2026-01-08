<?php

namespace App\Livewire\Backoffice\Homologation\Equipements;

use Livewire\Component;
use App\Models\Equipement;
use Illuminate\Support\Facades\Storage;

class Infos extends Component
{
    public Equipement $equipement;

    public $statut_choices = [
        "Homologué",
        "Non homologué",
        "En cours d'homologation"
    ];

    public function mount($id)
    {
        $this->equipement = Equipement::findOrFail($id);
    }

    public function render()
    {

        return view('livewire.backoffice.homologation.equipements.infos', [
            "equipement" => $this->equipement,
        ])->extends('livewire.layouts.backoffice');
    }
}

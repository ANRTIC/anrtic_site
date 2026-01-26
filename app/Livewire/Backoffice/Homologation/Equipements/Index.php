<?php

namespace App\Livewire\Backoffice\Homologation\Equipements;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Equipement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
        DB::transaction(function () {
            foreach ($this->selected->photos as $photo) {
                Storage::delete($photo->url);
                $photo->delete();
            }

            if ($this->selected->certificat) {
                if ($this->selected->certificat->document) {
                    Storage::delete($this->selected->certificat->document);
                }
                $this->selected->certificat->delete();
            }

            $this->selected->delete();
        });

        return $this->redirect(route("backoffice.homologation.equipements"), navigate: true);
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

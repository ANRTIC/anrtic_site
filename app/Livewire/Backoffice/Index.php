<?php

namespace App\Livewire\Backoffice;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\User;
use App\Models\Equipement;
use App\Models\Demandeur;
use App\Models\CategorieEquipement;
use App\Models\Marque;
use App\Models\Certificat;

class Index extends Component
{
    public $agents;
    public $equipements;
    public $categories;
    public $marques;
    public $demandeurs;
    public $dossiers;
    public $certificats;
    public $notifications;

    public function mount()
    {
        $this->agents = $agents = User::role('AGENT')->count();
        $this->equipements = Equipement::count();
        $this->categories = CategorieEquipement::count();
        $this->marques = Marque::count();
        $this->demandeurs = Demandeur::count();
        $this->certificats = Certificat::count();
    }

    public function render()
    {
        return view('livewire.backoffice.index')
            ->extends("livewire.layouts.backoffice");
    }
}

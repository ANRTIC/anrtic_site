<?php

namespace App\Livewire\Backoffice\Homologation\Equipements;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.backoffice.homologation.equipements.create')
            ->extends("livewire.layouts.backoffice");
    }
}

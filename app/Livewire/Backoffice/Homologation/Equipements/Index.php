<?php

namespace App\Livewire\Backoffice\Homologation\Equipements;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.backoffice.homologation.equipements.index')
            ->extends("livewire.layouts.backoffice");
    }
}

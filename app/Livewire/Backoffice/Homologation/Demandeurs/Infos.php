<?php

namespace App\Livewire\Backoffice\Homologation\Demandeurs;

use Livewire\Component;

class Infos extends Component
{
    public function render()
    {
        return view('livewire.backoffice.homologation.demandeurs.infos')
                ->extends("livewire.layouts.backoffice");
    }
}

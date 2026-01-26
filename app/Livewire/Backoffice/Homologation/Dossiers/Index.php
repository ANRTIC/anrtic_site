<?php

namespace App\Livewire\Backoffice\Homologation\Dossiers;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.backoffice.homologation.dossiers.index')
            ->extends("livewire.layouts.backoffice");
    }
}

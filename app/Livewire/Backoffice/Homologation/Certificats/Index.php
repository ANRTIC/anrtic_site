<?php

namespace App\Livewire\Backoffice\Homologation\Certificats;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.backoffice.homologation.certificats.index')
            ->extends("livewire.layouts.backoffice");
    }
}

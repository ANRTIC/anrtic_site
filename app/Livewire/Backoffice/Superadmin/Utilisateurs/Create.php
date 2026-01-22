<?php

namespace App\Livewire\Backoffice\Superadmin\Utilisateurs;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.backoffice.superadmin.utilisateurs.create')
            ->extends("livewire.layouts.backoffice");
    }
}

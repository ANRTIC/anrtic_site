<?php

namespace App\Livewire\Backoffice\Superadmin\Utilisateurs;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        return view('livewire.backoffice.superadmin.utilisateurs.edit')
            ->extends("livewire.layouts.backoffice");
    }
}

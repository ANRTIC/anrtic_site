<?php

namespace App\Livewire\Backoffice\Textes\Avisdecisions;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.layouts.backoffice')]
class Create extends Component
{
    public function render()
    {
        return view('livewire.backoffice.textes.avisdecisions.create');
    }
}

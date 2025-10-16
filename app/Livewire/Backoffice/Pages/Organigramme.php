<?php

namespace App\Livewire\Backoffice\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.layouts.backoffice')]
class Organigramme extends Component
{
    public function render()
    {
        return view('livewire.backoffice.pages.organigramme');
    }
}

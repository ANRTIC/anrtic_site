<?php

namespace App\Livewire\Backoffice\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.layouts.backoffice')]
class InformationUtile extends Component
{
    public function render()
    {
        return view('livewire.backoffice.pages.information-utile');
    }
}

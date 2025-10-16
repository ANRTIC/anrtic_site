<?php

namespace App\Livewire\Backoffice\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.layouts.backoffice')]
class Missions extends Component
{
    public function render()
    {
        return view('livewire.backoffice.pages.missions');
    }
}

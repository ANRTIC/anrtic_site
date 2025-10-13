<?php

namespace App\Livewire\Backoffice;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.layouts.backoffice')] 
class Index extends Component
{
    public function render()
    {
        return view('livewire.backoffice.index');
    }
}

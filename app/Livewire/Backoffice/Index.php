<?php

namespace App\Livewire\Backoffice;

use Livewire\Attributes\Layout;
use Livewire\Component;


class Index extends Component
{
    public function render()
    {
        return view('livewire.backoffice.index')
            ->extends("livewire.layouts.backoffice");
    }
}

<?php

namespace App\Livewire\Public;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.layouts.user')] 
class Index extends Component
{
    public function render()
    {
        return view('livewire.public.index');
    }
}

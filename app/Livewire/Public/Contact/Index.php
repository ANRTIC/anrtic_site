<?php

namespace App\Livewire\Public\Contact;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.public.contact.index')
            ->extends("livewire.layouts.user");
    }
}

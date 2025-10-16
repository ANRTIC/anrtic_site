<?php

namespace App\Livewire\Authentication;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.layouts.authentication')]
class ForgotPassword extends Component
{
    public function render()
    {
        return view('livewire.authentication.forgot-password');
    }
}

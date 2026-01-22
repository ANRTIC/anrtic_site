<?php

namespace App\Livewire\Backoffice\Superadmin\Utilisateurs;

use Livewire\Component;
use App\Models\User;

class Index extends Component
{
    public $search = "";

    public function mount() 
    {

    }

    public function render()
    {
        return view('livewire.backoffice.superadmin.utilisateurs.index', [
            "users" => User::role("WEB_MASTER")->get()
        ])->extends("livewire.layouts.backoffice");
    }
}

<?php

namespace App\Livewire\Public;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\ChiffresSecteur;

#[Layout('livewire.layouts.user')] 
class Index extends Component
{
    public $chiffres;

    public function mount()
    {
        $this->chiffres = ChiffresSecteur::where("is_online", true)->get();

    }

    public function render()
    {
        return view('livewire.public.index', [
            "chiffres" => $this->chiffres
        ]);
    }
}

<?php

namespace App\Livewire\Public;
use Illuminate\Support\Facades\View;

use Livewire\Component;

class Index extends Component
{
    public function mount()
    {
        $shared = View::getShared();

        if (
            ($shared['chiffres'] ?? collect())->isEmpty() ||
            ($shared['partenaires'] ?? collect())->isEmpty() ||
            ($shared['featured_articles'] ?? collect())->isEmpty()
        ) {
            abort(503);
        }
    }

    public function render()
    {
        return view('livewire.public.index')
            ->extends('livewire.layouts.user');
    }
}

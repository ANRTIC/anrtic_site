<?php

namespace App\Livewire\Backoffice\Homologation\Marques;

use Livewire\Component;
use App\Models\Marque;

class Create extends Component
{
    public $name;

    public function save()
    {
        $validatedData = $this->validate([
            "name" => "required",
        ], [
            "name.required" => "Le nom est obligatoire",
        ]);

        Marque::create($validatedData);

        return $this->redirect(route("backoffice.homologation.marques"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.homologation.marques.create')
            ->extends('livewire.layouts.backoffice');
    }
}

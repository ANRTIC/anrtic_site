<?php

namespace App\Livewire\Backoffice\Autres\Categories;

use Livewire\Component;
use App\Models\Categorie;

class Create extends Component
{
    public $name = "";
    public $is_active = true;

    public function save()
    {
        $validatedData = $this->validate([
            "name" => "required|string|min:3",
            "is_active" => "boolean"
        ], [
            "name.required" => "Le nom est obligatoire",
            "name.string" => "Le nom doit être une chaîne de caractères",
            "name.min" => "Le nom doit contenir au moins 3 caractères"
        ]);

        Categorie::create($validatedData);

        return $this->redirect(route("backoffice.categories"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.autres.categories.create')
            ->extends('livewire.layouts.backoffice');
    }
}

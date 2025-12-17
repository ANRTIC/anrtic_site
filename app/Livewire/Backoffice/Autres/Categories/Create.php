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
            "name" => "required",
            "is_active" => "boolean"
        ], [
            "name.required" => "Le nom est obligatoire"
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

<?php

namespace App\Livewire\Backoffice\Autres\Categories;

use Livewire\Component;
use App\Models\Categorie;

class Edit extends Component
{
    public Categorie $categorie;
    public $name = "";
    public $is_active = null;

    public function mount($id)
    {
        $this->categorie = Categorie::findOrFail($id);
        $this->name = $this->categorie->name;
        $this->is_active = $this->categorie->is_active;
    }

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

        $this->categorie->update($validatedData);

        return $this->redirect(route("backoffice.categories"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.autres.categories.edit')
            ->extends('livewire.layouts.backoffice');
    }
}

<?php

namespace App\Livewire\Backoffice\Homologation\Categories;

use Livewire\Component;
use App\Models\CategorieEquipement;

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

        CategorieEquipement::create($validatedData);

        return $this->redirect(route("backoffice.homologation.categories"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.homologation.categories.create')
            ->extends("livewire.layouts.backoffice");
    }
}

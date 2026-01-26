<?php

namespace App\Livewire\Backoffice\Homologation\Categories;

use Livewire\Component;
use App\Models\CategorieEquipement;

class Edit extends Component
{
    public CategorieEquipement $categorie;
    public $name = "";
    public $is_active = null;

    public function mount($id)
    {
        $this->categorie = CategorieEquipement::findOrFail($id);
        $this->name = $this->categorie->name;
    }

    public function save()
    {
        $validatedData = $this->validate([
            "name" => "required",
        ], [
            "name.required" => "Le nom est obligatoire",
        ]);

        $this->categorie->update($validatedData);

        return $this->redirect(route("backoffice.homologation.categories"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.homologation.categories.edit')
            ->extends("livewire.layouts.backoffice");
    }
}

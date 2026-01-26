<?php

namespace App\Livewire\Backoffice\Homologation\Categories;

use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\CategorieEquipement;

class Index extends Component
{
    use WithPagination;
    public $search = "";
    public $perPage = 8;
    public $selected;

    public function selectCategory(CategorieEquipement $categorie)
    {
        $this->selected = $categorie;
    }

    public function deleteCategory()
    {
        if ($this->selected) {
            $this->selected->delete();
            
            return $this->redirect(route("backoffice.homologation.categories"), navigate: true);
        }

        return;
    }

    public function render()
    {
        $categories = $this->search ?
                CategorieEquipement::where('name', 'like', '%'. $this->search .'%')->paginate($this->perPage)
                : CategorieEquipement::paginate($this->perPage);

        return view('livewire.backoffice.homologation.categories.index', [
            "categories" => $categories
        ])->extends("livewire.layouts.backoffice");
    }
}

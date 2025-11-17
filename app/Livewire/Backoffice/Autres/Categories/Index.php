<?php

namespace App\Livewire\Backoffice\Autres\Categories;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Categorie;

class Index extends Component
{
    use WithPagination;
    public $search = "";
    public $perPage = 8;
    public $selected;

    public function selectCategory(Categorie $categorie)
    {
        $this->selected = $categorie;
    }

    public function deleteCategory()
    {
        if ($this->selected) {
            $this->selected->delete();

            return $this->redirect(route("backoffice.categories"), navigate: true);
        }

        return;
    }

    public function render()
    {
        $categories = $this->search ? 
                Categorie::where('name', 'like', '%'. $this->search .'%')->paginate($this->perPage)
                : Categorie::paginate($this->perPage);

        return view('livewire.backoffice.autres.categories.index', [
            "categories" => $categories
        ])->extends('livewire.layouts.backoffice');
    }
}

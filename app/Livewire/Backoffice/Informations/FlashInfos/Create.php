<?php

namespace App\Livewire\Backoffice\Informations\FlashInfos;

use Livewire\Component;
use App\Models\Categorie;
use App\Models\FlashInfos;

class Create extends Component
{
    public $categories;
    
    public $title;
    public $category_id;
    public $is_online = true;

    public function mount()
    {
        $this->categories = Categorie::where("is_active", true)->get();
    }

    public function save()
    {
        $validatedData = $this->validate([
            "title" => "required",
            "category_id" => "required",
            "is_online" => "boolean"
        ], [
            "title.required" => "Le titre est obligatoire",
            "category_id.required" => "La catégorie est obligatoire"
        ]);

        FlashInfos::create($validatedData);

        return $this->redirect(route("backoffice.flashinfos"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.informations.flash-infos.create', [
            "categories" => $this->categories
        ])->extends('livewire.layouts.backoffice');
    }
}

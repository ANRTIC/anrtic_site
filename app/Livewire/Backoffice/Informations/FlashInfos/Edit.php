<?php

namespace App\Livewire\Backoffice\Informations\FlashInfos;

use Livewire\Component;
use App\Models\FlashInfos;
use App\Models\Categorie;

class Edit extends Component
{
    public FlashInfos $flashinfos;
    public $title;
    public $category_id;
    public $is_online;

    public function mount($id)
    {
        $this->flashinfos = FlashInfos::findOrFail($id);
        $this->title = $this->flashinfos->title;
        $this->category_id = $this->flashinfos->categorie->id;
        $this->is_online = $this->flashinfos->is_online;
    }

    public function save()
    {
        $validatedData = $this->validate([
            "title" => "required", 
            "category_id" => "required",
            "is_online" => "boolean"
        ], [
            "title.required" => "Le titre est obligatoire",
            "category_id.required" => "La catégorie est obligatoire",
        ]);

        $this->flashinfos->update($validatedData);

        return $this->redirect(route("backoffice.flashinfos"), navigate: true);
    }

    public function render()
    {
        $categories = Categorie::where("is_active", true)->get();

        return view('livewire.backoffice.informations.flash-infos.edit', [
            "categories" => $categories
        ])->extends('livewire.layouts.backoffice');
    }
}

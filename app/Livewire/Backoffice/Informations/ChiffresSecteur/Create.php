<?php

namespace App\Livewire\Backoffice\Informations\ChiffresSecteur;

use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\ChiffresSecteur;

class Create extends Component
{
    use WithFileUploads;
    
    public $icon;
    public $label;
    public $sector;
    public $source;
    public $is_online = true;

    public function save() 
    {
        $validatedData = $this->validate([
            "icon" => "required|mimes:jpeg,jpg,png",
            "label" => "required",
            "sector" => "required",
            "source" => "required",
            "is_online" => "boolean"
        ], [
            "icon.required" => "L'icône est obligatoire",
            "icon.mimes" => "L'icône doit être dans les formats .jpeg, .jpg ou .png",
            "label.required" => "Le libellé est obligatoire",
            "sector.required" => "Le secteur est obligatoire",
            "source.required" => "La source est obligatoire",
        ]);

        $validatedData["icon"] = Storage::put("/media/chiffres_secteurs", $this->icon);
        ChiffresSecteur::create($validatedData);

        return $this->redirect(route("backoffice.chiffres-secteur"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.informations.chiffres-secteur.create')
            ->extends('livewire.layouts.backoffice');
    }
}

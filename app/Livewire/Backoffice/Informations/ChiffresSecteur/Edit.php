<?php

namespace App\Livewire\Backoffice\Informations\ChiffresSecteur;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\ChiffresSecteur;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;
    
    public ChiffresSecteur $chiffre;
    public $newIcon;
    public $label;
    public $sector;
    public $source;
    public $is_online = true;

    public function mount($id)
    {
        $this->chiffre = ChiffresSecteur::findOrFail($id);
        $this->label = $this->chiffre->label;
        $this->sector = $this->chiffre->sector;
        $this->source = $this->chiffre->source;
        $this->is_online = $this->chiffre->is_online;
    }

    public function save()
    {
        $validatedData = $this->validate([
            "newIcon" => "nullable|mimes:jpeg,jpg,png",
            "label" => "required",
            "sector" => "required",
            "source" => "required",
            "is_online" => "boolean"
        ], [
            "newIcon.mimes" => "L'icône doit être dans les formats .jpeg, .jpg ou .png",
            "label.required" => "Le libellé est obligatoire",
            "sector.required" => "Le secteur est obligatoire",
            "source.required" => "La source est obligatoire",
        ]);

        if ($this->newIcon) {
            Storage::delete($this->chiffre->icon);
            $validatedData["icon"] = Storage::put("/media/chiffres_secteurs", $this->newIcon);
        } else {
            $validatedData["icon"] = $this->chiffre->icon;
        }

        $this->chiffre->update($validatedData);

        return $this->redirect(route("backoffice.chiffres-secteur"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.informations.chiffres-secteur.edit')
            ->extends('livewire.layouts.backoffice');
    }
}

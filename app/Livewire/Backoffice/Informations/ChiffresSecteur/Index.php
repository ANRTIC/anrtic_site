<?php

namespace App\Livewire\Backoffice\Informations\ChiffresSecteur;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\ChiffresSecteur;

class Index extends Component
{
    public $search = "";
    public $perPage;
    public $selected;

    public function selectChiffre(ChiffresSecteur $chiffre)
    {
        $this->selected = $chiffre;
    }

    public function deleteChiffre()
    {
        if ($this->selected) {
            Storage::delete($this->selected->icon);
            $this->selected->delete();

            return $this->redirect(route("backoffice.chiffres-secteur"), navigate: true);
        }

        return;
    }

    public function render()
    {

        $chiffres = $this->search ?
            ChiffresSecteur::where('label', 'like', '%'. $this->search .'%')
                        ->orWhere('sector', 'like', '%'. $this->search .'%')
                        ->orWhere('source', 'like', '%'. $this->search .'%')->paginate($this->perPage)
            : ChiffresSecteur::paginate($this->perPage);

        return view('livewire.backoffice.informations.chiffres-secteur.index', [
            "chiffres" => $chiffres
        ])->extends('livewire.layouts.backoffice');
    }
}

<?php

namespace App\Livewire\Backoffice\Informations\AppelOffres;

use Livewire\Component;
use App\Models\AppelOffres;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    public $selected;
    public $search = "";
    public $perPage = 6;

    public function selectAppelOffres(AppelOffres $appel)
    {
        $this->selected = $appel;
    }

    public function deleteAppelOffres()
    {
        if ($this->selected) {
            Storage::delete($this->selected->thumbnail);
            $this->selected->delete();

            return $this->redirect(route("backoffice.appeloffres"), navigate: true);
        }

        return;
    }

    public function render()
    {
        return view('livewire.backoffice.informations.appel-offres.index', [
            "appelsoffres" => AppelOffres::paginate($this->perPage)
        ])->extends('livewire.layouts.backoffice');
    }
}

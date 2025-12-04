<?php

namespace App\Livewire\Backoffice\Informations\Rapports;

use Livewire\Component;
use App\Models\Rapport;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    public $selected;
    public $search = "";
    public $perPage = 6;

    public function selectRapport(Rapport $rapport)
    {
        $this->selected = $rapport;
    }

    public function deleteRapport()
    {
        if ($this->selected) {
            if ($this->selected->thumbnail) {
                Storage::delete($this->selected->thumbnail);
            }
            $this->selected->delete();

            return $this->redirect(route("backoffice.rapports"), navigate: true);
        }

        return;
    }

    public function render()
    {
        return view('livewire.backoffice.informations.rapports.index', [
            "rapports" => Rapport::paginate($this->perPage)
        ])->extends('livewire.layouts.backoffice');
    }
}

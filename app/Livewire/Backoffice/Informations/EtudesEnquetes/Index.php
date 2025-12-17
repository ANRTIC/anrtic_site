<?php

namespace App\Livewire\Backoffice\Informations\EtudesEnquetes;

use Livewire\Component;
use App\Models\EtudeEnquete;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    public $selected;
    public $search = "";
    public $perPage = 6;

    public function selectEtudeEnquete(EtudeEnquete $el) 
    {
        $this->selected = $el;
    }

    public function deleteEtudeEnquete()
    {
        if ($this->selected) {
            if ($this->selected->thumbnail) {
                Storage::delete($this->selected->thumbnail);
            }
            $this->selected->delete();

            return $this->redirect(route("backoffice.etudes-enquetes"), navigate: true);
        }
    }

    public function render()
    {
        $etudes_enquetes = $this->search ?
                    EtudeEnquete::where("title", "like",  "%". $this->search ."%")
                        ->orWhere("short_description", "like", "%". $this->search ."%")
                    : EtudeEnquete::paginate($this->perPage);

        return view('livewire.backoffice.informations.etudes-enquetes.index', [
            "etudes_enquetes" => $etudes_enquetes
        ])->extends('livewire.layouts.backoffice');
    }
}

<?php

namespace App\Livewire\Backoffice\Gestion\Evenements;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Evenement;

#[Layout('livewire.layouts.backoffice')] 
class Index extends Component
{
    public $title;
    public $object;
    public $description;
    public $date;
    public $location;
    public $is_online = true;

    public function save()
    {
        $validatedData = $this->validate([
            "title" => "required",
            "object" => "required",
            "description" => "required",
            "date" => "required|date",
            "location" => "required",
            "is_online" => "boolean"
        ], [
            "title.required" => "Le titre est obligatoire",
            "object.required" => "L'objet est obligatoire",
            "description.required" => "La description est obligatoire",
            "date.required" => "La date est obligatoire",
            "date.date" => "La date doit être une date valide",
            "location.required" => "Le lieu est obligatoire"
        ]);

        Evenement::create($validatedData);
        
        return $this->redirect(route("backoffice.evenements"));
    }

    public function render()
    {
        return view('livewire.backoffice.gestion.evenements.index');
    }
}

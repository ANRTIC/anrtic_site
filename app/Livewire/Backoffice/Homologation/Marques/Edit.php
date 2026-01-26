<?php

namespace App\Livewire\Backoffice\Homologation\Marques;

use Livewire\Component;
use App\Models\Marque;

class Edit extends Component
{
    public Marque $marque;
    public $name = "";

    public function mount($id)
    {
        $this->marque = Marque::findOrFail($id);
        $this->name = $this->marque->name;
    }

    public function save()
    {
        $validatedData = $this->validate([
            "name" => "required",
        ], [
            "name.required" => "Le nom est obligatoire",
        ]);

        $this->marque->update($validatedData);

        return $this->redirect(route("backoffice.homologation.marques"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.homologation.marques.edit')
            ->extends('livewire.layouts.backoffice');
    }
}

<?php

namespace App\Livewire\Backoffice\Gestion\Operateurs;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;
use App\Models\Operateur;

class Edit extends Component
{
    use WithFileUploads;

    public Operateur $operateur;
    #[Validate('image')]
    public $newLogo;
    public $name = "";
    public $email = "";
    public $phone = "";
    public $website = "";
    public $is_active;

    public function mount($id) 
    {
        $this->operateur = Operateur::findOrFail($id);
        $this->name = $this->operateur->name;
        $this->email = $this->operateur->email;
        $this->phone = $this->operateur->phone;
        $this->website = $this->operateur->website;
        $this->is_active = $this->operateur->is_active;
    }

    public function save()
    {
        $validatedData = $this->validate([
            "newLogo" => "nullable|mimes:jpeg,png,jpg",
            "name" => "required",
            "email" => "required|email",
            "phone" => "required",
            "website" => "nullable|url:https",
            "is_active" => "boolean"
        ], [
            "newLogo.mimes" => "Le logo doit être au format : jpeg, png, jpg",
            "name.required" => "Le nom est requis",
            "email.required" => "L'adresse e-mail est requise",
            "email.email" => "L'adresse e-mail doit être valide",
            "phone.required" => "Le numéro de téléphone est requis",
            "website.url" => "L'URL du site web doit être valide et commencer par https",
        ]);

        if ($this->newLogo) {
            Storage::delete($this->operateur->logo);
            $validatedData["logo"] = Storage::put("/media/operateurs", $this->newLogo);
        } else {
            $validatedData["logo"] = $this->operateur->logo;
        }

        $this->operateur->update($validatedData);
        return $this->redirect(route("backoffice.operateurs"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.gestion.operateurs.edit')
            ->extends('livewire.layouts.backoffice');
    }
}

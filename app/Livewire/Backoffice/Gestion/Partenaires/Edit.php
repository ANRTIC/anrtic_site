<?php

namespace App\Livewire\Backoffice\Gestion\Partenaires;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Models\Partenaire;
use Illuminate\Support\Facades\Storage;

#[Layout('livewire.layouts.backoffice')]
class Edit extends Component
{
    use WithFileUploads;

    public Partenaire $partenaire;
    #[Validate('image')]
    public $newLogo;
    public $name = "";
    public $email = "";
    public $phone = "";
    public $website = "";
    public $is_active;

    public function mount($id) 
    {
        $this->partenaire = Partenaire::findOrFail($id);
        $this->name = $this->partenaire->name;
        $this->email = $this->partenaire->email;
        $this->phone = $this->partenaire->phone;
        $this->website = $this->partenaire->website;
        $this->is_active = $this->partenaire->is_active;
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
            Storage::delete($this->partenaire->logo);
            $validatedData["logo"] = Storage::put("/media/partenaires", $this->newLogo);
        } else {
            $validatedData["logo"] = $this->partenaire->logo;
        }

        $this->partenaire->update($validatedData);
        return $this->redirect(route("backoffice.partenaires"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.gestion.partenaires.edit');
    }
}

<?php

namespace App\Livewire\Backoffice\Gestion\Operateurs;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Models\Operateur;
use Illuminate\Support\Facades\Storage;

#[Layout('livewire.layouts.backoffice')]
class Create extends Component
{
    use WithFileUploads;

    #[Validate('image')]
    public $logo;
    public $name = "";
    public $email = "";
    public $phone = "";
    public $website = "";
    public $is_active = true;

    public function save()
    {
        $validatedData = $this->validate([
            "logo" => "required|mimes:jpeg,png,jpg",
            "name" => "required|",
            "email" => "required|email",
            "phone" => "required",
            "website" => "nullable|url:https",
            "is_active" => "boolean"
        ], [
            "logo.required" => "Le logo est requis",
            "logo.mimes" => "Le logo doit être au format : jpeg, png, jpg",
            "name.required" => "Le nom est requis",
            "email.required" => "L'adresse e-mail est requise",
            "email.email" => "L'adresse e-mail doit être valide",
            "phone.required" => "Le numéro de téléphone est requis",
            "website.url" => "L'URL du site web doit être valide et commencer par 'https'",
        ]);

        $validatedData["logo"] = Storage::put("/media/operateurs", $this->logo);
        Operateur::create($validatedData);

        return $this->redirect(route("backoffice.operateurs"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.gestion.operateurs.create');
    }
}

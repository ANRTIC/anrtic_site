<?php

namespace App\Livewire\Backoffice\Homologation\Agents;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Jobs\ProcessUserCreationMailSending;
// use Illuminate\Auth\Events\Registered;
// event(new Registered($user)); 

class Create extends Component
{
    use WithFileUploads;

    #[Validate('image')]
    public $photo;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;

    public function save()
    {
        $validatedData = $this->validate([
            "photo" => "nullable|mimes:jpeg,jpg,png",
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required|email|unique:users,email",
            "phone" => "required"
        ], [
            "photo.mimes" => "La photo doit être au format : jpeg, jpg, png",
            "first_name.required" => "Le prénom est obligatoire",
            "last_name.required" => "Le nom est obligatoire",
            "email.required" => "L'adresse e-mail est obligatoire",
            "email.email" => "L'adresse e-mail doit être valide",
            "email.unique" => "Cette adresse e-mail est déjà prise",
            "phone.required" => "Le numéro de téléphone est obligatoire"
        ]);

        $password = User::generateDefaultPassword();
        $validatedData["password"] = Hash::make($password);
        if ($this->photo) {
            $validatedData["photo"] = Storage::put("/media/user_profiles", $this->photo);
        }
        
        $user = User::create($validatedData);
        $user->assignRole("AGENT");

        // Envoyer les emails de notification
        ProcessUserCreationMailSending::dispatch($user, $password);


        return $this->redirect(route("backoffice.homologation.agents"));
    }

    public function render()
    {
        return view('livewire.backoffice.homologation.agents.create')
            ->extends("livewire.layouts.backoffice");
    }
}

<?php

namespace App\Livewire\Backoffice\Homologation\Agents;

use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\User;

class Edit extends Component
{
    use WithFileUploads;

    public User $user;
    #[Validate('image')]
    public $newPhoto;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;


    public function mount($id)
    {
        $this->user = User::findOrFail($id);
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
    }

    public function save()
    {
        $validatedData = $this->validate([
            "newPhoto" => "nullable|mimes:jpeg,jpg,png",
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required|email|".($this->email !== $this->user->email ? 'unique:users,email' : ''),
            "phone" => "required"
        ], [
            "newPhoto.mimes" => "La photo doit être au format : jpeg, jpg, png",
            "first_name.required" => "Le prénom est obligatoire",
            "last_name.required" => "Le nom est obligatoire",
            "email.required" => "L'adresse e-mail est obligatoire",
            "email.email" => "L'adresse e-mail doit être valide",
            "email.unique" => "Cette adresse e-mail est déjà prise",
            "phone.required" => "Le numéro de téléphone est obligatoire"
        ]);

        if ($this->newPhoto) {
            Storage::delete($this->user->photo);
            $validatedData["photo"] = Storage::put("/media/user_profiles", $this->newPhoto);
        } else {
            $validatedData["photo"] = $this->user->photo;
        }

        $this->user->update($validatedData);
        return $this->redirect(route("backoffice.homologation.agents"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.homologation.agents.edit')
            ->extends("livewire.layouts.backoffice");
    }
}

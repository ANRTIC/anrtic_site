<?php

namespace App\Livewire\Authentication;

use App\Mail\CustomResetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.layouts.authentication')]
class ForgotPassword extends Component
{
    public string $email = "";

    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        $user = \App\Models\User::where('email', $this->email)->first();

        if ($user) {
            // Générer un token de réinitialisation de mot de passe
            $token = app('auth.password.broker')->createToken($user);

            // Envoyer l'email avec le token
            Mail::to($this->email)->send(new CustomResetPasswordMail($token, $this->email));
        }

        Password::sendResetLink($this->only('email'));

        session()->flash('status', __('Un lien de réinitialisation sera envoyé si un compte existe.'));
    }

    public function render()
    {
        return view('livewire.authentication.forgot-password');
    }
}

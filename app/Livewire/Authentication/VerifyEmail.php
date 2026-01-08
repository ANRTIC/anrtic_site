<?php

namespace App\Livewire\Authentication;

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.layouts.authentication')]
class VerifyEmail extends Component
{
    public function sendVerification(): void
    {
        $key = 'send-verification-link|' . Auth::user()->id;

        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);

            Session::flash("user-message", "Vous avez dépassé le nombre de tentatives autorisées. Essayez à nouveau dans {$seconds} secondes.");

            return;
        }

        Auth::user()->sendEmailVerificationNotification();

        RateLimiter::hit($key, 60);

        Session::flash("user-message", "Le lien de vérification est envoyé!");
    }

    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect("/", navigate: true);
    }

    public function render()
    {
        return view('livewire.authentication.verify-email');
    }
}

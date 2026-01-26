<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Livewire\Livewire;

Route::middleware(["auth:sanctum", "verified", "checkBlocked"])->group(function() {

    Route::group(["as" => "backoffice.", "prefix" => "backoffice"], function () {

        Volt::route("/", "backoffice.index")->name("backoffice");

        // Homologation
        Route::group(["as" => "homologation.", "prefix" => "homologation"], function () {

            /* Agents */         
            Volt::route("agents", "backoffice.homologation.agents.index")->name("agents");
            Volt::route("agents/ajouter", "backoffice.homologation.agents.create")->name("agents.ajouter");
            Volt::route("agents/modifier/{id}", "backoffice.homologation.agents.edit")->name("agents.modifier");

            /* Equipements */
            Volt::route("equipements", "backoffice.homologation.equipements.index")->name("equipements");
            Volt::route("equipements/ajouter", "backoffice.homologation.equipements.create")->name("equipements.ajouter");
            Volt::route("equipements/modifier/{id}", "backoffice.homologation.equipements.edit")->name("equipements.modifier");
            Volt::route("equipements/informations/{id}", "backoffice.homologation.equipements.infos")->name("equipements.informations");

            /* Demandeurs */
            Volt::route("demandeurs", "backoffice.homologation.demandeurs.index")->name("demandeurs");
            Volt::route("demandeurs/ajouter", "backoffice.homologation.demandeurs.create")->name("demandeurs.ajouter");
            Volt::route("demandeurs/modifier/{id}", "backoffice.homologation.demandeurs.edit")->name("demandeurs.modifier");
            Volt::route("demandeurs/informations/{id}", "backoffice.homologation.demandeurs.infos")->name("demandeurs.informations");

            /* Catégories */
            Volt::route("categories", "backoffice.homologation.categories.index")->name("categories");
            Volt::route("categories/ajouter", "backoffice.homologation.categories.create")->name("categories.ajouter");
            Volt::route("categories/modifier/{id}", "backoffice.homologation.categories.edit")->name("categories.modifier");

            /* Marques */
            Volt::route("marques", "backoffice.homologation.marques.index")->name("marques");
            Volt::route("marques/ajouter", "backoffice.homologation.marques.create")->name("marques.ajouter");
            Volt::route("marques/modifier/{id}", "backoffice.homologation.marques.edit")->name("marques.modifier");
            
            /* Dossiers */
            Volt::route("dossiers", "backoffice.homologation.dossiers.index")->name("dossiers");

            /* Certificats */
            Volt::route("certificats", "backoffice.homologation.certificats.index")->name("certificats");
        });

    });
    
});


// Authentification
Route::middleware('guest')->group(function () {
    Volt::route('login', 'authentication.login')
        ->name('login');

    /*
    Volt::route('register', 'auth.register')
        ->name('register'); */

    Volt::route('forgot-password', 'authentication.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'authentication.reset-password')
        ->name('password.reset');

});

// Account verification
Route::middleware(["auth:sanctum", "email.verified"])->group(function () {
    Volt::route('verify-email', 'authentication.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post("/email/verification-notification", function(Request $request) {
        //$request->user()->sendEmailVerificationNotification();

        return back()->with("message", "Le lien de vérification est envoyé!");
    })->middleware(["throttle:6,1"])->name("verification.send");
});

Route::post('logout', App\Livewire\Actions\Logout::class)
    ->name('logout');

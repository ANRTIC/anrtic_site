<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


Route::group(["as" => "backoffice.", "prefix" => "backoffice"], function () {

    Volt::route("/", "backoffice.index")->name("backoffice");

    // Gestion
    /* Articles */
    Volt::route("articles", "backoffice.gestion.articles.index")->name("articles");
    Volt::route("articles/ajouter", "backoffice.gestion.articles.create")->name("articles.ajouter");
    Volt::route("articles/modifier/{id}", "backoffice.gestion.articles.edit")->name("articles.modifier");

    /* Evènements */
    Volt::route("evenements", "backoffice.gestion.evenements.index")->name("evenements");

    /* Communiques */
    Volt::route("communiques", "backoffice.gestion.communiques.index")->name("communiques");
    Volt::route("communiques/ajouter", "backoffice.gestion.communiques.create")->name("communiques.ajouter");
    Volt::route("communiques/modifier/{id}", "backoffice.gestion.communiques.edit")->name("communiques.modifier");

    /* Partenaires */
    Volt::route("partenaires", "backoffice.gestion.partenaires.index")->name("partenaires");
    Volt::route("partenaires/ajouter", "backoffice.gestion.partenaires.create")->name("partenaires.ajouter");
    Volt::route("partenaires/modifier/{id}", "backoffice.gestion.partenaires.edit")->name("partenaires.modifier");

    /* Opérateurs */
    Volt::route("operateurs", "backoffice.gestion.operateurs.index")->name("operateurs");
    Volt::route("operateurs/ajouter", "backoffice.gestion.operateurs.create")->name("operateurs.ajouter");
    Volt::route("operateurs/modifier/{id}", "backoffice.gestion.operateurs.edit")->name("operateurs.modifier");

    // Textes
    /* Avis & décisions */
    Volt::route("avis-decisions", "backoffice.textes.avisdecisions.index")->name("avis-decisions");
    Volt::route("avis-decisions/ajouter", "backoffice.textes.avisdecisions.create")->name("avis-decisions.ajouter");
    Volt::route("avis-decisions/modifier/{id}", "backoffice.textes.avisdecisions.edit")->name("avis-decisions.modifier");

    // Autres
    /* Categories */
    Volt::route("categories", "backoffice.autres.categories.index")->name("categories");
    Volt::route("categories/ajouter", "backoffice.autres.categories.create")->name("categories.ajouter");
    Volt::route("categories/modifier/{id}", "backoffice.autres.categories.edit")->name("categories.modifier");
});

Route::middleware('guest')->group(function () {
    Volt::route('login', 'auth.login')
        ->name('login');

    Volt::route('register', 'auth.register')
        ->name('register');

    Volt::route('forgot-password', 'auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'auth.reset-password')
        ->name('password.reset');

});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
});

Route::post('logout', App\Livewire\Actions\Logout::class)
    ->name('logout');

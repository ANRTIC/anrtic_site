<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;


Volt::route("/", "public.index")->name("accueil");

Route::group(["as" => "anrtic."], function () {
    /* Menu - ANRTIC */
    Volt::route("mot-du-directeur-general", "public.anrtic.mot-dg")->name("motDG");
    Volt::route("organigramme", "public.anrtic.organigramme")->name("organigramme");
    Volt::route("plan-strategique", "public.anrtic.plan-strategique")->name("planStrategique");
    Volt::route("missions", "public.anrtic.missions")->name("missions");
    Volt::route("informations-utiles", "public.anrtic.informationsUtiles")->name("informationsUtiles");

    
});


// Régulation
Route::group(["as" => "regulation.", "prefix" => "regulation"], function () {
    Volt::route("avis-decisions", "public.regulation.avis-decisions")->name("avisDecisions");
    Volt::route("lois", "public.regulation.lois.index")->name("lois");
    Volt::route("decrets", "public.regulation.decrets.index")->name("decrets");
    Volt::route("arretes", "public.regulation.arretes.index")->name("arretes");

});


// Actualités
Route::group(["as" => "actualites.", "prefix" => "actualites"], function () {

});


/* Page - Contact */
Volt::route("contact", "public.contact.index")->name("contact");




Route::get("/error", function() {
    abort(503);
});

/*
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
*/

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

require __DIR__.'/auth.php';

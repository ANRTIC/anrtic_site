<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;


<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin/branch-homologation
/*
Route::middleware('guest')->group(function () { 

    Route::get("/", App\Livewire\Public\Index::class)->name("home");
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
<<<<<<< HEAD
=======
//Route::get("/", App\Livewire\Public\Index::class)->name("home");

/*
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
*/
>>>>>>> main
=======
>>>>>>> origin/branch-homologation

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

<<<<<<< HEAD
<<<<<<< HEAD
*/

=======
>>>>>>> main
=======
*/

>>>>>>> origin/branch-homologation
require __DIR__.'/auth.php';

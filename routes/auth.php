<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware(["auth:sanctum", "verified"])->group(function() {

    Route::group(["as" => "backoffice.", "prefix" => "backoffice"], function () {

        Volt::route("/", "backoffice.index")->name("backoffice");

        // Gestion
        /* Articles */
        Volt::route("articles", "backoffice.gestion.articles.index")->name("articles");
        Route::get("articles/ajouter", [App\Http\Controllers\Admin\ArticleController::class, "create"])->name("articles.create");
        Route::post("articles/ajouter", [App\Http\Controllers\Admin\ArticleController::class, "store"])->name("articles.store");
        Route::get("articles/modifier/{id}", [App\Http\Controllers\Admin\ArticleController::class, "edit"])->name("articles.edit");
        Route::post("articles/modifier/{id}", [App\Http\Controllers\Admin\ArticleController::class, "update"])->name("articles.update");

        /* Evènements */
        Volt::route("evenements", "backoffice.gestion.evenements.index")->name("evenements");

        /* Communiques */
        Volt::route("communiques", "backoffice.gestion.communiques.index")->name("communiques");
        Route::get("communiques/ajouter", [App\Http\Controllers\Admin\CommuniqueController::class, "create"])->name("communiques.create");
        Route::post("communiques/ajouter", [App\Http\Controllers\Admin\CommuniqueController::class, "store"])->name("communiques.store");
        Route::get("communiques/modifier/{id}", [App\Http\Controllers\Admin\CommuniqueController::class, "edit"])->name("communiques.edit");
        Route::post("communiques/modifier/{id}", [App\Http\Controllers\Admin\CommuniqueController::class, "update"])->name("communiques.update");

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
        /* Lois */
        Volt::route("lois", "backoffice.textes.lois.index")->name("lois");
        Volt::route("lois/ajouter", "backoffice.textes.lois.create")->name("lois.ajouter");
        Volt::route("lois/modifier/{id}", "backoffice.textes.lois.edit")->name("lois.modifier");
        /* Arrêtés */
        Volt::route("arretes", "backoffice.textes.arretes.index")->name("arretes");
        Volt::route("arretes/ajouter", "backoffice.textes.arretes.create")->name("arretes.ajouter");
        Volt::route("arretes/modifier/{id}", "backoffice.textes.arretes.edit")->name("arretes.modifier");
        /* Décrets */
        Volt::route("decrets", "backoffice.textes.decrets.index")->name("decrets");
        Volt::route("decrets/ajouter", "backoffice.textes.decrets.create")->name("decrets.ajouter");
        Volt::route("decrets/modifier/{id}", "backoffice.textes.decrets.edit")->name("decrets.modifier");
        /* Notes de service */
        Volt::route("notes-service", "backoffice.textes.notes_service.index")->name("notes_service");
        Volt::route("notes-service/ajouter", "backoffice.textes.notes_service.create")->name("notes_service.ajouter");
        Volt::route("notes-service/modifier/{id}", "backoffice.textes.notes_service.edit")->name("notes_service.modifier");

        // Pages
        Route::match(["get", "post"], "/mot-du-directeur-general", [\App\Http\Controllers\Admin\PageController::class, "motDG"])->name("motDG");
        Route::match(["get", "post"], "/organigramme", [\App\Http\Controllers\Admin\PageController::class, "organigramme"])->name("organigramme");
        Route::match(["get", "post"], "/plan-strategique", [\App\Http\Controllers\Admin\PageController::class, "planStrategique"])->name("planStrategique");
        Route::match(["get", "post"], "/missions", [\App\Http\Controllers\Admin\PageController::class, "missions"])->name("missions");
        Route::match(["get", "post"], "/information-utile", [\App\Http\Controllers\Admin\PageController::class, "informationUtile"])->name("informationUtile");

        // Autres
        /* Categories */
        Volt::route("categories", "backoffice.autres.categories.index")->name("categories");
        Volt::route("categories/ajouter", "backoffice.autres.categories.create")->name("categories.ajouter");
        Volt::route("categories/modifier/{id}", "backoffice.autres.categories.edit")->name("categories.modifier");

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
        });

    });
    
});


// Authentification
Route::middleware('guest')->group(function () {
    Volt::route('login', 'authentication.login')
        ->name('login');

    Volt::route('register', 'auth.register')
        ->name('register');

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

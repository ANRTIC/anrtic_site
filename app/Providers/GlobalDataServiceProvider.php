<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use App\Models\ChiffresSecteur;
use App\Models\Partenaire;
use App\Models\Article;
use App\Models\Video;

class GlobalDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (app()->runningInConsole()) {
            return;
        }

        if (!Schema::hasTable("flash_infos")) {
            return;
        }

        $chiffres = Cache::remember(
            "chiffres",
            3600,
            fn () => ChiffresSecteur::where("is_online", true)->get()
        );
        $partenaires = Cache::remember(
            "partenaires",
            3600,
            fn () => Partenaire::where("is_active", true)->get()
        );
        $articles = Cache::remember(
            "featured_articles",
            3600,
            fn () => Article::where("is_online", true)->latest()->take(3)->get()
        );

        View::share("chiffres", $chiffres);
        View::share("partenaires", $partenaires);
        View::share("featured_articles", $articles);
    }
}

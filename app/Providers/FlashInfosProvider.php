<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use App\Models\FlashInfos;

class FlashInfosProvider extends ServiceProvider
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

        $flash_infos = Cache::remember(
            "flash_infos",
            86400,
            fn () => FlashInfos::where("is_online", true)->get()
        );

        View::share("flash_infos", $flash_infos);
    }
}

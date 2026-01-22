<?php

namespace App\Livewire\Backoffice;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use App\Models\Article;
use App\Models\Communique;
use App\Models\Evenement;
use App\Models\AppelOffres;
use App\Models\Rapport;
use App\Models\EtudeEnquete;
use App\Models\AvisDecision;
use App\Models\Loi;
use App\Models\Arrete;
use App\Models\Decret;
use App\Models\NoteService;


class Index extends Component
{
    public $articles;
    public $communiques;
    public $evenements;
    public $appels_offres;
    public $rapports;
    public $etudes;
    public $avis;
    public $lois;
    public $arretes;
    public $decrets;
    public $notes;

    public function mount()
    {
        $this->articles = Cache::remember(
            "articles_count",
            86400,
            fn () => Article::where("is_online")->count()
        );
        $this->communiques = Cache::remember(
            "communiques_count",
            86400,
            fn () => Communique::where("is_online")->count()
        );
        $this->evenements = Cache::remember(
            "evenements_count",
            86400,
            fn () => Evenement::where("is_online")->count()
        );
        $this->appels_offres = Cache::remember(
            "appels_offres_count",
            86400,
            fn () => AppelOffres::where("is_online")->count()
        );
        $this->rapports = Cache::remember(
            "rapports_count",
            86400,
            fn () => Rapport::where("is_online")->count()
        );
        $this->etudes = Cache::remember(
            "etudes_count",
            86400,
            fn () => EtudeEnquete::where("is_online")->count()
        );
        $this->avis = Cache::remember(
            "avis_count",
            86400,
            fn () => AvisDecision::where("is_online")->count()
        );
        $this->lois = Cache::remember(
            "lois_count",
            86400,
            fn () => Loi::where("is_online")->count()
        );
        $this->arretes = Cache::remember(
            "arretes_count",
            86400,
            fn () => Arrete::where("is_online")->count()
        );
        $this->decrets = Cache::remember(
            "decrets_count",
            86400,
            fn () => Decret::where("is_online")->count()
        );
        $this->notes = Cache::remember(
            "notes_count",
            86400,
            fn () => NoteService::where("is_online")->count()
        );
    }

    public function render()
    {
        return view('livewire.backoffice.index')
            ->extends("livewire.layouts.backoffice");
    }
}

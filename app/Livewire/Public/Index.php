<?php

namespace App\Livewire\Public;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\ChiffresSecteur;
use App\Models\Partenaire;
use App\Models\Article;
use App\Models\Video;

#[Layout('livewire.layouts.user')] 
class Index extends Component
{
    public $chiffres;
    public $partenaires;
    public $articles;
    public $videos;

    public function mount()
    {
        $this->chiffres = ChiffresSecteur::where("is_online", true)->get();
        $this->partenaires = Partenaire::where("is_active", true)->get();
        $this->articles = Article::where("is_online", true)->latest()->take(3)->get();
        $this->videos = Video::where("is_online", true)->latest()->take(3)->get();
    }

    public function render()
    {
        return view('livewire.public.index', [
            "chiffres" => $this->chiffres,
            "partenaires" => $this->partenaires,
            "articles" => $this->articles,
            "videos" => $this->videos
        ]);
    }
}

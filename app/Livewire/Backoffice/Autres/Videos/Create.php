<?php

namespace App\Livewire\Backoffice\Autres\Videos;

use Livewire\Component;
use App\Models\Video;

class Create extends Component
{
    public $title;
    public $link;
    public $is_online = true;

    public function save()
    {
        $validatedData = $this->validate([
            "title" => "required",
            "link" => "required|url",
            "is_online" => "boolean"
        ], [
            "title.required" => "Le titre est obligatoire",
            "link.required" => "Le lien est obligatoire",
            "link.url" => "Le lien doit être valide"
        ]);

        Video::create($validatedData);

        return $this->redirect(route("backoffice.videos"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.autres.videos.create')
            ->extends('livewire.layouts.backoffice');
    }
}

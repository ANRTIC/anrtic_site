<?php

namespace App\Livewire\Backoffice\Autres\Videos;

use Livewire\Component;
use App\Models\Video;

class Edit extends Component
{
    public Video $video;
    public $title;
    public $link;
    public $is_online = null;
    
    public function mount($id)
    {
        $this->video = Video::findOrFail($id);
        $this->title = $this->video->title;
        $this->link = $this->video->link;
        $this->is_online = $this->video->is_online;
    }

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

        $this->video->update($validatedData);

        return $this->redirect(route("backoffice.videos"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.autres.videos.edit')
            ->extends('livewire.layouts.backoffice');
    }
}

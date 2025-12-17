<?php

namespace App\Livewire\Backoffice\Autres\Videos;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Video;

class Index extends Component
{
    use WithPagination;
    public $selected;
    public $search = "";
    public $perPage = 8;

    public function selectVideo(Video $video)
    {
        $this->selected = $video;
    }

    public function deleteVideo()
    {
        if ($this->selected) {
            $this->selected->delete();

            return $this->redirect(route("backoffice.videos"), navigate: true);
        }

        return;
    }

    public function render()
    {
        $videos = $this->search ?
                Video::where("title", "like", "%". $this->search ."%")->paginate($this->perPage)
                : Video::paginate($this->perPage);

        return view('livewire.backoffice.autres.videos.index', [
            "videos" => $videos
        ])->extends('livewire.layouts.backoffice');
    }
}

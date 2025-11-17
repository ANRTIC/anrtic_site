<?php

namespace App\Livewire\Backoffice\Informations\FlashInfos;

use Livewire\Component;
use App\Models\FlashInfos;
use App\Models\Categorie;

class Index extends Component
{
    public $search = "";
    public $perPage = 6;
    public $selected;

    public function selectFlashInfos(FlashInfos $flash)
    {
        $this->selected = $flash;
    }

    public function deleteFlashInfos()
    {
        if ($this->selected) {
            $this->selected->delete();

            return $this->redirect(route("backoffice.flashinfos"), navigate: true);
        }

        return;
    }

    public function render()
    {
        $categories = Categorie::where("is_active", true)->get();

        $flashinfos = $this->search ?
            FlashInfos::where('title', 'like', '%'. $this->search .'%')->paginate($this->perPage)
            : FlashInfos::paginate($this->perPage);

        return view('livewire.backoffice.informations.flash-infos.index', [
            "flashinfos" => $flashinfos,
            "categories" => $categories
        ])->extends('livewire.layouts.backoffice');
    }
}

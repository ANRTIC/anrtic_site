<?php

namespace App\Livewire\Backoffice\Homologation\Marques;

use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Marque;

class Index extends Component
{
    use WithPagination;
    public $search = "";
    public $perPage = 8;
    public $selected;

    public function selectBrand(Marque $marque)
    {
        $this->selected = $marque;
    }

    public function deleteBrand()
    {
        if ($this->selected) {
            $this->selected->delete();

            return $this->redirect(route("backoffice.homologation.marques"), navigate: true);
        }

        return;
    }

    public function render()
    {
        $marques = $this->search ? 
                Marque::where('name', 'like', '%'. $this->search .'%')->paginate($this->perPage)
                : Marque::paginate($this->perPage);

        return view('livewire.backoffice.homologation.marques.index', [
            "marques" => $marques
        ])->extends('livewire.layouts.backoffice');
    }
}

<?php

namespace App\Livewire\Backoffice\Gestion\Partenaires;

use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\Partenaire;

#[Layout('livewire.layouts.backoffice')]
class Index extends Component
{
    use WithPagination;
    public $search;
    public $perPage = 8;
    public $selected;

    public function selectPartenaire(Partenaire $partenaire)
    {
        $this->selected = $partenaire;
    }

    public function deletePartenaire()
    {
        if ($this->selected) {
            Storage::delete($this->selected->logo);
            $this->selected->delete();

            return $this->redirect(route("backoffice.partenaires"), navigate: true);
        }

        return;
    }

    public function render()
    {
        $partenaires = $this->search ?
                Partenaire::where('name', 'like', '%'. $this->search .'%')->paginate($this->perPage)
                : Partenaire::paginate($this->perPage);

        return view('livewire.backoffice.gestion.partenaires.index', [
            "partenaires" => $partenaires
        ]);
    }
}

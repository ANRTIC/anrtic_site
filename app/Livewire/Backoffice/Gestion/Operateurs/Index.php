<?php

namespace App\Livewire\Backoffice\Gestion\Operateurs;

use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\Operateur;

#[Layout('livewire.layouts.backoffice')]
class Index extends Component
{
    use WithPagination;
    public $search = "";
    public $perPage = 8;
    public $selected;

    public function selectOperateur(Operateur $operateur)
    {
        $this->selected = $operateur;
    }

    public function deleteOperateur()
    {
        if ($this->selected) {
            Storage::delete($this->selected->logo);
            $this->selected->delete();

            return $this->redirect(route("backoffice.operateurs"), navigate: true);
        }

        return;
    }

    public function render()
    {
        $operateurs = $this->search ?
                Operateur::where('name', 'like', '%'. $this->search .'%')->paginate($this->perPage)
                : Operateur::paginate($this->perPage);

        return view('livewire.backoffice.gestion.operateurs.index', [
            "operateurs" => $operateurs
        ]);
    }
}

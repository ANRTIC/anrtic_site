<?php

namespace App\Livewire\Backoffice\Gestion\Communiques;

use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\Communique;

#[Layout('livewire.layouts.backoffice')] 
class Index extends Component
{
    use WithPagination;
    public $search = "";
    public $perPage = 6;
    public $selected;

    public function selectCommunique(Communique $communique)
    {
        $this->selected = $communique;
    }

    public function deleteCommunique()
    {
        if ($this->selected) {
            Storage::delete($this->selected->thumbnail);
            $this->selected->delete();

            return $this->redirect(route("backoffice.communiques"), navigate: true);
        }

        return;
    }

    public function render()
    {
        $communiques = $this->search ?
                Communique::where('title', 'like', '%'. $this->search . '%')
                        ->orWhere('short_description', 'like', '%'. $this->search . '%') 
                        : Communique::paginate($this->perPage);

        return view('livewire.backoffice.gestion.communiques.index', [
            "communiques" => $communiques
        ]);
    }
}

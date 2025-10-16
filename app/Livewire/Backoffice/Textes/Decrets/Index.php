<?php

namespace App\Livewire\Backoffice\Textes\Decrets;

use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\Decret;

class Index extends Component
{
    use WithPagination;
    
    public $search;
    public $perPage = 8;
    public $selected;

    public function selectDecret(Decret $decret)
    {
        $this->selected = $decret;
    }

    public function deleteDecret()
    {
        if ($this->selected) {
            Storage::delete($this->selected->document);
            $this->selected->delete();

            return $this->redirect(route("backoffice.decrets"), navigate: true);
        }

        return;
    }

    public function render()
    {
        $decrets = $this->search ?
            Decret::where('reference', 'like', '%'. $this->search .'%')
                ->orWhere('description', 'like', '%'. $this->search .'%')->paginate($this->perPage)
            : Decret::paginate($this->perPage);

        return view('livewire.backoffice.textes.decrets.index', [
            "decrets" => $decrets
        ])->extends("livewire.layouts.backoffice");
    }
}

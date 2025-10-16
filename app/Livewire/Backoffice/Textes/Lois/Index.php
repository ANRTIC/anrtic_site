<?php

namespace App\Livewire\Backoffice\Textes\Lois;

use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\Loi;

class Index extends Component
{
    use WithPagination;
    
    public $search;
    public $perPage = 8;
    public $selected;

    public function selectLoi(Loi $loi)
    {
        $this->selected = $loi;
    }

    public function deleteLoi()
    {
        if ($this->selected) {
            Storage::delete($this->selected->document);
            $this->selected->delete();

            return $this->redirect(route("backoffice.lois"), navigate: true);
        }

        return;
    }

    public function render()
    {
        $lois = $this->search ?
            Loi::where('reference', 'like', '%'. $this->search .'%')
                ->orWhere('description', 'like', '%'. $this->search .'%')->paginate($this->perPage)
            : Loi::paginate($this->perPage);

        return view('livewire.backoffice.textes.lois.index', [
            "lois" => $lois
        ])->extends("livewire.layouts.backoffice");
    }
}

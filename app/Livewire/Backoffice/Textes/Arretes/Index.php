<?php

namespace App\Livewire\Backoffice\Textes\Arretes;

use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\Arrete;

class Index extends Component
{
    use WithPagination;

    public $search;
    public $perPage = 8;
    public $selected;

    public function selectArrete(Arrete $arrete)
    {
        $this->selected = $arrete;
    }

    public function deleteArrete()
    {
        if ($this->selected) {
            Storage::delete($this->selected->document);
            $this->selected->delete();

            return $this->redirect(route("backoffice.arretes"), navigate: true);
        }

        return;
    }

    public function render()
    {
        $arretes = $this->search ?
            Arrete::where('reference', 'like', '%'. $this->search .'%')
                ->orWhere('description', 'like', '%'. $this->search .'%')->paginate($this->perPage)
            : Arrete::paginate($this->perPage);

        return view('livewire.backoffice.textes.arretes.index', [
            "arretes" => $arretes
        ])->extends("livewire.layouts.backoffice");
    }
}

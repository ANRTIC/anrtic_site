<?php

namespace App\Livewire\Backoffice\Textes\NotesService;

use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\NoteService;

class Index extends Component
{
    use WithPagination;
    
    public $search;
    public $perPage = 8;
    public $selected;

    public function selectNoteService(NoteService $noteservice)
    {
        $this->selected = $noteservice;
    }

    public function deleteNoteService()
    {
        if ($this->selected) {
            Storage::delete($this->selected->document);
            $this->selected->delete();

            return $this->redirect(route("backoffice.notes_service"), navigate: true);
        }

        return;
    }

    public function render()
    {
        $notesservices = $this->search ?
            NoteService::where('reference', 'like', '%'. $this->search .'%')
                ->orWhere('description', 'like', '%'. $this->search .'%')->paginate($this->perPage)
            : NoteService::paginate($this->perPage);

        return view('livewire.backoffice.textes.notes-service.index', [
            "notesservices" => $notesservices
        ])->extends("livewire.layouts.backoffice");
    }
}

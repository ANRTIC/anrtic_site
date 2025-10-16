<?php

namespace App\Livewire\Backoffice\Textes\NotesService;

use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\NoteService;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public NoteService $noteservice;
    public $reference;
    public $description;
    public $adopted_at;
    public $published_at;
    #[Validate('file')]
    public $newDocument;
    public $is_online;

    public function mount($id)
    {
        $this->noteservice = NoteService::findOrFail($id);
        $this->reference = $this->noteservice->reference;
        $this->description = $this->noteservice->description;
        $this->adopted_at = $this->noteservice->adopted_at->format('Y-m-d');
        $this->published_at = $this->noteservice->published_at->format('Y-m-d');
        $this->is_online = $this->noteservice->is_online;
    }

    public function save()
    {
        $validatedData = $this->validate([
            "reference" => "required",
            "description" => "required",
            "adopted_at" => 'required|date',
            "published_at" => 'required|date',
            "newDocument" => "nullable|file|mimes:pdf,doc,docx",
            "is_online" => "boolean"
        ], [
            "reference.required" => "La référence est obligatoire",
            "description.required" => "La description est obligatoire",
            "adopted_at.required" => "La date d'adoption est obligatoire",
            "published_at.required" => "La date de publication est obligatoire",
            "adopted_at.date" => "Veuillez choisir une date valide",
            "published_at.date" => "Veuillez choisir une date valide",
            "newDocument.file" => "Le document n'est pas valide",
            "newDocument.mimes" => "Le document doit être au format PDF, DOC ou DOCX",
        ]);

        if ($this->newDocument) {
            Storage::delete($this->noteservice->document);
            $validatedData["document"] = Storage::put("/media/notes_service", $this->newDocument);
        } else {
            $validatedData["document"] = $this->noteservice->document;
        }

        $this->noteservice->update($validatedData);
        return $this->redirect(route("backoffice.notes_service"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.textes.notes-service.edit')
                ->extends("livewire.layouts.backoffice");
    }
}

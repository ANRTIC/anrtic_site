<?php

namespace App\Livewire\Backoffice\Textes\NotesService;

use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\NoteService;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;

    public $reference;
    public $description;
    public $adopted_at;
    public $published_at;
    #[Validate('file')]
    public $document;
    public $is_online = true;

    public function save()
    {
        $validatedData = $this->validate([
            "reference" => "required",
            "description" => "required",
            "adopted_at" => 'required|date',
            "published_at" => 'required|date',
            "document" => "nullable|file|mimes:pdf,doc,docx",
            "is_online" => "boolean"
        ], [
            "reference.required" => "La référence est obligatoire",
            "description.required" => "La description est obligatoire",
            "adopted_at.required" => "La date d'adoption est obligatoire",
            "published_at.required" => "La date de publication est obligatoire",
            "adopted_at.date" => "Veuillez choisir une date valide",
            "published_at.date" => "Veuillez choisir une date valide",
            "document.file" => "Le document n'est pas valide",
            "document.mimes" => "Le document doit être au format PDF, DOC ou DOCX",
        ]);

        $validatedData["document"] = Storage::put("/media/notes_service", $this->document);
        NoteService::create($validatedData);

        return $this->redirect(route("backoffice.notes_service"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.textes.notes-service.create')
                ->extends("livewire.layouts.backoffice");
    }
}

<?php

namespace App\Livewire\Backoffice\Textes\Avisdecisions;

use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\AvisDecision;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public AvisDecision $avisdecision;
    public $reference;
    public $description;
    public $adopted_at;
    public $published_at;
    #[Validate('file')]
    public $newDocument;
    public $is_online;

    public function mount($id)
    {
        $this->avisdecision = AvisDecision::findOrFail($id);
        $this->reference = $this->avisdecision->reference;
        $this->description = $this->avisdecision->description;
        $this->adopted_at = $this->avisdecision->adopted_at->format('Y-m-d');
        $this->published_at = $this->avisdecision->published_at->format('Y-m-d');
        $this->is_online = $this->avisdecision->is_online;
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
            "document.file" => "Le document n'est pas valide",
            "document.mimes" => "Le document doit être au format PDF, DOC ou DOCX",
        ]);

        if ($this->newDocument) {
            Storage::delete($this->avisdecision->document);
            $validatedData["document"] = Storage::put("/media/avis_decisions", $this->newDocument);
        } else {
            $validatedData["document"] = $this->avisdecision->document;
        }

        $this->avisdecision->update($validatedData);
        return $this->redirect(route("backoffice.avis-decisions"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.textes.avisdecisions.edit')
                ->extends("livewire.layouts.backoffice");
    }
}

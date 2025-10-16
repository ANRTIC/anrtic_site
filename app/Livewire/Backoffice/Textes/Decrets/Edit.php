<?php

namespace App\Livewire\Backoffice\Textes\Decrets;

use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Decret;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public Decret $decret;
    public $reference;
    public $description;
    public $adopted_at;
    public $published_at;
    #[Validate('file')]
    public $newDocument;
    public $is_online;

    public function mount($id)
    {
        $this->decret = Decret::findOrFail($id);
        $this->reference = $this->decret->reference;
        $this->description = $this->decret->description;
        $this->adopted_at = $this->decret->adopted_at->format('Y-m-d');
        $this->published_at = $this->decret->published_at->format('Y-m-d');
        $this->is_online = $this->decret->is_online;
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
            Storage::delete($this->decret->document);
            $validatedData["document"] = Storage::put("/media/decrets", $this->newDocument);
        } else {
            $validatedData["document"] = $this->decret->document;
        }

        $this->decret->update($validatedData);
        return $this->redirect(route("backoffice.decrets"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.textes.decrets.edit')
                ->extends("livewire.layouts.backoffice");
    }
}

<?php

namespace App\Livewire\Backoffice\Textes\Arretes;

use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Arrete;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public Arrete $arrete;
    public $reference;
    public $description;
    public $adopted_at;
    public $published_at;
    #[Validate('file')]
    public $newDocument;
    public $is_online;

    public function mount($id)
    {
        $this->arrete = Arrete::findOrFail($id);
        $this->reference = $this->arrete->reference;
        $this->description = $this->arrete->description;
        $this->adopted_at = $this->arrete->adopted_at->format('Y-m-d');
        $this->published_at = $this->arrete->published_at->format('Y-m-d');
        $this->is_online = $this->arrete->is_online;
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
            Storage::delete($this->arrete->document);
            $validatedData["document"] = Storage::put("/media/arretes", $this->newDocument);
        } else {
            $validatedData["document"] = $this->arrete->document;
        }

        $this->arrete->update($validatedData);
        return $this->redirect(route("backoffice.arretes"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.textes.arretes.edit')
                ->extends("livewire.layouts.backoffice");
    }
}

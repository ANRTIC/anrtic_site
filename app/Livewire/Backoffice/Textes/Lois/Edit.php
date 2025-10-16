<?php

namespace App\Livewire\Backoffice\Textes\Lois;

use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Loi;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public Loi $loi;
    public $reference;
    public $description;
    public $adopted_at;
    public $published_at;
    #[Validate('file')]
    public $newDocument;
    public $is_online;

    public function mount($id)
    {
        $this->loi = Loi::findOrFail($id);
        $this->reference = $this->loi->reference;
        $this->description = $this->loi->description;
        $this->adopted_at = $this->loi->adopted_at->format('Y-m-d');
        $this->published_at = $this->loi->published_at->format('Y-m-d');
        $this->is_online = $this->loi->is_online;
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
            Storage::delete($this->loi->document);
            $validatedData["document"] = Storage::put("/media/lois", $this->newDocument);
        } else {
            $validatedData["document"] = $this->loi->document;
        }

        $this->loi->update($validatedData);
        return $this->redirect(route("backoffice.lois"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.textes.lois.edit')
                ->extends("livewire.layouts.backoffice");
    }
}

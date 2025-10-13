<?php

namespace App\Livewire\Backoffice\Gestion\Communiques;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;
use App\Models\Communique;
use App\Models\Categorie;
use Livewire\WithFileUploads;

#[Layout('livewire.layouts.backoffice')] 
class Edit extends Component
{
    use WithFileUploads;

    public Communique $communique;
    #[Validate('image')]
    public $newThumbnail;
    public $title;
    public $publication_date;
    public $short_description;
    public $category_id;
    public $content;
    public $is_online;

    public function mount($id) 
    {
        $this->communique = Communique::findorFail($id);
        $this->title = $this->communique->title;
        $this->publication_date = $this->communique->publication_date;
        $this->short_description = $this->communique->short_description;
        $this->category_id = $this->communique->category_id;
        $this->content = $this->communique->content;
        $this->is_online = $this->communique->is_online;
    }

    public function save() 
    {
        $validatedData = $this->validate([
            "newThumbnail" => "nullable|image|mimes:jpeg,png,jpg|max:5120",
            "title" => "required",
            "publication_date" => "required|date",
            "short_description" => "required",
            "category_id" => "required",
            "content" => "required",
            "is_online" => "boolean"
        ], [
            "newThumbnail.image" => "Le fichier doit être une image",
            "newThumbnail.mimes" => "L'image doit être au format JPEG, PNG ou JPG",
            "newThumbnail.max" => "L'image ne doit pas dépasser 5 Mo",
            "title.required" => "Le titre est obligatoire",
            "publication_date.required" => "La date de publication est obligatoire",
            "publication_date.date" => "La date de publication doit être une date valide",
            "short_description.required" => "La description courte est obligatoire",
            "category_id.required" => "La catégorie est obligatoire",
            "content.required" => "Le contenu est obligatoire",
        ]);

        if ($this->newThumbnail) {
            Storage::delete($this->communique->thumbnail);
            $validatedData["thumbnail"] = Storage::put("/media/communiques", $this->newThumbnail);
        } else {
            $validatedData["thumbnail"] = $this->communique->thumbnail;
        }

        $this->communique->update($validatedData);
        return $this->redirect(route("backoffice.communiques"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.gestion.communiques.edit', [
            "categories" => Categorie::where("is_active", true)->get()
        ]);
    }
}

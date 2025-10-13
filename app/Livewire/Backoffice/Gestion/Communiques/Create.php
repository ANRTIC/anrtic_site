<?php

namespace App\Livewire\Backoffice\Gestion\Communiques;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;
use App\Models\Categorie;
use App\Models\Communique;

#[Layout('livewire.layouts.backoffice')] 
class Create extends Component
{
    use WithFileUploads;

    #[Validate('image')]
    public $thumbnail;
    public $title;
    public $publication_date;
    public $short_description;
    public $category_id;
    public $content;
    public $is_online = true;

    public function mount()
    {
        $this->publication_date = now()->format("Y-m-d");
    }

    public function save()
    {
        $validatedData = $this->validate([
            "thumbnail" => "required|image|mimes:jpeg,png,jpg|max:5120",
            "title" => "required",
            "publication_date" => "required|date|after_or_equal:today",
            "short_description" => "required",
            "category_id" => "required",
            "content" => "required",
            "is_online" => "boolean"
        ], [
            "thumbnail.required" => "L'image de couverture est obligatoire",
            "thumbnail.image" => "Le fichier doit être une image",
            "thumbnail.mimes" => "L'image doit être au format JPEG, PNG ou JPG",
            "thumbnail.max" => "L'image ne doit pas dépasser 5 Mo",
            "title.required" => "Le titre est obligatoire",
            "publication_date.required" => "La date de publication est obligatoire",
            "publication_date.date" => "La date de publication doit être une date valide",
            "publication_date.after_or_equal" => "La date de publication ne peut pas être antérieure à aujourd'hui",
            "short_description.required" => "La description courte est obligatoire",
            "category_id.required" => "La catégorie est obligatoire",
            "content.required" => "Le contenu est obligatoire",
        ]);

        $validatedData["thumbnail"] = Storage::put("/media/communiques", $this->thumbnail);
        Communique::create($validatedData);

        return $this->redirect(route("backoffice.communiques"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.gestion.communiques.create', [
            "categories" => Categorie::where("is_active", true)->get()
        ]);
    }
}

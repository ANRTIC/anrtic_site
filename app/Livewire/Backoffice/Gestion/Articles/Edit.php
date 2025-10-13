<?php

namespace App\Livewire\Backoffice\Gestion\Articles;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use App\Models\Categorie;
use Livewire\WithFileUploads;

#[Layout('livewire.layouts.backoffice')] 
class Edit extends Component
{
    use WithFileUploads;

    public Article $article;
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
        $this->article = Article::findorFail($id);
        $this->title = $this->article->title;
        $this->publication_date = $this->article->publication_date;
        $this->short_description = $this->article->short_description;
        $this->category_id = $this->article->category_id;
        $this->content = $this->article->content;
        $this->is_online = $this->article->is_online;
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
            Storage::delete($this->article->thumbnail);
            $validatedData["thumbnail"] = Storage::put("/media/articles", $this->newThumbnail);
        } else {
            $validatedData["thumbnail"] = $this->article->thumbnail;
        }
        
        $this->article->update($validatedData);
        return $this->redirect(route("backoffice.articles"), navigate: true);

    }

    public function render()
    {
        return view('livewire.backoffice.gestion.articles.edit', [
            "categories" => Categorie::where("is_active", true)->get()
        ]);
    }
}

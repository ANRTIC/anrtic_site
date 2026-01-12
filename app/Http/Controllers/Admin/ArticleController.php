<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;

class ArticleController extends Controller
{
    public function create() 
    {
        return view('livewire.backoffice.gestion.articles.create', [
            "categories" => Categorie::where("is_active", true)->get()
        ]);
    }

    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            "thumbnail" => "required|image|mimes:jpeg,png,jpg|max:5120",
            "title" => "required",
            "publication_date" => "required|date",
            "short_description" => "required",
            "category_id" => "required",
            "content" => "required",
        ], [
            "thumbnail.required" => "L'image de couverture est obligatoire",
            "thumbnail.image" => "Le fichier doit être une image",
            "thumbnail.mimes" => "L'image doit être au format JPEG, PNG ou JPG",
            "thumbnail.max" => "L'image ne doit pas dépasser 5 Mo",
            "title.required" => "Le titre est obligatoire",
            "publication_date.required" => "La date de publication est obligatoire",
            "publication_date.date" => "La date de publication doit être une date valide",
            "short_description.required" => "La description courte est obligatoire",
            "category_id.required" => "La catégorie est obligatoire",
            "content.required" => "Le contenu est obligatoire",
        ]);

        $validatedData["is_online"] = $request->has("is_online");

        $validatedData["thumbnail"] = Storage::put("/media/articles", $request->file("thumbnail"));
        Article::create($validatedData);

        return redirect()->route("backoffice.articles");

    }

    public function edit(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        return view('livewire.backoffice.gestion.articles.edit', [
            "article" => $article,
            "categories" => Categorie::where("is_active", true)->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $validatedData = $request->validate([
            "thumbnail" => "nullable|image|mimes:jpeg,png,jpg",
            "title" => "required",
            "publication_date" => "required|date",
            "short_description" => "required",
            "category_id" => "required",
            "content" => "required",
        ], [
            "thumbnail.image" => "Le fichier doit être une image",
            "thumbnail.mimes" => "L'image doit être au format JPEG, PNG ou JPG",
            "title.required" => "Le titre est obligatoire",
            "publication_date.required" => "La date de publication est obligatoire",
            "publication_date.date" => "La date de publication doit être une date valide",
            "short_description.required" => "La description courte est obligatoire",
            "category_id.required" => "La catégorie est obligatoire",
            "content.required" => "Le contenu est obligatoire",
        ]);

        $validatedData["is_online"] = $request->has("is_online");
        if ($request->has("thumbnail")) {
            Storage::delete($article->thumbnail);
            $validatedData["thumbnail"] = Storage::put("/media/articles", $request->file("thumbnail"));
        }
        $article->update($validatedData);
        return redirect()->route("backoffice.articles");
    }
}

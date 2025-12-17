<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\EtudeEnquete;
use Illuminate\Support\Facades\Storage;

class EtudeEnqueteController extends Controller
{
    public function create()
    {

        return view("livewire.backoffice.informations.etudes-enquetes.create", [
            "categories" => Categorie::where("is_active", true)->get()
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            "thumbnail" => "nullable|image|mimes:jpeg,png,jpg|max:5120",
            "title" => "required",
            "category_id" => "nullable",
            "publication_date" => "required|date",
            "short_description" => "required",
            "content" => "required",
        ], [
            "thumbnail.image" => "Le fichier doit être une image",
            "thumbnail.mimes" => "L'image doit être au format JPEG, PNG ou JPG",
            "thumbnail.max" => "L'image ne doit pas dépasser 5 Mo",
            "title.required" => "Le titre est obligatoire",
            "publication_date.required" => "La date limite est obligatoire",
            "publication_date.date" => "La date n'est pas valide",
            "short_description.required" => "La description courte est obligatoire",
            "content.required" => "Le contenu est obligatoire" 
        ]);

        $validatedData["is_online"] = $request->has("is_online");
        if ($request->hasFile("thumbnail")) {
            $validatedData["thumbnail"] = Storage::put("/media/etudes_enquetes", $request->file("thumbnail"));
        }

        EtudeEnquete::create($validatedData);

        return redirect()->route("backoffice.etudes-enquetes");
    }

    public function edit(Request $request, $id)
    {
        $etude_enquete = EtudeEnquete::findOrFail($id);

        return view("livewire.backoffice.informations.etudes-enquetes.edit", [
            "etude_enquete" => $etude_enquete,
            "categories" => Categorie::where("is_active", true)->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        $etude_enquete = EtudeEnquete::findOrFail($id);
        $validatedData = $request->validate([
            "thumbnail" => "nullable|image|mimes:jpeg,png,jpg|max:5120",
            "title" => "required",
            "category_id" => "nullable",
            "publication_date" => "required|date",
            "short_description" => "required",
            "content" => "required",
        ], [
            "thumbnail.image" => "Le fichier doit être une image",
            "thumbnail.mimes" => "L'image doit être au format JPEG, PNG ou JPG",
            "thumbnail.max" => "L'image ne doit pas dépasser 5 Mo",
            "title.required" => "Le titre est obligatoire",
            "publication_date.required" => "La date limite est obligatoire",
            "publication_date.date" => "La date n'est pas valide",
            "short_description.required" => "La description courte est obligatoire",
            "content.required" => "Le contenu est obligatoire" 
        ]);

        $validatedData["is_online"] = $request->has("is_online");
        if ($request->hasFile("thumbnail")) {
            if ($etude_enquete->thumbnail && Storage::exists($etude_enquete->thumbnail)) {
                Storage::delete($etude_enquete->thumbnail);
            }
            $validatedData["thumbnail"] = Storage::put("/media/etudes_enquetes", $request->file("thumbnail"));
        }
        $etude_enquete->update($validatedData);

        return redirect()->route("backoffice.etudes-enquetes");
    }

}

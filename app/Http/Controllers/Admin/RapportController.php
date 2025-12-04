<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Rapport;
use Illuminate\Support\Facades\Storage;

class RapportController extends Controller
{
    public function create()
    {
        
        return view("livewire.backoffice.informations.rapports.create", [
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
            $validatedData["thumbnail"] = Storage::put("/media/rapports", $request->file("thumbnail"));
        }

        Rapport::create($validatedData);

        return redirect()->route("backoffice.rapports");

    }

    public function edit(Request $request, $id)
    {
        $rapport = Rapport::findOrFail($id);

        return view("livewire.backoffice.informations.rapports.edit", [
            "rapport" => $rapport,
            "categories" => Categorie::where("is_active", true)->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        $rapport = Rapport::findOrFail($id);
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
            if ($rapport->thumbnail && Storage::exists($rapport->thumbnail)) {
                Storage::delete($rapport->thumbnail);
            }
            $validatedData["thumbnail"] = Storage::put("/media/rapports", $request->file("thumbnail"));
        }
        $rapport->update($validatedData);

        return redirect()->route("backoffice.rapports");
    }

}

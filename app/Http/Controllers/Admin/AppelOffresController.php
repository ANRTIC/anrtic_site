<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;
use App\Models\AppelOffres;

class AppelOffresController extends Controller
{
    public function create()
    {

        return view("livewire.backoffice.informations.appel-offres.create", [
            "categories" => Categorie::where("is_active", true)->get()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "thumbnail" => "nullable|image|mimes:jpeg,png,jpg|max:5120",
            "title" => "required",
            "category_id" => "nullable",
            "deadline" => "required|date",
            "short_description" => "required",
            "content" => "required",
        ], [
            "thumbnail.image" => "Le fichier doit être une image",
            "thumbnail.mimes" => "L'image doit être au format JPEG, PNG ou JPG",
            "thumbnail.max" => "L'image ne doit pas dépasser 5 Mo",
            "title.required" => "Le titre est obligatoire",
            "deadline.required" => "La date limite est obligatoire",
            "deadline.date" => "La date n'est pas valide",
            "short_description.required" => "La description courte est obligatoire",
            "content.required" => "Le contenu est obligatoire"
        ]);

        $validatedData["is_online"] = $request->has("is_online");
        if ($request->hasFile("thumbnail")) {
            $validatedData["thumbnail"] = Storage::put("/media/appel_offres", $request->file("thumbnail"));
        }

        AppelOffres::create($validatedData);

        return redirect()->route("backoffice.appeloffres");
    }

    public function edit(Request $request, $id)
    {
        $appeloffres = AppelOffres::findOrFail($id);

        return view("livewire.backoffice.informations.appel-offres.edit", [
            "appeloffres" => $appeloffres,
            "categories" => Categorie::where("is_active", true)->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        $appeloffres = AppelOffres::findOrFail($id);
        $validatedData = $request->validate([
            "thumbnail" => "nullable|image|mimes:jpeg,png,jpg|max:5120",
            "title" => "required",
            "category_id" => "nullable",
            "deadline" => "required|date",
            "short_description" => "required",
            "content" => "required",
        ], [
            "thumbnail.image" => "Le fichier doit être une image",
            "thumbnail.mimes" => "L'image doit être au format JPEG, PNG ou JPG",
            "thumbnail.max" => "L'image ne doit pas dépasser 5 Mo",
            "title.required" => "Le titre est obligatoire",
            "deadline.required" => "La date limite est obligatoire",
            "deadline.date" => "La date n'est pas valide",
            "short_description.required" => "La description courte est obligatoire",
            "content.required" => "Le contenu est obligatoire" 
        ]);

        $validatedData["is_online"] = $request->has("is_online");
        if ($request->hasFile("thumbnail")) {
            if ($appeloffres->thumbnail && Storage::exists($appeloffres->thumbnail)) {
                Storage::delete($appeloffres->thumbnail);
            }
            $validatedData["thumbnail"] = Storage::put("/media/appel_offres", $request->file("thumbnail"));
        }
        $appeloffres->update($validatedData);

        return redirect()->route("backoffice.appeloffres");        
    }

}

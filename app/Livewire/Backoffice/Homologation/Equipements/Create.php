<?php

namespace App\Livewire\Backoffice\Homologation\Equipements;

use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Equipement;
use App\Models\PhotoEquipement;
use App\Models\CategorieEquipement;
use App\Models\Marque;
use App\Models\Certificat;
use App\Models\Demandeur;
use App\Models\Representant;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;

    public $step = 1;
    // Identifications du demandeur;
    public Demandeur $demandeur;
    public $demandeur_id;
    // Identifications du produit
    public $designation;
    public $modele;
    public $category_id;
    public $marque_id;
    public $photos = [];
    public $statut;
    public $statut_choices = [
        "Homologué",
        "Non homologué",
        "En cours d'homologation"
    ];
    // Identifications de certifications
    public $numero;
    public $date_emission;
    public $document;

    public function firstStep()
    {
        if ($this->step == 1) {
            $this->validate([
                'demandeur_id' => 'required|exists:demandeurs,id', 
            ], [
                'demandeur_id.required' => 'La sélection du demandeur est obligatoire',
                'demandeur_id.exists' => 'Le demandeur sélectionné n\'existe pas.',
            ]);

            $this->demandeur = Demandeur::findOrFail($this->demandeur_id);
            $this->step++;
        }

        return;
    }

    public function secondStep()
    {
        if ($this->step == 2) {
            $this->validate([
                'designation' => 'required',
                'modele' => 'required',
                'category_id' => 'required',
                'marque_id' => 'required',
                'photos' => 'required|array|min:1',
                'photos.*' => 'mimes:jpeg,jpg,png,webp,avif|max:10240',
            ], [
                'designation' => 'La désignation est obligatoire',
                'modele' => 'Le modèle est obligatoire',
                'category_id' => 'La catégorie est obligatoire',
                'marque_id' => 'La marque est obligatoire',
                'photos.required' => 'Il est nécessaire de téléverser au moins une photo',
                'photos.array' => 'Les photos doivent être un tableau',
                'photos.min' => 'Vous devez télécharger au moins une photo',
                'photos.*.mimes' => 'Chaque fichier doit être une image valide (jpeg, jpg, png, webp, avif)',
                'photos.*.max' => 'Chaque image ne doit pas dépasser 10 Mo'
            ]);

            $this->step++;
        }

        return;
    }

    public function previousStep()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function save()
    {
        $this->validate([
            'statut' => 'required',
            'numero' => 'nullable|required_if:statut,'.$this->statut_choices[0],
            'date_emission' => 'nullable|required_if:statut,'.$this->statut_choices[0].'|date',
            'document' => 'nullable|required_if:statut,'.$this->statut_choices[0].'|file|mimes:pdf,jpg,jpeg,png',
        ], [
            'statut.required' => 'Veuillez faire un choix',
            'numero.required_if' => 'Le numéro de certification est requis lorsque l\'équipement est homologué',
            'date_emission.required_if' => 'La date d\'émission est requise lorsque l\'équipement est homologué',
            'date_emission.date' => 'La date d\'émission doit être une date valide',
            'document.required_if' => 'Le document est requis lorsque l\'équipement est homologué',
            'document.file' => 'Le document doit être un fichier valide',
            'document.mimes' => 'Le document doit être au format: pdf, jpeg, jpg ou png',
        ]);

        // Enregistrement de l'équipement
        $equipement = Equipement::create([
            "designation" => $this->designation,
            "modele" => $this->modele,
            "statut" => $this->statut,
            "category_id" => $this->category_id,
            "marque_id" => $this->marque_id,
            "demandeur_id" => $this->demandeur->id
        ]);

        if ($this->statut === $this->statut_choices[0]) {
            // Enregistrement du certificat
            $certificat = Certificat::create([
                "numero" => $this->numero,
                "date_emission" => $this->date_emission,
                "document" => Storage::put("/media/certificats", $this->document),
                "equipement_id" => $equipement->id
            ]);
        }

        // Enregistrement des photos de l'équipement
        foreach($this->photos as $photo) {
            PhotoEquipement::create([
                "url" => Storage::put("/media/photos_equipements", $photo),
                "equipement_id" => $equipement->id
            ]);
        }

        return $this->redirect(route("backoffice.homologation.equipements"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.homologation.equipements.create', [
            "demandeurs" => Demandeur::all(),
            "categories" => CategorieEquipement::all(),
            "marques" => Marque::all()
        ])->extends('livewire.layouts.backoffice');
    }
}

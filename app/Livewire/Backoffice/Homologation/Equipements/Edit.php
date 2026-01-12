<?php

namespace App\Livewire\Backoffice\Homologation\Equipements;

use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Demandeur;
use App\Models\CategorieEquipement;
use App\Models\Marque;
use App\Models\Equipement;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public Equipement $equipement;
    public $step = 1;
    // Identifications du demandeur
    public Demandeur $demandeur;
    public $demandeur_id;
    // Identifications du produit
    public $designation;
    public $modele;
    public $category_id;
    public $marque_id;
    public $photos = [];
    public $old_statut;
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

    public function mount($id) 
    {
        $this->equipement = Equipement::findOrFail($id);  
        $this->demandeur_id = $this->equipement->demandeur->id;     
        $this->designation = $this->equipement->designation;
        $this->modele = $this->equipement->modele;
        $this->category_id = $this->equipement->category_id;
        $this->marque_id = $this->equipement->marque_id;
        $this->old_statut = $this->equipement->statut;
        $this->statut = $this->equipement->statut;
        $this->numero = $this->equipement->certificat?->numero;
        $this->date_emission = $this->equipement->certificat?->date_emission;
    }

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
    }

    public function secondStep()
    {
        if ($this->step == 2) {
            $this->validate([
                'designation' => 'required',
                'modele' => 'required',
                'category_id' => 'required',
                'marque_id' => 'required',
                'photos' => 'nullable|array',
                'photos.*' => 'mimes:jpeg,jpg,png,webp,avif|max:10240',
            ], [
                'designation' => 'La désignation est obligatoire',
                'modele' => 'Le modèle est obligatoire',
                'category_id' => 'La catégorie est obligatoire',
                'marque_id' => 'La marque est obligatoire',
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
            'document' => [
                'file',
                'mimes:pdf,jpg,jpeg,png',
                function ($attribute, $value, $fail) {
                    if (
                        $this->old_statut !== $this->statut_choices[0]
                        && trim($this->statut) == $this->statut_choices[0]
                        && !$value
                    ) {
                        $fail('Le document est requis lorsque l\'équipement est homologué');
                    }
                },
                'nullable'
            ],
        ], [
            'statut.required' => 'Veuillez faire un choix',
            'numero.required_if' => 'Le numéro de certification est requis lorsque l\'équipement est homologué',
            'date_emission.required_if' => 'La date d\'émission est requise lorsque l\'équipement est homologué',
            'date_emission.date' => 'La date d\'émission doit être une date valide',
            'document.file' => 'Le document doit être un fichier valide',
            'document.mimes' => 'Le document doit être au format: pdf, jpeg, jpg ou png',
        ]);

        // Mise à jour des informations de l'équipement
        $this->equipement->update([
            "designation" => $this->designation,
            "modele" => $this->modele,
            "statut" => $this->statut,
            "category_id" => $this->category_id,
            "marque_id" => $this->marque_id,
            "demandeur_id" => $this->demandeur->id
        ]);

        // Mise à jour des informations de certification
        if ($this->statut === $this->statut_choices[0]) {
            $data = [
                "numero" => $this->numero,
                "date_emission" => $this->date_emission,
            ];

            if ($this->document) {
                // Suppression de l'ancien document si présent
                if ($this->equipement->certificat?->document) {
                    Storage::delete($this->equipement->certificat->document);
                }

                $data["document"] = Storage::put("/media/certificats", $this->document);
            }

            $this->equipement->certificat()->updateOrCreate($data);

        } else {
            if ($this->equipement->certificat) {
                if ($this->equipement->certificat->document) {
                    Storage::delete($this->equipement->certificat->document);
                }
                $this->equipement->certificat->delete();
            }
        }

        // Enregistrement des photos de l'équipement
        if (!empty($this->photos)) {
            foreach ($this->equipement->photos as $photo) {
                Storage::delete($photo->url);
                $photo->delete();
            }

            foreach ($this->photos as $photo) {
                $this->equipement->photos()->create([
                    "url" => Storage::put("/media/photos_equipements", $photo),
                ]);
            }
        }

        return $this->redirect(route("backoffice.homologation.equipements.informations", $this->equipement->id), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.homologation.equipements.edit', [
            "demandeurs" => Demandeur::all(),
            "categories" => CategorieEquipement::all(),
            "marques" => Marque::all()
        ])->extends('livewire.layouts.backoffice');
    }
}

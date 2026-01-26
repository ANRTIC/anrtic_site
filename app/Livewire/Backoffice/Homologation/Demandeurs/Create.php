<?php

namespace App\Livewire\Backoffice\Homologation\Demandeurs;

use Livewire\Component;
use App\Models\Demandeur;
use App\Models\Representant;

class Create extends Component
{
    // Identifications du demandeur
    public $d_nom_complet;
    public $d_adresse;
    public $d_email;
    public $d_telephone;
    // Identifications du représentant
    public $r_nom_complet;
    public $r_adresse;
    public $r_email;
    public $r_telephone;
    public bool $has_representative = false;

    public function save()
    {
        $validatedData = $this->validate([
            'd_nom_complet' => 'required',
            'd_adresse' => 'required',
            'd_email' => 'required|email',
            'd_telephone' => 'required',

            'r_nom_complet' => 'nullable|required_if:has_representative,true',
            'r_adresse' => 'nullable|required_if:has_representative,true',
            'r_email' => 'nullable|required_if:has_representative,true|email',
            'r_telephone' => 'nullable|required_if:has_representative,true',
        ], [
            'd_nom_complet.required' => 'Le nom complet du demandeur est obligatoire',
            'd_adresse.required' => 'L\'adresse du demandeur est obligatoire',
            'd_email.required' => 'L\'adresse email du demandeur est obligatoire',
            'd_email.email' => 'L\'adresse email n\'est pas valide',
            'd_telephone' => 'Le numéro de téléphone du demandeur est obligatoire',

            'r_nom_complet.required_if' => 'Le nom complet du représentant est obligatoire',
            'r_adresse.required_if' => 'L\'adresse du représentant est obligatoire',
            'r_email.required_if' => 'L\'adresse email du représentant est obligatoire',
            'r_email.email' => 'L\'adresse email n\'est pas valide',
            'r_telephone.required_if' => 'Le numéro de téléphone du représentant est obligatoire',
        ]);

        $demandeur = Demandeur::create([
            "nom_complet" => $this->d_nom_complet,
            "adresse" => $this->d_adresse,
            "email" => $this->d_email,
            "telephone" => $this->d_telephone
        ]);

        $reprensentant = Representant::create([
            "nom_complet" => $this->r_nom_complet,
            "adresse" => $this->r_adresse,
            "email" => $this->r_email,
            "telephone" => $this->r_telephone,
            "demandeur_id" => $demandeur->id 
        ]);

        return $this->redirect(route("backoffice.homologation.demandeurs"), navigate: true);
    }

    public function render()
    {
        return view('livewire.backoffice.homologation.demandeurs.create')
                ->extends("livewire.layouts.backoffice");;
    }
}

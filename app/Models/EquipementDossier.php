<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipementDossier extends Model
{
    protected $fillable = [
        "dossier_id",
        "marque_id",
        "designation",
        "modele",
        "description",
        "quantite",
        "pays"
    ];

    public function photos() 
    {
        return $this->hasMany(PhotoEquipement::class, "equipement_dossier_id");
    }

    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }
}

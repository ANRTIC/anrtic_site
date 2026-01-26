<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Representant;
use App\Models\Equipement;

class Demandeur extends Model
{
    protected $fillable = [
        "nom_complet",
        "adresse",
        "email",
        "telephone"
    ];

    public function representant()
    {
        return $this->hasOne(Representant::class);
    }

    public function equipements()
    {
        return $this->hasMany(Equipement::class);
    }

}

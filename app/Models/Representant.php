<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representant extends Model
{
    protected $fillable = [
        "nom_complet",
        "adresse",
        "email",
        "telephone",
        "demandeur_id"
    ];
}

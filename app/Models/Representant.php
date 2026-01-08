<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representant extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = [
        "nom_complet",
        "adresse",
        "email",
        "telephone",
        "demandeur_id"
    ];

    /**
     * Get the demandeur that this representant belongs to
     */
    public function demandeur()
    {
        return $this->belongsTo(Demandeur::class);
    }
}

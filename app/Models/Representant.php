<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representant extends Model
{
<<<<<<< HEAD
<<<<<<< HEAD
=======
    // Allow mass assignment for these fields
>>>>>>> main
=======
>>>>>>> origin/branch-homologation
    protected $fillable = [
        "nom_complet",
        "adresse",
        "email",
        "telephone",
        "demandeur_id"
    ];
<<<<<<< HEAD
<<<<<<< HEAD
=======

    /**
     * Get the demandeur that this representant belongs to
     */
    public function demandeur()
    {
        return $this->belongsTo(Demandeur::class);
    }
>>>>>>> main
=======
>>>>>>> origin/branch-homologation
}

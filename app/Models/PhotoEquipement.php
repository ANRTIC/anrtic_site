<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Equipement;

class PhotoEquipement extends Model
{
    protected $fillable = [
        "url",
        "equipement_id",
        "equipement_dossier_id"
    ];

    public function image()
    {
        return asset($this->url);
    }
}

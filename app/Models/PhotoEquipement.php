<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Equipement;

class PhotoEquipement extends Model
{
    protected $fillable = [
        "url",
        "equipement_id"
    ];

    public function equipement()
    {
        return $this->belongsTo(Equipement::class);
    }

    // Returns full URL to the photo in public/media/equipements
    public function image()
    {
        return url("media/equipements/{$this->url}");
    }
}

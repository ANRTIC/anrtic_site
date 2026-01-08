<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Equipement;
use Illuminate\Support\Facades\Storage;

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

    public function image()
    {
        return Storage::url($this->url);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> main

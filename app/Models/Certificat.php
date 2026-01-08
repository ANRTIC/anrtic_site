<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Certificat extends Model
{
    protected $fillable = [
        "numero",
        "date_emission",
        "document",
        "equipement_id"
    ];

    public function document()
    {
        return Storage::url($this->document);
    }

}

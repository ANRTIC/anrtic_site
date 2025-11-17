<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;

class FlashInfos extends Model
{
    protected $fillable = [
        "title", 
        "is_online",
        "category_id"
    ];

    protected $casts = [
        "is_online" => "boolean",
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, "category_id");
    }
    
}

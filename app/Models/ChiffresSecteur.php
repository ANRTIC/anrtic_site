<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ChiffresSecteur extends Model
{
    protected $fillable = [
        "icon",
        "label",
        "sector",
        "source",
        "is_online",
    ];

    protected $casts = [
        "is_online" => "boolean",
    ];

    public function iconURL()
    {
        return Storage::url($this->icon);
    }
}

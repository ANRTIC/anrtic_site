<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Operateur extends Model
{
    protected $fillable = [
        "logo",
        "name",
        "email",
        "phone",
        "website",
        "is_active"
    ];

    protected $casts = [
      "is_active" => "boolean"
    ];

    public function logoURL()
    {
        return Storage::url($this->logo);
    }
}

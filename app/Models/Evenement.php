<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $fillable = [
        "title",
        "object",
        "description",
        "date",
        "location",
        "is_online",
    ];

    protected $casts = [
        "is_online" => "boolean",
        "date" => "date",
    ];
}

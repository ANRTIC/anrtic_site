<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvisDecision extends Model
{
    protected $fillable = [
        "reference",
        "description",
        "document",
        "is_online",
        "published_at",
        "adopted_at"
    ];

    protected $casts = [
        "is_online" => "boolean",
    ];
}

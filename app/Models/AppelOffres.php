<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

class AppelOffres extends Model
{
    use Sluggable;
    
    protected $fillable = [
        "thumbnail",
        "title",
        "category_id",
        "deadline",
        "short_description",
        "content",
        "is_online"
    ];

    public function sluggable(): array
    {
        return [
            "slug" => [
                "source" => "title"
            ]
        ];
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, "category_id");
    }

    protected function deadline(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)
        );
    }
}

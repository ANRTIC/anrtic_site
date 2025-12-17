<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

class EtudeEnquete extends Model
{
    use Sluggable;
    
    protected $fillable = [
        "thumbnail",
        "title",
        "category_id",
        "publication_date",
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

    protected function publicationDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)
        );
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Communique extends Model
{
    use Sluggable;

    protected $fillable = [
        "title",
        "publication_date",
        "short_description",
        "content",
        "thumbnail",
        "is_online",
        "category_id",
    ];

    protected $casts = [
        "is_online" => "boolean",
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function thumbnail()
    {
        return Storage::url($this->thumbnail);
    }
}

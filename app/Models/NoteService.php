<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class NoteService extends Model
{
    use HasFactory;

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

    public function documentURL()
    {
        return Storage::url($this->document);
    }

    protected function adoptedAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)
        );
    }

    protected function publishedAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)
        );
    }

}

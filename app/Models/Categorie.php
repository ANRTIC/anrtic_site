<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FlashInfos;

class Categorie extends Model
{
    protected $fillable = ["name", "is_active"];
    protected $ordering = ["name"];

    protected $casts = [
        "is_active" => "boolean"
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('ordered', function ($builder) {
            $builder->orderBy('name');
        });
    }

    public function flashinfos()
    {
        return $this->hasMany(FlashInfos::class);
    }
}

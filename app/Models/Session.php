<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Session extends Model
{
    protected $table = "sessions";
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

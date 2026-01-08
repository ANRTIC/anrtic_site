<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Client;

class Dossier extends Model
{
    protected $fillable = [
        'client_id',
        'agent_id',
        'marque',
        'modele',
        'description',
        'quantity',
        'photo1',
        'photo2',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class Dossier extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "client_id",
        "agent_id",
    ];

    protected static function boot()
    {
        static::creating(function ($dossier) {
            DB::transaction(function () use ($dossier) {
                $year = date("Y");

                $lastNumero  = self::whereYear("created_at", $year)
                    ->orderBy("id", "desc")
                    ->value("numero");

                $next = $lastNumero  
                    ? intval(substr($lastNumero , -6)) + 1
                    : 1;

                $dossier->numero = $year . "-" . str_pad($next, 6, "0", STR_PAD_LEFT);
            });
        });
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class);
    }

    public function equipements()
    {
        return $this->hasMany(EquipementDossier::class, "dossier_id");
    }
}

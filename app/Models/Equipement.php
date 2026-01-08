<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use App\Models\PhotoEquipement;
use App\Models\CategorieEquipement;
use App\Models\Marque;
use App\Models\Certificat;

class Equipement extends Model
{
    protected $fillable = [
        "designation",
        "modele",
        "statut",
        "category_id",
        "marque_id",
        "demandeur_id"
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'modele',
        'statut',
        'certificat',
        'category_id',
        'marque_id',
        'demandeur_id',
>>>>>>> main
    ];

    public function demandeur()
    {
        return $this->belongsTo(Demandeur::class);
    }

    public function photos()
    {
        return $this->hasMany(PhotoEquipement::class);
    }

    public function categorie()
    {
        return $this->belongsTo(CategorieEquipement::class, "category_id");
    }

    public function marque()
    {
        return $this->belongsTo(Marque::class);
    }

<<<<<<< HEAD
    public function certificat()
    {
        return $this->hasOne(Certificat::class);
    }
=======
>>>>>>> main
}

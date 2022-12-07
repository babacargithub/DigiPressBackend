<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppelOffre extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
/*
 * $titre
 * $sousTitre
 * $contenu
 * $publieDans
 * $dateLimite
 * $domaine
 * $cahier
 * $prixCahier
 * $autorité
 * $adresseAutorite
 * ==>timestamps
 * ==>softdeletes
 * */
    protected $fillable = [
 "titre",
 "sous_titre",
 "contenu",
 "publie_dans",
 "date_limite",
 "domaine",
 "cahier",
 "prix_cahier",
 "autorite",
 "adresse_autorite",
    ];

//    protected $dateFormat = "d/M/Y H:i:s";
    protected $dates = [
        "date_limite"
    ];
    protected $casts =[
        'date_limite' => 'datetime:d-m-Y H:00',
    ];
}

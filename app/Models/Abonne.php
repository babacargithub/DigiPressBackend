<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Abonne extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $fillable = ["prenom","nom","telephone","type_abonne"];

    public function typeAbonne()
    {
        return $this->belongsTo(CategorieAbonne::class);

    }
    public function abonnement(): HasOne
    {
        return $this->hasOne(Abonnement::class);

    }
}

<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Abonne extends Model
{
    use CrudTrait;
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
    public function compte(): HasOne
    {
        return $this->hasOne(CompteAbonne::class);

    }
}

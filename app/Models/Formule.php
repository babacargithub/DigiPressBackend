<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Formule extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
protected $fillable = ["nom","prix","duree",];
    public function abonnements() : HasMany
    {
        return  $this->hasMany(Abonnement::class);
    }
}

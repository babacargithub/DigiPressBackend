<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Abonnement extends Model
{
    use HasFactory;
    protected $fillable = ["formule_id","abonne_id","date_expiration"];
    public function abonne() : BelongsTo
    {
        return  $this->belongsTo(Abonne::class);
    }
    public function formule() : BelongsTo
    {
        return  $this->belongsTo(Formule::class);
    }
}

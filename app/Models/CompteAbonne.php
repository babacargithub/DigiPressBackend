<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property integer $solde
 * @property Abonne $abonne
 */
class CompteAbonne extends AbstractCompte
{
    use HasFactory;
    protected $fillable = ["solde"];
    public function abonne(): BelongsTo
    {

        return $this->belongsTo(Abonne::class);
    }


    public function recharges(): HasMany
    {

        return $this->hasMany(RechargeCompte::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $solde
 * @property Abonne $abonne
 */
class CompteAbonne extends Model
{
    use HasFactory;
    public function abonne(): BelongsTo
    {

        return $this->belongsTo(Abonne::class);
    }

    public function augmenterSolde(int $montant) : CompteAbonne
    {
        $this->solde = $this->solde + $montant;
        return $this;
    }

    /**
     * @param int $montant
     * @return $this
     */
    public function diminuerSolde(int $montant) : CompteAbonne
    {
        $this->solde = $this->solde - $montant;
        return $this;
    }/**
     * @param int $montant
     * @return boolean
     */
    public function soldeDisponible(int $montant) : bool
    {
        return $this->solde >= $montant;
    }

}

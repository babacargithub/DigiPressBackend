<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @Property $solde integer
 */
abstract class AbstractCompte extends Model
{
    public function augmenterSolde(int $montant) : self
    {
        $this->solde = $this->solde + $montant;
        return $this;
    }

    /**
     * @param int $montant
     * @return $this
     */
    public function diminuerSolde(int $montant) : self
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AchatParution extends Model
{
    protected $table ="achats_parution";
    use HasFactory;
    /* @properties
     * abonne_id
     * parution_id
     * prix
     * commission_journal
     * date_achat
     * method_paiement
     */
protected $fillable = ["abonne_id","parution_id","prix","method_paiement"];
    public function parution(): BelongsTo
    {
        return $this->belongsTo(Parution::class);

} public function abonne(): BelongsTo
    {
        return $this->belongsTo(Abonne::class);

}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComptePartner extends AbstractCompte
{
    use HasFactory;
    protected $fillable = ["solde"];
    protected $primaryKey = "id";

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }
}

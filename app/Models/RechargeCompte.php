<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RechargeCompte extends Model
{
    use HasFactory;
    public function compte(): BelongsTo
    {
        return $this->belongsTo(CompteAbonne::class);
    }
}

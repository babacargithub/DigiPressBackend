<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComptePartner extends Model
{
    use HasFactory;
    protected $fillable = ["solde"];

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }
}

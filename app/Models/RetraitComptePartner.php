<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RetraitComptePartner extends Model
{
    use HasFactory;
    public function comptePartner() : BelongsTo{

        return $this->belongsTo(ComptePartner::class);
    }
}

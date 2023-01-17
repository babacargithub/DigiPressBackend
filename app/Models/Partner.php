<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Partner extends Model
{
    use CrudTrait;
    use HasFactory;
protected $fillable =["nom","email","telephone","journal_id"];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function journal(): BelongsTo
    {
        return $this->belongsTo(Journal::class);
    }
    public function compte(): HasOne
    {
        return $this->hasOne(ComptePartner::class);
    }

    public function getAchatsDuJour()
    {

        return $this->journal->achatsParution()->whereDate('created_at',today())->get();

    }

}

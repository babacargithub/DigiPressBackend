<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    /*
     * parution_id
     * numero
     * nom
     * */
    use HasFactory;
    protected $fillable = ["parution_id","numero","nom"];

    public function parution(): BelongsTo
    {
        return $this->belongsTo(Parution::class);
    }
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function getImageAttribute()
    {
        return $this->parution->image_la_une;
    }
}

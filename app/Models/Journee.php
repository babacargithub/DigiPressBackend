<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Journee extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
   /*
    * $dateLaUne
    * */
    use HasFactory;
    protected $fillable = ["date_parutions"];
    protected $casts = [
        "date_parutions"=>"date"
    ];

    public function parutions(): HasMany
    {
        return $this->hasMany(Parution::class);
    }
    public function getLabelAttribute(): string
    {
        return "Publications de la journée du " .$this->date_parutions->format("d-m-Y");
    }
}

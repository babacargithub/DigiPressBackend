<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    /*
     * nom String
     * */
    public function identifiableAttribute()
    {
        return "nom";
    }

    use HasFactory;
    protected $fillable = ["id","nom"];
}

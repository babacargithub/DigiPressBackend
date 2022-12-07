<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function getLabelAttribute(): string
    {
        return "Publications de la journée du " .$this->date_parutions->format("d-m-Y");
    }
}

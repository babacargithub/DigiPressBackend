<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Journal extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = ["nom","prix","logo","nombre_pages"];
    protected $identifiableAttribute = 'nom';

    public function setLogoAttribute($value)
    {

        $attribute_name = "logo";
        $disk = "public";
        $destination_path = "logos";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

    }

    public function parutions(): HasMany
    {
        return $this->hasMany(Parution::class);
    }
   public function achatsDuJour(){
       return  AchatParution::whereRelation('parution','journal_id', $this->id)
            ->whereDate("created_at", today())->get();
    }
    public function totalAchat($dateStart, $dateEnd){
       return  AchatParution::whereRelation('parution','journal_id', $this->id)
            ->whereDate("created_at",">=", $dateStart)
            ->whereDate("created_at","<=", $dateEnd)
           ->sum("prix");
    }
    public  function parutionDuJour() :? Model{

       return  $this->parutions()->whereDate('created_at', today())->first();

    }
    public  function parutionsDuMois(): Collection
    {

       return  $this->parutions()
           ->whereMonth('created_at', today()->format('m'))
           ->whereYear('created_at', today()->format('Y'))
           ->get();
    }
}

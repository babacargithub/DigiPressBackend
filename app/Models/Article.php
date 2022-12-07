<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use CrudTrait;
    /*
     * @properties
     * titre String
     * sous_titre String
     * image String
     * page_id Integer
     * contenu Text
     * themes Array
     * */
    use HasFactory;
    protected $fillable = ["titre","sous_titre","image","page_id","contenu","themes"];

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "images_articles";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

    }
}

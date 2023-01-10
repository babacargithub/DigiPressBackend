<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = ["titre","contenu","image"];
    public function setImageAttribute($value)
    {

        if (env("APP_ENV") != "testing") {
            $attribute_name = "image";
            $disk = "public";
            $destination_path = "images_a_la_une";
            $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
        } else {
            $this->attributes["image"] = $value;
        }

    }
}

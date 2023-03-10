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
    protected $fillable = ["parution_id","numero","nom","image"];

    public function parution(): BelongsTo
    {
        return $this->belongsTo(Parution::class);
    }
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }



    /**
     * @throws \Exception
     */
    public function setImageAttribute($file)
    {

        if ($file != null){
            $attribute_name = "image";
            $disk = "public";
            $destination_path = "images_pages";
            $new_file_name = md5($file->getClientOriginalName() . random_int(1, 9999) . time()) . '.' . $file->getClientOriginalExtension();
            $file_path = $file->storeAs($destination_path, $new_file_name, $disk);// 3. Save the complete path to the database
            $this->attributes[$attribute_name] = $file_path;
        }
//        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

    }
}

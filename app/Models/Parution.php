<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parution extends Model
{
    use CrudTrait;
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    /*
     * journal_id
     * journee_id
     * image_la_une
     * pages ManyToMany
     * */
    use HasFactory;
//    protected $identifiableAttribute = 'label';
    protected $fillable = ["journal_id", "journee_id","image_la_une"];
    public function journal(): BelongsTo
    {
        return $this->belongsTo(Journal::class);
    }
    public function journee(): BelongsTo
    {
        return $this->belongsTo(Journee::class);
    }
    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }
    public function setImageLaUneAttribute($file)
    {

        if (env("APP_ENV") != "testing") {
            $attribute_name = "image_la_une";
            $disk = "public";
            $destination_path = "images_a_la_une";
            $new_file_name = md5($file->getClientOriginalName().random_int(1, 9999).time()).'.'.$file->getClientOriginalExtension();

            $file_path = $file->storeAs($destination_path, $new_file_name, $disk);
            $this->attributes['image_la_une'] = $file_path;

        } else {
            $this->attributes["image_la_une"] = $file;
        }

    }


    public function achats(): HasMany
    {
        return  $this->hasMany(AchatParution::class);

    }

    public function isPurchased(): bool
    {
        $abonne_id = request()->header('client_id');
        return $this->achats()->where("abonne_id","=", $abonne_id)->first() !== null;
    }
    public function getIsPurchasedAttribute(): bool
    {
        return $this->isPurchased();
    }

    /**
     * Get the user's first name.
     *
     */
    protected function getLabelAttribute(): string
    {
        return "Parution de ".$this->journal->nom. " -le- ".  $this->created_at->format('d-m-Y');
    }
    protected $appends = ["label", "is_purchased"];

    public function createPages()
    {
        $pages =[];
        for($i=1; $i <= $this->journal->nombre_pages - 1; $i++){
            $page = new Page(["numero"=>$i+1, "nom"=> "Page "  . ($i + 1)]);
            $pages[] = $page;
        }
        $this->pages()->saveMany($pages);
    }

}

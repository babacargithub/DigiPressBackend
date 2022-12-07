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
    public function setImageLaUneAttribute($value)
    {

        $attribute_name = "image_la_une";
        $disk = "public";
        $destination_path = "images_a_la_une";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

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

    /**
     * Get the user's first name.
     *
     */
    protected function getLabelAttribute(): string
    {
        return "Parution de ".$this->journal->nom. " -le- ".  $this->created_at->format('d-m-Y');
    }
    protected $appends = ["label", "is_purchased"];

}

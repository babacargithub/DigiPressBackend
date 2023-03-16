<?php

namespace App\Models;

use App\Policies\RoleNames;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Hash;

class Journal extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = ["nom","prix","logo","nombre_pages","commission"];
    protected $identifiableAttribute = 'nom';

    public function setLogoAttribute($value)
    {

        if(env('APP_ENV') !="testing") {
            $attribute_name = "logo";
            $disk = "public";
            $destination_path = "logos";
            $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
        }else{
            $this->attributes["logo"] = $value;
        }
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

    public function partner() : HasOne
    {
        return $this->hasOne(Partner::class);
    }

    public function createPartner()
    {
        $partner = new Partner();
        $partner->nom = $this->nom;
        $partner->telephone = intval('774701' . rand(111, 999));
        $partner->email = preg_replace('/[^a-zA-Z0-9]/','', strtolower($this->nom)).'@digipress.pro';
        $partner->journal()->associate($this);
        $partner->save();
        $user_account = new User();
        $user_account->email =  $partner->email;
        $user_account->name = $partner->nom;
        $user_account->password = Hash::make("0000");
        $user_account->assignRole(RoleNames::ROLE_PARTNER);
        $user_account->save();
        $partner->user()->associate($user_account);
        $partner->save();
        $comptePartner = new ComptePartner(["solde"=>0]);
        $comptePartner->partner()->associate($partner);
        $comptePartner->save();
    }
}

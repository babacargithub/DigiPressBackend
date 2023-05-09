<?php

namespace App\Http\Resources;

use App\Models\Parution;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParutionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var $this Parution */
        return [
           "id"=>$this->id,
           "journal"=>$this->journal->nom,
           "logo_journal"=>$this->journal->logo,
            "prix"=>$this->journal->prix,
            "image_la_une"=>"storage/".$this->image_la_une,
            "achete"=>$this->isPurchased(),
            "ordre_affichage"=>intval($this->journal->ordre_affichage),
            "epingle"=> $this->epingle == true && ($this->epingle_jusqua != null && $this->epingle_jusqua instanceof CarbonInterface) && !Carbon::create($this->epingle_jusqua)->isPast(),
            "is_empty"=> $this->pages()->count() == 0
            ];
    }
}

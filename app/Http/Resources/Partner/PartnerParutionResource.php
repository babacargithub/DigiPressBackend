<?php

namespace App\Http\Resources\Partner;

use App\Models\Parution;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PartnerParutionResource extends JsonResource
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
            "label"=>$this->label,
            "image_la_une"=>"storage/".$this->image_la_une,
            "total_vente"=>200000,
            "nombre_ventes"=>20000,
            "classement"=>1,
            "article_plus_populaire"=>"Article Lorum Ipsum",
            "nombre_articles"=>23,
            "nombre_total_vues_articles"=>2400000
            ];
    }
}

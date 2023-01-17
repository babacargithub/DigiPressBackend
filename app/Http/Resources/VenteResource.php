<?php

namespace App\Http\Resources;

use App\Models\AchatParution;
use App\Models\Parution;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VenteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var $this AchatParution */
        return [
           "id"=>$this->id,
            "prix"=>$this->prix,
            "methode_paiement"=>$this->methode_paiement,
            "commission"=>$this->commission_journal,
            "created_at"=>$this->created_at,
            "abonne"=>$this->abonne->prenom. " ".substr($this->abonne->telephone,0,8)."..",

            ];
    }
}

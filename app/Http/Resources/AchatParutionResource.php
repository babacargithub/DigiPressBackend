<?php

namespace App\Http\Resources;

use App\Models\AchatParution;
use App\Models\Parution;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AchatParutionResource extends JsonResource
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
           "label"=>"achat journal  ".$this->parution->journal->nom,
            "prix"=>$this->prix,
            "methode_paiement"=>$this->methode_paiement,
            "created_at"=>$this->created_at->format("d/m/Y H:i:s")
            ];
    }
}

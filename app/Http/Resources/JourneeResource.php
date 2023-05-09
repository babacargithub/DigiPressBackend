<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JourneeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "date_parutions"=>$this->date_parutions->format("Y-m-d"),
            "journee"=>$this->date_parutions->format("Y-m-d"),
            "id"=>$this->id,
            "parutions"=>ParutionResource::collection($this->parutions)
        ];
    }

}

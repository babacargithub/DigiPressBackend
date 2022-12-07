<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JourneeResouce extends JsonResource
{
    public function toArray($request)
    {
        return [
            "date_parutions"=>$this->date_parutions->format("Y-m-d")
        ];
    }

}
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ThemeResource extends JsonResource
{
public function toArray($request)
{
    return [
        "id"=>$this->id,
        "nom"=>$this->nom
    ];
}
}
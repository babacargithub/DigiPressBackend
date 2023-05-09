<?php

namespace App\Http\Resources;

use App\Models\Parution;
use App\Models\Resume;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResumeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var $this Resume */
        return [
           "id"=>$this->id,
           "contenu"=>$this->contenu,
           "titre"=>$this->titre,
            "isFree"=>true,
            "image"=>"storage/".$this->image,
            ];
    }
}

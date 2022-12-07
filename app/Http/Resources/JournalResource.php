<?php

namespace App\Http\Resources;

use App\Models\Page;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class JournalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            "name"=>$this->nom,
            "prix"=>$this->prix,
            "cree_le"=>$this->created_at->format("d-m-Y")
        ];
    }
}

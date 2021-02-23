<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DossierResource extends JsonResource
{
    public $preserveKeys = true;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'pieces' => PieceResource::collection($this->pieces)
        ];
    }
}

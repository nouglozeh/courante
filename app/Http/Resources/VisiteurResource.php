<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VisiteurResource extends JsonResource
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
            'prenom' => $this->prenom,
            'naissance' => $this->naissance,
            'contacte' => $this->nomcontacte,
            'sexe' => $this->sexe == 'H' ? "Homme" : "Femme",
            'email' => $this->email,
            'piece' => new PieceResource($this->piece),
            'dossier' => new DossierResource($this->dossier)
        ];
    }
}

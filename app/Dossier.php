<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    protected $guarded = [
        'id'
    ];

    public function visiteurs()
    {
        return $this->hasMany('App\Visiteur', 'dossier_id');
    }

    public function pieces()
    {
        return $this->hasMany('App\Piece', 'dossier_id');
    }
}

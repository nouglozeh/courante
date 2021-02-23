<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    protected $guarded = [
        'id'
    ];

    public function visites()
    {
        return $this->hasMany('App\Visite', 'visiteur_id');
    }

    public function Rdvs()
    {
        return $this->hasMany('App\visiteur', 'visiteur_id');
    }

    public function piece()
    {
        return $this->belongsTo('App\Piece', 'piece_id');
    }

    public function dossier()
    {
        return $this->belongsTo('App\Dossier', 'dossier_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    protected $guarded = [
        'id'
    ];

    public function visiteurs()
    {
        return $this->hasMany('App\Visiteur', 'piece_id');
    }

    public function dossier()
    {
        return $this->belongsTo('App\Dossier', 'dossier_id');
    }
    public function type_piece()
    {
        return $this->hasMany('App\type_piece', 'type_piece_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_pieces extends Model
{
    protected $guarded = [
        'id'
    ];
    public function piece()
    {
        return $this->belongsTo('App\Piece', 'piece_id');
    }
}

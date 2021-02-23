<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    protected $guarded = [
        'id'
    ];

    public function departement()
    {
        return $this->belongsTo('App\Departement', 'departement_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function userVisiter()
    {
        return $this->belongsTo('App\User','prsonnelvi');
    }

    public function visiteur()
    {
        return $this->belongsTo('App\Visiteur', 'visiteur_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $guarded = [
        'id'
    ];

    public function users()
    {
        return $this->hasMany('App\User', 'departement_id');
    }

    public function rdvs()
    {
        return $this->hasMany('App\Rdv', 'departement_id');
    }

    public function visites()
    {
        return $this->hasMany('App\Visite', 'departement_id');
    }
}

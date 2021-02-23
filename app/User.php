<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/

    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id');
    }

    public function departement()
    {
        return $this->belongsTo('App\Departement', 'departement_id');
    }

    public function titre()
    {
        return $this->belongsTo('App\Titre', 'titre_id');
    }

    public function rdv_recues()
    {
        return $this->hasMany('App\Rdv', 'user_id');
    }

    public function rdv_emis()
    {
        return $this->hasMany('App\Rdv', 'user_client_id');
    }

    public function visites()
    {
        return $this->belongsTo('App\Visite', 'user_id');
    }
}

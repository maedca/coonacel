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
    protected $fillable = [
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function conferencias()
    {
        return $this->hasMany('App\ConferenceSchedule', 'conferencista_id');
    }


    public function libranzas()
    {
        return $this->hasMany('App\Libranza', 'conferencista_id');
    }


    public function pedidos()
    {
        return $this->hasMany('App\Pedido', 'conferencista_id');
    }


}

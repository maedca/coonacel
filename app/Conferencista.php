<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conferencista extends Model
{
    protected $fillable =['name', 'ci','phone', 'email'];

    public function conferenceSchedules()
    {
        return $this->hasMany('App\conferenceSchedules');
    }
}

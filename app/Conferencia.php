<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conferencia extends Model
{
    protected $fillable = ['name'];

    public function conferenceSchedules()
    {
        return $this->hasMany('App\ConferenceSchedule');
    }
}

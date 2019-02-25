<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConferenceSchedule extends Model
{
    protected $fillable = ['industry_id', 'conferencia_id', 'empresa_id', 'relacionista_id','conferencista_id', 'course_date', 'morning_assistant', 'afternoon_assistant', 'night_assistant', 'night_assistant', 'morning_time', 'afternoon_time', 'night_time', 'videoBeam','state'];

    public function conferencia()
    {
        return $this->belongsTo('App\Conferencia');
    }

    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }

    public function conferencista()
    {
        return $this->belongsTo('App\User');
    }

    public function relacionista()
    {
        return $this->belongsTo('App\Relacionista');
    }


}

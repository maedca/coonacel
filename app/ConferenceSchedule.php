<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConferenceSchedule extends Model
{
    protected $fillable = ['industry_id', 'conferencia_id', 'empresa_id', 'relacionista_id', 'course_date', 'morning_assistant', 'afternoon_assistant', 'night_assistant', 'night_assistant', 'morning_time', 'afternoon_time', 'night_time', 'videoBeam'];

    public function conferencia()
    {
        return $this->belongsTo('App\Conferencia');
    }

    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }


}

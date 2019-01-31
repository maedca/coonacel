<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConferenceSchedule extends Model
{
    protected $fillable = ['industry_id','conferencia_id', 'empresa_id','relacionista_id', 'course_date', 'morning_assistant', 'afternoon_assistant', 'night_assistant', 'night_assistant'];

    public function conference()
    {
        return $this->belongsTo('App\Conferencia');
    }
}

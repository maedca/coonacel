<?php

namespace App;

use function foo\func;
use Illuminate\Database\Eloquent\Model;

class Relacionista extends Model
{
    protected $fillable = ['name', 'ci','phone', 'email'];

    public function empresas(){
        return $this->hasMany('App\Empresa');
    }
}

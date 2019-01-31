<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['name','nit', 'url', 'industria', 'empleados', 'tel_ofi', 'cel', 'contacto_1','cargo_1', 'tel_1','contacto_2', 'cargo_2','tel_2','descripcion','email','calle','ciudad', 'municipio','barrio','pais'];

    public function relacionista()
    {
        return $this->belongsTo('App\Realacionista');
    }
}

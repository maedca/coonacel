<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['name', 'nit', 'url', 'industry_id', 'empleados', 'tel_ofi', 'cel', 'contacto_1', 'cargo_1', 'tel_1', 'contacto_2', 'cargo_2', 'tel_2', 'descripcion', 'email', 'calle', 'ciudad', 'municipio', 'barrio', 'pais'];

    public function relacionista()
    {
        //return $this->belongsTo('App\Realacionista');
        return $this->belongsTo('App\Relacionista');
    }

    public function industry()
    {
        return $this->belongsTo('App\Industry');
    }
}

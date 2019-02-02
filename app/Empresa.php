<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'nit', 'url', 'industry_id', 'empleados', 'tel_ofi', 'cel', 'contacto_1', 'cargo_1', 'tel_1', 'contacto_2', 'cargo_2', 'tel_2', 'descripcion', 'email', 'calle', 'ciudad', 'municipio', 'barrio', 'pais', 'relacionista_id'];

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

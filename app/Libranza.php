<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libranza extends Model
{
    //
    protected $fillable = [
        'conferencista',
        'conferencia',
        'conferencista_id',
        'relacionista',
        'empresa',
        'name',
        'nro_libranza',
        'cc',
        'address',
        'neighborhood',
        'city',
        'phone',
        'cellphone',
        'email',
        'birthday',
        'entrega',
        'charge',
        'receiver_name',
        'referal_name1',
        'referal_name2',
        'referal_ofi_phone1',
        'referal_res_phone1',
        'referal_ofi_phone2',
        'referal_res_phone2',
        'referal_ptco1',
        'referal_ptco2',
        'collection_1',
        'collection_2',
        'collection_3',
        'collection_4',
        'collection_5',
        'collection_6',
        'price_1',
        'price_2',
        'price_3',
        'price_4',
        'price_5',
        'price_6',
        'pin_1',
        'pin_2',
        'pin_3',
        'pin_4',
        'pin_5',
        'pin_6',
        'total',
        'cuotas',
        'vr_cuotas',
        'plazo',
        'file',
        'phone_f',
        'empresa_address',
        'observation',
        'analyst_status',
        'status_fact',
        'status',
        'payment',
        'type',

    ];
    public function getEntregaNameAttribute()
    {
        if ($this->entrega == 0) {
            return 'Empresa';
        }
        if ($this->entrega == 1) {
            return 'Casa';
        }
    }

    public function getRealAnalystStatusAttribute()
    {
        if ($this->analyst_status == "1") {

            return 'Cliente no contactado';
        }
        if ($this->analyst_status == "2") {

            return 'Cliente no lo desea tomar';
        }
        if ($this->analyst_status == "3") {

            return 'Referencias No aprobadas';
        }
        if ($this->analyst_status == "4") {

            return 'Referencias aprobadas';
        }
        if ($this->analyst_status == "5") {

            return 'Pedido mal diligenciado';
        }
        if ($this->analyst_status == "6") {

            return 'Conferencista cancela pedido';
        }
        if ($this->analyst_status == "7") {

            return 'Documentacion incompleta';
        }

        if ($this->analyst_status == "8") {

            return 'Referenciacion Aprobada';
        }

    }

    public function getRealStatusFactAttribute()
    {
        if ($this->status_fact == "0") {

            return 'No Facturado';
        }
        if ($this->status_fact == "1") {

            return 'Facturado';
        }

    }
    public function getRealStatusAttribute()
    {
        if ($this->status == "1") {

            return 'No Referenciado';
        }
        if ($this->status == "2") {

            return 'Referenciado';
        }

    }
}

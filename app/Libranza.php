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
        'total',
        'cuotas',
        'vr_cuotas',
        'plazo',
        'file',
        'phone_f',
        'empresa_address'
    ];
    public function getEntregaNameAttribute(){
        if ($this->entrega == 0){
            return 'Empresa';
        }
        if ($this->entrega == 1){
            return 'Casa';
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Empresa::class, 50)->create();
//        \App\Empresa::create([
//            'name' => 'Empresa TEST',
//            'nit' => '123456789',
//            'url'=>'http://dev.com',
//            'industria' => '1',
//            'empleados'=>'30',
//            'tel_ofi' => '04248402081',
//            'cel' => '04147086455',
//            'contacto_1'=>'manuel',
//            'cargo_1' => 'Gerente',
//            'tel_1' =>'5878558754',
//            'contacto_2'=>'Eduardo',
//            'cargo_2' => ' sub Gerente',
//            'tel_2' =>'5878558754',
//            'descripcion' => 'descripcion de la empresa',
//            'email' => 'admin@dev.com',
//            'calle' =>'calle bermeja',
//            'ciudad' => 'bogota',
//            'municipio'=> 'mun bogota',
//            'barrio'=>'barrio el lobo',
//            'pais' => 'Colombia',
////            'password' => \Illuminate\Support\Facades\Hash::make('123'),
//        ]);
    }
}

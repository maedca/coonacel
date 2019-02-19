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
//        factory(\App\Empresa::class, 50)->create();
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
        \App\Empresa::create([
            'name' => 'Empresa de Prueba 1',
            'nit' => '123456789',
            'url' => 'http://empresadeprueba1.com',
            'industry_id' => 1,
            'empleados' => 50,
            'tel_ofi' => '04248402081',
            'cel' => '04248402081',
            'contacto_1' => 'Manuel Camacho',
            'cargo_1' => 'Presidente',
            'tel_1' => '04248402081',
            'contacto_2' => 'Eduardo',
            'cargo_2' => 'Vice Presidente',
            'tel_2' => '04248402081',
            'descripcion' => 'Empresa dedicada al ramo de los alimentos',
            'email' => 'maedca@gmail.com',
            'calle' => 'Calle de prueba',
            'ciudad' => 'Bogota',
            'municipio' => 'Distrito Capital',
            'barrio' => 'Barrio fontibon',
            'pais' => 'Colombia',
            'relacionista_id' => 1,
        ]);
        \App\Empresa::create([
            'name' => 'Empresa de Prueba 2',
            'nit' => '1234567890',
            'url' => 'http://empresadeprueba2.com',
            'industry_id' => 2,
            'empleados' => 500,
            'tel_ofi' => '04248402081',
            'cel' => '04248402081',
            'contacto_1' => 'Manuel Camacho',
            'cargo_1' => 'Presidente',
            'tel_1' => '04248402081',
            'contacto_2' => 'Eduardo',
            'cargo_2' => 'Vice Presidente',
            'tel_2' => '04248402081',
            'descripcion' => 'Empresa dedicada al ramo de los alimentos',
            'email' => 'maedca@ymail.com',
            'calle' => 'Calle de prueba',
            'ciudad' => 'Bogota',
            'municipio' => 'Distrito Capital',
            'barrio' => 'Barrio fontibon',
            'pais' => 'Colombia',
            'relacionista_id' => 1,
        ]);
    }
}

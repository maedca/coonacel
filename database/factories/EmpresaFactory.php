<?php

use Faker\Generator as Faker;

$factory->define(\App\Empresa::class, function (Faker $faker) {
    return [
        'name' =>$faker->unique()->company,
        'nit'=>$faker->unique()->creditCardNumber,
        'url'=>$faker->unique()->url,
//        'industria'=>$faker->numberBetween($min= 1, $max = 500),
        'empleados'=>$faker->numberBetween($min= 10, $max = 150),
        'tel_ofi'=>'000000',
        'cel'=>'1111111',
        'contacto_1'=>$faker->name,
        'cargo_1'=>$faker->companySuffix,
        'tel_1'=>'2222222',
        'contacto_2'=> $faker->phoneNumber,
        'cargo_2' =>$faker->companySuffix,
        'tel_2' => '3333333',
        'descripcion' =>$faker->sentence,
        'email' =>$faker->unique()->email,
        'barrio' =>'fino',
        'calle'=> $faker->streetName,
        'ciudad'=>$faker->city,
        'municipio'=>$faker->city,
        'pais'=>$faker->country
    ];
});

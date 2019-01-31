<?php

use Faker\Generator as Faker;

$factory->define(\App\Relacionista::class, function (Faker $faker) {
    return [
        'name'=> $faker->unique()->name,
        'ci' => $faker->unique()->creditCardNumber,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->email
    ];
});

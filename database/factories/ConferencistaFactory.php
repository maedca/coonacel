<?php

use Faker\Generator as Faker;
use App\Conferencista;

$factory->define(Conferencista::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'ci' => $faker->creditCardNumber,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email
    ];
});

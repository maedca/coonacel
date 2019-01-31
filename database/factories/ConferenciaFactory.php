<?php

use Faker\Generator as Faker;
use App\Conferencia;

$factory->define(Conferencia::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
    ];
});

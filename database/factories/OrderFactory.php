<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Order::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name,
        'order_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'subtotal' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'vat_value' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'vat_percentage' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'total' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL)
    ];

});

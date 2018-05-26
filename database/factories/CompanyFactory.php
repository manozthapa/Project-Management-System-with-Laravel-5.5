<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'description'=>$faker->paragraph(rand(2,5),true),
        'user_id'=>$faker->numberBetween($min=1,$max=5)
    ];
});

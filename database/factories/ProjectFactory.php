<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
       	'name'=>$faker->name,
       	'description'=>$faker->paragraph(rand(2,5),true),
       	'days'=>$faker->numberBetween($min=5,$max=200),
       	'user_id'=>$faker->numberBetween($min=1,$max=5),
       	'company_id'=>$faker->numberBetween($min=1,$max=10)
    ];
});

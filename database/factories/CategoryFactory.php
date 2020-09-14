<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $category=[
        ' Analog Watch',
        'Digital_Watch',
        'Automatic Watch',
        'Chronograph Watch',
        'Diving Watch',
        'Dress Watch',
        'Quartz Watch',
        'Mechanical Watch',
        'Pilot Watch',
        'Field Watch',
        'Smart Watch',
        'Luxury Watch',
    ];

    $key=array_rand($category);
    return [
        'name' => $category[$key],
        'created_at'=>now(),
        'updated_at'=>now(),

    ];
});

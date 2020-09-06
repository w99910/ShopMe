<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;


$factory->define(Product::class, function (Faker $faker) {
    $watches=['Patek Philippe',
        'Audemars Piguet',
        'Vacheron Constantin',
        'TAG Heuer',
        'A. Lange & Söhne',
        'Jaeger-LeCoultre',
        'Rolex',
        'Hublot' ,
        'Breguet & Fils' ,
        'Chopard' ,
        'Girard-Perregaux' ,
        'Blancpain'  ,
        'Cartie' ,
        'IWC Schaffhausen' ,
        'Ulysse Nardin' ,
        'Panerai'  ,
        'Piaget' ,
        'Breitling'  ,
        'Omega'  ,
        'Montblanc'  ,
        'Baume & Mercier'  ,
        'Bell & Ross'  ,
        'Bremont'  ,
        'Corum'    ,
        'Glashütte Original' ,
        'Maurice LaCroix'  ,
        'Richard Mille'  ,
        'Roger Dubuis' ,
        'Tudor' ,
        'Zenith'
    ];
    $k=array_rand($watches);
    return [
     'name' => $watches[$k],
        'price'=> rand(1,900)+99,
        'available' => rand(0,1),
        'image_path' => null,
        'purchased_by_user' => null,
    ];
});

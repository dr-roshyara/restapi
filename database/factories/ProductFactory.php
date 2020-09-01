<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'slug'=>$faker->word,
        'price1'=>$faker->numberBetween(10,200),
        'price2'=>$faker->numberBetween(100,300),
        'discount'=>$faker->numberBetween(10,30),
        'stock'=>$faker->numberBetween(20,100),
        'description'=>$faker->paragraph, 
        'summary'=>$faker->text,

        //
    ];
});

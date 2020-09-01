<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'product_id'=> function(){
            return App\Model\Product::all()->random();
        },
        'user_id'=>function(){
            return App\User::all()->random();
        },
        // 'user_name'=>$faker->name,
        'review'=>$faker->text,
        'star'=>$faker->numberBetween(0,5),
    ];
});

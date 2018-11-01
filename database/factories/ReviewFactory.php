<?php

use App\Models\Film;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Models\Review::class, function (Faker $faker) {
    return [
        'user_id'=>function(){
        	return User::all()->random();	
        },
        'film_id'=>function(){
        	return Film::all()->random();
        },
        'review'=>$faker->paragraph,
        'star'=>$faker->numberBetween(1,5),
    ];
});

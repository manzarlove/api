<?php

use App\Models\Country;
use Faker\Generator as Faker;

$factory->define(App\Models\Film::class, function (Faker $faker) {
    return [
    	'country_id'=>function()
    	{
    		return Country::all()->random();
    	},
        'name'=>$faker->word,
        'description'=>$faker->paragraph,
        'release_date'=>$faker->date(),
        'price'=>$faker->numberBetween(100, 1000),
        'slug'=>str_slug($faker->word),
        'photo'=>$faker->imageUrl(), 
       

    ];
});

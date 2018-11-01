<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create();
        factory(App\Models\Country::class, 10)->create();
        factory(App\Models\Genre::class, 10)->create();
        factory(App\Models\Film::class, 50)->create();
        factory(App\Models\Review::class, 10)->create();
    }
}

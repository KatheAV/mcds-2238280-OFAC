<?php

namespace Database\Seeders;

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
        // User::factory(1000)->create();

        $this->call([
        	
        	UserSeeder::class,
        	//CategorySeeder::class,
        	//GameSeeder::class,
        ]);
    }
}

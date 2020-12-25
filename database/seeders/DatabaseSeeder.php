<?php

namespace Database\Seeders;

use Database\Seeders\UserDataSeeder;
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
        $this->call([
            UserDataSeeder::class,
        ]);
    }
}

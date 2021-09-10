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
        $this->call(UserSeeder::class);
        $this->call(HighSchoolSeeder::class);
        $this->call(BachelorSeeder::class);
        $this->call(MasterSeeder::class);
        $this->call(PhdSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(WebsiteSeeder::class);
    }
}

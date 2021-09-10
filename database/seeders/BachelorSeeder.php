<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ScholarshipBachelor;

class BachelorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Bachelor =[
            [
                "country_name" => "cambodia",
                "category" => "High School",
                "image" => "1610071845.png",
                "description" => "High School description",
                "author" => "dara",
                "author_id"=> 1
            ]
        ];

        ScholarshipBachelor::insert($Bachelor);
    }
}

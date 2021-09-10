<?php

namespace Database\Seeders;

use App\Models\ScholarshipPhd;
use Illuminate\Database\Seeder;

class PhdSeeder extends Seeder
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
                "image" => "1610071857.png",
                "description" => "High School description",
                "author" => "dara",
                "author_id"=> 1
            ]
        ];

        ScholarshipPhd::insert($Bachelor);
    }
}

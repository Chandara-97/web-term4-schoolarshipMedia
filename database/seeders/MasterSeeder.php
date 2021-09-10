<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ScholarshipMaster;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Master =[
            [
                "country_name" => "cambodia",
                "category" => "High School",
                "image" => "1610071857.png",
                "description" => "High School description",
                "author" => "dara",
                "author_id"=> 1
            ]
        ];

        ScholarshipMaster::insert($Master);
    }
}

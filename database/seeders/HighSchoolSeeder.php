<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ScholarshipHighschool;
// $table->id();
// $table->longText('country_name');
// $table->longText('category');
// $table->longText('image');
// $table->longText('description');
// $table->longText('author');
// $table->timestamps();
class HighSchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $highSchool =[
            [
                "country_name" => "cambodia",
                "category" => "High School",
                "image" => "1610071857.png",
                "description" => "High School description",
                "author" => "dara",
                "author_id"=> 1
            ]
        ];

        ScholarshipHighschool::insert($highSchool);
        
    }
}

<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
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
                "video_name" => "cambodia",
                "image" => "1610071845.png",
                "description" => "High School description",
                "author" => "dara",
                "author_id"=> 1
            ]
        ];

        Video::insert($Bachelor);
    }
}

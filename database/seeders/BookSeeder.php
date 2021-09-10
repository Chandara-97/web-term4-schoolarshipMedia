<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
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
                "book_name" => "cambodia",
                "image" => "1610071857.png",
                "description" => "High School description",
                "author" => "dara",
                "author_id"=> 1
            ]
        ];

        Book::insert($Bachelor);
    }
}

<?php

namespace Database\Seeders;

use App\Models\MovieTag;
use Illuminate\Database\Seeder;

class MovieTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            "action",
            "adventure",
            "comedy",
            "drama",
            "fantasy",
            "horror",
            "mystery",
            "romance",
            "sci-fi",
            "thriller",
            "western"
        ];

        foreach ($tags as $tag){
          MovieTag::create([
              "name" => $tag
          ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Get all posts
        $posts = Post::all();

        // Define the number of candidates per post
        $numCandidates = 4;

        // Loop through each post
        foreach ($posts as $post) {
            // Generate candidates for each post
            for ($i = 0; $i < $numCandidates; $i++) {
                Candidate::create([
                    'name' => $faker->name,
                    'post_id' => $post->id,
                ]);
            }
        }
    }
}

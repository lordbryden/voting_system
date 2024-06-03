<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //



            $posts = [
                ['name' => 'President'],
                ['name' => 'Vice President'],
                ['name' => 'Secretary'],
                ['name' => 'Socials'],
                ['name' => 'Treasurer'],
                ['name' => 'Education'],
                ['name' => 'Discipline'],
                // Add more posts as needed
            ];

            // Insert posts into the database
            foreach ($posts as $post) {
                Post::create($post);
            }

    }
}

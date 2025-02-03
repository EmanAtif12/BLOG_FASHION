<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;


class UpdateCategoryIdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all(); // Fetch all posts
        foreach ($posts as $post) {
            $post->category_id = 1; // Assign a valid category ID
            $post->save();
     
    }
}
}

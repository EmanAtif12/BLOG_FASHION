<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post; // Ensure the Post model is imported

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Create sample posts
        Post::create([
            'title' => 'Sample Post 1',
            'content' => 'This is the content for Sample Post 1.',
            'image' => null, // No image for this post
        ]);

        Post::create([
            'title' => 'Sample Post 2',
            'content' => 'This is the content for Sample Post 2.',
            'image' => null, // No image for this post
        ]);

        Post::create([
            'title' => 'Sample Post 3',
            'content' => 'This is the content for Sample Post 3.',
            'image' => 'posts/sample-image.jpg', // Example image path
        ]);
    }
}

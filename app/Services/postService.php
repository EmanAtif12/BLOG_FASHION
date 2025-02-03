<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function getAllPosts()
    {
        return Post::all();
    }

    public function createPost(array $data)
    {
        // Handle file upload if present
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('posts', 'public');
        }

        return Post::create($data);
    }

    public function updatePost(Post $post, array $data)
    {
        if (isset($data['image'])) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image); // Delete old image
            }
            $data['image'] = $data['image']->store('posts', 'public');
        }

        $post->update($data);

        return $post;
    }

    public function deletePost(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();
    }

    public function searchPosts(string $query)
    {
        return Post::where('title', 'LIKE', "%{$query}%")
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->with('category:id,name')
            ->get(['id', 'title', 'content', 'category_id','image']);
    }
}

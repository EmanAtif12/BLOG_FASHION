<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return view('home.servicespage', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $this->postService->createPost($validatedData);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $this->postService->updatePost($post, $validatedData);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $this->postService->deletePost($post);

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
    public function search(Request $request)
{
    $query = $request->input('query'); // Get the search term from the request
    $posts = $this->postService->searchPosts($query); // Call the service method

    // Return a view with the search results
    return view('posts.search_results', compact('posts'));
}


}

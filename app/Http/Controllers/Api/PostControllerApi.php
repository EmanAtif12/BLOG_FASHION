<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\postService;
use Illuminate\Http\Request;
class PostControllerApi extends Controller
{
    protected $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return response()->json($posts);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
        $post = $this->postService->createPost($validatedData);
        return response()->json(['success' => true, 'post' => $post], 201);
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $updatedPost = $this->postService->updatePost($post, $validatedData);

        return response()->json(['success' => true, 'post' => $updatedPost]);
    }

    public function destroy(Post $post)
    {
        $this->postService->deletePost($post);

        return response()->json(['success' => true, 'message' => 'Post deleted successfully']);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $posts = $this->postService->searchPosts($query);
    
        return response()->json($posts); // Return JSON data
    }
        
    }

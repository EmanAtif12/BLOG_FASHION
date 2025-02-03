<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;


class HomeController extends Controller
{
    /**
     * Redirect users to the appropriate dashboard based on their user type.
     */
    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            switch ($usertype) {
                case 'user':
                    return redirect()->route('user.dashboard');
                case 'admin':
                    return redirect()->route('admin.dashboard');
                default:
                    return redirect()->route('login'); // Fallback for unknown types
            }
        }

        return redirect()->route('login'); // Redirect to login if not authenticated
    }

    /**
     * Display the homepage.

     */

     public function homepage()
    {
        return view('home.homepage');
    }

    /**
     * Display the About Us page.
     */
    public function aboutUs()
    {
        return view('home.aboutus');
    }

    /**
     * Display the Contact page.
     */
    public function contact()
    {
        return view('home.contact');
    }

    /**
     * Display the Blog page.
     */
    public function blogPage()
    {
        return view('home.blogPage');
    }

    /**
     * Display the Services page with all posts.
     * 
     */
    
    public function servicespage()
    {
        $posts = Post::all(); // Fetch all posts
        //dd($posts);
        return view('home.servicespage', compact('posts'));
    }

    /**
     * Display the Personal Styling service page.
     */
    public function personalStyling()
    {
        return view('home.personal-styling');
    }

    /**
     * Display the Personal Shopping service page.
     */
    public function personalShopping()
    {
        return view('home.personal-shopping');
    }

    /**
     * Display the Custom Tailoring service page.
     */
    public function customTailoring()
    {
        return view('home.custom-tailoring');
    }
    public function fixCategoryIds()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            $post->category_id = 1; // Assign a valid category ID
            $post->save();
        }
    
        return 'Category IDs fixed!';
    }

    
}

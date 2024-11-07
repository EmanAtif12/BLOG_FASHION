<?php
// namespace helps with organizing code and avoiding naming conflicts.
namespace App\Http\Controllers;

// Import necessary classes.
use Illuminate\Http\Request; // Handles HTTP
use App\Models\User; // Imports the User model for interacting with the users table in the database.
use Illuminate\Support\Facades\Auth; // Provides authentication functionalities.

// Define the HomeController class, which extends the base Controller class.
class HomeController extends Controller
{
    public function index()  // Define index method, which is the default action for controller.

    {
        if (Auth::check())// user authentication 
        {
            // Retrieve the authenticated user's type.
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user') // reg user dashboard
            {
                return view('dashboard'); // Load the 'dashboard' view.
            } 
            elseif ($usertype == 'admin') //admin user dashboard
            {
                return view('admin.dashboard'); // Load the 'admin.dashboard' view.
            }
        } 
        else 
        {
            // If not authenticated, redirect the user to the login page.
            return redirect()->route('login'); 
        }
    }

    // Define a method to load the homepage view.
    public function homepage()
    {
        return view('home.homepage'); // Load the 'home.homepage' view.
    }
    
    public function aboutus()
    {
        return view('home.aboutus'); 
    }
    
    public function contact()
    {
        return view('home.contact'); 
    }
    public function blogPage()
    {
        return view('home.blogPage'); 
    }
    
    public function servicespage()
    {
        return view('home.servicespage'); // Load the 'home.servicespage' view.
    }
    
    // Define a method to load the personal styling service page view.
    public function personalStyling()
    {
        return view('home.personal-styling'); 
    }

    public function personalShopping()
    {
        return view('home.personal-shopping'); 
    }

    public function customtailoring()
    {
        return view('home.custom-tailoring'); 
    }
}

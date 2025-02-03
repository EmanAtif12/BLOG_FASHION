<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
     {
         $search = $request->input('search');
     
         $employees = Employee::query()
             ->when($search, function ($query, $search) {
                 $query->where('name', 'like', "%{$search}%")
                       ->orWhere('email', 'like', "%{$search}%");
             })
             ->paginate(10); // Add pagination
     
         return view('employees.index', compact('employees', 'search'));
     }
}

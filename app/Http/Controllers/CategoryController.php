<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = Category::all(); // Retrieve all categories
        return view('categories.categoriesIndex', compact('categories')); // Pass categories to a Blade view
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('categories.categoriesCreate'); // Return a form for creating a category
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        // Create a new category
        Category::create([
            'name' => $request->name,
            'parent_category_id' => $request->parent_category, // Handle parent category if provided
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified category.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id); // Find category by ID
        return view('categories.show', compact('category')); // Pass the category to the view
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id); // Find category by ID
        return view('categories.edit', compact('category')); // Return a form for editing the category
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);

        // Find and update the category
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Adding sample categories
        Category::create(['name' => 'Fashion']);
        Category::create(['name' => 'Lifestyle']);
        Category::create(['name' => 'Tech']);
    }
}

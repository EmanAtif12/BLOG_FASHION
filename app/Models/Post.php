<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'image', 'category_id'];

    // A post belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}


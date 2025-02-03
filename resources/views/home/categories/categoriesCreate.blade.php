@extends('layouts.app')

@section('content')
    <h1>Create Category</h1>

    {{-- Form for creating a new category --}}
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

    <hr>

    {{-- List of categories --}}
    <h2>Existing Categories</h2>
    @if ($categories->count())
        <ul class="list-group">
            @foreach ($categories as $category)
                <li class="list-group-item">{{ $category->name }}</li>
            @endforeach
        </ul>
    @else
        <p>No categories available. Please add one!</p>
    @endif

    <hr>

    {{-- Dropdown for selecting a category in posts --}}
    <h2>Assign Category to a Post</h2>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ isset($post) && $post->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Additional fields for the post --}}
        <div class="mb-3">
            <label for="title" class="form-label">Post Title:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Post Content:</label>
            <textarea name="content" id="content" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Post Image:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Create Post</button>
    </form>
@endsection

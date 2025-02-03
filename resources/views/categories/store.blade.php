<!-- Blade View for Categories (e.g., resources/views/categories/create.blade.php) -->

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Category Name:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="parent_category" class="form-label">Parent Category (Optional)</label>
        <select name="parent_category" id="parent_category" class="form-control">
            <option value="">Select Parent Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create Category</button>
</form>

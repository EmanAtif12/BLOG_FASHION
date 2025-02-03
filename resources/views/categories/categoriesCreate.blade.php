<!-- resources/views/pages/addCategory.blade.php -->
<x-weblayout>
    <div class="container">
        <h1>Create a New Category</h1>

        <form action="{{ route('category.add') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>

        <!-- Success message -->
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>
</x-weblayout>

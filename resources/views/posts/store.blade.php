<x-weblayout>
    <!-- Blog Post Creation Section -->
    <div class="blog_creation_section layout_padding">
        <div class="container">
            <h2 class="text-center mb-4">Create a New Blog Post</h2>

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Blog Post Creation Form -->
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title Input -->
                <div class="mb-3">
                    <label for="title" class="form-label">Post Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        class="form-control" 
                        placeholder="Enter post title" 
                        value="{{ old('title') }}" 
                        required
                    >
                </div>

                <!-- Content Textarea -->
                <div class="mb-3">
                    <label for="content" class="form-label">Post Content</label>
                    <textarea 
                        name="content" 
                        id="content" 
                        class="form-control" 
                        rows="6" 
                        placeholder="Write your post content here..." 
                        required
                    >{{ old('content') }}</textarea>
                </div>

                <!-- Category Dropdown -->
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Image Upload (with size validation) -->
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image (Optional)</label>
                    <input 
                        type="file" 
                        name="image" 
                        id="image" 
                        class="form-control"
                        accept="image/*"
                    >
                    <small class="form-text text-muted">Image size must not exceed 2 MB.</small>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-weblayout>

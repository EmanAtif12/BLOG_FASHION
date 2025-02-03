@if ($posts->isEmpty())
    <p>No posts found for "{{ request('query') }}".</p>
@else
    <div class="row">
        @forelse ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if ($post->image)
                    <img src="{{ asset('../storage/app/public/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No posts available. Click "Create New Post" to add one!</p>
            </div>
        @endforelse
    </div>
@endif
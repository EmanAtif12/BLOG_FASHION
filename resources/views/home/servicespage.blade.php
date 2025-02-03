<x-weblayout>
   <!-- services section start -->
   <div class="services_section layout_padding">
      <div class="container">
         <h1 class="services_taital">Services BLOGS</h1>
         <p class="services_text">Explore our range of exclusive services designed to enhance your fashion experience.</p>
        
        
         <!-- Blog Post Management Section -->
         <form action="{{ route('search') }}" method="GET">
            <input type="text" name="query" id="searchInput" placeholder="Search by Title or Category" required>
            <button type="submit">Search</button>
         </form>
         <div id="searchResults">

         </div>

         <!-- Create Post Button -->
         <div class="mb-4">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
         </div>

         <!-- Display All Posts -->
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
      </div>
   </div>
   @push('scripts')
    <script>
       $(document).ready(function() {
         $('#searchInput').on('keyup', function() {
            const query = this.value;
            console.log(query);
                if (query.length > 0) {
                    fetch(`{{route("search")}}?query=${query}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                    })
                    .then(response => {
                        if (response) {
                           const resultsContainer = document.getElementById('searchResults');
                           return response.text(); 
                        } else {
                           throw new Error('Network response was not ok');
                        }
                    })
                    .then(data => {
                        const resultsContainer = document.getElementById('searchResults');
                        if (data) {
                           resultsContainer.innerHTML = data; 
                        } else {
                            resultsContainer.innerHTML = '<p>No results found.</p>';
                        }
                    }
                )
                    .catch(err => console.error('Search error:', err));
                } else {
                    document.getElementById('searchResults').innerHTML = '<p>Type something to search...</p>';
                }  
         });    
      });   
    </script>     
   @endpush

   <!-- services section end -->
</x-weblayout>

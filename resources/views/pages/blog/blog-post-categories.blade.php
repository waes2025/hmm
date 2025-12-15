<div class="container">
    <div class="mb-5">
        <h2 class="display-6 fw-bold">Explore Topics</h2>
        <p class="text-muted">Discover stories across different themes</p>
    </div>
    
        
    
    <div class="row g-4">
        @foreach ($categoryBlogs as $category)
            <div class="col-6 col-md-4 col-lg animate-fade-up">
                <a href="{{ url('/category') }}?cat={{ $category->slug }}" class="category-card card h-100 text-decoration-none">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="fs-2">{{ $category->image }}</span>
                            <i class="bi bi-arrow-right text-muted"></i>
                        </div>
                        <h5 class="card-title mb-2">{{ $category->name }}</h5>
                        <p class="card-text text-muted small mb-2">{{ $category->description }}</p>
                        <span class="text-muted smaller">{{ $totalPosts }}</span>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
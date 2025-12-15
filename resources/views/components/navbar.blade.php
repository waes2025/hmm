<!-- navbar -->
    <navbar class="sticky-top bg-white border-bottom">
        <nav class="navbar navbar-expand-md navbar-light container py-3">
            <a class="navbar-brand fw-bold" href="index.html">{{ $regInfo->name }}</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-4">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ '/' }}">Home</a>
                    </li>
                    @foreach ($categoryFeached as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ '/category' }}?cat={{ $category->slug }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ '/about' }}">About</a>
                    </li>
                </ul>
            </div>
        </nav>
    </navbar>
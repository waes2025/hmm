@extends('layouts.app')
@section('title', 'Home')
@section('content')


    <!-- Hero Section -->
    <section class="hero-section py-5">
        @include('pages.home.hero')
    </section>

    <!-- Categories Section -->
    <section class="py-5">
        @include('pages.blog.blog-post-categories')
    </section>

    <!-- Recent Posts Section -->
    <section class="py-5 bg-light">
        @include('pages.blog.blog-recent-post')
    </section>

    <!-- Newsletter Section -->
    <section class="py-5">
        @include('pages.contact_us.newsletter')
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
@extends('layouts.app')
@section('title', 'Blog')
@section('content')


<h2 class="fw-bold mb-4">All Blog Posts</h2>


<div class="row">
@foreach ($posts as $post)
<div class="col-md-4">
@include('components.blog-card', [
'image' => $post->thumbnail,
'title' => $post->title,
'excerpt' => Str::limit($post->body, 120),
'link' => url('/blog/' . $post->slug)
])
</div>
@endforeach
</div>


@endsection
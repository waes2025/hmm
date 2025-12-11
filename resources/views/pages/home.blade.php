@extends('layouts.app')
@section('title', 'Home')
@section('content')


<h1 class="fw-bold mb-4">Latest Articles</h1>
<div class="row">
@foreach ($posts as $post)
<div class="col-md-4">
@include('components.blog-card', [
'image' => $post->thumbnail,
'title' => $post->title,
'excerpt' => Str::limit($post->body, 100),
'link' => url('/blog/' . $post->slug)
])
</div>
@endforeach
</div>


@endsection
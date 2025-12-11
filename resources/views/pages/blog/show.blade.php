@extends('layouts.app')
@section('title', $post->title)
@section('content')


<article class="blog-single">
<h1 class="fw-bold mb-3">{{ $post->title }}</h1>
<p class="text-muted">Published: {{ $post->created_at->format('M d, Y') }}</p>


<img src="{{ $post->thumbnail }}" class="img-fluid rounded mb-4" alt="Blog image">


<div class="blog-body">
{!! nl2br(e($post->body)) !!}
</div>
</article>


@endsection
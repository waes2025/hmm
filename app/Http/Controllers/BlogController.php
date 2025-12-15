<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategories;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $regInfo = Registration::select('*')
                    ->where('id', 1)
                    ->first();
        $author = User::select('*')
                    ->first();
        $categoryFeached = BlogCategories::select('*')
                        ->where('is_featured', '1')
                        ->orderBy('name', 'asc')
                        ->take(5)
                        ->get();
        $categoryBlogs = BlogCategories::select('*')
                        ->orderBy('name', 'asc')
                        ->paginate(5);
        $currentBlogPost = Blog::with('users', 'blog_categories')
                        ->where('status', 'published')
                        ->leftJoin('users', 'blogs.created_by', '=', 'users.id')
                        ->leftJoin('blog_categories', 'blogs.category_id', '=', 'blog_categories.id')
                        ->orderBy('published_at', 'desc')
                        ->first();
        $allBlogPosts = Blog::select('*')
                        ->where('id', '!=', $currentBlogPost->id)
                        ->orderBy('published_at', 'desc')
                        ->paginate(10);
        $totalPosts = Blog::count();
                        
        return view('pages.home.home', compact('regInfo', 'author', 'categoryFeached', 'categoryBlogs', 'totalPosts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:categories,name',
            'description' => 'nullable|string'
        ]);


        BlogCategories::create($validated);
        return redirect()->route('blog.categories.index');
    }

    public function update(Request $request, BlogCategories $category)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:100|unique:categories,name,' . $category->id,
        'description' => 'nullable|string'
        ]);


        $category->update($validated);
        return redirect()->route('categories.index');
    }

    public function blogPost(Request $request)
    {
        $data = $request->validate([
        'title' => 'required|string|max:150',
        'category_id' => 'required|exists:categories,id',
        'content' => 'required|string|min:50',
        'status' => 'required|in:draft,published'
        ]);


        if ($data['status'] === 'published') {
        $data['published_at'] = now();
        }


        $data['user_id'] = auth()->id();


        Blog::create($data);


        return redirect()->route('posts.index');
    }
}

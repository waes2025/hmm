<?php

namespace App\Http\Controllers;

use App\Models\BlogCategories;
use App\Models\Blog;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('pages.home.dashboard', [
            'totalCategories' => BlogCategories::count(),
            'totalPosts' => Blog::count()
        ]);
    }
}

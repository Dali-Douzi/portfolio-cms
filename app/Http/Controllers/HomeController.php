<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get featured projects (max 6)
        $featuredProjects = Project::where('is_published', true)
            ->where('is_featured', true)
            ->orderBy('order')
            ->take(6)
            ->get();

        // Get latest published blog posts (max 3)
        $latestPosts = BlogPost::with(['category', 'user'])
            ->where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('home', compact('featuredProjects', 'latestPosts'));
    }
}
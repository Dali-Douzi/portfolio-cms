<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Tag;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'blog_posts' => BlogPost::count(),
            'categories' => Category::count(),
            'tags' => Tag::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
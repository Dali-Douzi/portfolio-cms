<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with(['category', 'tags'])->latest()->paginate(10);
        return view('admin.blog-posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.blog-posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'nullable',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'featured_image' => 'nullable|image|max:2048',
            'is_published' => 'boolean',
            'tags' => 'array',
        ]);

        $validated['user_id'] = Auth::id();
        
        if ($request->is_published) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }

        $post = BlogPost::create($validated);
        
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.blog-posts.index')->with('success', 'Post created successfully!');
    }

    public function edit(BlogPost $blogPost)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.blog-posts.edit', compact('blogPost', 'categories', 'tags'));
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'nullable',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'featured_image' => 'nullable|image|max:2048',
            'is_published' => 'boolean',
            'tags' => 'array',
        ]);

        if ($request->is_published && !$blogPost->published_at) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            if ($blogPost->featured_image) {
                Storage::disk('public')->delete($blogPost->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }

        $blogPost->update($validated);
        
        if ($request->tags) {
            $blogPost->tags()->sync($request->tags);
        }

        return redirect()->route('admin.blog-posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(BlogPost $blogPost)
    {
        if ($blogPost->featured_image) {
            Storage::disk('public')->delete($blogPost->featured_image);
        }

        $blogPost->delete();

        return redirect()->route('admin.blog-posts.index')->with('success', 'Post deleted successfully!');
    }
}
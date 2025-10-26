<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'nullable',
            'featured_image' => 'nullable|image|max:2048',
            'tech_stack' => 'nullable|string',
            'demo_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'order' => 'integer',
        ]);

        // Handle tech stack as array
        if ($request->tech_stack) {
            $validated['tech_stack'] = array_map('trim', explode(',', $request->tech_stack));
        }

        // Handle image upload
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('projects', 'public');
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'nullable',
            'featured_image' => 'nullable|image|max:2048',
            'tech_stack' => 'nullable|string',
            'demo_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'order' => 'integer',
        ]);

        // Handle tech stack
        if ($request->tech_stack) {
            $validated['tech_stack'] = array_map('trim', explode(',', $request->tech_stack));
        }

        // Handle image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($project->featured_image) {
                Storage::disk('public')->delete($project->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('projects', 'public');
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        // Delete image
        if ($project->featured_image) {
            Storage::disk('public')->delete($project->featured_image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully!');
    }
}
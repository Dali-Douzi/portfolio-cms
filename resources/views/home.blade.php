@extends('layouts.public')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-32">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fade-in">
                Hi, I'm <span class="text-yellow-300">Your Name</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-100">
                Full-Stack Developer & Creative Problem Solver
            </p>
            <p class="text-lg md:text-xl mb-10 text-gray-200 max-w-2xl mx-auto">
                I build modern web applications with clean code and beautiful designs. 
                Passionate about creating seamless user experiences.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('projects.index') }}" class="inline-flex items-center px-8 py-3 bg-white text-indigo-600 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg">
                    View My Work
                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-3 bg-transparent border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:text-indigo-600 transition">
                    Get In Touch
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Projects Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Featured Projects</h2>
            <p class="text-lg text-gray-600">Check out some of my recent work</p>
        </div>

        @if($featuredProjects->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProjects as $project)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                        @if($project->featured_image)
                            <div class="h-48 bg-gray-200 overflow-hidden">
                                <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center">
                                <span class="text-white text-4xl font-bold">{{ substr($project->title, 0, 1) }}</span>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $project->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($project->description, 120) }}</p>
                            
                            @if($project->tech_stack)
                                <div class="flex flex-wrap gap-2 mb-4">
                                    @foreach(array_slice($project->tech_stack, 0, 3) as $tech)
                                        <span class="px-3 py-1 bg-indigo-100 text-indigo-600 rounded-full text-xs font-medium">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                            
                            <a href="{{ route('projects.show', $project->slug) }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-700 font-semibold">
                                View Project
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('projects.index') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition">
                    View All Projects
                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">No featured projects yet. Check back soon!</p>
            </div>
        @endif
    </div>
</section>

<!-- Latest Blog Posts Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Latest Blog Posts</h2>
            <p class="text-lg text-gray-600">Thoughts, tutorials, and insights</p>
        </div>

        @if($latestPosts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($latestPosts as $post)
                    <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        @if($post->featured_image)
                            <div class="h-48 bg-gray-200 overflow-hidden">
                                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br from-blue-500 to-teal-500"></div>
                        @endif
                        
                        <div class="p-6">
                            <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                                <time>{{ $post->published_at->format('M d, Y') }}</time>
                                @if($post->category)
                                    <span class="px-2 py-1 bg-gray-100 text-gray-700 rounded text-xs">
                                        {{ $post->category->name }}
                                    </span>
                                @endif
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-indigo-600 transition">
                                <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            
                            <p class="text-gray-600 mb-4">
                                {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 120) }}
                            </p>
                            
                            <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-700 font-semibold">
                                Read More
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('blog.index') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition">
                    View All Posts
                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">No blog posts yet. Check back soon!</p>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-indigo-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Let's Work Together</h2>
        <p class="text-xl mb-8 text-indigo-100">
            Have a project in mind? I'd love to hear about it and see how I can help bring your ideas to life.
        </p>
        <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-3 bg-white text-indigo-600 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg">
            Contact Me
            <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
        </a>
    </div>
</section>
@endsection
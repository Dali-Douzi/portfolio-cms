<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        
        if (!$user) {
            $this->command->error('No users found. Please create a user first.');
            return;
        }

        $posts = [
            [
                'title' => 'Getting Started with Laravel 11',
                'slug' => 'getting-started-with-laravel-11',
                'excerpt' => 'Learn the basics of Laravel 11 and build your first web application with modern PHP.',
                'content' => '<h2>Introduction to Laravel 11</h2><p>Laravel 11 brings exciting new features and improvements to the already powerful PHP framework. In this guide, we\'ll explore the key features and help you build your first application.</p><h3>What\'s New</h3><p>Laravel 11 introduces streamlined application structure, improved performance, and better developer experience. The framework continues to evolve while maintaining backward compatibility.</p><h3>Getting Started</h3><p>To begin with Laravel 11, you\'ll need PHP 8.2 or higher and Composer installed on your system. The installation process is straightforward and well-documented.</p><p>Follow along as we create a simple blog application demonstrating core Laravel concepts including routing, controllers, models, and views.</p>',
                'category' => 'Web Development',
                'tags' => ['Laravel', 'PHP', 'Tutorials'],
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'title' => 'Building RESTful APIs with Node.js',
                'slug' => 'building-restful-apis-nodejs',
                'excerpt' => 'A comprehensive guide to creating scalable REST APIs using Node.js and Express.',
                'content' => '<h2>REST API Fundamentals</h2><p>Building a robust API is essential for modern web applications. This guide walks through creating a production-ready RESTful API using Node.js and Express.</p><h3>Project Setup</h3><p>We\'ll start by setting up our Node.js project with Express, configuring middleware, and establishing our project structure. Proper organization is key to maintainability.</p><h3>Authentication & Security</h3><p>Learn how to implement JWT authentication, rate limiting, and other security best practices to protect your API endpoints.</p><p>We\'ll also cover error handling, validation, and API documentation using Swagger.</p>',
                'category' => 'Web Development',
                'tags' => ['Node.js', 'JavaScript', 'API', 'REST'],
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Mastering Tailwind CSS',
                'slug' => 'mastering-tailwind-css',
                'excerpt' => 'Deep dive into Tailwind CSS utility classes and building beautiful, responsive interfaces.',
                'content' => '<h2>Why Tailwind CSS?</h2><p>Tailwind CSS has revolutionized how we approach styling in modern web development. Its utility-first approach offers unprecedented flexibility and speed.</p><h3>Core Concepts</h3><p>Understanding Tailwind\'s philosophy is crucial. Instead of pre-designed components, you compose utilities to create custom designs without leaving your HTML.</p><h3>Responsive Design</h3><p>Tailwind makes responsive design intuitive with its breakpoint prefixes. Learn how to build mobile-first layouts that scale beautifully across devices.</p><p>We\'ll also explore customization, dark mode, and advanced techniques for production optimization.</p>',
                'category' => 'Design',
                'tags' => ['Tailwind CSS', 'CSS', 'Design'],
                'published_at' => Carbon::now()->subDays(7),
            ],
            [
                'title' => 'Docker for Web Developers',
                'slug' => 'docker-for-web-developers',
                'excerpt' => 'Learn how to containerize your web applications and streamline your development workflow.',
                'content' => '<h2>Introduction to Docker</h2><p>Docker has become an essential tool for modern web development. Containerization ensures consistency across development, testing, and production environments.</p><h3>Getting Started</h3><p>We\'ll cover Docker basics including images, containers, and volumes. You\'ll learn how to create Dockerfiles and docker-compose configurations for your projects.</p><h3>Best Practices</h3><p>Discover optimization techniques for smaller images, multi-stage builds, and efficient caching strategies. We\'ll also discuss security considerations and common pitfalls to avoid.</p>',
                'category' => 'DevOps',
                'tags' => ['Docker', 'DevOps'],
                'published_at' => Carbon::now()->subDays(10),
            ],
            [
                'title' => 'React Hooks Deep Dive',
                'slug' => 'react-hooks-deep-dive',
                'excerpt' => 'Master React Hooks and learn how to write cleaner, more efficient components.',
                'content' => '<h2>Understanding React Hooks</h2><p>React Hooks transformed how we write React components. This comprehensive guide explores all built-in hooks and teaches you to create custom ones.</p><h3>useState and useEffect</h3><p>We start with the fundamentals - useState for managing component state and useEffect for handling side effects. These two hooks form the foundation of functional components.</p><h3>Advanced Hooks</h3><p>Dive into useContext, useReducer, useMemo, and useCallback. Learn when and why to use each hook for optimal performance and code organization.</p><p>We\'ll build real-world examples demonstrating proper hook usage and common patterns.</p>',
                'category' => 'Web Development',
                'tags' => ['React', 'JavaScript', 'Tutorials'],
                'published_at' => Carbon::now()->subDays(12),
            ],
            [
                'title' => 'Database Design Best Practices',
                'slug' => 'database-design-best-practices',
                'excerpt' => 'Essential principles for designing efficient and scalable database schemas.',
                'content' => '<h2>Fundamentals of Database Design</h2><p>Good database design is crucial for application performance and maintainability. This guide covers normalization, indexing, and optimization strategies.</p><h3>Normalization</h3><p>Learn the normal forms and when to normalize versus when denormalization makes sense. We\'ll explore real-world trade-offs and decision-making processes.</p><h3>Indexing Strategies</h3><p>Understand how indexes work, when to use them, and how they impact query performance. We\'ll cover composite indexes, unique constraints, and index maintenance.</p>',
                'category' => 'Web Development',
                'tags' => ['MySQL', 'Database'],
                'published_at' => Carbon::now()->subDays(15),
            ],
            [
                'title' => 'TypeScript for JavaScript Developers',
                'slug' => 'typescript-for-javascript-developers',
                'excerpt' => 'Transition from JavaScript to TypeScript and enjoy the benefits of static typing.',
                'content' => '<h2>Why TypeScript?</h2><p>TypeScript adds static typing to JavaScript, catching errors at compile time rather than runtime. This guide helps JavaScript developers make the transition smoothly.</p><h3>Type Basics</h3><p>We\'ll cover primitive types, interfaces, and type aliases. Learn how to annotate your existing JavaScript code and leverage TypeScript\'s type inference.</p><h3>Advanced Types</h3><p>Explore generics, union types, and utility types. Discover how TypeScript\'s type system enables better IDE support and refactoring capabilities.</p>',
                'category' => 'Web Development',
                'tags' => ['TypeScript', 'JavaScript'],
                'published_at' => Carbon::now()->subDays(18),
            ],
            [
                'title' => 'GraphQL vs REST: Making the Right Choice',
                'slug' => 'graphql-vs-rest',
                'excerpt' => 'Compare GraphQL and REST APIs to determine the best fit for your project.',
                'content' => '<h2>API Architecture Comparison</h2><p>Choosing between GraphQL and REST depends on your specific use case. This article provides an objective comparison to help you make informed decisions.</p><h3>REST APIs</h3><p>REST has been the standard for years. It\'s simple, well-understood, and has excellent tooling support. We\'ll discuss its strengths and limitations.</p><h3>GraphQL Benefits</h3><p>GraphQL solves many REST limitations with flexible queries and strong typing. However, it introduces complexity. Learn when the trade-off is worthwhile.</p>',
                'category' => 'Web Development',
                'tags' => ['GraphQL', 'REST', 'API'],
                'published_at' => Carbon::now()->subDays(20),
            ],
            [
                'title' => 'Vue 3 Composition API Tutorial',
                'slug' => 'vue-3-composition-api',
                'excerpt' => 'Learn the new Composition API in Vue 3 and write more maintainable components.',
                'content' => '<h2>Vue 3 Composition API</h2><p>Vue 3 introduced the Composition API as an alternative to the Options API. This tutorial teaches you the new patterns and when to use them.</p><h3>Setup Function</h3><p>The setup function is the entry point for composition API. Learn how to define reactive state, computed properties, and methods using the new syntax.</p><h3>Composables</h3><p>Discover how to extract and reuse logic across components using composables. This pattern enables better code organization and testing.</p>',
                'category' => 'Web Development',
                'tags' => ['Vue.js', 'JavaScript', 'Tutorials'],
                'published_at' => Carbon::now()->subDays(23),
            ],
            [
                'title' => 'AWS Deployment Guide for Web Apps',
                'slug' => 'aws-deployment-guide',
                'excerpt' => 'Step-by-step guide to deploying your web application on Amazon Web Services.',
                'content' => '<h2>Deploying to AWS</h2><p>Amazon Web Services offers comprehensive cloud infrastructure for web applications. This guide walks through the deployment process from start to finish.</p><h3>Services Overview</h3><p>We\'ll use EC2 for computing, RDS for databases, S3 for storage, and CloudFront for CDN. Learn how these services work together.</p><h3>Best Practices</h3><p>Discover auto-scaling, load balancing, and monitoring strategies. We\'ll also cover cost optimization and security configurations.</p>',
                'category' => 'DevOps',
                'tags' => ['AWS', 'DevOps', 'Deployment'],
                'published_at' => Carbon::now()->subDays(25),
            ],
            [
                'title' => 'Python for Web Scraping',
                'slug' => 'python-web-scraping',
                'excerpt' => 'Learn how to extract data from websites using Python and Beautiful Soup.',
                'content' => '<h2>Web Scraping with Python</h2><p>Python excels at web scraping with libraries like Beautiful Soup and Scrapy. This tutorial teaches you ethical scraping techniques.</p><h3>Getting Started</h3><p>We\'ll use requests to fetch web pages and Beautiful Soup to parse HTML. Learn how to navigate DOM structures and extract specific data.</p><h3>Advanced Techniques</h3><p>Handle JavaScript-rendered content with Selenium, manage rate limiting, and store scraped data efficiently. Always respect robots.txt and terms of service.</p>',
                'category' => 'Tutorials',
                'tags' => ['Python', 'Web Scraping'],
                'published_at' => Carbon::now()->subDays(28),
            ],
            [
                'title' => 'Modern CSS Layout Techniques',
                'slug' => 'modern-css-layout',
                'excerpt' => 'Master Flexbox and CSS Grid for creating flexible, responsive layouts.',
                'content' => '<h2>CSS Layout Evolution</h2><p>CSS has evolved significantly with Flexbox and Grid. These modern layout systems make responsive design intuitive and maintainable.</p><h3>Flexbox Basics</h3><p>Flexbox excels at one-dimensional layouts. Learn about flex containers, items, and the various properties controlling alignment and distribution.</p><h3>CSS Grid</h3><p>Grid is perfect for two-dimensional layouts. We\'ll cover grid templates, areas, and how to combine Grid with Flexbox for complex designs.</p>',
                'category' => 'Design',
                'tags' => ['CSS', 'Design', 'Web Development'],
                'published_at' => Carbon::now()->subDays(30),
            ],
        ];

        foreach ($posts as $postData) {
            $category = Category::where('name', $postData['category'])->first();
            $tags = Tag::whereIn('name', $postData['tags'])->pluck('id');

            $post = BlogPost::create([
                'user_id' => $user->id,
                'category_id' => $category ? $category->id : null,
                'title' => $postData['title'],
                'slug' => $postData['slug'],
                'excerpt' => $postData['excerpt'],
                'content' => $postData['content'],
                'is_published' => true,
                'published_at' => $postData['published_at'],
            ]);

            $post->tags()->attach($tags);
        }
    }
}
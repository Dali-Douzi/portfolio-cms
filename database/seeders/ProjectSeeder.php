<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'slug' => 'e-commerce-platform',
                'description' => 'A full-featured online marketplace with payment integration, inventory management, and real-time analytics.',
                'content' => '<h2>Project Overview</h2><p>Built a scalable e-commerce platform handling 10,000+ daily transactions. Implemented secure payment processing, automated inventory tracking, and comprehensive admin dashboard.</p><h3>Key Features</h3><ul><li>Multi-vendor support</li><li>Real-time inventory tracking</li><li>Advanced search and filtering</li><li>Secure payment gateway integration</li><li>Mobile-responsive design</li></ul>',
                'tech_stack' => json_encode(['Laravel', 'Vue.js', 'MySQL', 'Stripe', 'Redis']),
                'demo_url' => 'https://demo-ecommerce.example.com',
                'github_url' => 'https://github.com/yourusername/ecommerce-platform',
                'is_featured' => true,
                'is_published' => true,
                'order' => 1,
            ],
            [
                'title' => 'Task Management App',
                'slug' => 'task-management-app',
                'description' => 'A collaborative project management tool with real-time updates, team collaboration features, and deadline tracking.',
                'content' => '<h2>About the Project</h2><p>Developed a comprehensive task management solution for remote teams. Features include drag-and-drop task boards, real-time collaboration, and advanced reporting.</p><h3>Technologies Used</h3><p>Built with modern web technologies ensuring fast performance and seamless user experience.</p>',
                'tech_stack' => json_encode(['React', 'Node.js', 'MongoDB', 'Socket.io', 'Tailwind CSS']),
                'demo_url' => 'https://taskapp-demo.example.com',
                'github_url' => 'https://github.com/yourusername/task-manager',
                'is_featured' => true,
                'is_published' => true,
                'order' => 2,
            ],
            [
                'title' => 'Social Media Dashboard',
                'slug' => 'social-media-dashboard',
                'description' => 'Unified dashboard for managing multiple social media accounts with analytics, scheduling, and engagement tracking.',
                'content' => '<h2>Project Details</h2><p>Created a centralized platform for social media management. Integrates with major platforms including Twitter, Facebook, and Instagram.</p><h3>Core Functionality</h3><ul><li>Multi-platform integration</li><li>Post scheduling</li><li>Analytics and insights</li><li>Engagement tracking</li><li>Content calendar</li></ul>',
                'tech_stack' => json_encode(['Laravel', 'React', 'PostgreSQL', 'Redis', 'Docker']),
                'demo_url' => null,
                'github_url' => 'https://github.com/yourusername/social-dashboard',
                'is_featured' => true,
                'is_published' => true,
                'order' => 3,
            ],
            [
                'title' => 'Weather Forecast API',
                'slug' => 'weather-forecast-api',
                'description' => 'RESTful API providing accurate weather data with historical analysis and future predictions.',
                'content' => '<h2>API Overview</h2><p>Designed and implemented a robust weather API serving millions of requests daily. Aggregates data from multiple sources for accuracy.</p>',
                'tech_stack' => json_encode(['Node.js', 'Express', 'MongoDB', 'Redis', 'AWS']),
                'demo_url' => 'https://api.weather-demo.example.com/docs',
                'github_url' => 'https://github.com/yourusername/weather-api',
                'is_featured' => false,
                'is_published' => true,
                'order' => 4,
            ],
            [
                'title' => 'Portfolio CMS',
                'slug' => 'portfolio-cms',
                'description' => 'A content management system built specifically for developers to showcase their projects and blog posts.',
                'content' => '<h2>About This Project</h2><p>Built a clean, modern CMS tailored for developer portfolios. Features include project showcases, blog management, and contact forms.</p>',
                'tech_stack' => json_encode(['Laravel', 'Tailwind CSS', 'MySQL', 'Alpine.js']),
                'demo_url' => null,
                'github_url' => 'https://github.com/yourusername/portfolio-cms',
                'is_featured' => true,
                'is_published' => true,
                'order' => 5,
            ],
            [
                'title' => 'Fitness Tracking App',
                'slug' => 'fitness-tracking-app',
                'description' => 'Mobile-first fitness application with workout logging, progress tracking, and personalized recommendations.',
                'content' => '<h2>Project Summary</h2><p>Developed a comprehensive fitness tracking solution with over 50,000 active users. Includes workout plans, nutrition tracking, and social features.</p>',
                'tech_stack' => json_encode(['React Native', 'Firebase', 'Node.js', 'GraphQL']),
                'demo_url' => 'https://fitness-demo.example.com',
                'github_url' => null,
                'is_featured' => true,
                'is_published' => true,
                'order' => 6,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Articles about building modern web applications, frameworks, and best practices.',
            ],
            [
                'name' => 'Mobile Development',
                'slug' => 'mobile-development',
                'description' => 'Tips and tutorials for iOS and Android app development.',
            ],
            [
                'name' => 'DevOps',
                'slug' => 'devops',
                'description' => 'CI/CD, deployment strategies, and infrastructure management.',
            ],
            [
                'name' => 'Design',
                'slug' => 'design',
                'description' => 'UI/UX design principles, tools, and creative processes.',
            ],
            [
                'name' => 'Tutorials',
                'slug' => 'tutorials',
                'description' => 'Step-by-step guides and how-to articles.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
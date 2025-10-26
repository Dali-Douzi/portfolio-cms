<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            'Laravel',
            'PHP',
            'JavaScript',
            'React',
            'Vue.js',
            'Tailwind CSS',
            'MySQL',
            'Docker',
            'AWS',
            'API',
            'TypeScript',
            'Node.js',
            'Python',
            'REST',
            'GraphQL',
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag,
                'slug' => \Illuminate\Support\Str::slug($tag),
            ]);
        }
    }
}
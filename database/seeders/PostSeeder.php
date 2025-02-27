<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'ChatGPT, es  inutil?',
            'content' => 'Sabe bastante  menos que yo',
            'user_id' => 1,
            'categoria_id'=>2,
        ]);
        Post::create([
            'title' => 'Pedro sanchez',
            'content' => 'Asi es, volvio a mentir',
            'user_id' => 1,
            'categoria_id'=>2,
        ]);
        Post::create([
            'title' => 'Laravel',
            'content' => 'Abro debate del tema laravel',
            'user_id' => 1,
            'categoria_id'=>1,
        ]);
        Post::factory()->count(10)->create();
    }
}

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
            
        ]);
        Post::create([
            'title' => 'Pedro sanchez',
            'content' => 'Asi es, volvio a mentir',
           
        ]);
        Post::create([
            'title' => 'Laravel',
            'content' => 'Abro debate del tema laravel',
            
        ]);
    }
}

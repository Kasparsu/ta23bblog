<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory(20)->create();
        $posts = Post::all();
        foreach ($posts as $post) {
            $randomTags = $tags->random(rand(0, 5));
            $post->tags()->sync($randomTags);
        }
    }
}

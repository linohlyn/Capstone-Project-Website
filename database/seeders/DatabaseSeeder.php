<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
        ->count(10)
        ->has(Post::factory()
        ->count(2)
        ->state(new Sequence(
            ['image' => 'https://placehold.jp/c91d1d/ffffff/400x400.png'],
            ['image' => 'https://placehold.jp/000000/ffffff/400x400.png']
        ))
        ->has(Comment::factory()->count(2)))
        ->create();
    }
}

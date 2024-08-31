<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory(10)->create();
        \App\Models\Article::factory(20)->create();
        \App\Models\Comment::factory(50)->create();
        \App\Models\Tag::factory(10)->create();

        // 記事にタグを関連付ける
        Article::all()->each(function ($article) {
            // ランダムに1〜3個のタグを取得
            $tags = Tag::inRandomOrder()->take(rand(1, 3))->pluck('id'); 
            
            $article->tags()->attach($tags); 
        });
    }
}

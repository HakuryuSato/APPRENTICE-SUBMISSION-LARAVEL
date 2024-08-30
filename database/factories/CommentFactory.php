<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'body' => $this->faker->paragraph, // ランダムなコメント本文を生成
            'article_id' => Article::factory(), // ランダムな記事に関連付け
            'user_id' => User::factory(), // ランダムなユーザーに関連付け
        ];
    }
}

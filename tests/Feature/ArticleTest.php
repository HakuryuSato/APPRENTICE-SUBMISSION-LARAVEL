<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use App\Models\User;
use App\Models\Article;

class ArticleTest extends TestCase
{

    private $user;
    private $articleData;

    // 初期化処理
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->articleData = [
            'title' => 'Sample Article',
            'body' => 'This is a test article for test :D',
            'description' => 'This is a sample description.',
        ];
    }

    // ユーザーが記事を作成できるか
    #[Test]
    public function user_can_create_article()
    {
        $this->actingAs($this->user);

        $response = $this->post(route('article.store'), $this->articleData);

        $response->assertStatus(302);

        // データベースに保存されている記事のスラグを取得し、動的に検証
        $article = Article::where('title', $this->articleData['title'])->first();
        $response->assertRedirect(route('article.show', ['slug' => $article->slug]));
    }
}

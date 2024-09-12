<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use App\Models\User;
use App\Models\Article;

// コメントテスト
class CommentTest extends TestCase
{
    
    private $user;
    private $article;
    private $testComment;

    // 初期化処理
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->article =  Article::factory()->create();
        $this->testComment = "This is a test comment!!";
    }


    // ユーザーがコメントを投稿可能か
    #[Test]
    public function user_can_post_comment()
    {

        $this->actingAs($this->user);

        $response = $this->post(route('articles.addComment', ['slug' => $this->article->slug]), [
            'body' => $this->testComment,
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('comments', ['body' => $this->testComment]);
    }
}

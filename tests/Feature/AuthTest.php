<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;



class AuthTest extends TestCase
{
    

    private $userData;

    // 初期化処理
    protected function setUp(): void
    {
        parent::setUp();

        // ユーザー登録用のデータを初期化
        $this->userData = [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password', // パスワード確認フィールドを追加
        ];
    }

    // ユーザー登録が可能かテスト
    #[Test]
    public function user_can_register()
    {
        $response = $this->post('/register', $this->userData);

        $response->assertRedirect('/'); // ホームページへのリダイレクトを期待
        $this->assertDatabaseHas('users', ['email' => $this->userData['email']]);
    }
}

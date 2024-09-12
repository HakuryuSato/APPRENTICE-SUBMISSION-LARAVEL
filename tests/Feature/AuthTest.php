<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;


class AuthTest extends TestCase
{
    use RefreshDatabase;

    // ユーザー登録が可能かテスト
    #[Test]
    public function user_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('users', ['email' => 'testuser@example.com']);
    }
}

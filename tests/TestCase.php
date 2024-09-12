<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    /* 
    [追加で必要なテストケース]

    ログイン可能なこと
    ログイン失敗時に適切なエラーメッセージが表示されること

    記事作成が認証済みのユーザーにのみ許可されること
    記事が正しくデータベースに保存されること
    他のユーザーの記事が編集できないこと

    記事の編集が認証済みのユーザーにのみ許可されること
    記事の編集が正しくデータベースに保存されること
    記事の削除が記事の所有者にのみ許可されること
    記事の削除後にデータベースから正しく削除されること

    コメントが認証済みのユーザーにのみ許可されること
    コメントが正しくデータベースに保存されること
    コメントの所有者のみがコメントを削除できること

    ホームページに記事のリストが正しく表示されること
    著者ページで特定の著者の情報と記事が正しく表示されること
        
    */
}

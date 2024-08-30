<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($name)
    {
        // 名前でユーザー情報を取得
        $user = User::where('name', $name)->firstOrFail();

        // ユーザーの所有する記事を取得
        $articles = Article::where('user_id', $user->id)->get();

        // ビューにユーザー情報と記事情報を渡す
        return view('profile.profile', compact('user', 'articles'));
    }
}

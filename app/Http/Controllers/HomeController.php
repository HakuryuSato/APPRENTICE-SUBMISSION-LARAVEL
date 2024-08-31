<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Tag;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // 記事の一覧を取得
        $articles = Article::latest()->paginate(10);
        // タグ一覧を取得
        $tags = Tag::all(); // すべてのタグを取得

        // ビューにデータを渡す
        return view('home', compact('articles', 'tags'));
    }
}

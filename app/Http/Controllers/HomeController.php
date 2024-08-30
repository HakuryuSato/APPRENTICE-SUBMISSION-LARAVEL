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

        // ビューに記事データを渡す
        return view('home', compact('articles'));
    }
}

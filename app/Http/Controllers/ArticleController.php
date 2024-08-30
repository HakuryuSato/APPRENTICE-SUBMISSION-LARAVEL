<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // 記事を表示
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail(); 
        return view('article.show', compact('article')); 
    }



    public function create()
    {
        return view('article.editor');
    }

    public function edit($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail(); // 記事を取得

        return view('editor', compact('article')); // 編集用のビューにデータを渡す
    }

    public function store(Request $request)
    {
        // バリデーションとデータ保存
        $article = new Article;
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->user_id = auth()->id();
        $article->save();

        return redirect()->route('article.show', ['slug' => $article->slug]);
    }

    public function update(Request $request, $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $article->update($request->only('title', 'body'));

        return redirect()->route('article.show', ['slug' => $article->slug]);
    }
}

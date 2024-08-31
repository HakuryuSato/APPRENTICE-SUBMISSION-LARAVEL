<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    // 記事を表示
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('article.show', compact('article'));
    }

    // 記事作成フォームを表示
    public function create()
    {
        return view('article.editor');
    }

    // 記事編集フォームを表示
    public function edit($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('article.editor', compact('article'));
    }

    // 新規作成
    public function store(Request $request)
    {
        // デバッグ用にリクエストデータをログに記録
        Log::info('Form Data: ', $request->all());

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $article = new Article;
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->body = $request->input('body');
        $article->slug = Str::slug($request->input('title')) . '-' . time();
        $article->user_id = Auth::id();
        $article->save();

        return redirect()->route('article.show', ['slug' => $article->slug]);
    }

    // 更新
    public function update(Request $request, $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->body = $request->input('body');
        $article->save();

        return redirect()->route('article.show', ['slug' => $article->slug]);
    }

    // 削除
    public function destroy($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        // 記事が現在のユーザーのものであることを確認
        if (Auth::id() !== $article->user_id) {
            return redirect()->route('home')->withErrors(['msg' => 'Unauthorized']);
        }

        $article->delete();

        return redirect()->route('home')->with('status', 'Article deleted successfully');
    }

    // コメント追加
    public function addComment(Request $request, $slug)
    {
        $request->validate([
            'body' => 'required|max:1000',
        ]);

        $article = Article::where('slug', $slug)->firstOrFail();

        $article->comments()->create([
            'user_id' => Auth::id(),
            'body' => $request->input('body'),
        ]);

        return redirect()->route('articles.show', $article->slug);
    }
}

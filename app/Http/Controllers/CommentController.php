<?php 

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'body' => 'required|string|max:255',
        ]);

        $comment = new Comment([
            'body' => $request->body,
            'user_id' => Auth::id(),
            'article_id' => $article->id,
        ]);

        $comment->save();

        return back();
    }
}

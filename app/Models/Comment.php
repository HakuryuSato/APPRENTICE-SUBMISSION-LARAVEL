<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'user_id',
        'body',
    ];

    // コメントが属する記事を取得
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    // コメントしたユーザーを取得
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

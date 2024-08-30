<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'slug',
        'user_id', // 記事の著者ID
    ];

    // 記事に関連するタグを取得
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // 記事に関連するコメントを取得
    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    // 記事の著者を取得
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

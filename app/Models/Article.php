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
        'user_id',
    ];

    // 記事の著者を取得
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // タグを取得

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}

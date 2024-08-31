<x-app-layout :title="'Article'">
    <div class="article-page">
        <div class="banner">
            <div class="container">
                <h1>{{ $article->title }}</h1>

                <div class="article-meta">
                    <a href="{{ route('profile.show', ['name' => $article->user->name]) }}">
                        <img src="{{ $article->user->profile_image_url }}" />
                    </a>
                    <div class="info">
                        <a href="{{ route('profile.show', ['name' => $article->user->name]) }}" class="author">{{ $article->user->name }}</a>
                        <span class="date">{{ $article->created_at->format('F jS') }}</span>
                    </div>
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="ion-plus-round"></i>
                        &nbsp; Follow {{ $article->user->name }} <span class="counter">({{ $article->user->followers_count ?? 0 }})</span>
                    </button>
                    &nbsp;&nbsp;
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="ion-heart"></i>
                        &nbsp; Favorite Post <span class="counter">({{ $article->favorites_count ?? 0 }})</span>
                    </button>

                    <!-- もし自分の記事なら編集可能 -->
                    @if (auth()->check() && auth()->id() === $article->user_id)

                    <!-- 編集ボタン -->
                    <a href="{{ route('editor.edit', ['slug' => $article->slug]) }}" class="btn btn-sm btn-outline-secondary">
                        <i class="ion-edit"></i> Edit Article
                    </a>

                    <!-- 削除ボタン -->
                    <form action="{{ route('article.delete', ['slug' => $article->slug]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">
                            <i class="ion-trash-a"></i> Delete Article
                        </button>
                    </form>
                    @endif

                </div>
            </div>
        </div>

        <div class="container page">
            <div class="row article-content">
                <div class="col-md-12">
                    <p>{{ $article->body }}</p>
                    @if ($article->tags->isNotEmpty())
                    <ul class="tag-list">
                        @foreach ($article->tags as $tag)
                        <li class="tag-default tag-pill tag-outline">{{ $tag->name }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>

            <hr />

            <div class="article-actions">
                <div class="article-meta">
                    <a href="/profile/{{ $article->user->username }}"><img src="{{ $article->user->profile_image_url }}" /></a>
                    <div class="info">
                        <a href="/profile/{{ $article->user->username }}" class="author">{{ $article->user->name }}</a>
                        <span class="date">{{ $article->created_at->format('F jS') }}</span>
                    </div>

                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="ion-plus-round"></i>
                        &nbsp; Follow {{ $article->user->name }}
                    </button>
                    &nbsp;
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="ion-heart"></i>
                        &nbsp; Favorite Article <span class="counter">({{ $article->favorites_count ?? 0 }})</span>
                    </button>
                </div>
            </div>

            {{-- コメントフォームとコメントの表示 --}}
            <div class="row">
                <div class="col-xs-12 col-md-8 offset-md-2">
                    @if(auth()->check())
                    <form class="card comment-form" method="POST" action="{{ route('articles.addComment', $article->slug) }}">
                        @csrf
                        <div class="card-block">
                            <textarea name="body" class="form-control" placeholder="Write a comment..." rows="3"></textarea>
                        </div>
                        <div class="card-footer">
                            <img src="{{ auth()->user()->profile_image_url ?? 'http://i.imgur.com/Qr71crq.jpg' }}" class="comment-author-img" />
                            <button type="submit" class="btn btn-sm btn-primary">Post Comment</button>
                        </div>
                    </form>
                    @endif
                </div>

                @foreach ($article->comments as $comment)
                <div class="card">
                    <div class="card-block">
                        <p class="card-text">{{ $comment->body }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="/profile/{{ $comment->user->username }}" class="comment-author">
                            <img src="{{ $comment->user->profile_image_url }}" class="comment-author-img" />
                        </a>
                        &nbsp;
                        <a href="/profile/{{ $comment->user->username }}" class="comment-author">{{ $comment->user->name }}</a>
                        <span class="date-posted">{{ $comment->created_at->format('F jS') }}</span>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
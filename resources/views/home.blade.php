<x-app-layout :title="'Home'">
    <div class="home-page">
        <div class="banner">
            <div class="container">
                <h1 class="logo-font">conduit</h1>
                <p>A place to share your knowledge.</p>
            </div>
        </div>

        <div class="container page">
            <div class="row">
                <div class="col-md-9">
                    <div class="feed-toggle">
                        <ul class="nav nav-pills outline-active">
                            <li class="nav-item">
                                <a class="nav-link" href="">Your Feed</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="">Global Feed</a>
                            </li>
                        </ul>
                    </div>

                    @foreach ($articles as $article)
                    <div class="article-preview">
                        <div class="article-meta">
                            <!-- ユーザーのプロフィールページへのリンク -->
                            <a href="{{ route('profile.show', ['name' => $article->user->name]) }}">
                                <img src="{{ $article->user->profile_image_url }}" />
                            </a>
                            <div class="info">
                                <a href="{{ route('profile.show', ['name' => $article->user->name]) }}" class="author">{{ $article->user->name }}</a>
                                <span class="date">{{ $article->created_at->format('F jS') }}</span>
                            </div>
                            <button class="btn btn-outline-primary btn-sm pull-xs-right">
                                <i class="ion-heart"></i> {{ $article->favorites_count ?? 0 }}
                            </button>
                        </div>
                        <a href="/article/{{ $article->slug }}" class="preview-link">
                            <h1>{{ $article->title }}</h1>
                            <p>{{ $article->description ?? 'No description available' }}</p>
                            <span>Read more...</span>
                            @if ($article->tags->isNotEmpty())
                            <ul class="tag-list">
                                @foreach ($article->tags as $tag)
                                <li class="tag-default tag-pill tag-outline">{{ $tag->name }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </a>
                    </div>
                    @endforeach


                    <!-- {{ $articles->links() }} -->
                </div>

                <div class="col-md-3">
                    <div class="sidebar">
                        <p>Popular Tags</p>

                        <div class="tag-list">
                            @foreach ($tags as $tag)
                            <a href="" class="tag-pill tag-default">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
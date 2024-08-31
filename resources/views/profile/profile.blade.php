<x-app-layout :title="$user->name . ' Profile'">
<div class="profile-page">
  <div class="user-info">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-10 offset-md-1">
          <img src="{{ $user->profile_image_url ?? 'http://i.imgur.com/Qr71crq.jpg' }}" class="user-img" />
          <h4>{{ $user->name }}</h4>
          <p>
            {{ $user->bio ?? 'No bio available.' }}
          </p>

          @if (auth()->check() && auth()->id() === $user->id)
            <!-- プロフィール編集ボタン -->
            <button class="btn btn-sm btn-outline-secondary action-btn">
              <i class="ion-gear-a"></i>
              &nbsp; Edit Profile Settings
            </button>
          @else
            <!-- フォローボタン -->
            <button class="btn btn-sm btn-outline-secondary action-btn">
              <i class="ion-plus-round"></i>
              &nbsp; Follow {{ $user->name }}
            </button>
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-10 offset-md-1">
        <div class="articles-toggle">
          <ul class="nav nav-pills outline-active">
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('profile.show', ['name' => $user->name]) }}">My Articles</a>
            </li>
          </ul>
        </div>

        @foreach ($articles as $article)
          <div class="article-preview">
            <div class="article-meta">
              <a href="{{ route('profile.show', ['name' => $user->name]) }}"><img src="{{ $user->profile_image_url }}" /></a>
              <div class="info">
                <a href="{{ route('profile.show', ['name' => $user->name]) }}" class="author">{{ $user->name }}</a>
                <span class="date">{{ $article->created_at->format('F jS, Y') }}</span>
              </div>
            </div>
            <a href="{{ route('article.show', ['slug' => $article->slug]) }}" class="preview-link">
              <h1>{{ $article->title }}</h1>
              <p>{{ $article->description }}</p>
              <span>Read more...</span>
              <ul class="tag-list">
                @foreach(explode(',', $article->tags) as $tag)
                  <li class="tag-default tag-pill tag-outline">{{ $tag }}</li>
                @endforeach
              </ul>
            </a>
          </div>
        @endforeach

        <!-- ページネーション (必要に応じて追加) -->
        <ul class="pagination">
          <li class="page-item active">
            <a class="page-link" href="">1</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="">2</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
</x-app-layout>

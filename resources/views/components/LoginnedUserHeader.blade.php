<nav class="navbar navbar-light">
  <div class="container">
    <a class="navbar-brand" href="/">conduit</a>
    <ul class="nav navbar-nav pull-xs-right">
      <li class="nav-item">
        <!-- ホームリンク、現在のページがホームの場合に "active" クラスを追加 -->
        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
      </li>
      <li class="nav-item">
        <!-- 新しい記事作成ページへのリンク -->
        <a class="nav-link {{ request()->is('editor') ? 'active' : '' }}" href="{{ route('editor.create') }}">
          <i class="ion-compose"></i>&nbsp;New Article
        </a>
      </li>
      <li class="nav-item">
        <!-- 設定ページへのリンク -->
        <a class="nav-link {{ request()->is('settings') ? 'active' : '' }}" href="/settings">
          <i class="ion-gear-a"></i>&nbsp;Settings
        </a>
      </li>
      <li class="nav-item">
        <!-- ログインユーザーのプロフィールページへのリンク -->
        <a class="nav-link {{ request()->is('profile/' . Auth::user()->username) ? 'active' : '' }}" href="{{ route('profile.show', ['username' => Auth::user()->username]) }}">
          <img src="{{ Auth::user()->profile_picture_url }}" class="user-pic" alt="User Picture" />
          {{ Auth::user()->name }}
        </a>
      </li>
    </ul>
  </div>
</nav>

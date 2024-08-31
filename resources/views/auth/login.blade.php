<x-app-layout :title="'login'">
  <div class="auth-page">
    <div class="container page">
      <div class="row">
        <div class="col-md-6 offset-md-3 col-xs-12">
          <h1 class="text-xs-center">Sign in</h1>
          <p class="text-xs-center">
            <a href="{{ route('register') }}">Need an account?</a>
          </p>

          <!-- エラーメッセージの表示 -->
          @if ($errors->any())
            <ul class="error-messages">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          @endif

          <!-- ログインフォーム -->
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <fieldset class="form-group">
              <input class="form-control form-control-lg" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
            </fieldset>
            <fieldset class="form-group">
              <input class="form-control form-control-lg" type="password" name="password" placeholder="Password" required />
            </fieldset>
            <button class="btn btn-lg btn-primary pull-xs-right" type="submit">Sign in</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

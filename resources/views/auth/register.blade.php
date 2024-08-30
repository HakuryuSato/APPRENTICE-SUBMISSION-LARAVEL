<x-layouts.app :title="'register'">
  <div class="auth-page">
    <div class="container page">
      <div class="row">
        <div class="col-md-6 offset-md-3 col-xs-12">
          <h1 class="text-xs-center">Sign up</h1>
          <p class="text-xs-center">
            <a href="/login">Have an account?</a>
          </p>

          <!-- エラー表示 -->
          @if ($errors->any())
            <ul class="error-messages">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          @endif

          <form method="POST" action="{{ route('register') }}">
            @csrf
            <fieldset class="form-group">
              <input class="form-control form-control-lg" type="text" name="user_name" placeholder="Username" value="{{ old('user_name') }}" />
            </fieldset>
            <fieldset class="form-group">
              <input class="form-control form-control-lg" type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
            </fieldset>
            <fieldset class="form-group">
              <input class="form-control form-control-lg" type="password" name="password" placeholder="Password" />
            </fieldset>
            <button class="btn btn-lg btn-primary pull-xs-right">Sign up</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-layouts.app>

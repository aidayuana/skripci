@extends('layouts.guest')
@section('content')
  <div class="col-lg-6 col-md-7 col-sm-8">
    <div class="card shadow-lg">
      <div class="card-body p-4">
        <h1 class="fs-4 text-center fw-bold mb-4">Login</h1>
        <h1 class="fs-6 mb-3">Silakan masukkan email dan password Anda untuk masuk.</h1>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('login') }}" class="needs-validation">
          @csrf
          <div class="mb-3">
            <label class="mb-2 text-muted" for="email">E-Mail Address</label>
            <div class="input-group input-group-join mb-3">
              <input id="email" type="email" placeholder="Masukkan Email" class="form-control" name="email"
                required autofocus autocomplete="username" />
              <span class="input-group-text rounded-end">&nbsp<i class="fa fa-envelope"></i>&nbsp</span>
              <x-input-error :messages="$errors->get('email')" for="email" class="mt-2" />
            </div>
          </div>

          <div class="mb-3">
            <div class="mb-2 w-100">
              <label class="text-muted" for="password">Password</label>
            </div>
            <div class="input-group input-group-join mb-3">
              <input type="password" id="password" class="form-control" placeholder="Password Anda" name="password"
                required autocomplete="current-password" />
              <span class="input-group-text rounded-end password cursor-pointer">
                &nbsp<i id="eye" class="fa fa-eye"></i>&nbsp
              </span>
              <x-input-error :messages="$errors->get('password')" for="password" class="mt-2" />
            </div>
          </div>

          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
              <input type="checkbox" name="remember" id="remember_me" class="form-check-input" />
              <label for="remember_me" class="form-check-label">Remember Me</label>
            </div>
            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="text-end">Lupa Password?</a>
            @endif
          </div>

          <div class="d-flex align-items-center">
            <button type="submit" class="btn btn-primary ms-auto">Login</button>
          </div>
        </form>
      </div>
      <div class="card-footer py-3 border-0">
        <div class="text-center">
          Belum memiliki akun?
          <a href="{{ route('register') }}" class="text-dark">Register</a>
        </div>
      </div>
    </div>
    
  </div>
  <script>
    $(document).ready(function() {
      const password = $('#password');
      $('#eye').click(function() {
        if (password.attr('type') === 'password') {
          password.attr('type', 'text');
          $('#eye').removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
          password.attr('type', 'password');
          $('#eye').removeClass('fa-eye-slash').addClass('fa-eye');
        }
      });
    });
  </script>
@endsection

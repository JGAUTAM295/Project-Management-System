@extends('layouts.auth')

@section('content')
<div class="login-box">
  <div class="login-logo">
  <a href="{{ url('/') }}"><b>Project</b>Management</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">{{ __('Confirm Password') }}<br>{{ __('Please confirm your password before continuing.') }}</p>

      <form method="post" action="{{ route('password.confirm') }}">
      @csrf
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Confirm Password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">I forgot my password</a>
        @endif
      </p>
      <p class="mb-0">
        <a href="{{ route('login') }}" class="text-center">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection

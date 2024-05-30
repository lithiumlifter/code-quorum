@extends('layouts.app')

@section('content')
{{-- SSSSSSS --}}
<div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 d-flex align-items-center justify-content-center">
          <img src="{{ url("assets/img/logo.png") }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Register</h3>
              <p class="mb-4">Silahkan isi form di bawah ini untuk daftar akun.</p>
            </div>
            <form action="{{ route('register') }}" method="post" id="loginForm">
              @csrf

              <div class="form-group first">
                <label for="username">Username</label>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group first">
                <label for="email">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              
              <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group last mb-4">
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
        
              <span class="text-center mb-2">
                Sudah punya akun?
                <a href="{{ route('login') }}">Login</a>
              </span>
              <input type="submit" value="Register" class="btn btn-block custom-submit-btn">
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

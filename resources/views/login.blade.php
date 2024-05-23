<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>

        <!-- Main css -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link rel="stylesheet" href="assets/css/login-register.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Font Icon -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .custom-submit-btn {
            background-color: #157EC1 !important;
            border-color: #157EC1 !important;
            color: #fff;
        }

        .custom-submit-btn:hover {
            background-color: #1369a8 !important;
            border-color: #1369a8 !important;
            color: #fff;
        }
    </style>
</head>
<body>
    <main class="py-4">
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
                      <h3>Log In</h3>
                      <p class="mb-4">Silahkan Login dengan akun yang sudah didaftarkan.</p>
                    </div>
                    <form action="#" method="post" id="loginForm">
                      @csrf
                      <div class="form-group first">
                        <label for="email">Email Address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      
                      <div class="form-group last mb-4">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>Halo</strong>
                            </span>
                        @enderror
                      </div>
                
                      <div class="d-flex mb-5 align-items-center justify-content-between">
                        <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                            <input type="checkbox" checked="checked" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                            <div class="control__indicator"></div>
                        </label>
                        @if (Route::has('password.request'))
                            <span class="ml-auto">
                                <a href="#" class="forgot-pass" id="forgotPass">Forgot Password</a>
                            </span> 
                        @endif
                      </div>
                      <span class="text-center mb-2">
                        Belum punya akun?
                        <a href="#">Register</a>
                      </span>
                      <input type="submit" value="Log In" class="btn btn-block custom-submit-btn">
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </main>

    {{-- JS --}}
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
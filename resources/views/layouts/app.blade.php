<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Code Quorum</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="assets/css/login-register.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">

    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

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
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Font Icon -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    {{-- JS --}}
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="{{ asset('/sw.js') }}"></script>
        <script>
          if ("serviceWorker" in navigator) {
              // Register a service worker hosted at the root of the
              // site using the default scope.
              navigator.serviceWorker.register("/sw.js").then(
              (registration) => {
                console.log("Service worker registration succeeded:", registration);
              },
              (error) => {
                console.error(`Service worker registration failed: ${error}`);
              },
            );
          } else {
            console.error("Service workers are not supported.");
          }
        </script>
</body>
</html>

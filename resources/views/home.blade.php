<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Code Quorum</title>

        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
      {{-- NAVBAR --}}
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container flex justify-content-between">
              <a class="navbar-link" href="{{ route('home') }}">
                <img class="h-80px" src="{{ url('assets/img/logo.png') }}" alt="Logo Code Quorum">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Forum</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">About Us</a>
                  </li>
                </ul>
                <form class="d-flex w-50" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  {{-- <button class="btn btn-light" type="submit">Search</button> --}}
                </form>
                <ul  class="navbar-nav ms-auto my-2 my-lg-0">
                  <li class="nav-item my-auto">
                    <a class="nav-link text-nowrap text-blue" href="">Log In</a>
                  </li>
                  <li class="nav-item ps-1 pe-0">
                    <a class="btn btn-register text-white" href="">Register</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
        {{-- HEADER --}}
        <header class="container">
          <div class="row align-items-center flex-sm-column flex-md-row">
            <div class="col-md-6">
              <h1>Selamat Datang di </h1> <h1 class="text-blue-main">Code Quorum!</h1>
              <p class="mb-4">Tempat di Mana Kode Berkumpul dan Pengetahuan Berkembang!</p>
              <a href="" class="btn btn-hero-first">Register</a>
              <a href="" class="btn btn-hero-second">Join Forum</a>
            </div>
            <div class="col-md-6 order-first order-lg-last">
              <img class="hero-image" src="{{ url("assets/img/illustration_home.jpg") }}" alt="Ilustrasi home page">
            </div>
          </div>
        </header>        
    </body>
</html>

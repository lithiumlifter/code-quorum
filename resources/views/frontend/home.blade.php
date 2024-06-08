<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Code Quorum</title>

        @vite(['resources/scss/app.scss', 'resources/js/app.js'])

        <!-- PWA  -->
        <meta name="theme-color" content="#6777ef"/>
        <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
        <link rel="manifest" href="{{ asset('/manifest.json') }}">

         <!-- Font Awesome icons (free version)-->
         <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="antialiased">
      {{-- NAVBAR --}}
        <nav id="navbar-home" class="navbar navbar-expand-lg bg-white">
            <div class="container flex justify-content-between">
              <a class="navbar-link" href="{{ route('home') }}">
                <img class="h-80px" src="{{ url('assets/img/logo.png') }}" alt="Logo Code Quorum">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Beranda</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('discussions.index') }}">Forum</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#about-us">Tentang Kami</a>
                  </li>
                </ul>
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                  @if (Auth::check())
                      <div class="dropdown no-arrow text-end">
                        <a href="#" class="d-block link-dark text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::user()->picture ? asset('storage/profiles/' . basename(Auth::user()->picture)) : url('assets/img/user.png') }}" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small dropdown-menu-end" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item text-muted" href="{{ route('profile.index') }}">
                              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400" style="color: gray"></i> Profile</a></li>
                            {{-- <li><a class="dropdown-item text-muted" href="#">
                              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400" style="color: gray"></i> Settings</a></li> --}}
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-muted" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" style="color: gray"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                  @else
                      <li class="nav-item my-auto nav-home">
                          <a class="nav-link text-nowrap text-blue" href="{{ route('login') }}">Log In</a>
                      </li>
                      <li class="nav-item ps-1 pe-0 nav-home">
                          <a class="btn btn-register text-white" href="{{ route('register') }}">Register</a>
                      </li>
                  @endif
              </ul>
              </div>
            </div>
        </nav>
        {{-- HEADER --}}
        <header class="container mb-2">
          <div class="row align-items-center flex-sm-column flex-md-row">
            <div class="col-md-6">
              <h1>Selamat Datang di </h1> <h1 class="text-blue-main">Code Quorum!</h1>
              <p class="mb-4">Tempat di Mana Kode Berkumpul dan Pengetahuan Berkembang!</p>
              <a href="{{ route('register') }}" class="btn btn-hero-first">Register</a>
              <a href="{{ route('login') }}" class="btn btn-hero-second">Join Forum</a>
            </div>
            <div class="col-md-6 order-first order-lg-last">
              <img class="hero-image" src="{{ url("assets/img/illustration_home.jpg") }}" alt="Ilustrasi home page">
            </div>
          </div>
        </header>
        {{-- MAIN --}}
        <main>
          {{-- SECTION 1 --}}
            <section class="page-section" id="services">
              <div class="container p-5">
                  {{-- <div class="text-center">
                      <h2 class="section-heading text-uppercase">Services</h2>
                      <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                  </div> --}}
                  <div class="row text-center">
                      <div class="col-md-4 feature-item">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-blue-main"></i>
                            <i class="fas fa-comments fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Ask the Community</h4>
                        <p class="text-muted">Dapatkan wawasan langsung dari komunitas kami. Ajukan pertanyaan, bagikan pengetahuan, dan temukan solusi dari pengguna lain. Di sinilah kolaborasi dan pembelajaran bersama dimulai.</p>
                    </div>                  
                    <div class="col-md-4 feature-item">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-blue-main"></i>
                            <i class="fas fa-code fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Code Collaboration</h4>
                        <p class="text-muted">Kolaborasi dalam pengembangan kode adalah kunci kesuksesan. Dengan platform kami, Anda dapat bekerja sama dengan developer lain untuk membangun solusi yang kuat dan inovatif.</p>
                    </div>
                    <div class="col-md-4 feature-item">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-blue-main"></i>
                            <i class="fas fa-lightbulb fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Expert Advice</h4>
                        <p class="text-muted">Dapatkan saran dan arahan dari para ahli di industri. Temukan solusi terbaik untuk tantangan teknis Anda dan tingkatkan keahlian Anda dalam pengembangan perangkat lunak.</p>
                    </div>
                </div>
                            
                </div>
            </section>
          {{-- SECTION 2 --}}
          <section class="page-section">
            <div class="container">
                <div class="text-center mb-5">
                  <h2 class="section-heading">Tanya Jawab & Berkolaborasi</h2>
                  <h3 class="section-subheading text-muted">Mari Berdiskusi dan Bekerja Sama.</h3>
                </div>
                <div class="row">
                  @foreach ($latestDiscussions as $discussion)
                  <div class="col-12 col-lg-4 mb-3">
                      <div class="card p-3 shadow-lg" style="border: none; min-height: 200px;">
                          <a href="{{ route('discussions.show', $discussion->slug) }}" style="text-decoration: none;">
                              <h5 style="font-size: 16px; color: black;">{{ $discussion->title }}</h5>
                          </a>
                          <div>
                              <p class="mb-5" style="font-size: 12px">
                                  {{ $discussion->content_preview }}
                              </p>
                              <div class="row">
                                  <div class="col me-1 me-lg-2">
                                      @foreach ($discussion->tags->take(1) as $tag)
                                          <a href="/discussions?tag={{ $tag->slug }}" style="text-decoration: none;">
                                              <span class="badge rounded-pill text-bg-light">{{ $tag->name }}</span>
                                          </a>
                                      @endforeach
                                      @if ($discussion->tags->count() > 1)
                                          <span class="badge rounded-pill text-bg-light">...</span>
                                      @endif
                                  </div>
                                  <div class="col-5 col-lg-7">
                                      <div class="avatar-sm-wrapper d-inline-block">
                                          <a href="{{ route('profile.show', $discussion->user->uid) }}" class="me-1">
                                              <img src="{{ $discussion->user->picture ? asset('storage/profiles/' . basename($discussion->user->picture)) : url("assets/img/user.png") }}" 
                                                  class="avatar rounded-circle" alt="{{ $discussion->user->name }}" style="width: 25px; height: 25px;">
                                          </a>
                                      </div>
                                      <span class="fs-12px">
                                          <a href="{{ route('profile.show', $discussion->user->uid) }}" class="me-1 fw-bold" style="text-decoration: none; color:black;">
                                              {{ 
                                                strlen($discussion->user->username) > 7
                                                ? substr($discussion->user->username , 0, 7) . '...'
                                                : $discussion->user->username
                                              }}
                                          </a>
                                          <span class="color-gray">{{ $discussion->created_at->diffForHumans() }}</span>
                                      </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              @endforeach
              
                </div>
            </div>
          </section>
         
          {{-- ABOUT US --}}
          <section class="page-section mb-5" id="about-us">
            <div class="container p-5">
              <div class="text-center mb-4">
                <h2 class="section-heading">Tentang Kami</h2>
                <h3 class="section-subheading text-muted">Pelajari lebih lanjut tentang platform kami.</h3>
              </div>
              <div class="row">
                <div class="col-lg-8 mx-auto">
                  <p class="text-muted">Di Code Quorum, kami percaya pada kekuatan pembelajaran dan kolaborasi yang didorong oleh komunitas. Platform kami dirancang untuk menyatukan pengembang, programmer, dan penggemar teknologi dari seluruh dunia untuk berbagi pengetahuan, bertanya, dan berkolaborasi dalam proyek-proyek.</p>
                  <p class="text-muted">Baik Anda seorang pengembang berpengalaman yang mencari saran ahli atau seorang pemula yang baru memulai perjalanan coding, Code Quorum menyediakan lingkungan yang sempurna untuk terhubung dengan individu yang berpikiran sama, mempelajari keterampilan baru, dan tumbuh bersama.</p>
                  <p class="text-muted">Bergabunglah dengan kami hari ini dan menjadi bagian dari komunitas pengembang kami yang dinamis. Mari kita kode, berkolaborasi, dan berinovasi bersama!</p>
              </div>
            </div>
          </section>
        </main>
        {{-- FOOTER --}}
        <footer class="footer-20192 mt-5">
          <div class="site-section">
              <div class="container">
                  <div class="cta justify-content-between align-items-center px-5">
                      <div>
                          <h2 class="mb-0">Siap untuk berkontribusi?</h2>
                          <h3 class="text-dark">Let's get started!</h3>
                      </div>
                      <div>
                          <a href="{{ route('login') }}" class="btn btn-dark rounded-0 py-3 px-5">Gabung Forum!</a>
                      </div>
                  </div>
                  <div class="row mt-4">
                      <div class="col-sm">
                          <a href="#" class="footer-logo">Code Quorum</a>
                          <p class="copyright">
                              <small>&copy; 2024</small>
                          </p>
                      </div>
                      <div class="col-sm">
                          <h3>Perusahaan</h3>
                          <ul class="list-unstyled links">
                              <li><a href="#">About us</a></li>
                              <li><a href="#">Contact us</a></li>
                          </ul>
                      </div>
                      <div class="col-sm">
                          <h3>Informasi Lebih Lanjut</h3>
                          <ul class="list-unstyled links">
                              <li><a href="#">Terms &amp; Conditions</a></li>
                              <li><a href="#">Privacy Policy</a></li>
                          </ul>
                      </div>
                      <div class="col-sm">
                          <h3>Alamat</h3>
                          <ul class="list-unstyled links">
                              <li><p>Jl. Ketintang Baru XVII no. 22B, Kec. Gayungan, Kel. Ketintang, Kota Surabaya, Jawa Timur.</p></li>
                          </ul>
                      </div>
                      <div class="col-md-3">
                          <h3>Follow us</h3>
                          <ul class="list-unstyled social">
                              <li><a href="#"><span class="icon-facebook"><i class="fa-brands fa-facebook"></i></span></a></li>
                              <li><a href="#"><span class="icon-twitter"><i class="fa-brands fa-twitter"></i></span></a></li>
                              <li><a href="#"><span class="icon-linkedin"><i class="fa-brands fa-linkedin"></i></span></a></li>
                              <li><a href="#"><span class="icon-medium"><i class="fa-brands fa-medium"></i></span></a></li>
                              <li><a href="#"><span class="icon-paper-plane"><i class="fa-brands fa-instagram"></i></span></a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </footer>
      
        {{-- SCRIPT --}}
        <script>
          window.addEventListener("scroll", function() {
            var navbar = document.querySelector(".navbar");
            navbar.classList.toggle("fixed-top", window.scrollY > 0);
          });
        </script>

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forum</title>
    
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="{{ asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') }}"
        rel="stylesheet">
    
     <!-- Favicon-->
     <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
     <!-- Font Awesome icons (free version)-->
     <script src="{{ asset('https://use.fontawesome.com/releases/v6.3.0/js/all.js') }}" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css') }}" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <style>
        html, body{
            overflow-x: hidden;
            height: 100%;
            margin: 0;
            padding: 0;
            /* overflow: hidden; */
        }
    </style>

</head>

<body>
    <header id="header-forum">
            @include('frontend.templates.layouts.navbar')
    </header>

    <div id="main-content" class="container-fluid">
        <div class="row">
            @include('frontend.templates.layouts.sidebar')

            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    @include('frontend.templates.layouts.footer')
    <!-- End of Footer -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-blue-main-color" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

    {{-- summer note --}}
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js') }}"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    @stack('scripts')

    <script>
        $(document).ready(function () {
            $("#sidebarToggleTop").click(function () {
                $("aside").toggleClass("d-none");
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#sidebarToggleTop").click(function () {
                $("aside").toggleClass("d-none");
                $("aside").toggleClass("dropdown-menu");
            });
        });
    </script>

<script>
    function copyCurrentPath() {
        // Mendapatkan path dari URL saat ini
        var currentPath = window.location.href;
        
        // Membuat sebuah elemen textarea untuk menyimpan path
        var tempInput = document.createElement("textarea");
        tempInput.value = currentPath;
        document.body.appendChild(tempInput);
        
        // Memilih teks di dalam elemen textarea
        tempInput.select();
        tempInput.setSelectionRange(0, 99999); /* Untuk perangkat mobile */
        
        // Menyalin teks yang dipilih ke clipboard
        document.execCommand("copy");
        
        // Menghapus elemen textarea yang telah dibuat
        document.body.removeChild(tempInput);
        
        // Memberikan umpan balik atau aksi tambahan jika diperlukan
        alert("URL copied to clipboard: " + currentPath);
    }
</script>
</body>

</html>
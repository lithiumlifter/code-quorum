<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forum</title>

    <!-- Main css -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    
     <!-- Favicon-->
     <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
     <!-- Font Awesome icons (free version)-->
     <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="fonts/icomoon/style.css">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    {{-- Summer Note LINK CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

</head>

<body>
    <header>
            <!-- NAVBAR -->
            <nav class="navbar navbar-expand bg-white topbar static-top shadow">
                <div class="container d-flex justify-content-between">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button class="btn btn-link d-md-none rounded-circle mr-3 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Action</button></li>
                        <li><button class="dropdown-item" type="button">Another action</button></li>
                        <li><button class="dropdown-item" type="button">Something else here</button></li>
                    </ul>

                    <!-- Sidebar - Brand - LG -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center d-lg-block" href="index.html">
                        <div class="sidebar-brand-text mx-3">
                            <img class="h-80px p-2 d-none d-md-block" src="{{ url('assets/img/logo.png') }}" alt="Logo Code Quorum">
                        </div>
                    </a>

                    <!-- Sidebar - Brand - SM -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center d-md-none" href="index.html">
                        <div class="sidebar-brand-text mx-3">
                            <img class="h-60px p-2" src="{{ url('assets/img/logo_sm.png') }}" alt="Logo Code Quorum">
                        </div>
                    </a>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span> --}}
                                <img class="img-profile rounded-circle"
                                    src="assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </div>

            </nav>
    </header>

    <div class="container-fluid p-0">
        <div class="row">
            <aside class="col-md-3 card d-none d-md-block" style="border-radius: 0; border-bottom:none; border-right:none;">
                <!-- Aside menu -->
                <nav>
                    <ul id="sidebar-forum">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">
                                <i class="fa-solid fa-comments"></i>
                                <span>All Disscussion</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">
                                <i class="fa-solid fa-comment"></i>
                                <span>My Disscussion</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">
                                <i class="fa-solid fa-comment-dots"></i>
                                <span>My Answer</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">
                                <i class="fa-solid fa-tag"></i>
                                <span>Tags</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">
                                <i class="fa-solid fa-user"></i>
                                <span>Profile</span></a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <main class="col-md-9 card p-3" style="border-radius: 0; height: 100vw;">
                {{-- Top --}}
                <div class="container mb-2">
                    <div class="row justify-content-between">
                        <div class="col-6 col-md-auto">
                            <h4>All Discussion > Gimana cara masang webpack di laravel?</h4>
                        </div>
                        <div class="col-6 col-md-auto d-flex justify-content-end">
                            <a href="#" class="btn btn-dark">Create Discussion</a>
                        </div>
                    </div>
                </div>                
                <!-- Main content -->
                <div class="card card-discussions p-3">
                    <div class="row">
                        {{-- column 1 --}}
                        <div class="col-12 col-lg-1 mb-1 mb-lg-0 d-flex flex-row flex-lg-column">
                            <div class="me-2 me-lg-0 mb-2">
                                <i class="fa-regular fa-heart"></i>
                                <span>Like</span></a>
                            </div>
                            <div class="mb-1">
                                <i class="fa-regular fa-bookmark"></i>
                                <span>Save</span></a>
                            </div>
                        </div>
                        {{-- column 2 --}}
                        <div class="col-12 col-lg-10 mb-1 mb-lg-0 d-flex flex-column">
                            {{-- <a href="{{ route('detail-forum') }}" class="text-decoration-none">
                                <h5>Gimana caranya masang webpack di laravel?</h5>
                            </a> --}}
                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur cum est eos repudiandae in vero ex, magnam ea sunt fugiat voluptatibus? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam eveniet adipisci culpa quam quos! Facilis commodi magni laboriosam recusandae voluptatem expedita iste? Soluta illo ut, nesciunt mollitia suscipit reiciendis dolores! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo accusantium eveniet est neque, assumenda explicabo ratione eius facere, excepturi at id. Ipsam praesentium odio in voluptatum, quam non ad facere. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit, minima. Enim delectus labore, obcaecati temporibus vel quod quaerat earum, similique eum ullam minima eius debitis quos consequuntur, fugit ratione dolore. Lorem ipsum, dolor sit amet consectetur adipisicing elit. At adipisci molestiae illo! Harum quae maxime labore minima dolor, molestias numquam quasi quidem nobis at quo repellendus explicabo sint recusandae tempora. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio facere quasi corporis sint modi, alias iusto suscipit ex fugit eveniet quibusdam dolore voluptatum architecto praesentium saepe officiis unde officia perspiciatis! </p>
                            {{-- row 1 --}}
                            <div class="row g-0 align-items-center">
                                <div class="col me-1 me-lg-2 mb-0">
                                    <a href="#">
                                        <span class="badge rounded-pill text-bg-light">Eloquent</span>
                                    </a>
                                </div>
                            </div>
                            {{-- row 2 --}}
                            <div class="row g-0 align-items-center mt-3">
                                <div class="col me-1 me-lg-2 mb-0 d-flex">
                                    <a href="#" class="me-2">
                                        <div>Share</div>
                                    </a>
                                    <a href="#" class="me-2">
                                        <div>Edit</div>
                                    </a>
                                    <a href="#">
                                        <div>Delete</div>
                                    </a>
                                </div>
                                <div class="col-5 col-lg-4 mb-0">
                                    <div class="avatar-sm-wrapper d-inline-block">
                                        <a href="#" class="me-1">
                                            <img src="{{ url("assets/img/icon/avatar-01.jpg") }}" alt="Img_Profile" class="avatar avatar-sm rounded-circle">
                                        </a>
                                    </div>
                                    <span class="fs-12px">
                                        <a href="#" class="me-1 fw-bold">
                                            Cavendio
                                        </a>
                                        <span class="text-gre">6 Jam yang lalu</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="mt-3 mb-3">1 Answer</h3>

                {{-- Answer Card --}}
                <div class="card card-discussions p-3">
                    <div class="row">
                        {{-- column 1 --}}
                        <div class="col-12 col-lg-1 mb-1 mb-lg-0 d-flex flex-row flex-lg-column">
                            <div class="me-2 me-lg-0 mb-2">
                                <i class="fa-regular fa-heart"></i>
                                <span>Like</span></a>
                            </div>
                        </div>
                        {{-- column 2 --}}
                        <div class="col-12 col-lg-10 mb-1 mb-lg-0 d-flex flex-column">
                            {{-- <a href="{{ route('detail-forum') }}" class="text-decoration-none">
                                <h5>Gimana caranya masang webpack di laravel?</h5>
                            </a> --}}
                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur cum est eos repudiandae in vero ex, magnam ea sunt fugiat voluptatibus? Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
                            {{-- row 2 --}}
                            <div class="row g-0 align-items-center mt-3">
                                <div class="col me-1 me-lg-2 mb-0 d-flex">
                                    <a href="#" class="me-2">
                                        <div>Share</div>
                                    </a>
                                    <a href="#" class="me-2">
                                        <div>Edit</div>
                                    </a>
                                    <a href="#">
                                        <div>Delete</div>
                                    </a>
                                </div>
                                <div class="col-5 col-lg-4 mb-0">
                                    <div class="avatar-sm-wrapper d-inline-block">
                                        <a href="#" class="me-1">
                                            <img src="{{ url("assets/img/icon/avatar-01.jpg") }}" alt="Img_Profile" class="avatar avatar-sm rounded-circle">
                                        </a>
                                    </div>
                                    <span class="fs-12px">
                                        <a href="#" class="me-1 fw-bold">
                                            Cavendio
                                        </a>
                                        <span class="text-gre">6 Jam yang lalu</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- summernote answer --}}
                <div class="mb-3 mt-3">
                    <div class="d-flex align-item-center">
                        <div class="d-flex">
                            <div class="fs-2 fw-bold me-2 mb-0">
                                 Answer a Question
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg8 mb-5 mb-lg-0">
                        <div class="card card-discussion mb-5 p-3">
                            <div class="row">
                                <div class="col-12">
                                    <form action="" method="POST">
                                        <div class="mb-3">
                                            <label for="answer" class="form-label">Quetions</label>
                                            <textarea class="form-control" id="answer" name="answer"></textarea>
                                        </div>
                                        <div>
                                            <button class="btn btn-secondary me-4" type="submit">Submit</button>
                                            <a href="#">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Code Quorum 2023</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    {{-- Summer note CDN JS --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

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
    $(document).ready(function(){
        $('#answer').summernote({
            placeholder: 'Your solution...',
            tabSize: 2,
            height: 320,
            toolbar: [
                ['style' ,['style']],
                ['font' ,['bold', 'underline', 'clear']],
                ['color' ,['color']],
                ['para' ,['ul', 'ol', 'paragraph']],
                ['table' ,['table']],
                ['insert' ,['link']],
                ['view' ,['codeview', 'help']],
            ]
        });

        $('span.note-icon-caret').remove();
     })
</script>
</body>

</html>
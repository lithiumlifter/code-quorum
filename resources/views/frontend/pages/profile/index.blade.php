@extends('frontend.templates.app')

@section('content')
    <main id="main-forum" class="col-md-9 mt-3">
        {{-- Top --}}
        <div id="top-section" class="container mb-2">
            <div class="row justify-content-between">
                <div class="col-6 col-md-auto">
                    <h2>Profile</h2>
                </div>
                <div class="col-6 col-md-auto d-flex justify-content-end">
                    <a href="#" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalProfile">Edit Profile</a>
                </div>
            </div>
        </div>
        <!-- Modal Edit Profile-->
        <div class="modal fade" id="ModalProfile" tabindex="-1" aria-labelledby="ModalProfileLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalProfileLabel">Edit Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{-- column 1 --}}
                        <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 100px; border: 1px solid black;">
                            <label for="picture" class="btn p-0 edit-avatar-show">
                                <span class="rounded-circle p-1" style="background-color:gray;">
                                    <i class="fa-solid fa-pen" style="color: white"></i>
                                </span>
                            </label>
                        </div>
                        {{-- column 2 --}}
                        <div class="col-12 col-lg-10 mb-1 mb-lg-0 d-flex flex-column">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="about" class="form-label">About me:</label>
                                <textarea class="form-control" id="about" name="about"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Lokasi:</label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi" autofocus>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div>                
        <!-- about me -->
        <div class="card card-discussions p-3 mb-3">
            <div class="row">
                {{-- column 1 --}}
                <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 100px; border: 1px solid black;">
                </div>
                {{-- column 2 --}}
                <div class="col-12 col-lg-10 mb-1 mb-lg-0 d-flex flex-column">
                    <h5 class="my-3" style="font-weight: bold">Rizky Cavendio</h5>
                    <p> Halo, Saya seorang Software Engineer Muda yang sedang mengembangkan bakat saya di dunia IT. </p>
                    <div class="row g-0 align-items-center">
                        <div class="col me-1 me-lg-2 mb-0">
                            <a href="#">
                                <span class="badge rounded-pill text-bg-light"><i class="fa-solid fa-address-card"></i> Member since 1 year ago</span>
                                <span class="badge rounded-pill text-bg-light"><i class="fa-solid fa-location-dot"></i> Jakarta</span>
                            </a>
                        </div>
                        {{-- <div class="col-md-5 col-lg-4 mb-0">
                            <div class="row align-items-center">
                                <div class="col-3 col-md-2">
                                    <div class="avatar-sm-wrapper d-inline-block">
                                        <a href="#" class="me-1">
                                            <img src="{{ url("assets/img/icon/avatar-01.jpg") }}" alt="Img_Profile" class="avatar avatar-sm rounded-circle">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-9 col-md-10">
                                    <span class="fs-12px">
                                        <a href="#" class="me-1 fw-bold d-block">
                                            Cavendio
                                        </a>
                                        <span class="text-grey d-block">6 Jam yang lalu</span>
                                    </span>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    
                </div>
            </div>
            <hr>
            <div class="row justify-content-around">
                <h5 class="mb-3 w-100" style="font-weight: bold;">Statistik:</h5>
                <div class="col-3 d-flex flex-column align-items-center">
                    <div class="mb-2">
                        Discussion
                    </div>
                    <div class="fw-bold">
                        12
                    </div>
                </div>
                <div class="col-3 d-flex flex-column align-items-center">
                    <div class="mb-2">
                        Answer
                    </div>
                    <div class="fw-bold">
                        12
                    </div>
                </div>
                <div class="col-3 d-flex flex-column align-items-center">
                    <div class="mb-2">
                        Like
                    </div>
                    <div class="fw-bold">
                        12
                    </div>
                </div>
                <div class="col-3 d-flex flex-column align-items-center">
                    <div class="mb-2">
                        Save
                    </div>
                    <div class="fw-bold">
                        12
                    </div>
                </div>
            </div>
            
        </div>
        <!-- stat -->
        <div class="card card-discussions p-3 mb-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">My Discussion</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">My Answer</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Save</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <!-- Main content discussion card -->
                    <div class="card card-discussions p-3 mb-3 mt-3">
                        <div class="row">
                            {{-- column 1 --}}
                            <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                                <div id="suka" class="me-2 me-lg-0 mb-1">
                                    3 Suka
                                </div>
                                <div id="jawaban" class="mb-1">
                                    9 Jawaban
                                </div>
                                <div id="dilihat" class="mb-1">
                                    10 Dilihat
                                </div>
                            </div>
                            {{-- column 2 --}}
                            <div class="col-12 col-lg-10 mb-1 mb-lg-0 d-flex flex-column">
                                <a href="{{ route('detail-forum') }}" class="text-decoration-none">
                                    <h5>Gimana caranya masang webpack di laravel?</h5>
                                </a>
                                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur cum est eos repudiandae in vero ex, magnam ea sunt fugiat voluptatibus? </p>
                                <div class="row g-0 align-items-center">
                                    <div class="col me-1 me-lg-2 mb-0">
                                        <a href="#">
                                            <span class="badge rounded-pill text-bg-light">Eloquent</span>
                                        </a>
                                    </div>
                                    <div class="col-md-5 col-lg-4 mb-0">
                                        <div class="row align-items-center">
                                            <div class="col-3 col-md-2">
                                                <div class="avatar-sm-wrapper d-inline-block">
                                                    <a href="#" class="me-1">
                                                        <img src="{{ url("assets/img/icon/avatar-01.jpg") }}" alt="Img_Profile" class="avatar avatar-sm rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-9 col-md-10">
                                                <span class="fs-12px">
                                                    <a href="#" class="me-1 fw-bold d-block">
                                                        Cavendio
                                                    </a>
                                                    <span class="text-grey d-block">6 Jam yang lalu</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    {{-- Main content my naswer --}}
                    <div class="card card-discussions p-3 mb-3 mt-3">
                        <div class="row align-items-center">
                            {{-- column 1 --}}
                            <div class="col-2 col-lg-1 text-center">
                                34
                            </div>
                            {{-- column 2 --}}
                            <div class="col">
                                <span>Replied to</span>
                                <span class="fw-bold text-primary">
                                    <a href="#">
                                        Gimana cara pasang laravel?
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
            </div>
        </div>
    </main>
@endsection
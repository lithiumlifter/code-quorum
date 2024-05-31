@extends('frontend.templates.app')

@section('content')
    <main id="main-forum" class="col-md-9 mt-3">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
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

        <!-- Modal for Editing Profile -->
        <div class="modal fade" id="ModalProfile" tabindex="-1" aria-labelledby="ModalProfileLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalProfileLabel">Edit Profile</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('profile.update', ['profile' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-center">
                                    <img src="{{ $user->picture ?? 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp' }}" alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 100px; border: 1px solid black;">
                                    <label for="picture" class="btn p-0 edit-avatar-show">
                                        <span class="rounded-circle p-1" style="background-color:gray;">
                                            <i class="fa-solid fa-pen" style="color: white"></i>
                                        </span>
                                    </label>
                                    <input type="file" class="form-control d-none" id="picture" name="picture">
                                </div>
                                <div class="col-12 col-lg-10 mb-1 mb-lg-0 d-flex flex-column">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username:</label>
                                        <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label for="about" class="form-label">About me:</label>
                                        <textarea class="form-control" id="about" name="about">{{ $user->about }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lokasi" class="form-label">Lokasi:</label>
                                        <input type="text" class="form-control" id="lokasi" name="location" value="{{ $user->location }}" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="card card-discussions p-3 mb-3">
            <div class="row">
                <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-center">
                    <img src="{{ $user->picture ?? 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp' }}" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 100px; border: 1px solid black;">
                </div>
                <div class="col-12 col-lg-10 mb-1 mb-lg-0 d-flex flex-column">
                    <h5 class="my-3" style="font-weight: bold">{{ $user->username }}</h5>
                    <p>{{ $user->about }}</p>
                    <div class="row g-0 align-items-center">
                        <div class="col me-1 me-lg-2 mb-0">
                            <a href="#">
                                <span class="badge rounded-pill text-bg-light"><i class="fa-solid fa-address-card"></i> Member since {{ $user->created_at->diffForHumans() }}</span>
                                <span class="badge rounded-pill text-bg-light"><i class="fa-solid fa-location-dot"></i> {{ $user->location }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row justify-content-around">
                <h5 class="mb-3 w-100" style="font-weight: bold;">Statistik:</h5>
                <div class="col-3 d-flex flex-column align-items-center">
                    <div class="mb-2">Discussion</div>
                    <div class="fw-bold">{{ $discussions->count() }}</div>
                </div>
                <div class="col-3 d-flex flex-column align-items-center">
                    <div class="mb-2">Answer</div>
                    <div class="fw-bold">{{ $answers->count() }}</div>
                </div>
                <div class="col-3 d-flex flex-column align-items-center">
                    <div class="mb-2">Like</div>
                    <div class="fw-bold">12</div>
                </div>
                <div class="col-3 d-flex flex-column align-items-center">
                    <div class="mb-2">Save</div>
                    <div class="fw-bold">12</div>
                </div>
            </div>
        </div>

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
                    @foreach ($discussions as $discussion)
                    <div class="card card-discussions p-3 mb-3 mt-3">
                        <div class="row">
                            <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                                <div id="suka" class="me-2 me-lg-0 mb-1">3 Suka</div>
                                <div id="jawaban" class="mb-1">{{ $discussion->answers->count() }} Jawaban</div>
                                <div id="dilihat" class="mb-1">10 Dilihat</div>
                            </div>
                            <div class="col-12 col-lg-10 mb-1 mb-lg-0 d-flex flex-column">
                                <a href="{{ route('detail-forum') }}" class="text-decoration-none">
                                    <h5>{{ $discussion->title }}</h5>
                                </a>
                                <p>{!! $discussion->content_preview !!}</p>
                                <div class="row g-0 align-items-center">
                                    <div class="col me-1 me-lg-2 mb-0">
                                        @foreach ($discussion->tags as $tag)
                                            <a href="#">
                                                <span class="badge rounded-pill text-bg-light">{{ $tag->name }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="col-md-5 col-lg-4 mb-0">
                                        <div class="row align-items-center">
                                            <div class="col-3 col-md-2">
                                                <div class="avatar-sm-wrapper d-inline-block">
                                                    <a href="#" class="me-1">
                                                        <img src="{{ url('assets/img/icon/avatar-01.jpg') }}" alt="Img_Profile" class="avatar avatar-sm rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-9 col-md-10">
                                                <span class="fs-12px">
                                                    <a href="#" class="me-1 fw-bold d-block">{{ $discussion->user->username }}</a>
                                                    <span class="text-grey d-block">{{ $discussion->created_at->diffForHumans() }}</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    @foreach ($answers as $answer)
                        <div class="card card-discussions p-3 mb-3 mt-3">
                            <div class="row align-items-center">
                                <div class="col-2 col-lg-1 text-center">34</div>
                                <div class="col">
                                    <span>Replied to</span>
                                    <span class="fw-bold text-primary">
                                        <a href="#">{{ $answer->answer }}</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
            </div>
        </div>
    </main>
@endsection

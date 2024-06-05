@extends('frontend.templates.app')

@section('content')
    <main id="main-forum" class="col-md-9 mt-3">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert" style="position: relative; z-index: 9999;">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    
        <div id="top-section" class="container mb-2">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 col-sm-auto mb-2 mb-sm-0">
                    <h2><strong>Profile</strong></h2>
                </div>
                <div class="col-12 col-sm-auto ml-sm-auto d-flex justify-content-end">
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
                                    <img id="previewImage" src="{{ $user->picture ? asset('storage/profiles/' . basename($user->picture)) : url("assets/img/user.png") }}" alt="avatar" class="rounded-circle img-fluid" style="width: 100px; height: 100px; border: 1px solid black; object-fit: cover;">
                                    <label for="picture" class="btn p-0 edit-avatar-show">
                                        <span class="rounded-circle p-1" style="background-color:gray;">
                                            <i class="fa-solid fa-pen" style="color: white"></i>
                                        </span>
                                    </label>
                                    <input type="file" class="form-control d-none" id="picture" name="picture" onchange="previewImage(this);">
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
                            <button type="submit" class="btn btn-blue-main-color">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card card-discussions p-3 mb-3">
            <div class="row">
                <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-center">
                    <img src="{{ $user->picture ? asset('storage/profiles/' . basename($user->picture)) : url("assets/img/user.png") }}" alt="avatar" class="rounded-circle img-fluid" style="width: 100px; height: 100px; border: 1px solid black; object-fit: cover;">
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
                    <div class="mb-2">Discussions</div>
                    <div class="fw-bold">{{ $discussions->count() }}</div>
                </div>
                <div class="col-3 d-flex flex-column align-items-center">
                    <div class="mb-2">Answers</div>
                    <div class="fw-bold">{{ $answers->count() }}</div>
                </div>
                <div class="col-3 d-flex flex-column align-items-center">
                    <div class="mb-2">Bookmarks</div>
                    <div class="fw-bold">{{ $savedDiscussions->count() }}</div>
                </div>
            </div>
        </div>

        <div class="card card-discussions p-3 mb-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active text-blue" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">My Discussion</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-blue" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">My Answer</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-blue" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Bookmarks</button>
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
                                <a href="{{ route('discussions.show', $discussion->slug) }}" class="text-decoration-none text-blue">
                                    <h5>{{ $discussion->title }}</h5>
                                </a>
                                <p>{!! $discussion->content_preview !!}</p>
                                <div class="row g-0 align-items-center">
                                    <div class="col me-1 me-lg-2 mb-0">
                                        @foreach ($discussion->tags as $tag)
                                            <a class="text-decoration-none" href="/discussions?tag={{ $tag->slug }}">
                                                <span class="badge rounded-pill text-bg-light">{{ $tag->name }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="col-md-5 col-lg-4 mb-0">
                                        <div class="row align-items-center">
                                            <div class="col-3 col-md-2">
                                                <div class="avatar-sm-wrapper d-inline-block">
                                                    <a href="{{ route('profile.show', $discussion->user->uid) }}" class="me-1">
                                                        <img src="{{ $user->picture ? asset('storage/profiles/' . basename($user->picture)) : url("assets/img/user.png") }}" alt="Img_Profile" class="rounded-circle" style="object-fit: cover; width: 25px; height: 25px;">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-9 col-md-10">
                                                <span class="fs-12px">
                                                    <a href="{{ route('profile.show', $discussion->user->uid) }}" class="me-1 fw-bold d-block text-blue text-decoration-none">{{ $discussion->user->username }}</a>
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
                                        <a href="{{ route('discussions.show', $answer->discussion->slug) }}" class="text-decoration-none text-blue">{{ $answer->discussion->title }}</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                    @foreach ($savedDiscussions as $save)
                    <div class="card card-discussions p-3 mb-3 mt-3">
                        <div class="row">
                            <div class="col-12 col-lg-1 mb-1 mb-lg-0 d-flex flex-row flex-lg-column">
                                @if (Auth::check() && Auth::user()->saves->contains('discussion_id', $save->discussion->id))
                                    <a href="#" class="text-decoration-none" onclick="unsaveDiscussion(this, {{ $save->discussion->id }})">
                                        <i class="fa-solid fa-bookmark"></i>
                                    </a>
                                @else
                                    <a href="#" class="text-decoration-none" onclick="saveDiscussion(this, {{ $save->discussion->id }})">
                                        <i class="fa-regular fa-bookmark"></i>
                                    </a>
                                @endif
                            </div>
                            <div class="col-12 col-lg-11 mb-1 mb-lg-0 d-flex flex-column">
                                <a href="{{ route('discussions.show', $save->discussion->slug) }}" class="text-decoration-none text-blue">
                                    <h5>{{ $save->discussion->title }}</h5>
                                </a>
                                <p>{!! $save->discussion->content_preview !!}</p>
                                <div class="row g-0 align-items-center">
                                    <div class="col me-1 me-lg-2 mb-0">
                                        @foreach ($save->discussion->tags as $tag)
                                            <a class="text-decoration-none" href="/discussions?tag={{ $tag->slug }}">
                                                <span class="badge rounded-pill text-bg-light">{{ $tag->name }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="col-md-5 col-lg-4 mb-0">
                                        <div class="row align-items-center">
                                            <div class="col-3 col-md-2">
                                                <div class="avatar-sm-wrapper d-inline-block">
                                                    <a href="#" class="me-1">
                                                        <img src="{{ $save->discussion->user->picture ? asset('storage/profiles/' . basename($save->discussion->user->picture)) : url("assets/img/user.png") }}" alt="Img_Profile" class="rounded-circle" style="object-fit: cover; width: 25px; height: 25px;">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-9 col-md-10">
                                                <span class="fs-12px">
                                                    <a href="#" class="me-1 fw-bold d-block text-blue text-decoration-none">{{ $save->discussion->user->username }}</a>
                                                    <span class="text-grey d-block">{{ $save->discussion->created_at->diffForHumans() }}</span>
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
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        $('#picture').on('change', function(event) {
            var output = $('#previewImage');
            output.attr('src', URL.createObjectURL(event.target.files[0]));
            output.onload = function() {
                URL.revokeObjectURL(output.attr('src'))
            }
        })
    </script>

    <script>
        function saveDiscussion(element, discussionId) {
            event.preventDefault();

            axios.post(`/save/discussion/${discussionId}`)
                .then(response => {
                    if (response.status === 200) {
                        element.innerHTML = '<i class="fa-solid fa-bookmark"></i>';
                        element.setAttribute('onclick', `unsaveDiscussion(this, ${discussionId})`);
                    }
                })
                .catch(error => {
                    console.error('Error saving discussion:', error);
                });
        }

        function unsaveDiscussion(element, discussionId) {
            event.preventDefault();

            axios.delete(`/unsave/discussion/${discussionId}`)
                .then(response => {
                    if (response.status === 200) {
                        // Remove the discussion card from the profile
                        element.closest('.card-discussions').remove();
                    }
                })
                .catch(error => {
                    console.error('Error unsaving discussion:', error);
                });
        }
    </script>    
@endpush


@extends('frontend.templates.app')

@section('content')
    <main id="main-forum" class="col-md-6 mt-3">
        {{-- Top --}}
        <div id="top-section" class="container mb-2">
            <div class="row justify-content-between">
                <div class="col-6 col-md-auto">
                    <h2>My Saved Discussions</h2>
                </div>
                <div class="col-6 col-md-auto d-flex justify-content-end">
                    <a href="{{ route('discussions.create') }}" class="btn btn-dark">Create Discussion</a>
                </div>
            </div>
        </div>                
        <!-- Main content -->
        @foreach ($savedDiscussions as $save)
            <div class="card card-discussions p-3 mb-3">
                <div class="row">
                    {{-- column 1 --}}
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
                    {{-- column 2 --}}
                    <div class="col-12 col-lg-11 mb-1 mb-lg-0 d-flex flex-column">
                        <a href="{{ route('discussions.show', $save->discussion->slug) }}" class="text-decoration-none">
                            <h5>{{ $save->discussion->title }}</h5>
                        </a>
                        <p>{!! $save->discussion->content_preview !!}</p>
                        <div class="row g-0 align-items-center">
                            <div class="col me-1 me-lg-2 mb-0">
                                @foreach ($save->discussion->tags as $tag)
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
                                                <img src="{{ $save->discussion->user->picture ? asset('storage/profiles/' . basename($save->discussion->user->picture)) : url("assets/img/user.png") }}" alt="Img_Profile" class="rounded-circle" style="object-fit: cover; width: 25px; height: 25px;">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-9 col-md-10">
                                        <span class="fs-12px">
                                            <a href="#" class="me-1 fw-bold d-block">{{ $save->discussion->user->username }}</a>
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
    </main>

    <aside id="aside-right" class="col-md-3">
        <div class="container-fluid">
            <div class="card mt-3">
                @auth
                    <div class="card-body text-center">
                        <img src="{{ Auth::user()->picture ? asset('storage/profiles/' . basename(Auth::user()->picture)) : url('assets/img/user.png') }}" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 50px; height: 50px; object-fit: cover;">
                        <p>Welcome back,</p>
                        <h5 class="my-3">{{ auth()->user()->username }}</h5>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="{{ route('profile.index') }}" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Edit</a>
                            <a type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1">Share</a>
                        </div>
                    </div>
                @endauth
                @guest
                    <div class="card-body text-center">
                        <img src="{{ url("assets/img/user.png") }}" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 50px;">
                        <p>Welcome,</p>
                        <h5 class="my-3">Guest User</h5>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="{{ route('login') }}" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Login</a>
                            <a href="{{ route('register') }}" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1">Register</a>
                        </div>
                    </div>
                @endguest
            </div>

            <div class="card mt-3">
                <div class="card-body text-center">
                    <h4>All Tags</h4>
                    @foreach ($tags as $tag)
                        <a href="#">
                            <span class="badge rounded-pill text-bg-light">{{ $tag->name }}</span>
                        </a>
                    @endforeach
                </div> 
            </div>
        </div>
    </aside>
@endsection

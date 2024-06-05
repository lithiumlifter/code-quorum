@extends('frontend.templates.app')

@section('content')
    <main id="main-forum" class="col-md-6 mt-3">
        {{-- Top --}}
        <div id="top-section" class="container mb-2">
            <div class="row justify-content-between align-items-center">   
                <div class="col-12 col-sm-auto mb-2 mb-sm-0">
                    <h2><strong>My Answers</strong></h2>
                </div>
                <div class="col-12 col-sm-auto ml-sm-auto d-flex justify-content-end">
                    <a href="{{ route('discussions.create') }}" class="btn btn-dark mr-2">Create Discussion</a>
                </div>
            </div>
        </div>                
        @php
            $displayedDiscussions = [];
        @endphp

        @foreach ($answers as $answer)
            @php
                $discussion = $answer->discussion;
            @endphp

            {{-- Check if the discussion has been displayed --}}
            @if (!in_array($discussion->id, $displayedDiscussions))
                {{-- Display the discussion --}}
                <div class="card card-discussions p-3 mb-3 mt-3">
                    <div class="row align-items-center">
                        <div class="col-2 col-lg-1 text-center">{{ $discussion->answers()->count() }}</div>
                        <div class="col">
                            <span>Replied to</span>
                            <span class="fw-bold text-primary">
                                <a href="{{ route('discussions.show', $discussion->slug) }}" class="text-decoration-none text-blue">{{ $discussion->title }}</a>
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Add the discussion ID to the displayed discussions array --}}
                @php
                    $displayedDiscussions[] = $discussion->id;
                @endphp
            @endif
        @endforeach

    {{ $answers->links() }}
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
                            <a href="{{ route('profile.index') }}" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-blue-main-color">Edit</a>
                            <a type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-blue-main-color ms-1" onclick="copyCurrentPath()">Share</a>
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
                            <a href="{{ route('login') }}" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-blue-main-color">Login</a>
                            <a href="{{ route('register') }}" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-blue-main-color ms-1">Register</a>
                        </div>
                    </div>
                @endguest
            </div>

            <div class="card mt-3">
                <div class="card-body text-center">
                    <h4><strong>All Tags</strong></h4>
                    @foreach ($tags as $tag)
                        <a class="text-decoration-none" href="/discussions?tag={{ $tag->slug }}">
                            <span class="badge rounded-pill text-bg-light">{{ $tag->name }}</span>
                        </a>
                    @endforeach
                </div> 
            </div>
        </div>
    </aside>
@endsection

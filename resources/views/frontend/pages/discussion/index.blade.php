@extends('frontend.templates.app')

@section('content')
    <main id="main-forum" class="col-md-6 mt-3">
        {{-- Top --}}
        <div id="top-section" class="container mb-2">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 col-sm-auto mb-2 mb-sm-0">
                    <h2><strong>All Discussions</strong></h2>
                </div>
                <div class="col-12 col-sm-auto ml-sm-auto d-flex justify-content-end">
                    <a href="{{ route('discussions.create') }}" class="btn btn-dark mr-2">Create Discussion</a>
                    <button class="btn btn-outline-secondary btn-sm d-flex align-items-center" data-toggle="collapse" data-target="#filterPanel" aria-expanded="false" aria-controls="filterPanel">
                        <svg aria-hidden="true" class="bi bi-filter" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm-2-2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1H1.5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        <span class="ml-1">Filter</span>
                    </button>
                </div>
            </div>            
        </div>       
        <!-- Filter Panel -->
        <div class="collapse mb-3" id="filterPanel">
            <div class="card card-body">
                <form action="{{ route('discussions.index') }}" method="GET">
                    <div class="row">
                        <!-- Filter by Section -->
                        <div class="col-md-4">
                            <fieldset>
                                <legend>Filter by</legend>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="noAnswers" name="filter[]" value="noAnswers" {{ in_array('noAnswers', $filters['filter'] ?? []) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="noAnswers">No answers</label>
                                </div>                                
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="noLikes" name="filter[]" value="noLikes" {{ in_array('noLikes', $filters['filter'] ?? []) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="noLikes">No likes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="noViews" name="filter[]" value="noViews" {{ in_array('noViews', $filters['filter'] ?? []) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="noViews">No views</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mostViews" name="filter[]" value="mostViews" {{ in_array('mostViews', $filters['filter'] ?? []) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="mostViews">Most views</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mostLikes" name="filter[]" value="mostLikes" {{ in_array('mostLikes', $filters['filter'] ?? []) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="mostLikes">Most likes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mostAnswers" name="filter[]" value="mostAnswers" {{ in_array('mostAnswers', $filters['filter'] ?? []) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="mostAnswers">Most Answers</label>
                                </div>                                
                            </fieldset>
                        </div>
                
                        <!-- Sorted by Section -->
                        <div class="col-md-4">
                            <fieldset>
                                <legend>Sorted by</legend>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="newest" name="sort" value="newest">
                                    <label class="form-check-label" for="newest">Newest</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="longest" name="sort" value="longest">
                                    <label class="form-check-label" for="longest">longest</label>
                                </div>
                            </fieldset>
                        </div>
                
                        <!-- Tagged with Section -->
                        <div class="col-md-4">
                            <fieldset>
                                <legend>Tagged with</legend>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="allTags" name="tagMode" value="allTags">
                                    <label class="form-check-label" for="allTags">All tags</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="specifiedTags" name="tagMode" value="specifiedTags" checked>
                                    <label class="form-check-label" for="specifiedTags">The following tags:</label>
                                </div>
                                <input type="text" class="form-control mt-2" id="tagQuery" name="tagQuery" placeholder="e.g. javascript, python">
                            </fieldset>
                        </div>
                    </div>
                
                    <!-- Buttons Section -->
                    <div class="form-group d-flex justify-content-between mt-3">
                        <button type="submit" class="btn btn-blue-main-color">Apply filter</button>
                        <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#filterPanel">Cancel</button>
                    </div>
                </form>
                
            </div>
        </div> 
        <!-- Main content -->
        @foreach ($discussions as $discussion)
            <div class="card card-discussions p-3 mb-3">
                <div class="row">
                    {{-- column 1 --}}
                    <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                        <div id="suka" class="me-2 me-lg-0 mb-1">
                            {{ $discussion->likeCount }} Suka
                        </div>
                        <div id="jawaban" class="mb-1">
                            {{ $discussion->answers->count() }} Jawaban
                        </div>
                        <div id="dilihat" class="mb-1">
                            {{ $discussion->view_count }} Dilihat
                        </div>
                    </div>
                    {{-- column 2 --}}
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
                                                <img src="{{ $discussion->user->picture ? asset('storage/profiles/' . basename($discussion->user->picture)) : url("assets/img/user.png") }}" alt="Img_Profile" class="rounded-circle" style="object-fit: cover; width: 25px; height: 25px;">
                                            </a>
                                        </div> 
                                    </div>
                                    <div class="col-9 col-md-10">
                                        <span class="fs-12px">
                                            <a href="{{ route('profile.show', $discussion->user->uid) }}" class="me-1 fw-bold d-block text-blue text-decoration-none">
                                                {{ $discussion->user->username }}
                                            </a>
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
        {{ $discussions->links() }}
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

    {{-- <div class="card card-discussions p-3 mb-3">
        <div class="row">
            <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                <div class="me-2 me-lg-0 mb-1">
                    3 Suka
                </div>
                <div class="mb-1">
                    9 Jawaban
                </div>
                <div class="mb-1">
                    10 Dilihat
                </div>
            </div>
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
    </div> --}}
@endsection


@extends('frontend.templates.app')

@section('content')
    <main id="main-forum" class="col-md-6 mt-3">
        {{-- Top --}}
        <div id="top-section" class="container mb-2">
            <div class="row justify-content-between">
                <div class="col-6 col-md-auto">
                    <h2>All Discussion</h2>
                </div>
                <div class="col-6 col-md-auto d-flex justify-content-end">
                    <a href="{{ route('discussions.create') }}" class="btn btn-dark">Create Discussion</a>
                </div>
            </div>
        </div>                
        <!-- Main content -->
        <!-- Main content -->
        @foreach ($discussions as $discussion)
            <div class="card card-discussions p-3 mb-3">
                <div class="row">
                    {{-- column 1 --}}
                    <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                        <div id="suka" class="me-2 me-lg-0 mb-1">
                            {{ $discussion->likes_count }} Suka
                        </div>
                        <div id="jawaban" class="mb-1">
                            {{ $discussion->answers_count }} Jawaban
                        </div>
                        <div id="dilihat" class="mb-1">
                            {{ $discussion->view_count }} Dilihat
                        </div>
                    </div>
                    {{-- column 2 --}}
                    <div class="col-12 col-lg-10 mb-1 mb-lg-0 d-flex flex-column">
                        <a href="{{ route('discussions.show', $discussion->slug) }}" class="text-decoration-none">
                            <h5>{{ $discussion->title }}</h5>
                        </a>
                        <p>{{ $discussion->content_preview }}</p>
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
                                                <img src="{{ url("assets/img/icon/avatar-01.jpg") }}" alt="Img_Profile" class="avatar avatar-sm rounded-circle">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-9 col-md-10">
                                        <span class="fs-12px">
                                            <a href="#" class="me-1 fw-bold d-block">
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

    </main>

    <aside id="aside-right" class="col-md-3">
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="card-body text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 50px;">
                    <p>Welcome back,</p>
                    <h5 class="my-3">{{ auth()->user()->username }}</h5>
                    <div class="d-flex justify-content-center mb-2">
                        <a href="{{ route('profile') }}" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Edit</a>
                        <a type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1">Share</a>
                    </div>
                </div> 
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


@extends('frontend.templates.app')

@section('content')
    <main id="main-forum" class="col-md-9 mt-3">
        <div id="top-section" class="container mb-2">
            <div class="row justify-content-between">
                <div class="col-6 col-md-auto">
                    <h2>All Tags</h2>
                </div>
            </div>
        </div>
        <div class="card card-tags p-3 mb-3">
            <div class="row">
                @foreach ($tags as $tag)
                    <div class="col-6 col-md-4 col-lg-3 mb-3">
                        <a href="/discussions?tag={{ $tag->slug }}" class="text-decoration-none">
                            <div class="card tag-card text-center p-3">
                                <span class="badge rounded-pill text-bg-light">{{ $tag->name }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection

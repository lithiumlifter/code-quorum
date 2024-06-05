@extends('frontend.templates.app')

@section('content')
    <main id="main-forum" class="col-md-9 mt-3">    
        <div id="top-section" class="container mb-2">
            <div class="row justify-content-between">
                <div class="col-6 col-md-auto">
                    <h2>Profile</h2>
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
                    <div class="mb-2">Discussion</div>
                    <div class="fw-bold">{{ $discussions->count() }}</div>
                </div>
                <div class="col-3 d-flex flex-column align-items-center">
                    <div class="mb-2">Answer</div>
                    <div class="fw-bold">{{ $answers->count() }}</div>
                </div>
            </div>
        </div>

        <div class="card card-discussions p-3 mb-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active text-blue" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Discussions</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-blue" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Answers</button>
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
                                                    <a href="{{ route('profile.show', $discussion->user->uid) }}" class="me-1 fw-bold d-block text-decoration-none text-blue">{{ $discussion->user->username }}</a>
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
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
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


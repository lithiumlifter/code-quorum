@extends('frontend.templates.app')

@section('content')
    <main class="col-md-9 mt-3">
        {{-- Top --}}
        <div class="container mb-2">
            <div class="row justify-content-between">
                <div class="col-6 col-md-auto">
                    <h4>All discussions > {{ $discussions->title }}</h4>
                </div>
                <div class="col-6 col-md-auto d-flex justify-content-end">
                    <a href="#" class="btn btn-dark">Create discussions</a>
                </div>
            </div>
        </div>                
        <!-- Main content -->
        <div class="card card-discussionss p-3">
            <div class="row">
                {{-- column 1 --}}
                <div class="col-12 col-lg-1 mb-1 mb-lg-0 d-flex flex-row flex-lg-column">
                    <div class="me-2 me-lg-0 mb-2">
                        <i class="fa-regular fa-heart"></i>
                        <span>Like</span></a>
                    </div>
                    <div class="mb-1">
                        @if (Auth::check() && Auth::user()->saves->contains('discussion_id', $discussions->id))
                            <a href="#" class="text-decoration-none" onclick="unsaveDiscussion(this, {{ $discussions->id }})">
                                <i class="fa-solid fa-bookmark"></i>
                            </a>
                        @else
                            <a href="#" class="text-decoration-none" onclick="saveDiscussion(this, {{ $discussions->id }})">
                                <i class="fa-regular fa-bookmark"></i>
                            </a>
                        @endif
                    </div>
                </div>
                {{-- column 2 --}}
                <div class="col-12 col-lg-10 mb-1 mb-lg-0 d-flex flex-column">
                    <p> {!! $discussions->content !!} </p>
                    {{-- row 1 --}}
                    <div class="row g-0 align-items-center">
                        <div class="col me-1 me-lg-2 mb-0">
                            @foreach ($discussions->tags as $tag)
                            <a href="#">
                                <span class="badge rounded-pill text-bg-light">{{ $tag->name }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    {{-- row 2 --}}
                    <div class="row g-0 align-items-center mt-3">
                        <div class="col me-1 me-lg-2 mb-0 d-flex">
                            <a href="#" class="me-3 text-decoration-none">
                                <span><i class="fa-solid fa-share"></i></span>
                            </a>
                            <a href="{{ route('discussions.edit', $discussions->slug) }}" class="me-3 text-decoration-none">
                                <span><i class="fa-solid fa-pencil"></i></span>
                            </a>
                            <a href="{{ route('discussions.destroy', $discussions->slug) }}" class="me-3 text-decoration-none" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                <span><i class="fa-solid fa-trash"></i></span>
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
                                    {{ $discussions->user->username }}
                                </a>
                                <span class="text-gre">{{ $discussions->created_at->diffForHumans() }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- modal delete discussion--}}
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                Are you sure you want to delete this discussions?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('discussions.destroy', $discussions->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </div>
            </div>
            </div>
        </div>

        <h3 class="mt-3 mb-3">Answers</h3>

        @foreach ($discussions->answers as $answer)
            {{-- Answer Card --}}
            <div class="card card-discussionss p-3">
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
                        <p> {!! $answer->answer !!} </p>
                        {{-- row 2 --}}
                        <div class="row g-0 align-items-center mt-3">
                            <div class="col me-1 me-lg-2 mb-0 d-flex">
                                <a href="{{ route('answers.edit', $answer->id) }}" class="me-3 text-decoration-none">
                                    <span><i class="fa-solid fa-pencil"></i></span>
                                </a>
                                <a href="{{ route('answers.destroy', $answer->id) }}" class="me-3 text-decoration-none" data-bs-toggle="modal" data-bs-target="#confirmDeleteAnswer">
                                    <span><i class="fa-solid fa-trash"></i></span>
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
                                        {{ $answer->user->username }}
                                    </a>
                                    <span class="text-gre">{{ $answer->created_at->diffForHumans() }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- modal delete answer--}}
            <div class="modal fade" id="confirmDeleteAnswer" tabindex="-1" aria-labelledby="confirmDeleteAnswerLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteAnswerLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    Are you sure you want to delete this answer?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('answers.destroy', $answer->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        @endforeach

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
                <div class="card card-discussions mb-5 p-3">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('answers.store', $discussions->slug) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="answer" class="form-label">Answer</label>
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
@endsection

@push('scripts')
        {{-- Summer note --}}
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
                            element.innerHTML = '<i class="fa-regular fa-bookmark"></i>';
                            element.setAttribute('onclick', `saveDiscussion(this, ${discussionId})`);
                        }
                    })
                    .catch(error => {
                        console.error('Error unsaving discussion:', error);
                    });
            }
        </script>
@endpush

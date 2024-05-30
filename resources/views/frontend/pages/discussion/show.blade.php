@extends('frontend.templates.app')

@section('content')
    <main class="col-md-9 mt-3">
        {{-- Top --}}
        <div class="container mb-2">
            <div class="row justify-content-between">
                <div class="col-6 col-md-auto">
                    <h4>All Discussion > {{ $discussions->title }}</h4>
                </div>
                <div class="col-6 col-md-auto d-flex justify-content-end">
                    <a href="#" class="btn btn-dark">Create Discussion</a>
                </div>
            </div>
        </div>                
        <!-- Main content -->
        <div class="card card-discussions p-3">
            <div class="row">
                {{-- column 1 --}}
                <div class="col-12 col-lg-1 mb-1 mb-lg-0 d-flex flex-row flex-lg-column">
                    <div class="me-2 me-lg-0 mb-2">
                        <i class="fa-regular fa-heart"></i>
                        <span>Like</span></a>
                    </div>
                    <div class="mb-1">
                        <i class="fa-regular fa-bookmark"></i>
                        <span>Save</span></a>
                    </div>
                </div>
                {{-- column 2 --}}
                <div class="col-12 col-lg-10 mb-1 mb-lg-0 d-flex flex-column">
                    {{-- <a href="{{ route('detail-forum') }}" class="text-decoration-none">
                        <h5>Gimana caranya masang webpack di laravel?</h5>
                    </a> --}}
                    <p> {{ $discussions->content }} </p>
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

        {{-- modal delete --}}
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                Are you sure you want to delete this discussion?
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

        <h3 class="mt-3 mb-3">1 Answer</h3>

        {{-- Answer Card --}}
        <div class="card card-discussions p-3">
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
                    {{-- <a href="{{ route('detail-forum') }}" class="text-decoration-none">
                        <h5>Gimana caranya masang webpack di laravel?</h5>
                    </a> --}}
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur cum est eos repudiandae in vero ex, magnam ea sunt fugiat voluptatibus? Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
                    {{-- row 2 --}}
                    <div class="row g-0 align-items-center mt-3">
                        <div class="col me-1 me-lg-2 mb-0 d-flex">
                            <a href="#" class="me-2">
                                <div>Share</div>
                            </a>
                            <a href="#" class="me-2">
                                <div>Edit</div>
                            </a>
                            <a href="#">
                                <div>Delete</div>
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
        </div>

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
                <div class="card card-discussion mb-5 p-3">
                    <div class="row">
                        <div class="col-12">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="answer" class="form-label">Quetions</label>
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
@endpush
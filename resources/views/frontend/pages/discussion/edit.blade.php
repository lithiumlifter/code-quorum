@extends('frontend.templates.app')

@section('content')
    <main id="main-forum" class="col-md-9 mt-3">
        <div class="mb-3">
            <div class="d-flex align-item-center">
                <div class="d-flex">
                    <div class="fs-2 fw-bold me-2 mb-0">
                        Edit Discussion
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg8 mb-5 mb-lg-0">
                <div class="card card-discussion mb-5 p-3">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('discussions.update', $discussions->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- or 'PATCH' -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $discussions->title }}" autofocus>
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tag_slug" class="form-label">Tags</label>
                                    <select class="tags-select form-select @error('tag_slug') is-invalid @enderror" name="tag_slug[]" id="tag_slug" multiple="multiple">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->slug }}"
                                                @if (in_array($tag->slug, $discussions->tags->pluck('slug')->toArray())) {{ 'selected' }} @endif>{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tag_slug')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label @error('content') is-invalid @enderror">Questions</label>
                                    <textarea class="form-control" id="content" name="content">{{ $discussions->content }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <button class="btn btn-secondary me-4" type="submit">Update</button>
                                    <a href="{{ route('discussions.index') }}">Cancel</a>
                                </div>
                                <input type="hidden" name="discussion_id" value="{{ $discussions->id }}">
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
            $('#content').summernote({
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
        $(document).ready(function() {
            $('.tags-select').select2();
        });
    </script>
@endpush

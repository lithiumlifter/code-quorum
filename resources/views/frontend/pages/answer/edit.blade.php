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
                        <form action="{{ route('answers.update', $answer->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="answer" class="form-label">Answer</label>
                                <textarea class="form-control" id="answer" name="answer">{{ old('answer', $answer->answer) }}</textarea>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-secondary">Update</button>
                                <a href="{{ route('discussions.show', $answer->discussion->slug) }}" class="btn btn-link">Cancel</a>
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
<script>
    $(document).ready(function(){
        $('#answer').summernote({
            placeholder: 'Edit your answer...',
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
    });
</script>
@endpush

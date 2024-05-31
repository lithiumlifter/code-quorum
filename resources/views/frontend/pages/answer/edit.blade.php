@extends('frontend.templates.app')

@section('content')
<main class="col-md-9 mt-3">
    <div class="container mb-2">
        <h4>Edit Answer</h4>
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
    });
</script>
@endpush

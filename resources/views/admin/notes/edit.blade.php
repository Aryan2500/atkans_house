@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            @include('admin.partials.alerts')

            <div class="card">
                <div class="card-header">
                    <h4>Edit Note</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('note.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $note->id }}" name="chapter_id" />
                        <div class="form-group">
                            <label for="book_id">Select Book</label>
                            <select name="book_id" class="form-control" required>
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}" {{ $book->id == $note->book_id ? 'selected' : '' }}>
                                        {{ $book->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Chapter Title</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $note->title) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Chapter Number</label>
                            <input type="number" name="chapter_number" class="form-control"
                                value="{{ old('chapter_number', $note->chapter_number) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{ old('description', $note->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Replace PDF (optional)</label>
                            <input type="file" name="file_url" class="form-control-file" accept=".pdf">
                            <p class="text-muted">Current file: <a href="{{ asset('storage/' . $note->file_url) }}"
                                    target="_blank">View</a></p>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" name="is_free" class="form-check-input" id="is_free"
                                {{ $note->is_free ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_free">Is Free?</label>
                        </div>

                        <button class="btn btn-primary mt-3">Update Chapter</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.standard_select').on('change', function() {
                let standardId = $(this).val();
                let subjectDropdown = $('#subject');

                subjectDropdown.html('<option value="">Loading...</option>');

                if (standardId) {
                    $.ajax({
                        url: '/api/standards/' + standardId + '/subjects',
                        method: 'GET',
                        success: function(data) {
                            subjectDropdown.empty();
                            subjectDropdown.append('<option value="">Select Subject</option>');
                            data.forEach(function(subject) {
                                subjectDropdown.append(
                                    `<option value="${subject.id}">${subject.name}</option>`
                                );
                            });
                        },
                        error: function() {
                            subjectDropdown.html(
                                '<option value="">Unable to load subjects</option>');
                        }
                    });
                } else {
                    subjectDropdown.html('<option value="">Select Subject</option>');
                }
            });
        });
    </script>
@endpush

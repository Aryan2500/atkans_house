@extends('adminV2.master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            @include('adminV2.partials.alerts')

            <div class="card">
                <div class="card-header">
                    <h4>Upload Chapters for a Book</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data"
                        action="{{ route('chapter.store') }}">
                        @csrf

                        {{-- 🔗 Select Book --}}
                        <div class="form-group">
                            <label for="book_id">Select Book</label>
                            <select class="form-control" id="book_id" name="book_id" required>
                                <option value="">-- Select Book --</option>
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- ✅ Common: Is Free --}}
                        <div class="form-group form-check mt-3">
                            <input type="checkbox" class="form-check-input" id="is_free" name="is_free" checked>
                            <label class="form-check-label" for="is_free">All Chapters Free?</label>
                        </div>

                        <hr>

                        {{-- 🔁 Chapter Repeater --}}
                        <div id="chapter-repeater">
                            <div class="chapter-block border p-3 mb-3 rounded bg-light">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label>Chapter Title</label>
                                        <input type="text" name="chapters[0][title]" class="form-control" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label>Chapter Number</label>
                                        <input type="number" name="chapters[0][chapter_number]" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label>PDF File</label>
                                        <input type="file" name="chapters[0][file_url]" accept=".pdf"
                                            class="form-control-file" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description (optional)</label>
                                    <textarea name="chapters[0][description]" class="form-control" rows="2"></textarea>
                                </div>
                                <button type="button" class="btn btn-danger btn-sm remove-chapter">Remove</button>
                            </div>
                        </div>

                        <button type="button" class="btn btn-secondary mb-3" id="add-chapter">+ Add Another
                            Chapter</button>

                        <button class="btn btn-success btn-block" type="submit">📥 Upload All Chapters</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let chapterIndex = 1;

        document.getElementById('add-chapter').addEventListener('click', function() {
            const container = document.getElementById('chapter-repeater');

            const template = `
            <div class="chapter-block border p-3 mb-3 rounded bg-light">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Chapter Title</label>
                        <input type="text" name="chapters[${chapterIndex}][title]" class="form-control" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Chapter Number</label>
                        <input type="number" name="chapters[${chapterIndex}][chapter_number]" class="form-control" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>PDF File</label>
                        <input type="file" name="chapters[${chapterIndex}][file_url]" accept=".pdf" class="form-control-file" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Description (optional)</label>
                    <textarea name="chapters[${chapterIndex}][description]" class="form-control" rows="2"></textarea>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-chapter">Remove</button>
            </div>
        `;

            container.insertAdjacentHTML('beforeend', template);
            chapterIndex++;
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-chapter')) {
                e.target.closest('.chapter-block').remove();
            }
        });
    </script>
@endpush

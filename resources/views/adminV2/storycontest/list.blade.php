@extends('adminV2.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Story Contest Entries</h4>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Story Contests</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                @include('adminV2.partials.alerts')

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="storyContestTable" class="display table dataTable table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Instagram Link</th>
                                    <th>Photo</th>
                                    <th>Status</th>
                                    <th>Submitted</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($storyContests as $index => $story)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $story->username }}</td>
                                        <td>
                                            @if ($story->instagram_link)
                                                <a href="{{ $story->instagram_link }}" target="_blank">
                                                    View Profile
                                                </a>
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($story->photo)
                                                <img src="{{ asset($story->photo) }}" alt="Photo" width="60"
                                                    height="60">
                                                <a href="{{ asset($story->photo) }}" target="_blank"
                                                    rel="noopener noreferrer">Open</a>
                                            @else
                                                <span class="text-muted">No Photo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge badge-{{ $story->is_active ? 'success' : 'secondary' }}">
                                                {{ $story->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>{{ $story->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('stories.edit', $story->id) }}"
                                                class="btn btn-sm btn-warning mt-1">
                                                <i class="fa fa-pen"></i>
                                            </a>

                                            <form action="{{ route('stories.destroy', $story->id) }}" method="POST"
                                                style="display:inline-block;" class="mt-1">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this entry?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Optional: Add Button to Create New Story --}}
                        {{-- <div class="mt-3">
                            <a href="{{ route('story-contests.create') }}" class="btn btn-success">
                                + Add New Entry
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->


    <!-- Image Preview Modal -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Image Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="Preview" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        initDataTable('#storyContestTable', 'Story Contests');
    </script>
@endpush
